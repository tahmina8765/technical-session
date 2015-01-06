<?php
App::uses('Besthost', 'TrainingManager.Model');

/**
 * Besthost Test Case
 *
 */
class BesthostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.training_manager.besthost',
		'plugin.training_manager.user',
		'plugin.training_manager.host'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Besthost = ClassRegistry::init('TrainingManager.Besthost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Besthost);

		parent::tearDown();
	}

}
