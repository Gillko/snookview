<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Routing\Router;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Players Controller
 *
 * @property Player $Player
 */
class PlayersController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Players.player_id' => 'asc'
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
				'view',
				'adminAdd',
				'adminIndex'
			]
		);
	}

/**
 * Components
 *
 * @var array
 */
	/*public $components = array('Paginator');

	public $paginate = array(
		'order' => array(
			'Players.player_firstname' => 'asc'
		)
	);
*/
/**
 * index method
 *
 * @return void
 */
	public function index() {
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
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
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
 
		$player = $players->first();

		//debug($player);


		/*$videos = $this->Players->Videos->find('all', $options)->where([
			'Videos.video_part' => 'Part One'
		]);*/

		//$video = $videos->first();
		/*foreach($videos as $video){
			debug($video);
		}*/
		

		$this->set(compact('thisplayer', 'players', 'player', 'videos'));
	}

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
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
			$this->request->data = $this->Player->find('first', $options);
		}
		$videos = $this->Player->Video->find('list');
		$this->set(compact('videos'));
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
	    $players = $this->paginate($this->Players);
        $this->set(compact('players'));
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

		$nationalities = [
			'Belgium' => 'Belgium',
			'Hong Kong' => 'Hong Kong',
			'England' => 'England',
			'Ireland' => 'Ireland',
			'Northern Ireland' => 'Northern Ireland',
			'China' => 'China',
			'Australia' => 'Australia',
			'Thailand' => 'Thailand',
			'India' => 'India',
			'Malta' => 'Malta',
			'Norway' => 'Norway',
			'Wales' => 'Wales',
			'Scotland' => 'Scotland',
			'Brazil' => 'Brazil',
			'Switzerland' => 'Switzerland',
			'Qatar' => 'Qatar',
			'Libya' => 'Libya',
			'Malaysia' => 'Malaysia',
			'Iran' => 'Iran',
			'Finland' => 'Finland',
			'Egypt' => 'Egypt',
			'Canada' => 'Canada',
			'Germany' => 'Germany',
			'Isle of Man' => 'Isle of Man',
			'Pakistan' => 'Pakistan'
		];
		
		$categories = [
			'Top32' => 'Top32', 
			'Top64' => 'Top64', 
			'Nr. 1 Players' => 'Nr. 1 Players', 
			'World Champions' => 'World Champions', 
			'Past Players' => 'Past Players', 
			'Others' => 'Others'
		];

		$videos = $this->Players->Videos->find('list', [
			'valueField' => [
				'video_title'
			],
			'order' => [
				'Videos.video_id' => 'desc'
			]
		]);

		$dir = new Folder('img' . DS . 'flags');
		$files = $dir->find('.*\.png', true);

		$this->set(
			compact(
				'videos',
				'nationalities',
				'categories',
				'files'
			)
		);

		$player = $this->Players->newEntity();

		if($this->request->is('post')) {
			$player = $this->Players->patchEntity($player, $this->request->getData());
			$filename = $this->request->getData()['player_image']['name'];
			//$fileBasename = $filename['basename'];
			//$fileExtension = substr(strrchr($filename, "."), 1);
			$uploadpath = 'img/players/';
			$uploadfile = $uploadpath . $filename; 
			//$uploadfile = $uploadpath . $fileBasename.Security::hash($filename). "." .$fileExtension;

			if(move_uploaded_file($this->request->getData()['player_image']['tmp_name'], $uploadfile)){
				$player->player_image = $uploadfile;

				if($this->Players->save($player)) {
					$this->Flash->success(__('Your player has been saved.', ['id' => 'flashMessage']));
					return $this->redirect(['action' => 'adminAdd']);
				}
			}	
			$this->Flash->error(__('Unable to add your player.'));
		}

		$this->set('player', $player);
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
