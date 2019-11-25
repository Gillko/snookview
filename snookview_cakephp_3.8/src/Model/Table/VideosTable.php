<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class VideosTable extends Table
{
	public function initialize(array $config)
	{
		$this->belongsToMany('Players', [
			'joinTable' => 'players_videos',
			'foreignKey' => 'video_id',
			'targetForeignKey' => 'player_id'
		]);

		$this->belongsTo('Timelines', [
			'className' => 'Timelines',
			'foreignKey' => 'timeline_id'
		]);

		$this->belongsTo('Tournaments', [
			'className' => 'Tournaments',
			'foreignKey' => 'tournament_id'
		]);

		$this->belongsTo('Sessions', [
			'className' => 'Sessions',
			'foreignKey' => 'session_id'
		]);

		$this->belongsTo('Rounds', [
			'className' => 'Rounds',
			'foreignKey' => 'round_id'
		]);

		$this->hasMany('Comments', [
			'className' => 'Comments',
			'foreignKey' => 'video_id'
		]);

		$this->hasMany('Favorites', [
			'className' => 'Favorites',
			'foreignKey' => 'video_id'
		]);
	}
}