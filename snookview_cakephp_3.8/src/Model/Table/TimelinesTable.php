<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TimelinesTable extends Table
{
	public function initialize(array $config)
    {
    	$this->hasOne('Videos');

    	$this->hasMany('Items', [
    		'className' => 'Items',
			'foreignKey' => 'timeline_id'
    	]);
	}
}