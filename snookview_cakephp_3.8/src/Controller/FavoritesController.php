<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Favorites Controller
 *
 * @property Favorite $Favorite
 * @property PaginatorComponent $Paginator
 */
class FavoritesController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Favorites.favorite_id' => 'asc'
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
	/*public function index() {
		$this->layout = 'layout_front';
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->Paginator->paginate());

		$current_user = $this->Auth->user('user_id');

		$options['joins'] = [
		    [
		    	'table' => 'favorites',
		        'alias' => 'Favorite',
		        'type' => 'inner',
		        'conditions' => [
		            'Video.video_id = Favorite.video_id',
		            'Favorite.user_id' => $current_user
		        ]
		    ],
		];

		$videos = $this->Favorite->Video->find('all', $options);
		$this->set(compact('videos'));
	}*/

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function adminIndex() {
	    $this->viewBuilder()->setLayout('layout_back');
	    $favorites = $this->paginate($this->Favorites, [
	    	'contain' => [
	    		'Users',
	    		'Videos'
	    	]
	    ]);
        $this->set(
        	compact(
        		'favorites',
        		'users',
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
		if (!$this->Favorites->exists($id)) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$favorite = $this->Favorites->get($id, [
			'contain' => [
				'Users',
				'Videos'
			]
		]);
        $this->set(compact('favorite'));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$users = $this->Favorites->Users->find('list', [
			'valueField' => function ($row) {
	    		return $row['user_firstname'] . ' ' . $row['user_surname'];
			}
		]);

		$videos = $this->Favorites->Videos->find('list', [
			'valueField' => [
				'video_title'
			],
			'order' => [
				'Videos.video_id' => 'desc'
			]
		]);

		$this->set(
			compact(
				'videos',
				'users'
			)
		);

		$favorite = $this->Favorites->newEntity();

		if($this->request->is('post')) {
            $favorite = $this->Favorites->patchEntity($favorite, $this->request->getData());

            if($this->Favorites->save($favorite)) {
                $this->Flash->success(__('Your favorite has been saved.', ['id' => 'flashMessage']));
                return $this->redirect(['action' => 'adminAdd']);
            }
            $this->Flash->error(__('Unable to add your favorite.'));
        }
        $this->set('favorite', $favorite);
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

        $favorite = $this->Favorites->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $favorite = $this->Favorites->patchEntity($favorite, $this->request->data);
            if ($this->Favorites->save($favorite)) {
                $this->Flash->success(__('The favorite has been updated.'));
                return $this->redirect(['action' => 'adminIndex']);
            } else {
                $this->Flash->error(__('The favorite could not be updated. Please, try again.'));
            }
        }
        $this->set(compact('favorite'));

        $videos 
		= $this->Favorites->Videos->find(
			'list', [
				'valueField' => 'video_title',
				'order' => [
					'Videos.video_id' => 'desc'
				]
			]
		);

		$users 
		= $this->Favorites->Users->find(
			'list', [
				'valueField' => 'user_username'
			]
		);
		
		$this->set(
			compact(
				'favorites',
				'videos',
				'users'
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

		$favorite = $this->Favorites->get($id);
		if ($this->Favorites->delete($favorite)) {
			$this->Flash->success(__('The favorite with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}