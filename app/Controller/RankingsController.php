<?php
App::uses('AppController', 'Controller');
/**
 * Rankings Controller
 *
 * @property Ranking $Ranking
 * @property PaginatorComponent $Paginator
 */
class RankingsController extends AppController {


public function beforeFilter() {
	$this->Auth->allow('index');
	$this->set('logged_in', $this->Auth->loggedIn());
	$this->set('current_user', $this->Auth->user());
}

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

	public $paginator = array('limit' => '10');

	public $paginator_rankings = array('limit' => '200');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layout_front';
		$this->Ranking->recursive = 0;

		
		/*$test = max(array($this->Ranking->Season->getInsertID()));
	 	//$this->set('test', $test);

	 	debug($test);*/

		$this->paginate = array(
	        'order' => array(
	            'Ranking.ranking_rank' => 'asc'
	        ),
	        'limit' => '200',
	        //'conditions' => array('Ranking.season_id' => max(array($this->Ranking->season_id)))
	        'conditions' => array('Ranking.season_id' => 4)
	    );
    	$data = $this->paginate('Ranking');


	    $this->set($data);
	    $this->set('rankings', $this->Paginator->paginate());

	   /* $rankings = max(array($this->Ranking->season_id));
		$this->set($rankings);

		debug($rankings);*/
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ranking->create();
			if ($this->Ranking->save($this->request->data)) {
				$this->Session->setFlash(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
			}
		}
		$players = $this->Ranking->Player->find('list');
		$seasons = $this->Ranking->Season->find('list');
		$this->set(compact('players', 'seasons'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ranking->exists($id)) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ranking->save($this->request->data)) {
				$this->Session->setFlash(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ranking.' . $this->Ranking->primaryKey => $id));
			$this->request->data = $this->Ranking->find('first', $options);
		}
		$players = $this->Ranking->Player->find('list');
		$seasons = $this->Ranking->Season->find('list');
		$this->set(compact('players', 'seasons'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ranking->id = $id;
		if (!$this->Ranking->exists()) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ranking->delete()) {
			$this->Session->setFlash(__('The ranking has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ranking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'layout_back';
		$this->Ranking->recursive = 0;
		$this->set('rankings', $this->Paginator->paginate());

		$this->paginate = array(
	        'order' => array(
	            'Ranking.ranking_rank' => 'asc'
	        )
	    );
    	$data = $this->paginate('Ranking');
	    $this->set($data);
	    $this->set('rankings', $this->Paginator->paginate());
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
		if (!$this->Ranking->exists($id)) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		$options = array('conditions' => array('Ranking.' . $this->Ranking->primaryKey => $id));
		$this->set('ranking', $this->Ranking->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'layout_back';
		if ($this->request->is('post')) {
			$this->Ranking->create();
			if ($this->Ranking->save($this->request->data)) {
				$this->Session->setFlash(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
			}
		}
		$players = $this->Ranking->Player->find('list', array('order' => array('Player.player_firstname ASC'),));
		$seasons = $this->Ranking->Season->find('list');
		$this->set(compact('players', 'seasons'));
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
		if (!$this->Ranking->exists($id)) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ranking->save($this->request->data)) {
				$this->Session->setFlash(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ranking.' . $this->Ranking->primaryKey => $id));
			$this->request->data = $this->Ranking->find('first', $options);
		}
		$players = $this->Ranking->Player->find('list');
		$seasons = $this->Ranking->Season->find('list');
		$this->set(compact('players', 'seasons'));
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
		$this->Ranking->id = $id;
		if (!$this->Ranking->exists()) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ranking->delete()) {
			$this->Session->setFlash(__('The ranking has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ranking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
