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
        $entities=$this->Groups->Users->find()->contain(['Roles'])->toArray();
        //dd($entities);
        foreach ($entities as $entity){
            $nomEtu=$entity->firstName." ".$entity->lastName;
            if ($entity->roles<>null) {
                if ($entity->roles[0]->id == 3) {
                    array_push($array, $nomEtu);
                }
            }
        }
        $this->set(compact('etudiants','nbetu','array'));
    }

}