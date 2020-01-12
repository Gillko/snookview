<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PlayersTable extends Table
{
	public function initialize(array $config)
	{
		$this->belongsToMany('Videos', [
			'joinTable' => 'players_videos',
			'foreignKey' => 'player_id',
			'targetForeignKey' => 'video_id',
		]);

		$this->belongsToMany('Items', [
			'joinTable' => 'items_players',
			'foreignKey' => 'player_id',
			'targetForeignKey' => 'item_id',
		]);
	}
}