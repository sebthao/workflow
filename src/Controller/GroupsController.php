<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 16/01/2019
 * Time: 16:06
 */

namespace App\Controller;


class GroupsController extends AppController
{
    public function add()
    {
        $etudiants = $this->Groups->Users->find()->all();
        $this->set(compact('etudiants'));
    }

    public function choix()
    {
        if(!empty($this->getRequest()->getData('number'))){
            $this->getRequest()->getSession()->write('nbetu',$this->getRequest()->getData('number'));

        }
        $nbetu=$this->getRequest()->getSession()->read('nbetu');
        $etudiants = $this->Groups->Users->find()->all();
        $array=array();
        foreach ($etudiants as $etudiant){
            $nomEtu=$etudiant->firstName." ".$etudiant->lastName;
            $entity=$this->Groups->Users->find()->contain(['Roles'])->where(['id =' => $etudiant->id])->toArray();
            $role=$entity[0]->roles[0]->id;
            if ($role==3) {
                array_push($array, $nomEtu);
            }
        }
        $this->set(compact('etudiants','nbetu','array'));
    }

}