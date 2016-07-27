<?php
App::uses('RoundsTournament', 'Model');

/**
 * RoundsTournament Test Case
 *
 */
class RoundsTournamentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.rounds_tournament'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RoundsTournament = ClassRegistry::init('RoundsTournament');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RoundsTournament);

		parent::tearDown();
	}

}
