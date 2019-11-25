<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TournamentsTable extends Table
{
	public function initialize(array $config)
	{
		$this->hasMany('Videos', [
			'className' => 'Videos',
			'foreignKey' => 'tournament_id'
		]);

		$this->hasMany('Rounds', [
			'className' => 'Rounds',
			'foreignKey' => 'tournament_id',
		]);
	}
}