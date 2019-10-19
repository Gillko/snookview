<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class VideosTable extends Table
{
	public function initialize(array $config)
    {


    	$this->setTable('videos');
    	$this->setprimaryKey('video_id');
    	$this->setDisplayField('video_title');

    	$this->setDisplayField('video_date');
    	$this->setDisplayField('video_scoreA');
    	$this->setDisplayField('video_scoreB');
    	$this->setDisplayField('video_playlist');
    	$this->setDisplayField('video_url');
    	$this->setDisplayField('video_url_part_two');
    	$this->setDisplayField('video_url_part_three');
    	$this->setDisplayField('video_url_part_four');
    	$this->setDisplayField('video_playlist_url');
    	$this->setDisplayField('video_part');
    	$this->setDisplayField('video_sort');
    	$this->setDisplayField('tournament_id');
    	$this->setDisplayField('round_id');
    	$this->setDisplayField('timeline_id');

    	/*$this->setTable('players');
    	//$this->setprimaryKey('player_id');
    	$this->setDisplayField('player_firstname');
    	$this->setDisplayField('player_surname');
    	$this->setDisplayField('player_birthDate');
    	$this->setDisplayField('player_turnedPro');
    	$this->setDisplayField('player_nickname');
    	$this->setDisplayField('player_nationality');
    	$this->setDisplayField('player_highestBreak');
    	$this->setDisplayField('player_highestRanking');
    	$this->setDisplayField('player_centuryBreaks');
    	$this->setDisplayField('player_careerWinnings');
    	$this->setDisplayField('player_worldChampion');
    	$this->setDisplayField('player_image');
    	$this->setDisplayField('player_category');
    	$this->setDisplayField('player_imageSrc');*/

	    /*$this->hasMany('Rankings', [
	        'foreignKey' => 'player_id',
	    ]);*/

	    //in 3.0 "hasAndBelongsToMany" has renamed to "belongsToMany"

	   /* $this->belongsToMany('Videos', [
	    	'foreignKey' => 'player_id',
	    ]);

	    $this->belongsToMany('Items', [
	    	'foreignKey' => 'player_id',
	    ]);
*/

	    $this->belongsToMany('Players', [
	    	'joinTable' => 'players_videos',
			'foreignKey' => 'video_id',
			//'associationForeignKey' => 'player_id',
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



	    /*public $hasAndBelongsToMany = array(
		'Video' => array(
			'className' => 'Video',
			'joinTable' => 'players_videos',
			'foreignKey' => 'player_id',
			'associationForeignKey' => 'video_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Item' => array(
			'className' => 'Item',
			'joinTable' => 'items_players',
			'foreignKey' => 'player_id',
			'associationForeignKey' => 'item_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);*/
	}
}