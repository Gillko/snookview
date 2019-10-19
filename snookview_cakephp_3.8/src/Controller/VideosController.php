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
				'adminEdit',
				'edit',
				'adminIndex'
			]
		);
	}

/**
 * Helpers
 *
 * @var array
 */
	//public $helpers = array('Session', 'Html','Form', 'Js'=>array("Jquery"));
	public $helpers = array('Html','Form', 'Js'=>array("Jquery"));

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $slug = null) {
		$this->loadModel('Comments');
		$this->loadModel('Favorites');
		
		$this->viewBuilder()->setLayout('layout_front');
		
		/*if (!$this->Videos->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}*/
		//$options = array('conditions' => array('Videos.' . $this->Videos->primaryKey => $id));

		$options = [
			'conditions' => [
				'Videos.' . $this->Videos->getPrimaryKey() => $id
			]
		];

		//Videos with tournament data

		$videos = $this->Videos->find('all', $options)->contain([
			'Tournaments',
			'Rounds',
			'Players',
			'Sessions'
		]);
 
		$video = $videos->first();

		//debug($video);

		//Videos with Timeline data

		/*$timelines = $this->Videos->find('all', $options)->contain([
			'Timelines'
		]);
 
		$timeline = $timelines->first();

		debug($timeline);*/

		//Videos with timeline items data

		/*$items = $this->Videos->find('all', $options)->contain([
			'Timelines.Items'
		]);
 
		$item = $items->first();*/

		//debug($items);

		//$this->set('video', $this->Videos->find('first', $options))

   		$current_user = $this->Auth->user('user_id');

   		if(isset($this->request->data['comment'])){
	   		if ($this->request->is('post')) {
				$this->Comment->create();
				/*save the current's user id in database*/
				$this->Comment->set('user_id', $current_user);
				/*save the current's video id in database*/
				$this->Comment->set('video_id', $id);
				if ($this->Comment->save($this->request->data)) {
					//$this->Session->setFlash(__('You\'re comment has been placed.'));
					return $this->redirect(array('action' => 'view/' . $id));
				} else {
					//$this->Session->setFlash(__('You\'re comment could not be placed. Please, try again. You need to be logged in to place comments.'));
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
						//$this->Session->setFlash(__('You\'re favorite has been placed.'));
						return $this->redirect(array('action' => 'view/' . $id));
					} else {
						//$this->Session->setFlash(__('You\'re favorite could not be placed. Please, try again. You need to be logged in to add favorites.'));
						return $this->redirect(array('controller' => 'users', 'action' => 'login'));
					}
				} else{
					//$this->Session->setFlash(__('This is already a favorite of yours.'));
				}
			}
		}

		//$tab = array('Videos.Timelines' . $this->Videos->Timelines->getPrimaryKey() => $id); // which you loop for the video list and fill with their ids

		//$tab = array($this->Videos->Timelines->getPrimaryKey() => $id);

		//debug($tab);

		/*debug($tab);

    	$items = $this->Videos->Timelines->Items->find('all', array('conditions' => array('Items.timeline_id' => 250)));*/

    	$items = $this->Videos->find('all')
	    	->contain([
				'Timelines.Items'
			])
			->where(['Timelines.timeline_id' => $id])
		;

		/*$rounds = $this->Videos->find('all')
	    	->contain([
				'Rounds'
			])
			
		;

		$round = $rounds->first();

		debug($round);*/

		//$item = $items->first();

    	//debug($item);

		/*$options['joins'] = array(
		    array('table' => 'players_videos',
		        'alias' => 'PlayersVideo',
		        'type' => 'inner',
		        'conditions' => array(
		            'Players.player_id = PlayersVideos.player_id'
		        )
		    ),
		    array('table' => 'videos',
		        'alias' => 'Video',
		        'type' => 'inner',
		        'conditions' => array(
		            'PlayersVideos.video_id = Videos.video_id'
		        )
		    )
		);*/
		
		//$players = $this->Videos->Players->find('list', $options);
		$comments = $this->Videos->Comments->find('all', array('conditions' => array('Comments.video_id' => $id), 'order' => array('Comments.comment_id' => 'desc')));
		$this->set(compact('users', 'videos', 'video', 'items', 'players', 'comments'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function adminIndex() {
		$this->viewBuilder()->setLayout('layout_back');
	    $videos = $this->paginate($this->Videos, [
	    	'contain' => [
	    		'Tournaments',
	    		'Rounds',
	    		'Timelines'
	    	]
	    ]);
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
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$tournaments 
		= $this->Videos->Tournaments->find(
			'list', array(
				'valueField' => function ($row) {
            		return $row['tournament_name'] . ' ' . $row['tournament_year'];
        		},
				'order' => array(
					'Tournaments.tournament_id' => 'desc'
				)
			)
		);
		
		$rounds 
		= $this->Videos->Rounds->find(
			'list', array(
				'valueField' => [
					'round_name'
				],
				'order' => array(
					'Rounds.round_id' => 'desc'
				)
			)
		);
		
		$timelines 
		= $this->Videos->Timelines->find(
			'list', array(
				'valueField' => [
					'timeline_title'
				],
				'order' => array(
					'Timelines.timeline_id' => 'desc'
				)
			)
		);
		
		$players 
		= $this->Videos->Players->find(
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

		$sessions 
		= $this->Videos->Sessions->find(
			'list', array(
				'valueField' => 'session_title',
				'order' => array(
					'Sessions.session_id' => 'asc'
				)
			)
		);

		$lastVideoIDs 
		= $this->Videos->find(
			'all', array(
				'order' =>array(
					'Videos.video_id DESC'
				)
			)
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


		$video = $this->Videos->get($id);

		/*$video = $this->Videos->getPrimaryKey($id);

		debug($video);*/

		/*$title = $this->request->getData();

		debug($title);*/



		/*if(!$this->Videos->exists($id)) {
			throw new NotFoundException(__('Invalid video'));
		}*/

		if($this->request->is(['post', 'put'])) {
			$this->Videos->patchEntity($video, $this->request->getData());






			if($this->Videos->save($video)){

				//$video = $this->Videos->patchEntity($video, $this->request->getData());

				//$this->Videos->save($video);

				//debug($video);

				$this->Flash->success(__('Your video has been updated.'));
				return $this->redirect(array('action' => 'adminEdit'));


				//$sendback = $this->Session->read('referer');
    			//$this->Session->delete('referer');
   				//$this->redirect($sendback);
			} else {
				$this->Flash->error(__('Unable to edit your video.'));
			}
			//$sendback = $this->Session->read('referer');
    		//$this->Session->delete('referer');
    		//$this->redirect($sendback);
		} 

		$this->set('video', $video);

		/*else {
			
			$options = [
				'conditions' => [
					'Videos.' . $this->Videos->getPrimaryKey() => $id
				]
			];

			$videos = $this->Videos->find('all', $options);
 
			//$video = $videos->first();

			//$video = $this->request->getData();

			//debug($videos);

			//$this->Session->write('referer', $this->referer());
		}*/
		$tournaments = $this->Videos->Tournaments->find('list', array('order' => array('Tournaments.tournament_id' => 'desc')));
		$rounds = $this->Videos->Rounds->find('list', array('order' => array('Rounds.round_id' => 'desc')));
		$timelines = $this->Videos->Timelines->find('list', array('order' => array('Timelines.timeline_id' => 'desc')));
		$players = $this->Videos->Players->find('list', array('order' => array('Players.player_firstname' => 'asc')));
		/*$parts = array('Part One' => 'Part One', 'Part Two' => 'Part Two', 'Part Three' => 'Part Three', 'Part Four' => 'Part Four', 'Part Five' => 'Part Five', 'Highlights' => 'Highlights', 'Extra' => 'Extra');
		$sorts = array('Single' => 'Single', 'Playlist' => 'Playlist');*/
		$this->set(compact('tournaments', 'rounds', 'timelines', 'players', 'parts', 'sorts'));
	}



	/**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	    public function edit($id = null)
	    {
	    	$this->viewBuilder()->setLayout('layout_back');

	        $video = $this->Videos->get($id, [
	            'contain' => [
	            	'Players'
	            ]
	        ]);

	        //debug($video);

	        $idPlusOne = $id + 1;

	        //debug($video);

	        if ($this->request->is(['patch', 'post', 'put'])) {
	            $video = $this->Videos->patchEntity($video, $this->request->data);
	            if ($this->Videos->save($video)) {
	                $this->Flash->success(__('The video has been updated.'));
	                return $this->redirect(['action' => '/edit/' . $idPlusOne]);
	            } else {
	                $this->Flash->error(__('The video could not be updated. Please, try again.'));
	            }
	        }
	        $this->set(compact('video'));
	        $this->set('_serialize', ['video']);

	        $tournaments 
			= $this->Videos->Tournaments->find(
				'list', array(
					'valueField' => function ($row) {
	            		return $row['tournament_name'] . ' ' . $row['tournament_year'];
	        		},
					'order' => array(
						'Tournaments.tournament_id' => 'desc'
					)
				)
			);
			
			$rounds 
			= $this->Videos->Rounds->find(
				'list', array(
					'valueField' => [
						'round_name'
					],
					'order' => array(
						'Rounds.round_id' => 'desc'
					)
				)
			);
			
			$timelines 
			= $this->Videos->Timelines->find(
				'list', array(
					'valueField' => [
						'timeline_title'
					],
					'order' => array(
						'Timelines.timeline_id' => 'desc'
					)
				)
			);
			
			$players 
			= $this->Videos->Players->find(
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

			$sessions 
			= $this->Videos->Sessions->find(
				'list', array(
					'keyField' => 'session_id',
					'valueField' => [
						'session_title'
					],
					'order' => array(
						'Sessions.session_id' => 'asc'
					)
				)
			);
			
			/*$parts 
			= array(
				'' => '',
				'Part One' => 'Part One', 
				'Part Two' => 'Part Two', 
				'Part Three' => 'Part Three', 
				'Part Four' => 'Part Four', 
				'Part Five' => 'Part Five', 
				'Highlights' => 'Highlights', 
				'Snooker Extra' => 'Snooker Extra',
				'Extra' => 'Extra'
			);
			
			$sorts 
			= array(
				'Single' => 'Single', 
				'Playlist' => 'Playlist'
			);*/

			$lastVideoIDs 
			= $this->Videos->find(
				'all', array(
					'order' =>array(
						'Videos.video_id DESC'
					)
				)
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
					//'parts',
					'sessions',
					//'sorts',
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
	public function admin_delete($id = null) {
		$this->layout = 'layout_back';
		$this->Video->id = $id;
		if (!$this->Video->exists()) {
			throw new NotFoundException(__('Invalid video'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Video->delete()) {
			//$this->Session->setFlash(__('The video has been deleted.'));
		} else {
			//$this->Session->setFlash(__('The video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}