<?php
/**
 * Created by PhpStorm.
 * User: p1601402
 * Date: 21/01/2019
 * Time: 14:31
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class PromotionsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Users');
        $this->hasMany('PtutsessionsPromotions');
    }
}