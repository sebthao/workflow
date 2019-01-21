<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 19/12/2018
 * Time: 17:30
 */

namespace App\Controller;


<<<<<<< HEAD
use App\Controller\SubjectsController;
<<<<<<< HEAD
=======
use App\Model\Entity\Sessions;
use App\Model\Entity\Users;
>>>>>>> Yanis

=======
>>>>>>> 4cf39ef52c2278b9e3dc14da2bf6bc9fa888d035
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
        $sessions=$this->Users->Sessions->find()-all();
        $this->set(compact('users','sessions'));

    }

    public function affichageEtu(){
<<<<<<< HEAD
        $users=$this->Users->find();

        $subjects=$this->Users->Groups->Subjects->find()->all();

        foreach ($subjects as $subject){
<<<<<<< HEAD


            $query = $this->Users
                ->find()
                ->select(['lastname', 'firstname'])
                ->where(['id =' => $subject->idUserMentor])
                ->all();


            dd($query);
            $subject->Enseignant = $query->lastaname . " " . $query->firstname;
            dd($subject);
        }

/*test*/


=======


            $query = $this->Users
                ->find()
                ->select(['lastname', 'firstname'])
                ->where(['id =' => $subject->idUserMentor])
                ->all();


            dd($query);
            $subject->Enseignant = $query->lastaname . " " . $query->firstname;
            dd($subject);
        }




>>>>>>> Yanis


        $this->set(compact('users', 'subjects'));
=======

        dd('coucou Etu');
>>>>>>> 4cf39ef52c2278b9e3dc14da2bf6bc9fa888d035


    }

    public function affichageEns(){

<<<<<<< HEAD
<<<<<<< HEAD

        }

        //dd('coucou Ens');


    }

    public function soumissionEns(){
=======
        dd('coucou Ens');
//oui
>>>>>>> Yanis
=======
        dd('coucou Ens');

>>>>>>> 4cf39ef52c2278b9e3dc14da2bf6bc9fa888d035

    }
}