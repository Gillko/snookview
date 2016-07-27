<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';
	
	public $actsAs = array(
	    'Captcha' => array(
	        'field' => array('security_code'),
	        'error' => 'Incorrect captcha code value'
	    )
	);

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill in your firstname',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_surname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill in your surname',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_country' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill in your country',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill in a username',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Username already in use, please pick another one.',
			),
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please fill in your email',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email already in use, please pick another one.',
			),
		),
		'user_password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter your password',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'matchPasswords' => array(
				'rule' => 'matchPasswords',
				'message'=> 'The passwords do not match'
			),
		),
		'password_confirmation' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please confirm your password',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_image' => array(
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
				'rule' => array('fileSize', '<=', '1MB'),
				'message' => 'The file is larger then 1MB.',
				'allowEmpty' => FALSE,
			),
			'processImageUpload' => array(
				'rule' => array('processImageUpload',
				'message' => 'Unable to process image upload.',
				'allowEmpty' => FALSE,
			),
		),
		'user_role' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_tokenhash' => array(
		),
		'user_active' => array(
		),
	));

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'user_id',
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
		'Favorite' => array(
			'className' => 'Favorite',
			'foreignKey' => 'user_id',
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
		'Matches' => array(
			'className' => 'Match',
			'foreignKey' => 'user_id',
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

	public function matchPasswords($data) {
		if ($data['user_password'] == $this->data['User']['password_confirmation']){
			return true;
		}
		//$this->invalidate('password_confirmation', 'The passwords do not match');
		return false;
	}

	public function beforeSave($options=array()){
		parent::beforeSave();
		if (!empty($this->data['User']['user_password'])){
			$this->data['User']['user_password'] = Security::hash($this->data['User']['user_password'], 'sha256', true);
			//Security::hash($this->data['User']['user_password'], NULL, TRUE);
			//return $data;
		}
		return true;
	}

	public function processImageUpload($check = array()) {
		$new_image_file_name = date('Y-m-d-H-i-s') . '_' . uniqid() . '_' . $this->data['User']['user_username'] . '.jpg';

		if(!file_exists('users' . '/' . $this->data['User']['user_username'] . '/' . $new_image_file_name)){ 
			mkdir(WWW_ROOT . 'img' . DS . 'users' . '/' . $this->data['User']['user_username']);
		}
		//$new_folder = mkdir(WWW_ROOT . 'img' . DS . 'users' . '/' . $this->data['User']['user_username']);
		if(!is_uploaded_file($check['user_image']['tmp_name'])){
			//mkdir('img/users/' . $this->data['User']['user_username']);
			return false;
		}
		if (!move_uploaded_file($check['user_image']['tmp_name'], WWW_ROOT . 'img' . DS . 'users' . '/' . $this->data['User']['user_username'] . '/' . $new_image_file_name)){
			return false;
		}
		
		$this->data[$this->alias]['user_image'] = 'users' . '/' . $this->data['User']['user_username'] . '/' . $new_image_file_name;
		return true;
	}
}