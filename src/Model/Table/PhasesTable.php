<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 24/01/2019
 * Time: 15:20
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class PhasesTable extends Table
{

    public function initialize(array $config){
        parent::initialize($config);


        $this->belongsTo('Ptutsessions');
    }


}