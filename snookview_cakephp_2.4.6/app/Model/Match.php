<?php
App::uses('AppModel', 'Model');
/**
 * Match Model
 *
 */
class Match extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'match_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'match_title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'match_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'match_player_one_firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'match_player_one_surname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'match_player_two_firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'match_player_two_surname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		'Frame' => array(
			'className' => 'Frame',
			'foreignKey' => 'match_id',
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
}