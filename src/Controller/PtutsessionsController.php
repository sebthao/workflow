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

        $sessions = $this->Subjects->find()->all();
        return $sessions;
    }
    public function add()
    {

        $sessions = $this->Subjects->find()->all();
        return $sessions;
    }
    public function supr()
    {

        $sessions = $this->Subjects->find()->all();
        return $sessions;
    }
    public function clone()
    {

        $sessions = $this->Subjects->find()->all();
        return $sessions;
    }
    public function admission()
    {

        $sessions = $this->Subjects->find()->all();
        return $sessions;
    }
    public function view()
    {

        $sessions = $this->Subjects->find()->all();
        return $sessions;
    }

}