<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SeasonsTable extends Table
{
	public function initialize(array $config)
	{
		$this->hasMany('Rankings', [
			'className' => 'Rankings',
			'foreignKey' => 'season_id'
		]);
	}
}