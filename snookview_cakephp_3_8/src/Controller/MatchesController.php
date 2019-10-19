<?php
App::uses('AppController', 'Controller');
/**
 * Matches Controller
 *
 * @property Match $Match
 * @property PaginatorComponent $Paginator
 */
class MatchesController extends AppController {

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
		$this->Match->recursive = 0;
		$this->set('matches', $this->Paginator->paginate());

		$current_user = $this->Auth->user('user_id');

		$options['joins'] = array(
		    array('table' => 'matches',
		        'alias' => 'Match',
		        'type' => 'inner',
		        'conditions' => array(
		            'Match.user_id' => $current_user
		        )
		    ),
		);
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
		if (!$this->Match->exists($id)) {
			throw new NotFoundException(__('Invalid match'));
		}
		$options = array('conditions' => array('Match.' . $this->Match->primaryKey => $id));
		$this->set('match', $this->Match->find('first', $options));
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
			$this->Match->create();
			$this->Match->set('user_id', $current_user);
			if ($this->Match->save($this->request->data)) {
				$this->Session->setFlash(__('The match has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The match could not be saved. Please, try again.'));
			}
		}
		$users = $this->Match->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Match->id = $id;
		if (!$this->Match->exists()) {
			throw new NotFoundException(__('Invalid match'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Match->delete()) {
			$this->Session->setFlash(__('Your match has been deleted.'));
		} else {
			$this->Session->setFlash(__('Your match could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}