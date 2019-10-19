<?php
App::uses('AppModel', 'Model');
/**
 * Tournament Model
 *
 * @property Tournament $Tournament
 * @property Round $Round
 */
class Tournament extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'tournament_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = array("%s %s", "{n}.Tournament.tournament_name", "{n}.Tournament.tournament_year"); 

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'tournament_year' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tournament_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tournament_vennue' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tournament_beginDate' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tournament_endDate' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tournament_winner' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'The upload failed',
				'allowEmpty' => FALSE,
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
				'message' => 'Please only upload images (gif, png, jpg, jpeg)',
				'allowEmpty' => FALSE,
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '5MB'),
				'message' => 'The file is larger then 5MB.',
				'allowEmpty' => FALSE,
			),
			'processImageUpload' => array(
				'rule' => array('processImageUpload',
				'message' => 'Unable to process image upload.',
				'allowEmpty' => FALSE,
			),
		),
		'tournament_winnerSrc' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	)
);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

public $actsAs = array(
    'Containable',
);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Video' => array(
			'className' => 'Video',
			'foreignKey' => 'tournament_id',
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
		'Round' => array(
			'className' => 'Round',
			'foreignKey' => 'tournament_id',
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
		/*'Round' => array(
			'className' => 'Round',
			'joinTable' => 'rounds_tournaments',
			'foreignKey' => 'tournament_id',
			'associationForeignKey' => 'round_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),*/
	);


	//UPLOADING OF WINNER IMAGE
	public function processImageUpload($check = array()) {
		if(!is_uploaded_file($check['tournament_winner']['tmp_name'])){
			return false;
		}
		if (!move_uploaded_file($check['tournament_winner']['tmp_name'], WWW_ROOT . 'img' . DS . 'winners' . '/' . $check['tournament_winner']['name'])){
			return false;
		}
		$this->data[$this->alias]['tournament_winner'] = 'winners' . '/' . $check['tournament_winner']['name'];
		return true;
	}
}
