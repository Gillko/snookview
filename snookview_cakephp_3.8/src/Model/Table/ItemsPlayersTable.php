<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ItemsPlayersTable extends Table
{
	public function initialize(array $config)
	{
		$this->belongsTo('Items', [
			'foreignKey'	=> 'item_id',
			'joinType'		=> 'INNER'
		]);

		$this->belongsTo('Players', [
			'foreignKey' 	=> 'player_id',
			'joinType'		=> 'INNER'
		]);
	}
}