<?php
App::uses('AppModel', 'Model');


// ********** Part Model
class Part extends AppModel {

	var $name = "Part";

	public $primaryKey = 'part_id';
	public $displayField = 'part_serialnum';

	public $actsAs = array('Containable','Tree');
    public $belongsTo = array('PartType');

    

}


