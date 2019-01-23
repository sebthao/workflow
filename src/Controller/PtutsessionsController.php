<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 21/01/2019
 * Time: 09:50
 */

namespace App\Controller;


class PtutsessionsController  extends AppController
{
    public function select()
    {
        $sessions=$this->Ptutsessions->get($this->getRequest()->getData('id'));
        $sessions = $this->Subjects->find()->all();
        return $sessions;
    }
    public function add()
    {

        $sessions = $this->Ptutsessions->find()->all();
        if($this->getRequest()->getData() != null){}
        $this->set(compact('sessions'));

    }
    public function supr()
    {
        $sessions=$this->Ptutsessions->get($this->getRequest()->getData('id'));
        $this->Ptutsessions->delete($sessions);
        return $this->redirect(['controller' => 'Users', 'action' => 'affichageAdmin']);
    }
    public function cloned()
    {
        $sessions=$this->Ptutsessions->get($this->getRequest()->getData('id'));
        $sessions = $this->Ptutsessions->find()->all();
        return $sessions;
    }
    public function admission()
    {
        $sessions=$this->Ptutsessions->get($this->getRequest()->getData('id'));
        $sessions = $this->Ptutsessions->find()->all();
        return $sessions;
    }
    public function view()
    {
        $sessions=$this->Ptutsessions->get($this->getRequest()->getData('id'));
        $sessions = $this->Ptutsessions->find()->all();
        return $sessions;
    }

}