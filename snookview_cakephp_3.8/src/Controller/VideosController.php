<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Videos Controller
 *
 * @property Video $Video
 * 
 */
class VideosController extends AppController {

	/*Pagination*/
	public $paginate = [
		'limit' => 25,
		'order' => [
			'Videos.video_id' => 'desc'
		]
	];
	/*Pagination*/

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Paginator');
	}

	public function beforeFilter(Event $event) {
		$this->Auth->allow(
			[
				'view',
				/*'adminAdd',
				'adminEdit',
				'adminIndex',
				'adminView',
				'adminDelete'*/
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
		$this->loadModel('Comments');
		$this->loadModel('Favorites');
		
		$this->viewBuilder()->setLayout('layout_front');
		
		if (!$this->Videos->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}

		$options = [
			'conditions' => [
				'Videos.' . $this->Videos->getPrimaryKey() => $id
			]
		];

		$videos = $this->Videos->find('all', $options)->contain([
			'Tournaments',
			'Rounds',
			'Players',
			'Sessions'
		]);
 
		$video = $videos->first();

		$current_user = $this->Auth->user('user_id');

		//if(isset($this->request->data['comment'])){
			//if ($this->request->is('post')) {
				//$this->Comment->create();
				/*save the current's user id in database*/
				//$this->Comment->set('user_id', $current_user);
				/*save the current's video id in database*/
				//$this->Comment->set('video_id', $id);
				//if ($this->Comment->save($this->request->data)) {
					//$this->Session->setFlash(__('You\'re comment has been placed.'));
					//return $this->redirect(['action' => 'view/' . $id]);
				//} else {
					//$this->Session->setFlash(__('You\'re comment could not be placed. Please, try again. You need to be logged in to place comments.'));
					//return $this->redirect(['controller' => 'users', 'action' => 'login']);
				//}
			//}
		//} elseif(isset($this->request->data['favorite'])){
			//if($this->request->is('post')) {
					//$this->Video->Favorite->create();
					/*save the current's user id in database*/
					//$this->Video->Favorite->set('user_id', $current_user);
					/*save the current's video id in database*/
					//$this->Video->Favorite->set('video_id', $id);
					//if(!$this->Video->Favorite->hasAny(['video_id' => $id], ['user_id' => $current_user])){
					//if ($this->Video->Favorite->save($this->request->data)) {
						//$this->Session->setFlash(__('You\'re favorite has been placed.'));
						//return $this->redirect(['action' => 'view/' . $id]);
					//} else {
						//$this->Session->setFlash(__('You\'re favorite could not be placed. Please, try again. You need to be logged in to add favorites.'));
						//return $this->redirect(['controller' => 'users', 'action' => 'login']);
					//}
				//} else{
					//$this->Session->setFlash(__('This is already a favorite of yours.'));
				//}
			//}
		//}

		$items = $this->Videos->find('all')
			->contain(
				[
					'Timelines.Items'
				]
			)
			->where(
				[
					'Timelines.timeline_id' => $id
				]
			)
		;

		//$comments = $this->Videos->Comments->find('all', ['conditions' => ['Comments.video_id' => $id], 'order' => ['Comments.comment_id' => 'desc']));
		
		$this->set(
			compact(
				'users', 
				'videos', 
				'video', 
				'items', 
				'players', 
				'comments'
			)
		);
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function adminIndex() {
		$this->viewBuilder()->setLayout('layout_back');
		
		$videos = $this->paginate(
			$this->Videos, [
				'contain' => [
					'Tournaments',
					'Rounds',
					'Timelines'
				]
			])
		;
		
		$this->set(
			compact(
				'videos'
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
	public function adminView($id = null) {
		$this->viewBuilder()->setLayout('layout_back');
		
		if (!$this->Videos->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}
		
		$video = $this->Videos->get(
			$id, [
				'contain' => [
					'Tournaments',
					'Rounds',
					'Timelines',
					'Sessions',
					'Players',
					'Comments'
				]
			]
		);

		$this->set(
			compact(
				'video'
			)
		);
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$tournaments 
		= $this->Videos->Tournaments->find(
			'list', [
				'valueField' => function ($row) {
					return $row['tournament_name'] . ' ' . $row['tournament_year'];
				},
				'order' => [
					'Tournaments.tournament_id' => 'desc'
				]
			]
		);
		
		$rounds 
		= $this->Videos->Rounds->find(
			'list', [
				'valueField' => [
					'round_name'
				],
				'order' => [
					'Rounds.round_id' => 'desc'
				]
			]
		);
		
		$timelines 
		= $this->Videos->Timelines->find(
			'list', [
				'valueField' => [
					'timeline_title'
				],
				'order' => [
					'Timelines.timeline_id' => 'desc'
				]
			]
		);
		
		$players 
		= $this->Videos->Players->find(
			'list', [
				'keyField' => 'player_id',
				'valueField' => function ($row) {
					return $row['player_firstname'] . ' ' . $row['player_surname'];
				},
				'order' => [
						'Players.player_firstname' => 'asc'
				]
			]
		);

		$sessions 
		= $this->Videos->Sessions->find(
			'list', [
				'valueField' => 'session_title',
				'order' => [
					'Sessions.session_id' => 'asc'
				]
			]
		);

		$lastVideoIDs 
		= $this->Videos->find(
			'all', [
				'order' => [
					'Videos.video_id DESC'
				]
			]
		);

		$lastVideoID 
		= $lastVideoIDs->first();
		
		$this->set(
			compact(
				'videos',
				'tournaments',
				'rounds',
				'timelines',
				'players',
				'sessions',
				'lastVideoID'
			)
		);

		$video = $this->Videos->newEntity();

		if($this->request->is('post')) {
			$video = $this->Videos->patchEntity($video, $this->request->getData());

			if($this->Videos->save($video)) {
				$this->Flash->success(__('Your video has been saved.', ['id' => 'flashMessage']));
				
				return $this->redirect(['action' => 'adminAdd']);
			}

			$this->Flash->error(__('Unable to add your video.'));
		}
		$this->set('video', $video);
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function adminEdit($id = null) {
		$this->viewBuilder()->setLayout('layout_back');

		$video = $this->Videos->get(
			$id, [
				'contain' => [
					'Players'
				]
			])
		;

		/*$idPlusOne = $id + 1;*/

		if ($this->request->is(['patch', 'post', 'put'])) {
			$video = $this->Videos->patchEntity($video, $this->request->data);
			
			if ($this->Videos->save($video)) {
				$this->Flash->success(__('The video has been updated.'));
				
				//return $this->redirect(['action' => '/admin/videos/edit/' . $idPlusOne]);
				return $this->redirect(['action' => 'adminIndex']);
			} else {
				$this->Flash->error(__('The video could not be updated. Please, try again.'));
			}
		}
		$this->set(
			compact(
				'video'
			)
		);

		$tournaments 
		= $this->Videos->Tournaments->find(
			'list', [
				'valueField' => function ($row) {
					return $row['tournament_name'] . ' ' . $row['tournament_year'];
				},
				'order' => [
					'Tournaments.tournament_id' => 'desc'
				]
			]
		);
		
		$rounds 
		= $this->Videos->Rounds->find(
			'list', [
				'valueField' => [
					'round_name'
				],
				'order' => [
					'Rounds.round_id' => 'desc'
				]
			]
		);
		
		$timelines 
		= $this->Videos->Timelines->find(
			'list', [
				'valueField' => [
					'timeline_title'
				],
				'order' => [
					'Timelines.timeline_id' => 'desc'
				]
			]
		);
		
		$players 
		= $this->Videos->Players->find(
			'list', [
				'keyField' => 'player_id',
				'valueField' => function ($row) {
					return $row['player_firstname'] . ' ' . $row['player_surname'];
				},
				'order' => [
					'Players.player_firstname' => 'asc'
				]
			]
		);

		$sessions 
		= $this->Videos->Sessions->find(
			'list', [
				'keyField' => 'session_id',
				'valueField' => [
					'session_title'
				],
				'order' => [
					'Sessions.session_id' => 'asc'
				]
			]
		);
		
		$lastVideoIDs 
		= $this->Videos->find(
			'all', [
				'order' => [
					'Videos.video_id DESC'
				]
			]
		);

		$lastVideoID 
		= $lastVideoIDs->first();
		
		$this->set(
			compact(
				'videos',
				'tournaments',
				'rounds',
				'timelines',
				'players',
				'sessions',
				'lastVideoID'
			)
		);
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function adminDelete($id = null) {
		$this->request->allowMethod(['post', 'delete']);

		$video = $this->Videos->get($id);
		
		if ($this->Videos->delete($video)) {
			$this->Flash->success(__('The video with id: {0} has been deleted.', h($id)));
			
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}