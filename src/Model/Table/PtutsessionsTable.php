<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 22/01/2019
 * Time: 14:17
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class PtutsessionsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsTo('Promotions');
        $this->belongsTo('Status');
        $this->hasMany('Phases');
        $this->hasMany('Subjects');

    }


}