<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Players Controller
 *
 * @property Player $Player
 * @property PaginatorComponent $Paginator
 */
class PlayersController extends AppController {


public function beforeFilter() {
	$this->Auth->allow('index', 'view');
	$this->set('logged_in', $this->Auth->loggedIn());
	$this->set('current_user', $this->Auth->user());
}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public $paginate = array(
	    'order' => array(
	        'Player.player_firstname' => 'asc'
	    )
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layout_front';
		$this->Player->recursive = 0;

		$players = $this->Player->find('all', array('order' => array('Player.player_firstname' => 'asc')));
		$this->set(compact('players'));

		if($this->request->is('post')){
			if (!empty($this->request->data['Player']['player_firstname']) && !empty($this->request->data['Player']['player_surname'])) {
				$results = $this->Player->find('all', array(
				  'conditions' => array(
				      'Player.player_firstname' => $this->request->data['Player']['player_firstname'], 'Player.player_surname' => $this->request->data['Player']['player_surname']),
				     
				    )
				  );
				$this->set(compact('results'));
			} elseif(!empty($this->request->data['Player']['player_firstname']) && empty($this->request->data['Player']['player_surname'])) {
				$results = $this->Player->find('all', array(
				  'conditions' => array(
				  	'Player.player_firstname' => $this->request->data['Player']['player_firstname'],
					)
				  )
				);
				$this->set(compact('results'));
			} elseif(empty($this->request->data['Player']['player_firstname']) && !empty($this->request->data['Player']['player_surname'])) {
				$results = $this->Player->find('all', array(
				  'conditions' => array(
				  	'Player.player_surname' => $this->request->data['Player']['player_surname'],
					)
				  )
				);
				$this->set(compact('results'));
			}
		}
		
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
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}
		$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
		$this->set('player', $this->Player->find('first', $options));

		$options['joins'] = array(
		    array('table' => 'players_videos',
		        'alias' => 'PlayersVideo',
		        'type' => 'inner',
		        'conditions' => array(
		            'Video.video_id = PlayersVideo.video_id',
		            'Video.video_part' => 'Part One'
		        )
		    ),
		    array('table' => 'players',
		        'alias' => 'Player',
		        'type' => 'inner',
		        'conditions' => array(
		            'PlayersVideo.player_id = Player.player_id'
		        )
		    ),
		);

		$thisplayer = $id;
		$videos = $this->Player->Video->find('all', $options);
		$this->set(compact('videos', 'thisplayer'));
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
	public function admin_index() {
		$this->layout = 'layout_back';
		$this->Player->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('players', $this->Paginator->paginate('Player'));
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
	public function admin_add() {
		$this->layout = 'layout_back';
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));

				$this->Session->write('referer', $this->referer());
			}
		}
		$dir = new Folder('img' . DS . 'flags');
		$files = $dir->find('.*\.png', true);
		$videos = $this->Player->Video->find('list');
		$nationalities = array('Belgium' => 'Belgium', 'Hong Kong' => 'Hong Kong', 'England' => 'England', 'Ireland' => 'Ireland', 'Northern Ireland' => 'Northern Ireland', 'China' => 'China', 'Australia' => 'Australia', 'Thailand' => 'Thailand', 'India' => 'India', 'Malta' => 'Malta', 'Norway' => 'Norway', 'Wales' => 'Wales', 'Scotland' => 'Scotland', 'Brazil' => 'Brazil', 'Switzerland' => 'Switzerland', 'Qatar' => 'Qatar', 'Libya' => 'Libya', 'Malaysia' => 'Malaysia', 'Iran' => 'Iran', 'Finland' => 'Finland', 'Egypt' => 'Egypt', 'Canada' => 'Canada', 'Germany' => 'Germany', 'Isle of Man' => 'Isle of Man', 'Pakistan' => 'Pakistan');
		$categories = array('Top32' => 'Top32', 'Top64' => 'Top64', 'Nr. 1 Players' => 'Nr. 1 Players', 'World Champions' => 'World Champions', 'Past Players' => 'Past Players', 'Others' => 'Others');

		$this->set(compact('videos', 'nationalities', 'categories', 'files'));

		$lastPlayerID = $this->Player->find('first', array('order' =>array('Player.player_id DESC')));
		//$test = $this->Player->getLastInsertId();
		$this->set(compact('lastPlayerID'));		
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
