<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Rankings Controller
 *
 * @property Ranking $Ranking
 */
class RankingsController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Rankings.ranking_id' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    /*Pagination*/


	public function beforeFilter(Event $event) {
		$this->Auth->allow(
			[
				'adminAdd',
				'index',
				'adminIndex'
			]
		);
	}

/**
 * Helpers
 *
 * @var array
 */
	//public $helpers = array('Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->viewBuilder()->setLayout('layout_front');
		//$this->Rankings->recursive = 0;

		
		/*$test = max(array($this->Ranking->Season->getInsertID()));
	 	//$this->set('test', $test);

	 	debug($test);*/

	    $this->paginate = [
	    	'contain' => ['Players'],
	    	'order' => array(
	            'Rankings.ranking_rank' => 'asc'
	        ),
	        'maxLimit' => 200,
	        'limit' => 200,
	        //'conditions' => array('Ranking.season_id' => max(array($this->Ranking->season_id)))
	        'conditions' => array('Rankings.season_id' => 4)
	    ];

	    $rankings = $this->paginate(
		    $this->Rankings->find('all')
		); 

    	//$rankings = $this->Rankings->find('all')->contain(['Players']);
		$this->set(compact('rankings'));


		/*$query = $this->Rankings->find('all')->contain(['Players']);


								foreach ($query as $ranking){
									echo $ranking->player->player_firstname;
								}*/
						



		//$this->set('_serialize', ['rankings']);
	    //$this->set('rankings', $this->Paginator->paginate());

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
				//$this->Session->setFlash(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
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
				//$this->Session->setFlash(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
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
			//$this->Session->setFlash(__('The ranking has been deleted.'));
		} else {
			//$this->Session->setFlash(__('The ranking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function adminIndex() {
		/*$this->layout = 'layout_back';
		$this->Ranking->recursive = 0;
		$this->set('rankings', $this->Paginator->paginate());

		$this->paginate = array(
	        'order' => array(
	            'Ranking.ranking_rank' => 'asc'
	        )
	    );
    	$data = $this->paginate('Ranking');
	    $this->set($data);
	    $this->set('rankings', $this->Paginator->paginate());*/

	    $this->viewBuilder()->setLayout('layout_back');
	    $rankings = $this->paginate($this->Rankings, [
	    	'contain' => [
	    		'Players',
	    		'Seasons'
	    	]
	    ]);
        $this->set(
        	compact(
        		'rankings'
        	)
        );
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
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$players 
		= $this->Rankings->Players->find(
			'list', array(
				'keyField' => 'player_id',
				'valueField' => function ($row) {
            		return $row['player_firstname'] . ' ' . $row['player_surname'];
        		},
				'order' => array(
						'Players.player_firstname' => 'asc'
				)
			)
		);

		$seasons 
		= $this->Rankings->Seasons->find(
			'list', array(
				'keyField' => 'season_id',
				'valueField' => function ($row) {
            		return $row['season_beginYear'] . ' ' . $row['season_endYear'];
        		}
			)
		);

		$this->set(
			compact(
				'players',
				'seasons'
			)
		);

		$ranking = $this->Rankings->newEntity();

		if($this->request->is('post')) {
            $ranking = $this->Rankings->patchEntity($ranking, $this->request->getData());

            if($this->Rankings->save($ranking)) {
                $this->Flash->success(__('Your ranking has been saved.', ['id' => 'flashMessage']));
                return $this->redirect(['action' => 'adminAdd']);
            }
            $this->Flash->error(__('Unable to add your ranking.'));
        }
        $this->set('ranking', $ranking);
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
				//$this->Session->setFlash(__('The ranking has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
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
			//$this->Session->setFlash(__('The ranking has been deleted.'));
		} else {
			//$this->Session->setFlash(__('The ranking could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
