<?php
App::uses('AppModel', 'Model');
/**
 * Frame Model
 *
 */
class Frame extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'frame_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'frame_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'frame_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_one_break' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_one_points' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_one_highest_break' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_one_breaks' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_one_balls' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_two_break' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_two_points' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_two_highest_break' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_two_breaks' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'frame_player_two_balls' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		/*'frame_time' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),*/
		'match_id' => array(
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
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'match_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}