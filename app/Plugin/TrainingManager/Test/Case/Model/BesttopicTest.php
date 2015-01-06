<?php
App::uses('Besttopic', 'TrainingManager.Model');

/**
 * Besttopic Test Case
 *
 */
class BesttopicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.training_manager.besttopic',
		'plugin.training_manager.user',
		'plugin.training_manager.training',
		'plugin.training_manager.training_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Besttopic = ClassRegistry::init('TrainingManager.Besttopic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Besttopic);

		parent::tearDown();
	}

}
