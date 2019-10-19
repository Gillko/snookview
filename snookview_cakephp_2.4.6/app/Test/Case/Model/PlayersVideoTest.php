<?php
App::uses('PlayersVideo', 'Model');

/**
 * PlayersVideo Test Case
 *
 */
class PlayersVideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.players_video',
		'app.video',
		'app.player'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PlayersVideo = ClassRegistry::init('PlayersVideo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlayersVideo);

		parent::tearDown();
	}

}
