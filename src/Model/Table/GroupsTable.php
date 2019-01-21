<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 16/01/2019
 * Time: 16:05
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class GroupsTable extends Table
{

    public function initialize(array $config){
        parent::initialize($config);
        $this->hasOne('Subjects');
        $this->hasMany('Users');
    }


}