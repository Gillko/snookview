<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class PlayersVideosTable extends Table
{
	public function initialize(array $config)
    {

    	$this->setDisplayField('player_id');
    	$this->setDisplayField('video_id');

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

    	$this->belongsTo('Videos', [
    		'foreignKey'	=> 'video_id',
    		'joinType'		=> 'INNER'
     	]);

     	$this->belongsTo('Players', [
    		'foreignKey' 	=> 'player_id',
    		'joinType'		=> 'INNER'
     	]);

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