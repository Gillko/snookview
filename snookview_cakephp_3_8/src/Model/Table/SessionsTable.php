<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SessionsTable extends Table
{
	public function initialize(array $config)
    {

    	$this->setTable('sessions');
    	$this->setprimaryKey('session_id');
	}
}