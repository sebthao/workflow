<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 19/12/2018
 * Time: 17:30
 */

namespace App\Controller;


<<<<<<< HEAD
<<<<<<< HEAD
use App\Controller\SubjectsController;
use Cake\ORM\ResultSet;
use PhpParser\Node\Expr\Array_;

=======

=======
>>>>>>> master
use App\Controller\SubjectsController;
use App\Model\Entity\Sessions;
use App\Model\Entity\Users;


<<<<<<< HEAD

>>>>>>> Yanis
=======
>>>>>>> master
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
<<<<<<< HEAD
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEtu']);
=======
                        return $this->redirect('/Users/affichageEtuChoix');
>>>>>>> remotes/origin/Marie
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

    public function formulaireSoumission(){
        $subject = $this->Users->Subjects->find();
        $user = $this->Users->get($this->getRequest()->getSession()->read('id'));


        $profs= array();


        $query = $this->Users
            ->find()
            ->select(['lastname', 'firstname'])
            ->where(['idRole =' => 2])
            ->all();





        foreach($query as $q){
            $tmp = $q->lastname . " " . $q->firstname;
            array_push($profs,$tmp);

        }


        if(!empty($this->getRequest()->getData())) {

            $subject = $this->Users->Subjects->newEntity();
            $subject->title = $this->getRequest()->getData('title');
            $subject->description = $this->getRequest()->getData('content');
            $subject->idSession =1;

            $subject->idUserCre = $user->id;

            $subject->idUserMentor = 4;
            $int =-1;
            $tmp = $this->getRequest()->getData('mentor');


            $query = $this->Users
                ->find()
                ->select(['id', 'lastname', 'firstname'])
                ->where(['idRole =' => 2])
                ->all();

            foreach ($query as $q){
                $int = $int +1;
                if($int == $tmp){
                    $subject->idUserMentor = $q->id;
                }


            }

            if ($this->Users->Subjects->save($subject)) {

                $this->Flash->success('Sauvegardé');
                $this->getRequest()->getSession()->write('subject', $subject);
                return $this->redirect('/Users/affichage_etu_choix');
            } else {
                $this->Flash->error('erreur');
            }

        }

        $user = $this->Users->get($this->getRequest()->getSession()->read('id'));


        $this->set(compact('subject','user','profs'));
    }



    public function affichageEtuChoix(){
        $users=$this->Users->find();
        $subjects=$this->Users->Groups->Subjects->find()->all();
<<<<<<< HEAD

        foreach ($subjects as $subject){

<<<<<<< HEAD
=======
        $users=$this->Users->find();

        $subjects=$this->Users->Groups->Subjects->find()->all();


        $query2=$this->Users->SubjectsUsers
            ->find()
            ->where(['user_id ='=> $this->getRequest()->getSession()->read('id')])
            ->all();





        foreach ($subjects as $subject){


>>>>>>> Yanis

=======
        foreach ($subjects as $subject){
>>>>>>> master
            $query = $this->Users
                ->find()
                ->select(['lastname', 'firstname'])
                ->where(['id =' => $subject->idUserMentor])
                ->all();
<<<<<<< HEAD
<<<<<<< HEAD
=======


            dd($query);
            $subject->Enseignant = $query->lastaname . " " . $query->firstname;
            dd($subject);
        }

/*test*/


        $this->set(compact('users', 'subjects'));


        dd('coucou Etu');
>>>>>>> Yanis


<<<<<<< HEAD
=======
            dd($query);
            $subject->Enseignant = $query->lastaname . " " . $query->firstname;
            dd($subject);
            $this->set(compact('users', 'subjects'));
>>>>>>> master
            foreach($query as $q){
                $subject->Enseignant = $q->lastname . " " . $q->firstname;
            }
        }
        $this->set(compact('users', 'subjects'));
=======
        $this->set(compact('users', 'subjects', 'query2'));
>>>>>>> remotes/origin/Marie
    }

<<<<<<< HEAD
    public function affichageEns(){
<<<<<<< HEAD
        dd('coucou Ens');
=======

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

<<<<<<< HEAD
    public function soumissionEns(){
        $subjects=$this->Users->Subjects->newEntity();
        $this->set(compact('subjects'));

>>>>>>> master

    }
=======
    public function choisirSubject()
    {
        $id2 = $this->getRequest()->getSession()->read('id');

        $query = $this->Users->SubjectsUsers->find()->select('id', 'subject_id','user_id')->where (['user_id ='=>$id2])->all();
>>>>>>> remotes/origin/Marie

        $rank = $query->count()+1;

<<<<<<< HEAD
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
<<<<<<< HEAD
=======

        //dd('coucou Ens');

    }

    public function soumissionEns(){
        dd('coucou Ens');

//My name is !Yaaaaaaa
>>>>>>> Yanis
=======
        $queryDuplicate = $this->Users->SubjectsUsers->find()
            ->where(['user_id ='=>$this->getRequest()->getSession()->read('id'), 'subject_id ='=>$this->getRequest()->getData('id')])
            ->toArray();


        $queryAll = $this->Users->SubjectsUsers->find()
            ->where(['user_id ='=>$this->getRequest()->getSession()->read('id')])
            ->all();


        if(empty($queryDuplicate)){


            $subuser=$this->Users->SubjectsUsers->newEntity();
            $subuser->subject_id=$this->getRequest()->getData('id');
            $subuser->user_id=$id2;
            $subuser->rank=$rank;
            $this->Users->SubjectsUsers->save($subuser);

        }
        else {
            foreach ($queryDuplicate as $q){
                $ranktmp=$q->rank;
                $q->rank = $rank-1;
                $this->Users->SubjectsUsers->save($q);
            }
            foreach ($queryAll as $q2){
                if($q2->rank>$ranktmp){
                    $q2->rank=$q2->rank-1;
                    $this->Users->SubjectsUsers->save($q2);
                }
            }
        }

        return $this->redirect('/Users/affichageEtuChoix');
>>>>>>> remotes/origin/Marie

=======
>>>>>>> master
    }
}