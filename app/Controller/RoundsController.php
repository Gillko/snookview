<?php
App::uses('AppController', 'Controller');
/**
 * Rounds Controller
 *
 * @property Round $Round
 * @property PaginatorComponent $Paginator
 */
class RoundsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	/*public $paginate = array(
	    'order' => array(
	        'Round.round_id' => 'desc'
	    )
	);*/

	public function beforeFilter() {
		$this->Auth->allow('view');
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
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
		if (!$this->Round->exists($id)) {
			throw new NotFoundException(__('Invalid round'));
		}
		$options = array('conditions' => array('Round.' . $this->Round->primaryKey => $id));
		$this->set('round', $this->Round->find('first', $options));

		$videos = $this->Round->Video->find('all', array('conditions' => array('Video.round_id' => $id, 'Video.video_part' => 'Part One')));
		$this->set(compact('videos'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		/*$this->layout = 'layout_back';
		$this->Round->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('rounds', $this->Paginator->paginate('Round'));*/

		$this->layout = 'layout_back';
		$this->Round->recursive = 1;

		$this->paginate = array( 
	        'order' => array('Round.round_id' => 'DESC')
	    );

	    $this->set('rounds', $this->Paginator->paginate());
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
		if (!$this->Round->exists($id)) {
			throw new NotFoundException(__('Invalid round'));
		}
		$options = array('conditions' => array('Round.' . $this->Round->primaryKey => $id));
		$this->set('round', $this->Round->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'layout_back';
		if ($this->request->is('post')) {
			$this->Round->create();
			if ($this->Round->save($this->request->data)) {
				$this->Session->setFlash(__('The round has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The round could not be saved. Please, try again.'));
			}
		}
		$tournaments = $this->Round->Tournament->find('list', array('order' => array('Tournament.tournament_id' => 'desc')));
		$this->set(compact('tournaments'));

		$lastRoundID = $this->Round->find('first', array('order' =>array('Round.round_id DESC')));
		$this->set(compact('lastRoundID'));
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
		if (!$this->Round->exists($id)) {
			throw new NotFoundException(__('Invalid round'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Round->save($this->request->data)) {
				$this->Session->setFlash(__('The round has been updated.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The round could not be updated. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Round.' . $this->Round->primaryKey => $id));
			$this->request->data = $this->Round->find('first', $options);
		}
		$tournaments = $this->Round->Tournament->find('list');
		$this->set(compact('tournaments'));
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
		$this->Round->id = $id;
		if (!$this->Round->exists()) {
			throw new NotFoundException(__('Invalid round'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Round->delete()) {
			$this->Session->setFlash(__('The round has been deleted.'));
		} else {
			$this->Session->setFlash(__('The round could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
