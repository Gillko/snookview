<?php
/**
 * CommentFixture
 *
 */
class CommentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'comment_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'comment_body' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comment_created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'comment_modified' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'comment_deleted' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'video_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('comment_id', 'user_id', 'video_id'), 'unique' => 1),
			'fk_comments_users1_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_comments_videos1_idx' => array('column' => 'video_id', 'unique' => 0)
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
			'comment_id' => 1,
			'comment_body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'comment_created' => 1443261364,
			'comment_modified' => 1443261364,
			'comment_deleted' => 1443261364,
			'user_id' => '',
			'video_id' => 1
		),
	);

}
