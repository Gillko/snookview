<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Utility\Security;
use Cake\Routing\Router;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Tournaments Controller
 *
 * @property Tournament $Tournament
 */
class TournamentsController extends AppController {

	/*Pagination*/
	public $paginate = [
		'limit' => 25,
		'order' => [
			'Tournaments.tournament_id' => 'desc'
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
				'tm',
				'uk',
				'wc',
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
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->viewBuilder()->setLayout('layout_front');

		$tournaments = $this->Tournaments->find('all')->contain([
			'Rounds'
		]);

		$tournaments->order(['Tournaments.tournament_id' => 'DESC']);

		$this->set(
			compact(
				'tournaments'
			)
		);
	}

	/**
	 * uk championship tournaments method
	 *
	 * @return void
	 */
	public function uk() {
		$this->viewBuilder()->setLayout('layout_front');

		$tournaments = $this->Tournaments->find('all')->contain(
			[
				'Rounds'
			]
		)
		->where(
			[
				'Tournaments.tournament_name' => 'UK Championship'
			]
		);

		$tournaments->order(
			[
				'Tournaments.tournament_id' => 'DESC'
			]
		);

		$this->set(
			compact(
				'tournaments'
			)
		);
	}

	/**
	 * the masters tournaments method
	 *
	 * @return void
	 */
	public function tm() {
		$this->viewBuilder()->setLayout('layout_front');

		$tournaments = $this->Tournaments->find('all')->contain(
			[
				'Rounds'
			]
		)
		->where(
			[
				'Tournaments.tournament_name' => 'The Masters'
			]
		);

		$tournaments->order(
			[
				'Tournaments.tournament_id' => 'DESC'
			]
		);

		$this->set(
			compact(
				'tournaments'
			)
		);
	}

	/**
	 * world championship tournaments method
	 *
	 * @return void
	 */
	public function wc() {
		$this->viewBuilder()->setLayout('layout_front');

		$tournaments = $this->Tournaments->find('all')->contain(
			[
				'Rounds'
			]
		)
		->where(
			[
				'Tournaments.tournament_name' => 'World Championship'
			]
		);

		$tournaments->order(
			[
				'Tournaments.tournament_id' => 'DESC'
			]
		);

		$this->set(
			compact(
				'tournaments'
			)
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
		$this->loadModel('Videos');
		$this->loadModel('Players');
		$this->loadModel('Rounds');

		$this->viewBuilder()->setLayout('layout_front');

		if (!$this->Tournaments->exists($id)) {
			throw new NotFoundException(__('Invalid tournament'));
		}

		$options = [
			'conditions' => [
				'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id
			]
		];

		$tournaments = $this->Tournaments->find('all', $options);
 
		$tournament = $tournaments->first();

		$rounds = $this->Tournaments->find('all', $options)->contain(
			[
				'Rounds'
			]
		);

		$videosFinal = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1, 2, 10],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
					'Rounds.round_name' => 'Final'
				]
			)
		;

		$videosSemi = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1, 2, 10],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
					'Rounds.round_name' => 'Semi Finals'
				]
			)
		;

		$videosQuarter = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1, 2, 10],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
					'Rounds.round_name' => 'Quarter Finals'
				]
			)
		;

		$videosLast16 = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1, 2, 10],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
					'Rounds.round_name' => 'Last 16'
				]
			)
		;

		$videosThirdRound = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1, 2, 10],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
					'Rounds.round_name' => 'Third Round'
				]
			)
		;

		$videosSecondRound = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1, 2, 10],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
					'Rounds.round_name' => 'Second Round'
				]
			)
		;

		$videosFirstRound = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players',
					'Sessions'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1, 2, 10],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
					'Rounds.round_name' => 'First Round'
				]
			)
		;

		$videosHighlights = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [7],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
				]
			)
		;

		$videosExtra = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [8],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
				]
			)
		;

		$this->set(
			compact(
				'videosFinal', 
				'videosSemi', 
				'videosQuarter',  
				'videosLast16', 
				'videosFirstRound', 
				'videosSecondRound', 
				'videosThirdRound', 
				'videosHighlights', 
				'videosExtra', 
				'tournaments'
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

		$tournaments = $this->paginate($this->Tournaments);
		
		$this->set(
			compact(
				'tournaments'
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
		
		if (!$this->Tournaments->exists($id)) {
			throw new NotFoundException(__('Invalid tournament'));
		}
		
		$tournament = $this->Tournaments->get(
			$id, [
				'contain' => [
					'Rounds',
					'Videos.Sessions',
					'Videos.Timelines',
					'Videos.Rounds',
				]
			]
		);

		$this->set(
			compact(
				'tournament'
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

		$tournaments 
		= $this->Tournaments->find(
			'list'
		);

		$rounds 
		= $this->Tournaments->Rounds->find(
			'list'
		);

		$lastTournamentIDs 
		= $this->Tournaments->find(
			'all', [
				'order' => [
					'Tournaments.tournament_id DESC'
				]
			]
		);

		$lastTournamentID 
		= $lastTournamentIDs->first();
		
		$this->set(
			compact(
				'tournaments',
				'rounds',
				'lastTournamentID'
			)
		);

		$tournament = $this->Tournaments->newEntity();

		if($this->request->is('post')) {
			$tournament = $this->Tournaments->patchEntity($tournament, $this->request->getData());
			
			$filename = $this->request->getData()['tournament_winner']['name'];
			
			$uploadpath = 'img/winners/';
			
			$uploadfile = $uploadpath . $filename; 

			if(move_uploaded_file($this->request->getData()['tournament_winner']['tmp_name'], $uploadfile)){
				$tournament->tournament_winner = $uploadfile;

				if($this->Tournaments->save($tournament)) {
					$this->Flash->success(__('Your tournament has been saved.', ['id' => 'flashMessage']));
					
					return $this->redirect(['action' => 'adminAdd']);
				}
			}	
			$this->Flash->error(__('Unable to add your tournament.'));
		}
		$this->set(
			'tournament', $tournament
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

		$tournament = $this->Tournaments->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$tournament = $this->Tournaments->patchEntity($tournament, $this->request->data);
			
			$filename = $this->request->getData()['tournament_winner']['name'];
			
			$uploadpath = 'img/winners/';
			
			$uploadfile = $uploadpath . $filename;

			if(move_uploaded_file($this->request->getData()['tournament_winner']['tmp_name'], $filename)){
				$tournament->tournament_winner = $filename;
			}
			
			if ($this->Tournaments->save($tournament)){
				$this->Flash->success(__('The tournament has been updated.'));
				
				return $this->redirect(['action' => 'adminIndex']);
			} else {
				$this->Flash->error(__('The tournament could not be updated. Please, try again.'));
			}
		}
		$this->set(
			compact(
				'tournament'
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
	public function adminDelete($id = null) {
		$this->request->allowMethod(['post', 'delete']);

		$tournament = $this->Tournaments->get($id);
		
		if ($this->Tournaments->delete($tournament)) {
			$this->Flash->success(__('The tournament with id: {0} has been deleted.', h($id)));
			
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}