<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 21/01/2019
 * Time: 12:04
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