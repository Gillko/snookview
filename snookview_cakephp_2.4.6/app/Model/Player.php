<?php
App::uses('AppModel', 'Model');
/**
 * Player Model
 *
 * @property Video $Video
 */
class Player extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'player_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = array("%s %s", "{n}.Player.player_firstname", "{n}.Player.player_surname"); 

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'player_firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_surname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_birthDate' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_turnedPro' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_nickname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_nationality' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	/*	'player_flag' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'The upload failed',
				'allowEmpty' => FALSE,
			),
			'mimeType' => array(
				'rule' => array('extention', array('image/gif', 'image/png', 'image/jpg')),
				'message' => 'Please only upload images (gif, png, jpg)',
				'allowEmpty' => FALSE,
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '5MB'),
				'message' => 'The file is larger then 5MB.',
				'allowEmpty' => FALSE,
			),
			'processImageUploadFlags' => array(
				'rule' => array('processImageUploadFlags',
				'message' => 'Unable to process image upload.',
				'allowEmpty' => FALSE,
			),
		),*/
		'player_highestBreak' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_highestRanking' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_centuryBreaks' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_careerWinnings' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_worldChampion' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_image' => array(
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
		'player_category' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'player_imageSrc' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	));

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
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
	);

	//UPLOADING OF PLAYER/FLAG IMAGE

	/*public function processImageUploadFlags($check = array()) {
		/* FLAGS */
		//if(!is_uploaded_file($check['player_flag']['tmp_name'])){
			//return FALSE;
		//}
		//if (!move_uploaded_file($check['player_flag']['tmp_name'], WWW_ROOT . 'img' . DS . 'flags' . DS . $check['player_flag']['name'])){
			//return FALSE;
		//}
		//$this->data[$this->alias]['player_flag'] = 'flags' . DS . $check['player_flag']['name'];
		//return TRUE;
	//}*/

	public function processImageUpload($check = array()) {
		/* PLAYERS */
		if(!is_uploaded_file($check['player_image']['tmp_name'])){
			return FALSE;
		}
		if (!move_uploaded_file($check['player_image']['tmp_name'], WWW_ROOT . 'img' . DS . 'players' . DS . $check['player_image']['name'])){
			return FALSE;
		}
		$this->data[$this->alias]['player_image'] = 'players' . '/' . $check['player_image']['name'];
		return TRUE;
	}
}
