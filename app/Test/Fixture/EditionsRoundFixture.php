<?php
/**
 * EditionsRoundFixture
 *
 */
class EditionsRoundFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'edition_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'round_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('edition_id', 'round_id'), 'unique' => 1),
			'fk_editions_has_rounds_rounds1_idx' => array('column' => 'round_id', 'unique' => 0),
			'fk_editions_has_rounds_editions1_idx' => array('column' => 'edition_id', 'unique' => 0)
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
			'round_id' => 1
		),
	);

}
