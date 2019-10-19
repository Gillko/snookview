<?php
App::uses('Timeline', 'Model');

/**
 * Timeline Test Case
 *
 */
class TimelineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.timeline',
		'app.video',
		'app.tournament',
		'app.round',
		'app.edition',
		'app.editions_round',
		'app.rounds_tournament',
		'app.comment',
		'app.user',
		'app.person',
		'app.favorite',
		'app.player',
		'app.players_video',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Timeline = ClassRegistry::init('Timeline');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Timeline);

		parent::tearDown();
	}

}
