<?php
App::uses('AppController', 'Controller');
/**
 * PartTypes Controller
 *
 */
class PartTypesController extends AppController {

	public $helpers = array('Form', 'Html', 'Js' => array('Jquery'));

	var $name = "PartTypes";

	function index() {
	    $this->PartType->recursive = 1;
	    $parttypes = $this->PartType->find('all');
	    $this->set('parttypes', $parttypes);

	    $data = $this->PartType->generateTreeList(
	      null,
	      null,
	      null,
	      '&nbsp;&nbsp;&nbsp;'
	    ); 

		$data = $this->PartType->find('threaded');
		$this->set('data', $data);

	    //debug($parttypes); die;
    }



   

}
