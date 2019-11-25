<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Comments Controller
 *
 * @property Round $Round
 */
class RoundsController extends AppController {

	/*Pagination*/
	public $paginate = [
		'limit' => 25,
		'order' => [
			'Rounds.round_id' => 'desc'
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
				/*'adminAdd',
				'adminEdit',
				'adminIndex',
				'adminView',
				'adminDelete'*/
			]
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
		$this->viewBuilder()->setLayout('layout_front');
		
		$this->loadModel('Videos');
		$this->loadModel('Tournaments');
		
		
		if (!$this->Rounds->exists($id)) {
			throw new NotFoundException(__('Invalid round'));
		}

		$options = [
			'conditions' => [
				'Rounds.' . $this->Rounds->getPrimaryKey() => $id
			]
		];

		$rounds = $this->Rounds->find('all', $options)
			->contain([
				//'Tournaments.Videos',
				'Tournaments'
			])
		;

		$round = $rounds->first();

		$optionsVideos = [
			'conditions' => [
				'Videos.round_id' => $id, 
				'Videos.session_id IN' => [1,2,10]
			]
		];

		$videos = $this->Rounds->Tournaments->Videos->find('all', $optionsVideos)
			->contain([
				'Players'
			])
			->where([
				'Videos.round_id' => $id
			])
		;

		$this->set(
			compact(
				'rounds', 
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
		
		$rounds = $this->paginate($this->Rounds, [
			'contain' => [
				'Tournaments'
			]
		]);
		
		$this->set(
			compact(
				'rounds'
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
		
		if (!$this->Rounds->exists($id)) {
			throw new NotFoundException(__('Invalid round'));
		}
		
		$round = $this->Rounds->get($id, [
			'contain' => [
				'Tournaments'
			]
		]);
		
		$this->set(compact('round'));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$tournaments 
		= $this->Rounds->Tournaments->find(
			'list', [
				'keyField' => 'tournament_id',
				'valueField' => function ($row) {
					return $row['tournament_name'] . ' ' . $row['tournament_year'];
				},
				'order' => [
					'Tournaments.tournament_id' => 'desc'
				]
			]
		);

		$lastRoundIDs 
			= $this->Rounds->find(
				'all', [
					'order' => [
						'Rounds.round_id DESC'
					]
				]
			);

		$lastRoundID 
		= $lastRoundIDs->first();

		$this->set(
			compact(
				'tournaments',
				'lastRoundID'
			)
		);

		$round = $this->Rounds->newEntity();

		if($this->request->is('post')) {
			$round = $this->Rounds->patchEntity($round, $this->request->getData());

			if($this->Rounds->save($round)) {
				$this->Flash->success(__('Your round has been saved.', ['id' => 'flashMessage']));
				return $this->redirect(['action' => 'adminAdd']);
			}
			
			$this->Flash->error(__('Unable to add your round.'));
		}
		$this->set(
			'round', $round
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

		$round = $this->Rounds->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$round = $this->Rounds->patchEntity($round, $this->request->data);
			
			if ($this->Rounds->save($round)) {
				$this->Flash->success(__('The round has been updated.'));
				return $this->redirect(['action' => 'adminIndex']);
			} else {
				$this->Flash->error(__('The round could not be updated. Please, try again.'));
			}
		}
		$this->set(compact('round'));

		$tournaments 
		= $this->Rounds->Tournaments->find(
			'list', [
				'valueField' => function ($row) {
					return $row['tournament_name'] . ' ' . $row['tournament_year'];
				}
			]
		);
		
		$this->set(
			compact(
				'tournaments'
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

		$round = $this->Rounds->get($id);
		
		if ($this->Rounds->delete($round)) {
			$this->Flash->success(__('The round with id: {0} has been deleted.', h($id)));
			
			return $this->redirect(['action' => 'adminIndex']);
		}
	}}
