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

    if($id!=null){
        $this->getRequest()->getSession()->write('id',$id);
    }
    $subjects = $this->Subjects->get($this->getRequest()->getSession()->read('id'));

    $query = $this->Subjects->Groups->Users
        ->find()
        ->select(['lastname', 'firstname'])
        ->where(['id =' => $subjects->idUserMentor])
        ->all();

    foreach ($query as $q) {

        $subjects->Enseignant = $q->lastname . " " . $q->firstname;

    }


    $tags=array();

    $subjects = $this->Subjects->get($this->getRequest()->getSession()->read('id'));
    $query2=$this->Subjects->find()->contain(['Tags'])->all();
    foreach($query2 as $tag) {
        if ($tag->id == $this->getRequest()->getData('id')) {

            $tags = $tag->tags;
        }
    }


    $this->set(compact('subjects', 'tags'));
    }




}