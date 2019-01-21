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
        }






        $this->set(compact('users', 'subjects'));


    }

    public function affichageEns(){

        dd('coucou Ens');
//My name is !Yaaaaaaa

    }
}