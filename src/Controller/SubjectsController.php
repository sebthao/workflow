<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 16/01/2019
 * Time: 15:59
 */

namespace App\Controller;


class SubjectsController extends AppController
{
    public function select()
    {

        $subjects = $this->Subjects->find()->all();

    }


    public function affSubject(){

    $id = $this->getRequest()->getData('id');

    $subjects = $this->Subjects->get($id);

    $query = $this->Subjects->Groups->Users
        ->find()
        ->select(['lastname', 'firstname'])
        ->where(['id =' => $subjects->idUserMentor])
        ->all();

    foreach ($query as $q) {

        $subjects->Enseignant = $q->lastname . " " . $q->firstname;

    }


    $tags=array();

    $subjects = $this->Subjects->get($id);
    $query2=$this->Subjects->find()->contain(['Tags'])->all();
    foreach($query2 as $tag) {
        if ($tag->id == $this->getRequest()->getData('id')) {

            $tags = $tag->tags;
        }
    }


    $this->set(compact('subjects', 'tags'));
    }

    public function addSubject(){
        if(!empty($this->getRequest()->getData())){
            $subjects= $this->Subjects->newEntity();
            $subjects->idSession = 1;
            $subjects->title =$this->getRequest()->getData('Titre') ;
            $subjects->description = $this->getRequest()->getData('Description');
            $subjects->idUserMentor = $this->getRequest()->getSession()->read('id');
            $subjects->idUserCre= $this->getRequest()->getSession()->read('id');
            if ($this->Subjects->save($subjects)){
                $this->Flash->success("Sujet créé");
                $this->redirect(['url'=>['controller'=>'Users','action'=>'afficheEns']]);
            }else{
                $this->Flash->error('erreur');
                // $this->redirect(['url'=>['controller'=>'Users','action'=>'afficheEns']]);
            }
        }
        $this->redirect(['controller'=>'Users','action'=>'affichageEns']);
    }

    public function descriptionPtut(){
        $subjects=$this->Subjects->find()->all();
        $idmentors=$this->Subjects->Users->find()
            ->all();
        //dd($idmentors);
        foreach ($subjects as $subject) {
            if ($subject->id == $this->getRequest()->getData('id')) {
                foreach($idmentors as $idmentor){
                    //dd($idmentor);
                    if ($idmentor->id==$subject->idUserMentor){
                        $nomMentor= $idmentor->firstName." ".$idmentor->lastName;
                        $this->set(compact('nomMentor'));
                    }
                }
                $this->set(compact('subject'));
            } else {}
        }
    }/*un turc con*/

    public function setVisible(){
        
    }

}