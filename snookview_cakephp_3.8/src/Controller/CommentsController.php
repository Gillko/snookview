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
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());

		$current_user = $this->Auth->user('user_id');

		$options['joins'] = [
		    [
		    	'table' 	=> 'comments',
		        'alias' 	=> 'Comment',
		        'type' 		=> 'inner',
		        'conditions' => [
		            'Video.video_id = Comment.video_id',
		            'Comment.user_id' => $current_user
		        ]
		    ]
		];

		$videos = $this->Comment->Video->find('all', $options);
		$this->set(compact('videos'));
	}*/

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function adminView($id = null) {
		$this->viewBuilder()->setLayout('layout_back');
		if (!$this->Comments->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$comment = $this->Comments->get($id, [
			'contain' => [
				'Users',
				'Videos'
			]
		]);
        $this->set(compact('comment'));
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
	public function adminEdit($id = null) {
		$this->viewBuilder()->setLayout('layout_back');

        $comment = $this->Comments->get($id, [
            'contain' => [
            	'Users',
            	'Videos'
            ]
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been updated.'));
                return $this->redirect(['action' => 'adminIndex']);
            } else {
                $this->Flash->error(__('The comment could not be updated. Please, try again.'));
            }
        }
        $this->set(compact('comment'));

        $users 
		= $this->Comments->Users->find(
			'list', [
				'valueField' => function ($row) {
            		return $row['user_firstname'] . ' ' . $row['user_surname'];
        		}
			]
		);
		
		$videos 
		= $this->Comments->Videos->find(
			'list', [
				'valueField' => [
					'video_title'
				],
				'order' => [
					'Videos.video_id' => 'desc'
				]
			]
		);
		
		$this->set(
			compact(
				'comments',
				'users',
				'videos'
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

		$comment = $this->Comments->get($id);
		if ($this->Comments->delete($comment)) {
			$this->Flash->success(__('The comment with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}