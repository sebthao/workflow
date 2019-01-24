<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 19/12/2018
 * Time: 17:30
 */

namespace App\Controller;


use App\Controller\SubjectsController;
use App\Model\Entity\Sessions;
use App\Model\Entity\Users;


class UsersController extends AppController
{

    public function index()
    {
        //configure la base de donnée
        $users = $this->Users->find();
        if ($this->getRequest()->getData() != null) {
            $query = $this->Users
                ->find()
                ->where(['userName =' => $this->getRequest()->getData('userName'), 'password =' => $this->getRequest()->getData('password')])
                ->all();

            $bool = false;
            foreach ($query as $user) {
                $bool = true;
            }
            if ($bool) {

                foreach ($query as $user) {
                    $this->getRequest()->getSession()->write('id', $user->id);
                    if ($user->idRole == 1) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageAdmin']);
                    } else if ($user->idRole == 2) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEns']);
                    } else {
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEtu']);
                    }
                }
            }
        }
        $this->set(compact('users'));
    }


    public function affichageAdmin()
    {
        $users = $this->Users->find();
        $sessions = $this->Users->Sessions->find()->all();
        $this->set(compact('users', 'sessions'));

    }

    public function affichageEtu()
    {
        $users = $this->Users->find();
        $subjects = $this->Users->Groups->Subjects->find()->all();
        foreach ($subjects as $subject) {
            $query = $this->Users
                ->find()
                ->select(['lastname', 'firstname'])
                ->where(['id =' => $subject->idUserMentor])
                ->all();
            $subject->Enseignant = $query->lastaname . " " . $query->firstname;
            $this->set(compact('users', 'subjects'));
            foreach ($query as $q) {
                $subject->Enseignant = $q->lastname . " " . $q->firstname;
            }
        }
        $this->set(compact('users', 'subjects'));
    }


    public function affichageEns()
    {
        $sessions = $this->Users->PtutSessions->find();
        $subjects = $this->Users->Subjects->find()->all();
        $arraydate = array();

        foreach ($sessions as $session) {
            array_push($arraydate, $session->date);
        }
        $this->set(compact('subjects', 'sessions'));
    }

    public function soumissionEns()
    {
        $subjects = $this->Users->Subjects->newEntity();
        $this->set(compact('subjects'));


    }


    public function choisirSubject()
    {
        $id2 = $this->getRequest()->getSession()->read('id');
        $arraysubjects = array();
        $users = $this->Users->get($id2);
        $subjects = $this->Users->Subjects->get($this->getRequest()->getData('id'));
        array_push($arraysubjects, $subjects);
        $users->subjects = $arraysubjects;
        $this->Users->save($users);
        $this->Flash->success('Choix bien enregistré');
        return $this->redirect('/Users/affichageEtu');
    }

    public function test()
    {
        $user = $this->Users->newEntity();
        $this->set(compact('user'));
    }

    public function verification()
    {
        //dd($this->getRequest()->getData('Promotion1'));
        $users = $this->getRequest()->getSession()->read('personne');
        //dd($users);
        $test = true;
        $i = 0;
        $j = $i + 1;
        $n = $i;
        while ($i < $this->getRequest()->getSession()->read('nbetu') && ($test == true)) {
            while ($j < $this->getRequest()->getSession()->read('nbetu') && ($test == true)) {
                if ($this->getRequest()->getData('Promotion' . $i) == $this->getRequest()->getData('Promotion' . $j)) {
                    $test = false;
                }
                $j = $j + 1;
            }
            $i = $i + 1;
            $j = $i + 1;
        }
        //dd($test);
        $i = 0;
        $j = 0;
        if ($test == true) {
            //$this->Flash->success('Choix bien enregistré');
            while ($i < $this->getRequest()->getSession()->read('nbetu')) {
                $user = $this->Users->find()->contain(['Promotions'])->where(['id =' => $this->getRequest()->getData('idEtu' . $i)])->toArray();
                dd($user);
            }

            if ($this->getRequest()->getData('Promotion' . $i) == $user[$j]) {
                echo "oui";
            }
            $j = $j + 1;

        $i = $i + 1;

        dd($users);
        //$this->Users->save($users);
        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEns']);
        }else{
            $this->Flash->error('Choix non enregistré, retour au choix');
            return $this->redirect(['controller' => 'Groups', 'action' => 'choix']);
        }
    }
}

