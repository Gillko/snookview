<?php
App::uses('AppController', 'Controller');
/**
 * Frames Controller
 *
 * @property Frame $Frame
 * @property PaginatorComponent $Paginator
 */
class FramesController extends AppController {

public function beforeFilter() {
	//$this->Auth->allow('add');
	$this->set('logged_in', $this->Auth->loggedIn());
	$this->set('current_user', $this->Auth->user());
}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layout_front';
		$this->Frame->recursive = 0;
		$this->set('frames', $this->Paginator->paginate());

		/*$current_user = $this->Auth->user('user_id');

		$options['joins'] = array(
		    array('table' => 'matches',
		        'alias' => 'Match',
		        'type' => 'inner',
		        'conditions' => array(
		            'Match.user_id' => $current_user
		        )
		    ),
		);*/
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'layout_front';
		if (!$this->Frame->exists($id)) {
			throw new NotFoundException(__('Invalid frame'));
		}
		$options = array('conditions' => array('Frame.' . $this->Frame->primaryKey => $id));
		$this->set('frame', $this->Frame->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'layout_front';

		$current_user = $this->Auth->user('user_id');

		if ($this->request->is('post')) {
			$this->Frame->create();
			$this->Frame->set('user_id', $current_user);
			if ($this->Frame->save($this->request->data)) {
				$this->Session->setFlash(__('The frame has been saved.'));
				return $this->redirect(array('controller' => 'matches', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The frame could not be saved. Please, try again.'));
			}
		}
		$matches = $this->Frame->Match->find('list', array('order' => array('Match.match_id' => 'desc')));
		$this->set(compact('frames', 'matches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Frame->id = $id;
		if (!$this->Frame->exists()) {
			throw new NotFoundException(__('Invalid frame'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Frame->delete()) {
			$this->Session->setFlash(__('Your frame has been deleted.'));
		} else {
			$this->Session->setFlash(__('Your frame could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}