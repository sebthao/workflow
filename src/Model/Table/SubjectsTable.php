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
        $this->belongsToMany('Users', ['through'=>'SubjectsUsers']);
        $this->belongsToMany('Tags');
    }
}