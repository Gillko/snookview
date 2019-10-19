<?php
App::uses('AppModel', 'Model');
/**
 * Season Model
 *
 */
class Season extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'season_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = array("%s %s", "{n}.Season.season_beginYear", "{n}.Season.season_endYear"); 

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'season_beginYear' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'season_endYear' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	/*public $hasAndBelongsToMany = array(
		'Ranking' => array(
			'className' => 'Ranking',
			'joinTable' => 'rankings_seasons',
			'foreignKey' => 'season_id',
			'associationForeignKey' => 'ranking_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);*/

public $hasMany = array(
		'Ranking' => array(
			'className' => 'Ranking',
			'foreignKey' => 'season_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
}
