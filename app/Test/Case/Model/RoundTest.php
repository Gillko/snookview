<?php
App::uses('Round', 'Model');

/**
 * Round Test Case
 *
 */
class RoundTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.round',
		'app.edition',
		'app.tournament',
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
		$this->Round = ClassRegistry::init('Round');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Round);

		parent::tearDown();
	}

}
