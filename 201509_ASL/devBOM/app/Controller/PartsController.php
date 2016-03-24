<?php
App::uses('AppController', 'Controller');
/**
 * Parts Controller
 *
 * @property Part $Part
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PartsController extends AppController {

	var $name = "Parts";
		
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $helpers = array('Form', 'Html', 'Js' => array('Jquery'));

/**
 * index method
 *
 * @return void
 */
	public function index() {

		// NEED TO UPDATE:  Add a way to sort based on part type selected from parttypes index
		// reference:  http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
		// if no part_type_id specified, populate with all part types

		// $parts = $this->Paginator->paginate(
		//	    'Part',
		//	    array('Part.part_type_id LIKE' => 'a%')
		//	);

		// $this->set('parts', $parts);


		$this->Part->recursive = 1;
		$this->set('parts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		App::uses('String', 'Utility', 'CakePdf', 'CakePdf.pdf');

		// ********** Logic for getting all of the children of the current part ***************
		$children = $this->Part->find('list', array(
			'fields' => array('Part.part_id', 'Part.part_serialnum'),
			'conditions' => array('Part.parent_id' => $id)
		));

	    // debug($children); die;
	    $this->set('children', $children);
	    
	    // ********** Insert part with id passed into 'part' ***************

		if (!$this->Part->exists($id)) {
			throw new NotFoundException(__('Invalid part'));
		}
		$options = array('conditions' => array('Part.' . $this->Part->primaryKey => $id));
		$this->set('part', $this->Part->find('first', $options));

		// ********** Print to pdf ***************
	    /* $data=$this->Part->find('all');
	    $CakePdf=new CakePdf();
		$CakePdf->template('view','default');
		$this->pdfConfig=array('orientation'=>'portrait','filename'=>$data['name']);
		$CakePdf->viewVars(array('data'=>$data));
		$CakePdf->write($path.$data['name'].".pdf"); */


		// INCLUDE THE phpToPDF.php FILE
		/* require("phpToPDF.php"); 

		// SET YOUR PDF OPTIONS
		// FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
		$pdf_options = array(
		  "source_type" => 'url',
		  "source" => 'http://google.com',
		  "action" => 'save',
		  "save_directory" => '',
		  "file_name" => 'devBOM.pdf');

		// CALL THE phptopdf FUNCTION WITH THE OPTIONS SET ABOVE
		phptopdf($pdf_options);

		// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
		echo ("<a href='devBOM.pdf'>Download Your PDF</a>"); */
		
	}

	
	

/**
 * add method
 *
 * @return void
 */
	public function add() {

		// NEED TO UPDATE:  hide / show children (parent) div based on order in tree

		// NEED TO UPDATE:  generate list of available children to select from
		// -- going to start with list of available parents initially --
		$available_parents = $this->Part->find('list', array(
			'conditions' => array('Part.parent_id' => null)));

		$this->set('available_parents', $available_parents);
		// debug($available_parents); die;

		// This creates an array of part types
		// NEED TO UPDATE:  so that the part type (string) shows up and not the integer
		$part_type_id = $this->Part->find('list', array('fields' => array('Part.part_id', 'Part.part_type_id')));
		// debug($part_type_id); die;

		// This creates a list of part types from the part_types table
		// This is used in the add / edit forms in the drop down menu ('options')
		$partType = $this->Part->PartType->find('list');
		$this->set('partType', $partType);
		//debug($partType); die;

		// This gets all part type data
		$partTypeInfo = $this->Part->PartType->find('all');
		// debug($partTypeInfo);die;

		$this->set('partTypeInfo', $partTypeInfo);

		// Via JS helper, pass to HTML
		// $this->Js->set('partTypeInfo', $partTypeInfo);
		// echo $this->Js->writeBuffer(array('onDomReady' => false));
		// var_dump($_REQUEST);
	
		if ($this->request->is('post')) {

			//debug($this->request->data); die;

			// NEED TO UPDATE:  Automatically update left & right fields based on part type
			// Using $partTypeInfo from above, set left & right for the Part 
			// where $this->Part->part_typeid == $this->PartType->part_typeid
			// $this->Part->lft = $this->PartType->lft
			// $this->Part->rght = $this->PartType->rght


			$this->Part->create();
			if ($this->Part->save($this->request->data)) {
				$this->Session->setFlash(__('The part has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The part could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		// NEED TO UPDATE:  create the drop down lists on Edit with same logic as add

		// This creates an array of part types
		$part_type_id = $this->Part->find('list', array('fields' => array('Part.part_id', 'Part.part_type_id')));
		$this->set('part_type_id', $part_type_id);

		if (!$this->Part->exists($id)) {
			throw new NotFoundException(__('Invalid part'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Part->save($this->request->data)) {
				$this->Session->setFlash(__('The part has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The part could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Part.' . $this->Part->primaryKey => $id));
			$this->request->data = $this->Part->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Part->id = $id;
		if (!$this->Part->exists()) {
			throw new NotFoundException(__('Invalid part'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Part->delete()) {
			$this->Session->setFlash(__('The part has been deleted.'));
		} else {
			$this->Session->setFlash(__('The part could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}




/**
 * pdf print method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	//public function pdfprint($id = null) {

	//}
