<?php
/**
 * Created by PhpStorm.
 * User: p1700788
 * Date: 21/01/2019
 * Time: 17:12
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class SubjectsUsersTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);

        $this->belongsTo('Users');
        $this->belongsTo('Subjects');
    }


}