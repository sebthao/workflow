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

class UsersController extends AppController
{


    ////////////////////////////////////Tout le monde/////////////////////
    public function index(){

        //configure la base de donnée
        $users=$this->Users->find()->all();
        if($this->getRequest()->getData() != null){
            $arrUser=array();
            $query = $this->Users
                ->find()
                ->contain(['Roles'])
                ->where (['userName =' => $this->getRequest()->getData('userName'),'password =' => $this->getRequest()->getData('password')])
                ->all();
            foreach ($query as $q){
                array_push($arrUser, $q);
            }
            $arrRole=array();
            foreach ($arrUser as $au){
                foreach ($au->roles as $ar){
                    array_push($arrRole, $ar);
                }
            }
            $bool = false;
            foreach ($query as $user){
                $bool=true;
            }
            if($bool){
                foreach ($arrRole as $aR){
                    $this->getRequest()->getSession()->write('id',$q->id);
                    if($aR->id==1){
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageAdmin']);
                    }
                    else if($aR->id==2){
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEns']);
                    }
                    else{
                        return $this->redirect(['controller' => 'Users', 'action' => 'affichageEtuChoix']);
                    }
                }
            }
        }
        $this->set(compact('users'));
    }


    public function ptutsessionFinie(){
        $user = $this->Users->get($this->getRequest()->getSession()->read('id'));

///////Obtenir l'id des Promo ou l'user appartient
        $idpromo = array();
        $quer = $this->Users
            ->find()
            ->contain(['Promotions'])
            ->where(['id =' =>$user->id])
            ->toArray();


        foreach ($quer as $qu){

            foreach ($qu->promotions as $qp){
                array_push($idpromo, $qp);
            }
        }

///////////////////////Obtenir les sessions selon les id de promos/////////////////

        $sess =array();
        foreach ($idpromo as $idp){

            $query = $this->Users->Promotions->Ptutsessions
                ->find()
                ->where(['promotion_id ='=>$idp->id])
                ->toArray();

            foreach ($query as $q){
                array_push($sess, $q);
            }
        }


////////////////////Obtenir le statuts selon l'id des sessions////////////////
        $stat =array();
        foreach ($sess as $s){
            $query2 = $this->Users->Promotions->Ptutsessions->Status
                ->find()
                ->where(['id ='=>$s->statu_id])
                ->toArray();
            foreach ($query2 as $q){
                array_push($stat, $q);
            }
        }










        $this->set(compact('user', 'idpromo', 'sess', 'stat'));

    }


    ////////////////////////////////////Etudiant//////////////////////////
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
            $subject->description =$this->getRequest()->getData('content');
            $subject->idSession =1;
            $subject->idUserCre = $user ->id;
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
        $query2=$this->Users->SubjectsUsers
            ->find()
            ->where(['user_id ='=> $this->getRequest()->getSession()->read('id')])
            ->all();
        foreach ($subjects as $subject){
                $query = $this->Users
                    ->find()
                    ->select(['lastname', 'firstname'])
                    ->where(['id =' => $subject->idUserMentor])
                    ->toArray();
            foreach($query as $q){
                $subject->Enseignant = $q->lastname . " " . $q->firstname;
            }
        }
        $this->set(compact('users', 'subjects', 'query2'));
    }

    public function choisirSubject()
    {
        $id2 = $this->getRequest()->getSession()->read('id');
        $query = $this->Users->SubjectsUsers->find()->select('id', 'subject_id','user_id')->where (['user_id ='=>$id2])->all();
        $rank = $query->count()+1;
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



    }



    ////////////////////////////////////Enseignant////////////////////////////


    public function affichageEns(){
        $users=$this->Users->find()->contain(['Promotions'])->where(['id =' => $this->getRequest()->getSession()->read('id')])->toArray();
        $promos=$users[0]->promotions;
        $sessionpromo=$this->Users->newEntity();
        $arraysessions=array();
        $subjects=$this->Users->Subjects->find()->where(['idUserMentor = '=>$this->getRequest()->getSession()->read('id')])->toArray();
        foreach($subjects as $subject){
            $idpromo=$this->Users->Promotions->Ptutsessions->find()->select('promotion_id')->where(['id ='=> $subject->idSession])->toArray();
            $idpromo=$idpromo[0];
            $idpromo=$idpromo->promotion_id;
            $subject->idpromo=$idpromo;
        }
        foreach ($promos as $promo){
            $sessions=$this->Users->Promotions->Ptutsessions->find()->where(['promotion_id ='=> $promo->id])->toArray();
            foreach ($sessions as $session) {
                $sessionpromo=$this->Users->newEntity();
                $sessionpromo->idsession=$session->id;
                $sessionpromo->promo=$promo->title;
                $sessionpromo->id=$promo->id;
                array_push($arraysessions,$sessionpromo);
            }
        }
        $this->set(compact('subjects','arraysessions'));
    }

    public function soumissionEns(){
        $subjects = $this->Users->Subjects->newEntity();
        $this->getRequest()->getSession()->write('idsession',$this->getRequest()->getData('idsession'));
        $this->set(compact('subjects'));
    }

    public function verification(){
        $test = true;
        $i = 0;
        $j = $i + 1;
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
        $i = 0;
        $nbEtu=$this->getRequest()->getSession()->read('nbetu');
        $idSubject=$this->getRequest()->getSession()->read('idSujet');
        if ($test == true) {
            $this->Flash->success('Choix bien enregistré');
            while ($i < $nbEtu) {
                $group=$this->Users->Groups->newEntity();
                $users = $this->getRequest()->getSession()->read('personne');
                $entities=$this->Users->find()->all();
                $i=0;
                foreach ($users as $user) {
                    $groupes=$this->Users->Groups->find()->all();

                    foreach($groupes as $groupe){
                        dd($groupe);
                        if ($idSubject == $groupe->idNumSub){
                            $group->id=$groupe->id;
                            $group->idNumSub= $groupe->idNumSub;
                            $group->Num=$nbEtu;
                        }else{
                            $group->id='';
                            $group->idNumSub= $idSubject;
                            $group->Num=$nbEtu;
                        }
                    }$this->Users->Groups->save($group);
                    foreach ($entities as $entity) {
                        $nomEtu=$entity->firstName." ".$entity->lastName;
                        $newuser=$this->Users->newEntity();
                        if ($entity==$nomEtu){
                            $newuser->id=$entity->id;
                            $newuser->firstName=$entity->firstName;
                            $newuser->lastName=$entity->lastName;
                            $newuser->userName=$entity->userName;
                            $newuser->password=$entity->password;
                            $newuser->mail=$entity->mail;
                            if($group->id==$entity->numGroup){
                                $entity->numGroup = 0;
                            }else {
                                $newuser->numGroup = $group->id;
                            }

                        }$this->Users->save($newuser);
                    }

                    $i = $i + 1;
                }
                return $this->redirect(['controller' => 'Users', 'action' => 'affichageEns']);
            }}else{
            $this->Flash->error('Choix non enregistré, veuillez mettre des élèves différents');
            return $this->redirect(['controller' => 'Groups', 'action' => 'choix']);
        }
    }



    ////////////////////////////////////Administrateur///////////////////////

    public function affichageAdmin(){
        $users=$this->Users->find();
        $sessions=$this->Users->Sessions->find()->all();
        $this->set(compact('users','sessions'));


    }





}
