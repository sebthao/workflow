<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 19/12/2018
 * Time: 17:37
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->hasOne('Groups');
        $this->belongsToMany('Ptutsessions');
        $this->belongsToMany('Promotions');
        $this->belongsToMany('Subjects');
        $this->hasOne('Roles');
    }
}