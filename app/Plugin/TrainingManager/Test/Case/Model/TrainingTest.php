<?php
App::uses('Training', 'TrainingManager.Model');

/**
 * Training Test Case
 *
 */
class TrainingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.training_manager.training',
		'plugin.training_manager.poll',
		'plugin.training_manager.training_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Training = ClassRegistry::init('TrainingManager.Training');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Training);

		parent::tearDown();
	}

}
