<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 23/01/2019
 * Time: 09:30
 */

namespace App\Model\Table;

use Cake\ORM\Table;


class StatusTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->hasMany('Ptutsessions');

    }




}