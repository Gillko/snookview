<?php
/**
 * RoundFixture
 *
 */
class RoundFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'round_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'round_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'round_id', 'unique' => 1)
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
			'round_id' => 1,
			'round_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
