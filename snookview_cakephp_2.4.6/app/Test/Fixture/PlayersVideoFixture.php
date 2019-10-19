<?php
/**
 * PlayersVideoFixture
 *
 */
class PlayersVideoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'video_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'player_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'video_id', 'player_id'), 'unique' => 1),
			'fk_videos_has_players_players1_idx' => array('column' => 'player_id', 'unique' => 0),
			'fk_videos_has_players_videos1_idx' => array('column' => 'video_id', 'unique' => 0)
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
			'id' => 1,
			'video_id' => 1,
			'player_id' => 1
		),
	);

}
