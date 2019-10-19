<?php
App::uses('Video', 'Model');

/**
 * Video Test Case
 *
 */
class VideoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.video',
		'app.tournament',
		'app.round',
		'app.edition',
		'app.editions_round',
		'app.rounds_tournament',
		'app.timeline',
		'app.comment',
		'app.user',
		'app.person',
		'app.favorite',
		'app.player',
		'app.players_video'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Video = ClassRegistry::init('Video');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Video);

		parent::tearDown();
	}

}
