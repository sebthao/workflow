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
<<<<<<< HEAD
<<<<<<< HEAD
    public function initialize(array $config){
        parent::initialize($config);
        $this->hasOne('Groups');
        $this->belongsToMany('Subjects', ['through'=>'SubjectsUsers']);
        $this->hasMany('SubjectsUsers');
    }
=======
<<<<<<< HEAD
    public function initialize(array $config){
        parent::initialize($config);
        $this->hasOne('Groups');
<<<<<<< HEAD
        $this->hasOne('Roles');
        $this->hasMany('Sessions');
=======
        $this->belongsToMany('Sessions');
>>>>>>> Yanis
    }
=======

>>>>>>> 4cf39ef52c2278b9e3dc14da2bf6bc9fa888d035
>>>>>>> Yanis
=======
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->hasOne('Groups');
        $this->belongsToMany('Roles');
        $this->belongsToMany('Ptutsessions');
        $this->belongsToMany('Subjects');
>>>>>>> master

    }
}