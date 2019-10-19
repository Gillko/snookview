<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PlayersTable extends Table
{
	public function initialize(array $config)
    {
/*
    	$this->setTable('players');
    	$this->setprimaryKey('player_id');
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
    	$this->setDisplayField('player_imageSrc');
*/
	    /*$this->hasMany('Rankings', [
	        'foreignKey' => 'player_id',
	    ]);*/

	    //in 3.0 "hasAndBelongsToMany" has renamed to "belongsToMany"

	    $this->belongsToMany('Videos', [
	    	'joinTable' => 'players_videos',
			'foreignKey' => 'player_id',
			//'associationForeignKey' => 'video_id',
			'targetForeignKey' => 'video_id',
	    ]);

	    $this->belongsToMany('Items', [
	    	'joinTable' => 'items_players',
			'foreignKey' => 'player_id',
			//'associationForeignKey' => 'video_id',
			'targetForeignKey' => 'item_id',
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