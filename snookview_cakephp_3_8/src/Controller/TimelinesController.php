<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Timelines Controller
 *
 * @property Timeline $Timeline
 * @property SessionComponent $Session
 */
class TimelinesController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Timelines.timeline_id' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    /*Pagination*/

	public function beforeFilter(Event $event) {
		//$this->Auth->allow('index', 'view');
		$this->Auth->allow(
			[
				'adminAdd',
				'adminIndex'
			]
		);
	}

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function adminIndex() {
		/*$this->layout = 'layout_back';
		$this->Timeline->recursive = 0;
		$this->Paginator->settings = $this->paginate;
		$this->set('timelines', $this->Paginator->paginate());*/

		$this->viewBuilder()->setLayout('layout_back');
	    $timelines = $this->paginate($this->Timelines, [
	    	'contain' => 'Videos'
	    ]);
        $this->set(
        	compact(
        		'timelines'
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
		if (!$this->Timeline->exists($id)) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		$options = array('conditions' => array('Timeline.' . $this->Timeline->primaryKey => $id));
		$this->set('timeline', $this->Timeline->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$timeline = $this->Timelines->newEntity();

		if($this->request->is('post')) {
            $timeline = $this->Timelines->patchEntity($timeline, $this->request->getData());

            if($this->Timelines->save($timeline)) {
                $this->Flash->success(__('Your timeline has been saved.'));
                return $this->redirect(['action' => 'adminAdd']);
            }
            $this->Flash->error(__('Unable to add your timeline.'));
        }
        $this->set('timeline', $timeline);
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
		if (!$this->Timeline->exists($id)) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Timeline->save($this->request->data)) {
				$this->Session->setFlash(__('The timeline has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timeline could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Timeline.' . $this->Timeline->primaryKey => $id));
			$this->request->data = $this->Timeline->find('first', $options);
		}
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
		$this->Timeline->id = $id;
		if (!$this->Timeline->exists()) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Timeline->delete()) {
			$this->Session->setFlash(__('The timeline has been deleted.'));
		} else {
			$this->Session->setFlash(__('The timeline could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
