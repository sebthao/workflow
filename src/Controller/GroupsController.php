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
        $nbetu=$this->getRequest()->getData('number');
        $etudiants = $this->Groups->Users->find()->all();
        $this->set(compact('etudiants','nbetu'));
    }

}