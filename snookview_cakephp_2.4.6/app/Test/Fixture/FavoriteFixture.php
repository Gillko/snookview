<?php
/**
 * FavoriteFixture
 *
 */
class FavoriteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'favorite_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'video_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('favorite_id', 'user_id', 'video_id'), 'unique' => 1),
			'fk_users_has_videos_videos1_idx' => array('column' => 'video_id', 'unique' => 0),
			'fk_users_has_videos_users1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'favorite_id' => 1,
			'user_id' => '',
			'video_id' => 1
		),
	);

}
