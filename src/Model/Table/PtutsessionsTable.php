<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: p1700788
 * Date: 16/01/2019
 * Time: 16:05
 */

namespace App\Model\Table;


use Cake\ORM\Table;

class SessionsTable
{
    public function initialize(array $config){
        parent::initialize($config);


    }
=======
 * User: p1601402
 * Date: 21/01/2019
 * Time: 10:58
 */

namespace App\Model\Table;
use Cake\ORM\Table;

class PtutsessionsTable extends Table
{
    public function initialize(array $config){
        parent::initialize($config);
        $this->belongsToMany('Users');
        $this->belongsToMany('Subjects');
    }

>>>>>>> Yanis
}