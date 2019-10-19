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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layout_front';
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->Paginator->paginate());

		$current_user = $this->Auth->user('user_id');

		$options['joins'] = array(
		    array('table' => 'favorites',
		        'alias' => 'Favorite',
		        'type' => 'inner',
		        'conditions' => array(
		            'Video.video_id = Favorite.video_id',
		            'Favorite.user_id' => $current_user
		        )
		    ),
		);

		$videos = $this->Favorite->Video->find('all', $options);
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
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Favorite->delete()) {
			$this->Session->setFlash(__('Your favorite has been deleted.'));
		} else {
			$this->Session->setFlash(__('Your favorite could not be deleted. Please, try again.'));
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
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->Paginator->paginate());

		$this->layout = 'layout_back';
		$this->Favorite->recursive = 1;

		$this->paginate = array( 
	        'order' => array('Favorite.favorite_id' => 'DESC')
	    );

	    $this->set('favorites', $this->Paginator->paginate());*/

	    $this->viewBuilder()->setLayout('layout_back');
	    $favorites = $this->paginate($this->Favorites, [
	    	'contain' => [
	    		'Users',
	    		'Videos'
	    	]
	    ]);
        $this->set(
        	compact(
        		'favorites'
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
		if (!$this->Favorite->exists($id)) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$options = array('conditions' => array('Favorite.' . $this->Favorite->primaryKey => $id));
		$this->set('favorite', $this->Favorite->find('first', $options));
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
	public function admin_edit($id = null) {
		$this->layout = 'layout_back';
		if (!$this->Favorite->exists($id)) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Favorite->save($this->request->data)) {
				$this->Session->setFlash(__('The favorite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Favorite.' . $this->Favorite->primaryKey => $id));
			$this->request->data = $this->Favorite->find('first', $options);
		}
		$users = $this->Favorite->User->find('list');
		$videos = $this->Favorite->Video->find('list');
		$this->set(compact('users', 'videos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Favorite->id = $id;
		if (!$this->Favorite->exists()) {
			throw new NotFoundException(__('Invalid favorite'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Favorite->delete()) {
			$this->Session->setFlash(__('The favorite has been deleted.'));
		} else {
			$this->Session->setFlash(__('The favorite could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}