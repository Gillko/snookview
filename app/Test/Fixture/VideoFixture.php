<?php
/**
 * VideoFixture
 *
 */
class VideoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'video_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'video_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'video_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'video_scoreA' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'video_scoreB' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'video_url' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tournament_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'edition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'round_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'timeline_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('video_id', 'tournament_id', 'edition_id', 'round_id', 'timeline_id'), 'unique' => 1),
			'fk_videos_tournaments1_idx' => array('column' => 'tournament_id', 'unique' => 0),
			'fk_videos_editions1_idx' => array('column' => 'edition_id', 'unique' => 0),
			'fk_videos_rounds1_idx' => array('column' => 'round_id', 'unique' => 0),
			'fk_videos_timelines1_idx' => array('column' => 'timeline_id', 'unique' => 0)
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
			'video_id' => 1,
			'video_title' => 'Lorem ipsum dolor sit amet',
			'video_date' => '2015-09-26',
			'video_scoreA' => 1,
			'video_scoreB' => 1,
			'video_url' => 'Lorem ipsum dolor sit amet',
			'tournament_id' => 1,
			'edition_id' => 1,
			'round_id' => 1,
			'timeline_id' => 1
		),
	);

}
