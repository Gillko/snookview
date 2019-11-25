<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Rankings Controller
 *
 * @property Ranking $Ranking
 */
class RankingsController extends AppController {

	/*Pagination*/
	public $paginate = [
		'limit' => 25,
		'order' => [
			'Rankings.ranking_id' => 'desc'
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
				'index',
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

		$this->paginate = [
			'contain' => [
				'Players'
			],
			'order' => [
				'Rankings.ranking_rank' => 'asc'
			],
			'maxLimit' => 200,
			'limit' => 200,
			'conditions' => [
				'Rankings.season_id' => 4
			]
		];

		$rankings = $this->paginate(
			$this->Rankings->find('all')
		); 
		
		$this->set(
			compact(
				'rankings'
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
		
		$rankings = $this->paginate($this->Rankings, [
			'contain' => [
				'Players',
				'Seasons'
			]
		]);
		
		$this->set(
			compact(
				'rankings'
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
		
		if (!$this->Rankings->exists($id)) {
			throw new NotFoundException(__('Invalid ranking'));
		}
		
		$ranking = $this->Rankings->get($id, [
			'contain' => [
				'Players',
				'Seasons'
			]
		]);
		
		$this->set(
			compact('ranking')
		);
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$players 
		= $this->Rankings->Players->find(
			'list', [
				'keyField' => 'player_id',
				'valueField' => function ($row) {
					return $row['player_firstname'] . ' ' . $row['player_surname'];
				},
				'order' => [
					'Players.player_firstname' => 'asc'
				]
			]
		);

		$seasons 
		= $this->Rankings->Seasons->find(
			'list', [
				'keyField' => 'season_id',
				'valueField' => function ($row) {
					return $row['season_beginYear'] . ' ' . $row['season_endYear'];
				}
			]
		);

		$this->set(
			compact(
				'players',
				'seasons'
			)
		);

		$ranking = $this->Rankings->newEntity();

		if($this->request->is('post')) {
			$ranking = $this->Rankings->patchEntity($ranking, $this->request->getData());

			if($this->Rankings->save($ranking)) {
				$this->Flash->success(__('Your ranking has been saved.', ['id' => 'flashMessage']));
				return $this->redirect(['action' => 'adminAdd']);
			}

			$this->Flash->error(__('Unable to add your ranking.'));
		}
		$this->set(
			'ranking', $ranking
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

		$ranking = $this->Rankings->get($id, [
			'contain' => [
				'Players',
				'Seasons'
			]
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$ranking = $this->Rankings->patchEntity($ranking, $this->request->data);
			
			if ($this->Rankings->save($ranking)) {
				$this->Flash->success(__('The ranking has been updated.'));

				return $this->redirect(['action' => 'adminIndex']);
			} else {
				$this->Flash->error(__('The ranking could not be updated. Please, try again.'));
			}
		}
		$this->set(compact('ranking'));
		
		$players 
		= $this->Rankings->Players->find(
			'list', [
				'keyField' => 'player_id',
				'valueField' => function ($row) {
					return $row['player_firstname'] . ' ' . $row['player_surname'];
				},
				'order' => [
					'Players.player_firstname' => 'asc'
				]
			]
		);

		$seasons 
		= $this->Rankings->Seasons->find(
			'list', [
				'keyField' => 'season_id',
				'valueField' => function ($row) {
					return $row['season_beginYear'] . ' ' . $row['season_endYear'];
				},
				'order' => [
					'Seasons.season_id' => 'asc'
				]
			]
		);
		
		$this->set(
			compact(
				'rankings',
				'players',
				'seasons'
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

		$ranking = $this->Rankings->get($id);
		
		if ($this->Rankings->delete($ranking)) {
			$this->Flash->success(__('The ranking with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}