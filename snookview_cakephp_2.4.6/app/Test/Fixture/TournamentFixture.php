<?php
/**
 * TournamentFixture
 *
 */
class TournamentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'tournament_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'tournament_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'tournament_id', 'unique' => 1)
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
			'tournament_id' => 1,
			'tournament_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
