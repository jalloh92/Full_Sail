<?php
App::uses('TestType', 'Model');

/**
 * TestType Test Case
 *
 */
class TestTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.test_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TestType = ClassRegistry::init('TestType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TestType);

		parent::tearDown();
	}

}
