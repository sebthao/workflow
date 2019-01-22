<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 16/01/2019
 * Time: 15:59
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class SubjectsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->hasOne('Groups');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->belongsToMany('Users');
=======
        $this->belongsToMany('Promotions');
        $this->belongsToMany('Users', ['through'=>'SubjectsUsers']);
>>>>>>> remotes/origin/Marie
        $this->belongsToMany('Tags');
=======
<<<<<<< HEAD
        $this->hasMany('Sessions');
        $this->belongsToMany('Users');
=======
>>>>>>> Yanis

>>>>>>> Yanis
=======
        $this->hasMany('Ptutsessions');
        $this->belongsToMany('Users');
        $this->belongsToMany('Tags');

>>>>>>> master
    }
}