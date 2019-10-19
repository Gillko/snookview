<?php
/**
 * ItemFixture
 *
 */
class ItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'item_title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_hours' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'item_minutes' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'item_seconds' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'item_description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'item_created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'item_modified' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'item_deleted' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'timeline_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('item_id', 'timeline_id'), 'unique' => 1),
			'fk_items_timeline1_idx' => array('column' => 'timeline_id', 'unique' => 0)
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
			'item_id' => 1,
			'item_title' => 'Lorem ipsum dolor sit amet',
			'item_hours' => 1,
			'item_minutes' => 1,
			'item_seconds' => 1,
			'item_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'item_created' => 1443261365,
			'item_modified' => 1443261365,
			'item_deleted' => 1443261365,
			'timeline_id' => 1
		),
	);

}
