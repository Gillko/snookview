<?php
/**
 * EditionFixture
 *
 */
class EditionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'edition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'edition_year' => array('type' => 'text', 'null' => false, 'default' => null, 'length' => 4),
		'edition_vennue' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'edition_beginDate' => array('type' => 'date', 'null' => false, 'default' => null),
		'edition_endDate' => array('type' => 'date', 'null' => false, 'default' => null),
		'edition_winner' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tournament_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('edition_id', 'tournament_id'), 'unique' => 1),
			'fk_editions_tournaments1_idx' => array('column' => 'tournament_id', 'unique' => 0)
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
			'edition_id' => 1,
			'edition_year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'edition_vennue' => 'Lorem ipsum dolor sit amet',
			'edition_beginDate' => '2015-09-26',
			'edition_endDate' => '2015-09-26',
			'edition_winner' => 'Lorem ipsum dolor sit amet',
			'tournament_id' => 1
		),
	);

}
