<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RoundsTable extends Table
{
	public function initialize(array $config){

		$this->belongsTo('Tournaments', [
	    	'className' => 'Tournaments',
			'foreignKey' => 'tournament_id'
	    ]);
    	
	}
}