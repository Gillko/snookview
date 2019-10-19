<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Comments Controller
 *
 * @property Round $Round
 */
class RoundsController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Rounds.round_id' => 'desc'
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
				'adminIndex'
			]
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
		$this->viewBuilder()->setLayout('layout_front');
		/*if (!$this->Rounds->exists($id)) {
			throw new NotFoundException(__('Invalid round'));
		}*/
		//$options = array('conditions' => array('Rounds.' . $this->Rounds->primaryKey => $id));
		//$this->set('round', $this->Rounds->find('first', $options));

		//$videos = $this->Rounds->Video->find('all', array('conditions' => array('Videos.round_id' => $id, 'Videos.video_part' => 'Part One')));
		//$this->set(compact('videos'));




		$this->loadModel('Videos');
		$this->loadModel('Tournaments');
		
		$this->viewBuilder()->setLayout('layout_front');
		
		if (!$this->Rounds->exists($id)) {
			throw new NotFoundException(__('Invalid round'));
		}
		//$options = array('conditions' => array('Videos.' . $this->Videos->primaryKey => $id));

		$options = [
			'conditions' => [
				'Rounds.' . $this->Rounds->getPrimaryKey() => $id
			]
		];

		//Videos with tournament data

		/*$rounds = $this->Rounds->find('all', $options)->contain([
			'Tournaments',
		]);

		$round = $rounds->first();*/

		//debug($round);

		$rounds = $this->Rounds->find('all', $options)
			->contain([
				//'Tournaments.Videos',
				'Tournaments'
			])
		;

		$round = $rounds->first();

		//debug($round);

		$optionsVideos = [
			'conditions' => [
				'Videos.round_id' => $id, 'Videos.video_part' => 'Part One'
			]
		];

		$videos = $this->Rounds->Tournaments->Videos->find('all', $optionsVideos)
			->contain([
				'Players'
			])
			->where([
				'Videos.round_id' => $id
			])
		;

		//$video = $videos->all();

		//debug($video);

		$this->set(compact('rounds', 'videos'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function adminIndex() {
		/*$this->layout = 'layout_back';
		$this->Round->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('rounds', $this->Paginator->paginate('Round'));*/

		/*$this->layout = 'layout_back';
		$this->Round->recursive = 1;

		$this->paginate = array( 
	        'order' => array('Round.round_id' => 'DESC')
	    );

	    $this->set('rounds', $this->Paginator->paginate());*/

	    $this->viewBuilder()->setLayout('layout_back');
	     $rounds = $this->paginate($this->Rounds, [
	    	'contain' => [
	    		'Tournaments',
	    	]
	    ]);
        $this->set(
        	compact(
        		'rounds'
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
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$tournaments 
		= $this->Rounds->Tournaments->find(
			'list', array(
				'keyField' => 'tournament_id',
				'valueField' => function ($row) {
            		return $row['tournament_name'] . ' ' . $row['tournament_year'];
        		},
				'order' => array(
					'Tournaments.tournament_id' => 'desc'
				)
			)
		);

		$lastRoundIDs 
			= $this->Rounds->find(
				'all', array(
					'order' =>array(
						'Rounds.round_id DESC'
					)
				)
			);

		$lastRoundID 
		= $lastRoundIDs->first();

		$this->set(
			compact(
				'tournaments',
				'lastRoundID'
			)
		);

		$round = $this->Rounds->newEntity();

		if($this->request->is('post')) {
            $round = $this->Rounds->patchEntity($round, $this->request->getData());

            if($this->Rounds->save($round)) {
                $this->Flash->success(__('Your round has been saved.', ['id' => 'flashMessage']));
                return $this->redirect(['action' => 'adminAdd']);
            }
            $this->Flash->error(__('Unable to add your round.'));
        }
        $this->set('round', $round);
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
