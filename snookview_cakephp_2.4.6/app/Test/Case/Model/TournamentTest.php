<?php
App::uses('Tournament', 'Model');

/**
 * Tournament Test Case
 *
 */
class TournamentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tournament',
		'app.round',
		'app.edition',
		'app.editions_round',
		'app.rounds_tournament'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tournament = ClassRegistry::init('Tournament');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tournament);

		parent::tearDown();
	}

}
