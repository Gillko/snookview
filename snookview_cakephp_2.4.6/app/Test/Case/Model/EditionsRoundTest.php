<?php
App::uses('EditionsRound', 'Model');

/**
 * EditionsRound Test Case
 *
 */
class EditionsRoundTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.editions_round',
		'app.round'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EditionsRound = ClassRegistry::init('EditionsRound');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EditionsRound);

		parent::tearDown();
	}

}
