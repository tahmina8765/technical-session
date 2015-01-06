<?php
App::uses('Score', 'TrainingManager.Model');

/**
 * Score Test Case
 *
 */
class ScoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.training_manager.score',
		'plugin.training_manager.training',
		'plugin.training_manager.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Score = ClassRegistry::init('TrainingManager.Score');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Score);

		parent::tearDown();
	}

}
