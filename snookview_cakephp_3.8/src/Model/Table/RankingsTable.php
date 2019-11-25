<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RankingsTable extends Table
{
		public function initialize(array $config)
		{
			$this->belongsTo('Players', [
					'foreignKey' => 'player_id',
			]);

			$this->belongsTo('Seasons', [
					'foreignKey' => 'season_id',
			]);
		}
}