<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 19/12/2018
 * Time: 17:30
 */

namespace App\Controller;


use App\Controller\SubjectsController;

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
                    if($user->idRole==1){
                        return $this->redirect('/Users/affichageAdmin');
                    }
                    else if($user->idRole==2){
                        return $this->redirect('/Users/affichageEns');
                    }
                    else{
                        return $this->redirect('/Users/affichageEtu');
                    }
                }

            }




        }

        $this->set(compact('users'));
        
    }

    public function affichageAdmin(){
        dd('coucou Admin');

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
        }






        $this->set(compact('users', 'subjects'));


    }

    public function affichageEns(){
        dd($this->Users->Sessions->find()->all());
        $subjects=$this->Users->Groups->Subjects->find()->all();
        $sessions=$this->Users->Sessions->find()->all();
        foreach ($subjects as $subject){
            $query = $this->Users
                ->find()
                ->select(['firstName', 'lastName'])
                ->all();

            //$subject


        }

        //dd('coucou Ens');


    }

    public function soumissionEns(){

    }
}