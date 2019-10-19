<?php
namespace App\Controller;

use Cake\Event\Event;

/**
 * Comments Controller
 *
 * @property Comment $Comment
 */
class CommentsController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Comments.comment_id' => 'asc'
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
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());

		$current_user = $this->Auth->user('user_id');

		$options['joins'] = array(
		    array('table' => 'comments',
		        'alias' => 'Comment',
		        'type' => 'inner',
		        'conditions' => array(
		            'Video.video_id = Comment.video_id',
		            'Comment.user_id' => $current_user
		        )
		    ),
		);

		$videos = $this->Comment->Video->find('all', $options);
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
		$this->layout = 'layout_front';
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$videos = $this->Comment->Video->find('list');
		$this->set(compact('users', 'videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->layout = 'layout_back';
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('Your comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('Your comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
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
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function adminIndex() {
		$this->viewBuilder()->setLayout('layout_back');
	    $comments = $this->paginate($this->Comments, [
	    	'contain' => [
	    		'Users',
	    		'Videos'
	    	]
	    ]);
        $this->set(
        	compact(
        		'comments'
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

		$users = $this->Comments->Users->find('list', [
			'valueField' => function ($row) {
	    		return $row['user_firstname'] . ' ' . $row['user_surname'];
			}
		]);

		$videos = $this->Comments->Videos->find('list', [
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

		$comment = $this->Comments->newEntity();

		if($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());

            if($this->Comments->save($comment)) {
                $this->Flash->success(__('Your comment has been saved.', ['id' => 'flashMessage']));
                return $this->redirect(['action' => 'adminAdd']);
            }
            $this->Flash->error(__('Unable to add your video.'));
        }
        $this->set('comment', $comment);
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
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$videos = $this->Comment->Video->find('list');
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
		$this->layout = 'layout_back';
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}