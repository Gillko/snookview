<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Sessions Controller
 *
 * @property Session $Session
 */
class SessionsController extends AppController {

	/*Pagination*/
	public $paginate = [
		'limit' => 25,
		'order' => [
			'Sessions.session_id' => 'asc'
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
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function adminEdit($id = null) {
		$this->viewBuilder()->setLayout('layout_back');

		$session = $this->Sessions->get($id, [
			'contain' => [
			]
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$session = $this->Sessions->patchEntity($session, $this->request->data);
			
			if ($this->Sessions->save($session)) {
				$this->Flash->success(__('The session has been updated.'));

				return $this->redirect(['action' => 'adminIndex']);
			} else {
				$this->Flash->error(__('The session could not be saved. Please, try again.'));
			}
		}
		$this->set(
			compact(
				'session'
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

		$sessions = $this->paginate($this->Sessions);
		
		$this->set(
			compact(
				'sessions'
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
		
		if (!$this->Sessions->exists($id)) {
			throw new NotFoundException(__('Invalid session'));
		}
		
		$session = $this->Sessions->get($id);
		
		$this->set(
			compact(
				'session'
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

		$session = $this->Sessions->newEntity();

		if($this->request->is('post')) {
			$session = $this->Sessions->patchEntity($session, $this->request->getData());

			if($this->Sessions->save($session)) {
				$this->Flash->success(__('Your session has been saved.'));
				
				return $this->redirect(['action' => 'adminAdd']);
			}
			$this->Flash->error(__('Unable to add your session.'));
		}
		$this->set(
			'session', $session
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

		$session = $this->Sessions->get($id);
		
		if ($this->Sessions->delete($session)) {
			$this->Flash->success(__('The session with id: {0} has been deleted.', h($id)));
			
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}