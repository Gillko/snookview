<?php
App::uses('Season', 'Model');

/**
 * Season Test Case
 *
 */
class SeasonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.season'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Season = ClassRegistry::init('Season');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Season);

		parent::tearDown();
	}

}
