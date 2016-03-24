<?php
App::uses('AppModel', 'Model');
/**
 * PartType Model
 *
 */
class PartType extends AppModel {

	var $name = "PartType";


/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'part_typeid';

	public $actsAs = array('Containable', 'Tree');
    public $hasMany = array('Part');

    public $displayField = 'part_type';

    //public $actsAs = array('Tree');

}
