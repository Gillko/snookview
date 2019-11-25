<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ItemsTable extends Table
{
	public function initialize(array $config)
	{
		$this->belongsTo('Timelines', [
			'className' => 'Timelines',
			'foreignKey' => 'timeline_id',
		]);

		$this->belongsToMany('Players', [
			'joinTable' => 'items_players',
			'foreignKey' => 'item_id',
			'targetForeignKey' => 'player_id',
		]);
	}
}