<?php
/**
 * PartTypeFixture
 *
 */
class PartTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'part_type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'parent_typeid' => array('type' => 'integer', 'null' => false, 'default' => null),
		'part_level' => array('type' => 'integer', 'null' => false, 'default' => null),
		'part_tests' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'part_typeid' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'part_typeid', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'part_type' => 'Lorem ipsum dolor sit amet',
			'parent_typeid' => 1,
			'part_level' => 1,
			'part_tests' => 'Lorem ipsum dolor sit amet',
			'part_typeid' => 1
		),
	);

}
