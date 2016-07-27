<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'user_username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_email' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_image' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'user_modified' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'user_deleted' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'user_lastlogin' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'user_locked' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'user_confirmed' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'person_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('user_id', 'person_id'), 'unique' => 1),
			'user_email_UNIQUE' => array('column' => 'user_email', 'unique' => 1),
			'fk_users_persons1_idx' => array('column' => 'person_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'user_id' => '',
			'user_username' => 'Lorem ipsum dolor sit amet',
			'user_email' => 'Lorem ipsum dolor sit amet',
			'user_password' => 'Lorem ipsum dolor sit amet',
			'user_image' => 'Lorem ipsum dolor sit amet',
			'user_created' => 1443261367,
			'user_modified' => 1443261367,
			'user_deleted' => 1443261367,
			'user_lastlogin' => 1443261367,
			'user_locked' => 1443261367,
			'user_confirmed' => 1443261367,
			'person_id' => ''
		),
	);

}
