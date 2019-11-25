<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PlayersVideosTable extends Table
{
	public function initialize(array $config)
	{
		$this->belongsTo('Videos', [
			'foreignKey'	=> 'video_id',
			'joinType'		=> 'INNER'
		]);

		$this->belongsTo('Players', [
			'foreignKey' 	=> 'player_id',
			'joinType'		=> 'INNER'
		]);
	}
}