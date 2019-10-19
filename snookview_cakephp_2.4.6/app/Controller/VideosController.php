<?php
App::uses('AppController', 'Controller');
/**
 * Videos Controller
 *
 * @property Video $Video
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class VideosController extends AppController {

public function beforeFilter() {
	$this->Auth->allow('view');
	$this->set('logged_in', $this->Auth->loggedIn());
	$this->set('current_user', $this->Auth->user());
}

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Session', 'Html','Form', 'Js'=>array("Jquery"));
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');


	public $paginate = array(
	    'order' => array(
	        'Video.video_id' => 'desc'
	    )
	);

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('Comment', 'Favorite');
		
		$this->layout = 'layout_front';
		
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
		$this->set('video', $this->Video->find('first', $options));

   		$current_user = $this->Auth->user('user_id');

   		if(isset($this->request->data['comment'])){
	   		if ($this->request->is('post')) {
				$this->Comment->create();
				/*save the current's user id in database*/
				$this->Comment->set('user_id', $current_user);
				/*save the current's video id in database*/
				$this->Comment->set('video_id', $id);
				if ($this->Comment->save($this->request->data)) {
					$this->Session->setFlash(__('You\'re comment has been placed.'));
					return $this->redirect(array('action' => 'view/' . $id));
				} else {
					$this->Session->setFlash(__('You\'re comment could not be placed. Please, try again. You need to be logged in to place comments.'));
					return $this->redirect(array('controller' => 'users', 'action' => 'login'));
				}
			}

		} elseif(isset($this->request->data['favorite'])){
			if($this->request->is('post')) {
					$this->Video->Favorite->create();
					/*save the current's user id in database*/
					$this->Video->Favorite->set('user_id', $current_user);
					/*save the current's video id in database*/
					$this->Video->Favorite->set('video_id', $id);
					if(!$this->Video->Favorite->hasAny(['video_id' => $id], ['user_id' => $current_user])){
					if ($this->Video->Favorite->save($this->request->data)) {
						$this->Session->setFlash(__('You\'re favorite has been placed.'));
						return $this->redirect(array('action' => 'view/' . $id));
					} else {
						$this->Session->setFlash(__('You\'re favorite could not be placed. Please, try again. You need to be logged in to add favorites.'));
						return $this->redirect(array('controller' => 'users', 'action' => 'login'));
					}
				} else{
					$this->Session->setFlash(__('This is already a favorite of yours.'));
				}
			}
		}

		$tab = array('Video.Timeline' . $this->Video->Timeline->primaryKey => $id); // which you loop for the video list and fill with their ids
    	$items = $this->Video->Timeline->Item->find('all', array('conditions' => array('Item.timeline_id' => $tab), 'order' => array('Item.item_id' => 'asc'),'recursive'=>2));

		$options['joins'] = array(
		    array('table' => 'players_videos',
		        'alias' => 'PlayersVideo',
		        'type' => 'inner',
		        'conditions' => array(
		            'Player.player_id = PlayersVideo.player_id'
		        )
		    ),
		    array('table' => 'videos',
		        'alias' => 'Video',
		        'type' => 'inner',
		        'conditions' => array(
		            'PlayersVideo.video_id = Video.video_id'
		        )
		    )
		);
		
		$players = $this->Video->Player->find('list', $options);
		$comments = $this->Video->Comment->find('all', array('conditions' => array('Comment.video_id' => $id), 'order' => array('Comment.comment_id' => 'desc')));
		$this->set(compact('users', 'videos', 'items', 'players', 'comments'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'layout_back';
		$this->Video->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('videos', $this->Paginator->paginate('Video'));
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
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
		$this->set('video', $this->Video->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'layout_back';
		if ($this->request->is('post')) {
			$this->Video->create();
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		}
		$tournaments = $this->Video->Tournament->find('list', array('order' => array('Tournament.tournament_id' => 'desc')));
		$rounds = $this->Video->Round->find('list', array('order' => array('Round.round_id' => 'desc')));
		$timelines = $this->Video->Timeline->find('list', array('order' => array('Timeline.timeline_id' => 'desc')));
		$players = $this->Video->Player->find('list', array('order' => array('Player.player_firstname' => 'asc')));
		$parts = array('Part One' => 'Part One', 'Part Two' => 'Part Two', 'Part Three' => 'Part Three', 'Part Four' => 'Part Four', 'Part Five' => 'Part Five', 'Highlights' => 'Highlights', 'Extra' => 'Extra');
		$sorts = array('Single' => 'Single', 'Playlist' => 'Playlist');
		$this->set(compact('tournaments', 'editions', 'rounds', 'timelines', 'players', 'parts', 'sorts'));

		$lastVideoID = $this->Video->find('first', array('order' =>array('Video.video_id DESC')));
		$this->set(compact('lastVideoID'));
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
		if (!$this->Video->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Video->save($this->request->data)) {
				$this->Session->setFlash(__('The video has been updated.'));
				//return $this->redirect(array('action' => 'index'));
				$sendback = $this->Session->read('referer');
    			$this->Session->delete('referer');
   				$this->redirect($sendback);
			} else {
				$this->Session->setFlash(__('The video could not be updated. Please, try again.'));
			}
			$sendback = $this->Session->read('referer');
    		$this->Session->delete('referer');
    		$this->redirect($sendback);
		} else {
			$options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
			$this->request->data = $this->Video->find('first', $options);

			$this->Session->write('referer', $this->referer());
		}
		$tournaments = $this->Video->Tournament->find('list', array('order' => array('Tournament.tournament_id' => 'desc')));
		$rounds = $this->Video->Round->find('list', array('order' => array('Round.round_id' => 'desc')));
		$timelines = $this->Video->Timeline->find('list', array('order' => array('Timeline.timeline_id' => 'desc')));
		$players = $this->Video->Player->find('list', array('order' => array('Player.player_firstname' => 'asc')));
		$parts = array('Part One' => 'Part One', 'Part Two' => 'Part Two', 'Part Three' => 'Part Three', 'Part Four' => 'Part Four', 'Part Five' => 'Part Five', 'Highlights' => 'Highlights', 'Extra' => 'Extra');
		$sorts = array('Single' => 'Single', 'Playlist' => 'Playlist');
		$this->set(compact('tournaments', 'rounds', 'timelines', 'players', 'parts', 'sorts'));
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
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Video->delete()) {
			$this->Session->setFlash(__('The video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}