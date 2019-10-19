<?php

namespace App\Controller;

use Cake\Event\Event;

//App::uses('AppController', 'Controller');

//App::uses('Folder', 'Utility');
//App::uses('File', 'Utility');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class SessionsController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Sessions.session_id' => 'asc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    /*Pagination*/


/*public function beforeFilter(Event $event) {
	$this->Auth->allow('index', 'view');
	$this->set('logged_in', $this->Auth->loggedIn());
	$this->set('current_user', $this->Auth->user());
}*/

public function beforeFilter(Event $event) {
	//$this->Auth->allow('index', 'view');
	$this->Auth->allow(
		[
			'view', 
			'index',
			'adminAdd',
			'edit',
			'adminIndex'
		]
	);
}

/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->viewBuilder()->setLayout('layout_front');

		$players = $this->Players->find('all', array('order' => array('Players.player_firstname' => 'asc')));
		
		$player_firstname = $this->request->getQuery('player_firstname');
		$player_surname = $this->request->getQuery('player_surname');

		if(!empty($player_firstname) && !empty($player_surname)){
			$this->paginate = [
				'conditions' => [
					[
						'player_firstname' 	=> $player_firstname, 
						'player_surname' 	=> $player_surname
					]
				]
			];
		} else if(!empty($player_firstname) && empty($player_surname)){
			$this->paginate = [
				'conditions' => [
					[
						'player_firstname' 	=> $player_firstname
					]
				]
			];
		} else if(empty($player_firstname) && !empty($player_surname)){
			$this->paginate = [
				'conditions' => [
					[
						'player_surname' 	=> $player_surname
					]
				]
			];
		}

		$players = $this->paginate($this->Players, [
			'limit' => 1000
		]);

		$this->set(compact('players'));
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		$this->loadModel('Videos');

		$this->viewBuilder()->setLayout('layout_front');
		if (!$this->Players->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}
		$options = [
			'conditions' => [
				'Players.' . $this->Players->getPrimaryKey() => $id
			]
		];

		$thisplayer = $id;

		$players = $this->Players->find('all', $options)->contain([
			'Videos.Players'
		]);
 
		$player = $players->first();*/

		//debug($player);


		/*$videos = $this->Players->Videos->find('all', $options)->where([
			'Videos.video_part' => 'Part One'
		]);*/

		//$video = $videos->first();
		/*foreach($videos as $video){
			debug($video);
		}*/
		

		/*$this->set(compact('thisplayer', 'players', 'player', 'videos'));
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		}
		$videos = $this->Player->Video->find('list');
		$this->set(compact('videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->viewBuilder()->setLayout('layout_back');

        $session = $this->Sessions->get($id, [
            'contain' => [
            ]
        ]);

        //debug($video);



        //debug($video);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));
                return $this->redirect(['action' => 'edit/' . $id]);
            } else {
                $this->Flash->error(__('The session could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('session'));
        $this->set('_serialize', ['session']);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Player->delete()) {
			$this->Session->setFlash(__('The player has been deleted.'));
		} else {
			$this->Session->setFlash(__('The player could not be deleted. Please, try again.'));
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
		$this->Player->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('players', $this->Paginator->paginate('Player'));*/

		$this->viewBuilder()->setLayout('layout_back');
	    $sessions = $this->paginate($this->Sessions);
        $this->set(compact('sessions'));
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
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}
		$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
		$this->set('player', $this->Player->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$session = $this->Sessions->newEntity();

		if($this->request->is('post')) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());

            if($this->Sessions->save($session)) {
                $this->Flash->success(__('Your session has been saved.'));
                return $this->redirect(['action' => 'adminAdd']);
            }
            $this->Flash->error(__('Unable to add your session.'));
        }
        $this->set('session', $session);
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

		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Player->save($this->request->data)) {

				$this->Session->setFlash(__('The player has been updated.'));
				//return $this->redirect(array('action' => 'index'));

				$sendback = $this->Session->read('referer');
    			$this->Session->delete('referer');
   				$this->redirect($sendback);
			} else {
				$this->Session->setFlash(__('The player could not be updated. Please, try again.'));
			}
			$sendback = $this->Session->read('referer');
    		$this->Session->delete('referer');
    		$this->redirect($sendback);
		} else {
			$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
			$this->request->data = $this->Player->find('first', $options);

			$this->Session->write('referer', $this->referer());
		}
		$dir = new Folder('img' . DS . 'flags');
		$files = $dir->find('.*\.png', true);
		$videos = $this->Player->Video->find('list');
		$nationalities = array('Belgium' => 'Belgium', 'Hong Kong' => 'Hong Kong', 'England' => 'England', 'Ireland' => 'Ireland', 'Northern Ireland' => 'Northern Ireland', 'China' => 'China', 'Australia' => 'Australia', 'Thailand' => 'Thailand', 'India' => 'India', 'Malta' => 'Malta', 'Norway' => 'Norway', 'Wales' => 'Wales', 'Scotland' => 'Scotland', 'Brazil' => 'Brazil', 'Switzerland' => 'Switzerland', 'Qatar' => 'Qatar', 'Libya' => 'Libya', 'Malaysia' => 'Malaysia', 'Iran' => 'Iran', 'Finland' => 'Finland', 'Egypt' => 'Egypt', 'Canada' => 'Canada', 'Germany' => 'Germany', 'Isle of Man' => 'Isle of Man', 'Pakistan' => 'Pakistan');
		$categories = array('Top32' => 'Top32', 'Top64' => 'Top64', 'Nr. 1 Players' => 'Nr. 1 Players', 'World Champions' => 'World Champions', 'Past Players' => 'Past Players', 'Others' => 'Others');
		$this->set(compact('videos', 'nationalities', 'categories', 'files'));

		$player_firstname = $this->Player->player_firstname;
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Player->delete()) {
			$this->Session->setFlash(__('The player has been deleted.'));
		} else {
			$this->Session->setFlash(__('The player could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
