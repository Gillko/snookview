<?php
/**
 * RankingFixture
 *
 */
class RankingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ranking_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ranking_newRank' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'ranking_oldRank' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'ranking_points' => array('type' => 'integer', 'null' => false, 'default' => null),
		'player_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'season_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('ranking_id', 'player_id', 'season_id'), 'unique' => 1),
			'fk_ranking_players_idx' => array('column' => 'player_id', 'unique' => 0),
			'fk_rankings_seasons1_idx' => array('column' => 'season_id', 'unique' => 0)
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
			'ranking_id' => 1,
			'ranking_newRank' => 1,
			'ranking_oldRank' => 1,
			'ranking_points' => 1,
			'player_id' => 1,
			'season_id' => 1
		),
	);

}
