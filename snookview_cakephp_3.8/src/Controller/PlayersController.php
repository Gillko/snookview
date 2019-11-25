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
     /*Pagination*/

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

	public function beforeFilter(Event $event) {
		$this->Auth->allow(
			[
				'view',
				'index'
				/*'adminAdd',
				'adminEdit',
				'adminIndex',
				'adminView',
				'adminDelete'*/
			]
		);
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->viewBuilder()->setLayout('layout_front');

		$players = $this->Players->find('all', ['order' => ['Players.player_firstname' => 'asc']]);
		
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

		$this->set(
			compact(
				'players'
			)
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

		$this->set(
			compact(
				'thisplayer', 
				'players', 
				'player', 
				'videos'
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

	    $players = $this->paginate($this->Players);

        $this->set(
        	compact(
        		'players'
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

		if (!$this->Players->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}

		$player = $this->Players->get($id, [
			'contain' => [
				'Videos',
				'Videos.Sessions',
				'Videos.Tournaments'
			]
		]);

        $this->set(compact('player'));
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

			$uploadpath = 'img/players/';

			$uploadfile = $uploadpath . $filename; 

			if(move_uploaded_file($this->request->getData()['player_image']['tmp_name'], $uploadfile)){
				$player->player_image = $uploadfile;

				if($this->Players->save($player)) {
					$this->Flash->success(__('Your player has been saved.', ['id' => 'flashMessage']));

					return $this->redirect(['action' => 'adminAdd']);
				}
			}

			$this->Flash->error(__('Unable to add your player.'));
		}

		$this->set(
			'player', $player
		);
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

		$player = $this->Players->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
			$player = $this->Players->patchEntity($player, $this->request->data);
        	
        	$filename = $this->request->getData()['player_image']['name'];
			
			$uploadpath = '/img/players/';

			if(move_uploaded_file($this->request->getData()['player_image']['tmp_name'], $filename)){
				$player->player_image = $filename;
	        }
	        
	        if ($this->Players->save($player)){
                $this->Flash->success(__('The player has been updated.'));
                return $this->redirect(['action' => 'adminIndex']);
            } else {
                $this->Flash->error(__('The player could not be updated. Please, try again.'));
            }
        }
        
        $this->set(
        	compact(
        		'player'
        	)
        );

        $dir = new Folder('img' . DS . 'flags');
		$files = $dir->find('.*\.png', true);

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

		$this->set(
			compact(
				'players', 
				'nationalities', 
				'categories', 
				'files'
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
	public function adminDelete($id) {
		$this->request->allowMethod(['post', 'delete']);

		$player = $this->Players->get($id);
		
		if ($this->Players->delete($player)) {
			$this->Flash->success(__('The player with id: {0} has been deleted.', h($id)));
			
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}