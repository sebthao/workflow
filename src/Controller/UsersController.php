<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 19/12/2018
 * Time: 17:30
 */

namespace App\Controller;



use App\Controller\SubjectsController;
use App\Model\Entity\Ptutsessions;
use App\Model\Entity\Users;

use App\Model\Entity\Sessions;


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
                    $this->getRequest()->getSession()->write('id',$user->id);
                    if ($user->idRole == 1) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageAdmin']);
                    }
                    else if ($user->idRole == 2) {
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEns']);
                    }
                    else {
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEtu']);
                    }
                }

            }


        }

        $this->set(compact('users'));

    }

    public function js()
    {
        $u = 0;
        $this->set(compact('u'));
    }

    public function affichageAdmin()
    {
        $users = $this->Users->find();

        $promos = $this->Users->Promotions->find()->toArray();


        $sessions = $this->Users->Ptutsessions->find()->all();

        foreach ($sessions as $session) {
            foreach ($promos as $promo) {


            }

        }


        //dd($sessions);


        $this->set(compact('users', 'sessions', 'promos'));

    }

    public function affichageEtu()
    {
        $users = $this->Users->find();
    public function affichageEtu(){

        $users=$this->Users->find();

        $subjects = $this->Users->Groups->Subjects->find()->all();

        foreach ($subjects as $subject) {



            $query = $this->Users
                ->find()
                ->select(['lastname', 'firstname'])
                ->where(['id =' => $subject->idUserMentor])
                ->all();


            dd($query);
            $subject->Enseignant = $query->lastaname . " " . $query->firstname;
            dd($subject);
        }

        $this->set(compact('users', 'subjects'));


        dd('coucou Etu');


    }

    public function affichageEns()
    {
        //dd($this->Users->Ptutsessions->find()->all());
        /*dd($this->Users->Sessions->find()
            ->select('id', 'date_event')
            ->where (['id ='=>2])
            ->all()
        );*/
        //$sessions=$this->Users->Sessions->find();
        $subjects = $this->Users->Subjects->find()->all();
        /*$arraydate=array();

        foreach ($sessions as $session){
            array_push($arraydate,$session->date);
       }
       dd($arraydate);*/
        $this->set(compact('subjects'/*,'sessions'*/));
    public function affichageEns(){

        //dd('coucou Ens');

    }

    public function soumissionEns(){
        dd('coucou Ens');
    }
}