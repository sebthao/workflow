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
        dd($subjects);
    }

}