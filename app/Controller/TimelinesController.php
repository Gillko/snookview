<?php
App::uses('AppController', 'Controller');
/**
 * Timelines Controller
 *
 * @property Timeline $Timeline
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TimelinesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Session');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public $paginate = array(
	    'order' => array(
	        'Timeline.timeline_id' => 'desc'
	    )
	);

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'layout_back';
		$this->Timeline->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('timelines', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout = 'layout_back';
		if (!$this->Timeline->exists($id)) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		$options = array('conditions' => array('Timeline.' . $this->Timeline->primaryKey => $id));
		$this->set('timeline', $this->Timeline->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'layout_back';
		if ($this->request->is('post')) {
			$this->Timeline->create();
			if ($this->Timeline->save($this->request->data)) {
				$this->Session->setFlash(__('The timeline has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timeline could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout = 'layout_back';
		if (!$this->Timeline->exists($id)) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Timeline->save($this->request->data)) {
				$this->Session->setFlash(__('The timeline has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timeline could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Timeline.' . $this->Timeline->primaryKey => $id));
			$this->request->data = $this->Timeline->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->layout = 'layout_back';
		$this->Timeline->id = $id;
		if (!$this->Timeline->exists()) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Timeline->delete()) {
			$this->Session->setFlash(__('The timeline has been deleted.'));
		} else {
			$this->Session->setFlash(__('The timeline could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
