<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Timelines Controller
 *
 * @property Timeline $Timeline
 */
class TimelinesController extends AppController {

	/*Pagination*/
	public $paginate = [
		'limit' => 25,
		'order' => [
			'Timelines.timeline_id' => 'desc'
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
	 * admin_index method
	 *
	 * @return void
	 */
	public function adminIndex() {
		$this->viewBuilder()->setLayout('layout_back');

		$timelines = $this->paginate(
			$this->Timelines, [
				'contain' => 'Videos'
			]
		);

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
	public function adminView($id = null) {
		$this->viewBuilder()->setLayout('layout_back');

		if (!$this->Timelines->exists($id)) {
			throw new NotFoundException(__('Invalid timeline'));
		}
		
		$timeline = $this->Timelines->get(
			$id, [
				'contain' => [
					'Videos'
				]
			]
		);
		
		$this->set(
			compact(
				'timeline'
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

		$timeline = $this->Timelines->newEntity();

		if($this->request->is('post')) {
			$timeline = $this->Timelines->patchEntity($timeline, $this->request->getData());

			if($this->Timelines->save($timeline)) {
				$this->Flash->success(__('Your timeline has been saved.'));

				return $this->redirect(['action' => 'adminAdd']);
			}
			$this->Flash->error(__('Unable to add your timeline.'));
		}
		$this->set(
			'timeline', $timeline
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

		$timeline = $this->Timelines->get(
			$id, [
				'contain' => [
					'Videos'
				]
			]
		);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$timeline = $this->Timelines->patchEntity($timeline, $this->request->data);

			if ($this->Timelines->save($timeline)) {
				$this->Flash->success(__('The timeline has been updated.'));

				return $this->redirect(['action' => 'adminIndex']);
			} else {
				$this->Flash->error(__('The timeline could not be updated. Please, try again.'));
			}
		}
		$this->set(
			compact(
				'timeline'
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

		$timeline = $this->Timelines->get($id);
		
		if ($this->Timelines->delete($timeline)) {
			$this->Flash->success(__('The timeline with id: {0} has been deleted.', h($id)));

			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}