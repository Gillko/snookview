<?php
/**
 * PlayerFixture
 *
 */
class PlayerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'player_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'player_firstname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_surname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_birthDate' => array('type' => 'date', 'null' => false, 'default' => null),
		'player_turnedPro' => array('type' => 'text', 'null' => false, 'default' => null, 'length' => 4),
		'player_nickname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_nationality' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_flag' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_highestBreak' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_highestRanking' => array('type' => 'integer', 'null' => false, 'default' => null),
		'player_centuryBreaks' => array('type' => 'integer', 'null' => false, 'default' => null),
		'player_careerWinnings' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 55, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_worldChampion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_image' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'player_category' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'player_id', 'unique' => 1)
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
			'player_id' => 1,
			'player_firstname' => 'Lorem ipsum dolor sit amet',
			'player_surname' => 'Lorem ipsum dolor sit amet',
			'player_birthDate' => '2015-09-26',
			'player_turnedPro' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'player_nickname' => 'Lorem ipsum dolor sit amet',
			'player_nationality' => 'Lorem ipsum dolor sit amet',
			'player_flag' => 'Lorem ipsum dolor sit amet',
			'player_highestBreak' => 'Lorem ipsum dolor sit amet',
			'player_highestRanking' => 1,
			'player_centuryBreaks' => 1,
			'player_careerWinnings' => 'Lorem ipsum dolor sit amet',
			'player_worldChampion' => 'Lorem ipsum dolor sit amet',
			'player_image' => 'Lorem ipsum dolor sit amet',
			'player_category' => 'Lorem ipsum dolor sit amet'
		),
	);

}
