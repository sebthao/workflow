<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 19/12/2018
 * Time: 17:30
 */

namespace App\Controller;


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

        dd('coucou Etu');


    }

    public function affichageEns(){

        dd('coucou Ens');


    }
}