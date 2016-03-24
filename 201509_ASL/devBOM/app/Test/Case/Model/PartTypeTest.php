<?php
App::uses('PartType', 'Model');

/**
 * PartType Test Case
 *
 */
class PartTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.part_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PartType = ClassRegistry::init('PartType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PartType);

		parent::tearDown();
	}

}
