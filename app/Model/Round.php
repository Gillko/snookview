<?php
App::uses('AppModel', 'Model');
/**
 * Round Model
 *
 * @property Edition $Edition
 * @property Tournament $Tournament
 */
class Round extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'round_id';

/**
 * Display field
 *
 * @var string
 */
	/*public $displayField = array("%s %s %s", "{n}.Tournament.tournament_name", "{n}.Tournament.tournament_year", "{n}.Round.round_name");*/
	public $displayField = array("%s", "{n}.Round.round_name");  

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'round_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tournament_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);



	/*public $actsAs = array(
	    'Containable',
	);*/

	//The Associations below have been created with all possible keys, those that are not needed can be removed


public $belongsTo = array(
	'Tournament' => array(
		'className' => 'Tournament',
		'foreignKey' => 'tournament_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
	),
);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Video' => array(
			'className' => 'Video',
			'foreignKey' => 'round_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		/*'Tournament' => array(
			'className' => 'Tournament',
			'joinTable' => 'rounds_tournaments',
			'foreignKey' => 'round_id',
			'associationForeignKey' => 'tournament_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),*/
		/*'Video' => array(
			'className' => 'Video',
			'joinTable' => 'rounds_videos',
			'foreignKey' => 'round_id',
			'associationForeignKey' => 'video_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)*/
	);
}
