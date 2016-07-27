<?php
App::uses('AppController', 'Controller');
/**
 * Seasons Controller
 *
 * @property Season $Season
 * @property PaginatorComponent $Paginator
 */
class SeasonsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		/*$this->layout = 'layout_back';
		$this->Season->recursive = 0;
		$this->set('seasons', $this->Paginator->paginate());*/

		$this->layout = 'layout_back';
		$this->Season->recursive = 1;

		$this->paginate = array( 
	        'order' => array('Season.season_id' => 'DESC')
	    );

	    $this->set('seasons', $this->Paginator->paginate());
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
		if (!$this->Season->exists($id)) {
			throw new NotFoundException(__('Invalid season'));
		}
		$options = array('conditions' => array('Season.' . $this->Season->primaryKey => $id));
		$this->set('season', $this->Season->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'layout_back';
		if ($this->request->is('post')) {
			$this->Season->create();
			if ($this->Season->save($this->request->data)) {
				$this->Session->setFlash(__('The season has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The season could not be saved. Please, try again.'));
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
		if (!$this->Season->exists($id)) {
			throw new NotFoundException(__('Invalid season'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Season->save($this->request->data)) {
				$this->Session->setFlash(__('The season has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The season could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Season.' . $this->Season->primaryKey => $id));
			$this->request->data = $this->Season->find('first', $options);
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
		$this->Season->id = $id;
		if (!$this->Season->exists()) {
			throw new NotFoundException(__('Invalid season'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Season->delete()) {
			$this->Session->setFlash(__('The season has been deleted.'));
		} else {
			$this->Session->setFlash(__('The season could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
