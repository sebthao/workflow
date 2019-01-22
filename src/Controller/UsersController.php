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

    public function index(){
        //configure la base de donnée
        $users=$this->Users->find();
        if($this->getRequest()->getData() != null){
            $query = $this->Users
                ->find()
                ->where (['userName =' => $this->getRequest()->getData('userName'),'password =' => $this->getRequest()->getData('password')])
                ->all();

            $bool = false;
            foreach($query as $user){
                $bool = true;
            }
            if($bool){

                foreach($query as $user){
                    $this->getRequest()->getSession()->write('id',$user->id);
                    if($user->idRole==1){
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageAdmin']);
                    }
                    else if($user->idRole==2){
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEns']);
                    }
                    else{
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEtu']);
                    }
                }
            }
        }
       $this->set(compact('users'));
    }


    public function affichageAdmin(){
        $users=$this->Users->find();
        $sessions=$this->Users->Sessions->find()->all();
        $this->set(compact('users','sessions'));

    }

    public function affichageEtu(){
        $users=$this->Users->find();
        $subjects=$this->Users->Groups->Subjects->find()->all();
        foreach ($subjects as $subject){
            $query = $this->Users
                ->find()
                ->select(['lastname', 'firstname'])
                ->where(['id =' => $subject->idUserMentor])
                ->all();
            dd($query);
            $subject->Enseignant = $query->lastaname . " " . $query->firstname;
            dd($subject);
            $this->set(compact('users', 'subjects'));
            foreach($query as $q){
                $subject->Enseignant = $q->lastname . " " . $q->firstname;
            }
        }
        $this->set(compact('users', 'subjects'));
    }


    public function affichageEns(){
        //dd($this->Users->Ptutsessions->get(0));
        /*dd($this->Users->Sessions->find()
            ->select('id', 'date_event')
            ->where (['id ='=>2])
            ->all()
        );*/
        //$sessions=$this->Users->Sessions->find();
        $subjects=$this->Users->Subjects->find()->all();
        /*$arraydate=array();

        foreach ($sessions as $session){
            array_push($arraydate,$session->date);
       }
       dd($arraydate);*/
        $this->set(compact('subjects'/*,'sessions'*/));
    }

    public function soumissionEns(){
        $subjects=$this->Users->Subjects->newEntity();
        $this->set(compact('subjects'));


    }


    public function choisirSubject()
    {
        $id2 = $this->getRequest()->getSession()->read('id');
        $arraysubjects=array();
        $users=$this->Users->get($id2);
        $subjects=$this->Users->Subjects->get($this->getRequest()->getData('id'));
        array_push($arraysubjects,$subjects);
        $users->subjects=$arraysubjects;
        $this->Users->save($users);
        $this->Flash->success('Choix bien enregistré');
        return $this->redirect('/Users/affichageEtu');
    }
}