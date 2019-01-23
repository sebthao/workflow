<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 23/01/2019
 * Time: 09:41
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class TagsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Subjects');
    }


}