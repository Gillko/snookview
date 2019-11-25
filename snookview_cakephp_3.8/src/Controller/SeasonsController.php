<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Seasons Controller
 *
 * @property Season $Season
 */
class SeasonsController extends AppController {

	/*Pagination*/
	public $paginate = [
		'limit' => 25,
		'order' => [
			'Seasons.season_id' => 'asc'
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
		
		$seasons = $this->paginate($this->Seasons);
		
		$this->set(
			compact(
				'seasons'
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
		
		if (!$this->Seasons->exists($id)) {
			throw new NotFoundException(__('Invalid season'));
		}
		
		$season = $this->Seasons->get($id, [
			'contain' => [
				'Rankings',
				'Rankings.Players'
			]
		]);
		
		$this->set(
			compact(
				'season'
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

		$season = $this->Seasons->newEntity();

		if($this->request->is('post')) {
			$season = $this->Seasons->patchEntity($season, $this->request->getData());

			if($this->Seasons->save($season)) {
				$this->Flash->success(__('Your season has been saved.'));

				return $this->redirect(['action' => 'adminAdd']);
			}
			$this->Flash->error(__('Unable to add your season.'));
		}
		$this->set(
			'season', $season
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

		$season = $this->Seasons->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$season = $this->Seasons->patchEntity($season, $this->request->data);
			
			if ($this->Seasons->save($season)) {
				$this->Flash->success(__('The season has been updated.'));
				
				return $this->redirect(['action' => 'adminIndex']);
			} else {
				$this->Flash->error(__('The season could not be updated. Please, try again.'));
			}
		}
		$this->set(
			compact(
				'season'
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

		$season = $this->Seasons->get($id);
		
		if ($this->Seasons->delete($season)) {
			$this->Flash->success(__('The season with id: {0} has been deleted.', h($id)));
			
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}