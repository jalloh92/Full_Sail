<?php
/**
 * PartFixture
 *
 */
class PartFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'part_typeid' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'part_serialnum' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'part_parentid' => array('type' => 'integer', 'null' => false, 'default' => null),
		'part_data' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'part_notes' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'part_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'part_id', 'unique' => 1),
			'part_serialnum' => array('column' => 'part_serialnum', 'unique' => 1),
			'part_typeid' => array('column' => 'part_typeid', 'unique' => 0)
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
			'part_typeid' => 1,
			'part_serialnum' => 'Lorem ips',
			'part_parentid' => 1,
			'part_data' => 'Lorem ipsum dolor sit amet',
			'part_notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'part_id' => 1
		),
	);

}
