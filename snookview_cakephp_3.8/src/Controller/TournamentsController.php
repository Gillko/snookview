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
 * @property PaginatorComponent $Paginator
 */
class TournamentsController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Tournaments.tournament_id' => 'desc'
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
				'index', 
				'adminAdd',
				'uk',
				'tm',
				'wc',
				'view',
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
		
		//$this->Tournament->recursive = 1;
		
		/*$options['joins'] = array(
		    array('table' => 'rounds_tournaments',
		        'alias' => 'RoundsTournament',
		        'type' => 'inner',
		        'conditions' => array(
		            'Tournaments.tournament_id = RoundsTournament.tournament_id'
		        )
		    ),
		    array('table' => 'rounds',
		        'alias' => 'Round',
		        'type' => 'inner',
		        'conditions' => array(
		            'RoundsTournament.round_id = Rounds.round_id'
		        )
		    )
		);

		$this->paginate = array( 
	        'order' => array('Tournaments.tournament_id' => 'DESC')
	    );*/

		//$this->set('tournaments', $this->Paginator->paginate());

		$this->viewBuilder()->setLayout('layout_front');

		$tournaments = $this->Tournaments->find('all')->contain([
			'Rounds'
		]);

		$tournaments->order(['Tournaments.tournament_id' => 'DESC']);

		$this->set(compact('tournaments'));
	}

	public function uk() {
		$this->viewBuilder()->setLayout('layout_front');
		//$this->Tournament->recursive = 1;

		$tournaments = $this->Tournaments->find('all')->contain([
			'Rounds'
		])
		->where(['Tournaments.tournament_name' => 'UK Championship'])
		;

		$tournaments->order(['Tournaments.tournament_id' => 'DESC']);

		$this->set(compact('tournaments'));


		/*$options['joins'] = array(
		    array('table' => 'rounds_tournaments',
		        'alias' => 'RoundsTournament',
		        'type' => 'inner',
		        'conditions' => array(
		            'Tournament.tournament_id = RoundsTournament.tournament_id'
		        )
		    ),
		    array('table' => 'rounds',
		        'alias' => 'Round',
		        'type' => 'inner',
		        'conditions' => array(
		            'RoundsTournament.round_id = Round.round_id'
		        )
		    )
		);

		$this->paginate = array(
	        'order' => array('Tournament.tournament_id' => 'DESC'),
	        'conditions' => array('Tournament.tournament_name' => 'UK Championship')
	    );

		$this->set('tournaments', $this->Paginator->paginate());*/
	}

	public function tm() {
		$this->viewBuilder()->setLayout('layout_front');
		//$this->Tournament->recursive = 1;
		/*$options['joins'] = array(
		    array('table' => 'rounds_tournaments',
		        'alias' => 'RoundsTournament',
		        'type' => 'inner',
		        'conditions' => array(
		            'Tournament.tournament_id = RoundsTournament.tournament_id'
		        )
		    ),
		    array('table' => 'rounds',
		        'alias' => 'Round',
		        'type' => 'inner',
		        'conditions' => array(
		            'RoundsTournament.round_id = Round.round_id'
		        )
		    )
		);

		$this->paginate = array(
	        'order' => array('Tournament.tournament_id' => 'DESC'),
	        'conditions' => array('Tournament.tournament_name' => 'The Masters')
	    );

		$this->set('tournaments', $this->Paginator->paginate());*/

		$tournaments = $this->Tournaments->find('all')->contain([
			'Rounds'
		])
		->where(['Tournaments.tournament_name' => 'The Masters'])
		;

		$tournaments->order(['Tournaments.tournament_id' => 'DESC']);

		$this->set(compact('tournaments'));
	}

	public function wc() {
		$this->viewBuilder()->setLayout('layout_front');
		//$this->Tournament->recursive = 1;
		/*$options['joins'] = array(
		    array('table' => 'rounds_tournaments',
		        'alias' => 'RoundsTournament',
		        'type' => 'inner',
		        'conditions' => array(
		            'Tournament.tournament_id = RoundsTournament.tournament_id'
		        )
		    ),
		    array('table' => 'rounds',
		        'alias' => 'Round',
		        'type' => 'inner',
		        'conditions' => array(
		            'RoundsTournament.round_id = Round.round_id'
		        )
		    )
		);

		$this->paginate = array(
	        'order' => array('Tournament.tournament_id' => 'DESC'),
	        'conditions' => array('Tournament.tournament_name' => 'World Championship')
	    );

		$this->set('tournaments', $this->Paginator->paginate());*/

		$tournaments = $this->Tournaments->find('all')->contain([
			'Rounds'
		])
		->where(['Tournaments.tournament_name' => 'World Championship'])
		;

		$tournaments->order(['Tournaments.tournament_id' => 'DESC']);

		$this->set(compact('tournaments'));
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


		/*$optionsTwo = [
			'conditions' => [
				'Rounds.' . $this->Tournaments->getPrimaryKey() => $id
			]
		];*/



		$rounds = $this->Tournaments->find('all', $options)->contain([
			'Rounds'
		]);

		foreach($rounds as $round){
		//$round = $rounds->first();

		//debug($round);
		}

		

		//$this->set('tournament', $this->Tournaments->find('first', $options));

		/*$videosFinalConditions = [
			'conditions' => [
				'Rounds.round_name' => 'Final',
				'Videos.video_part' => 'Part One',
				'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id
			]
		];*/

		//$videosFinal = $this->Tournaments->Videos->find('all', $videosFinalConditions);

		$videosFinal = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1,2,10],
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
					'Videos.session_id IN' => [1,2,10],
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
					'Videos.session_id IN' => [1,2,10],
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
					'Videos.session_id IN' => [1,2,10],
					'Videos.' . $this->Tournaments->getPrimaryKey() => $id,
					'Rounds.round_name' => 'Last 16'
				]
			)
		;

		//echo $videoLast16 - 1 ;

		/*foreach($videosLast16 as $videoLast16){
			debug($videoLast16);
			echo $videoLast16;
		}*/

		$videosThirdRound = $this->Tournaments->Videos->find('all')
			->contain(
				[
					'Rounds',
					'Players'
				]
			)
			->where(
				[
					'Videos.session_id IN' => [1,2,10],
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
					'Videos.session_id IN' => [1,2,10],
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
					'Videos.session_id IN' => [1,2,10],
					/*'Videos.session_id' => 2,
					'Videos.session_id' => 10,*/
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
					//'Rounds.round_name' => 'Highlights'
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
					//'Rounds.round_name' => 'Extra'
				]
			)
		;


		/*foreach($videosSemis as $videosSemi){

			debug($videosSemi);

		}*/

		/*$videosQuarter = $this->Tournaments->Videos->find('all', array('conditions' => array('Rounds.round_name' => 'Quarter Finals', 'Videos.video_part' => 'Part One', 'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id)));
		$videosLast16 = $this->Tournaments->Videos->find('all', array('conditions' => array('Rounds.round_name' => 'Last 16', 'Videos.video_part' => 'Part One', 'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id)));
		$videosThirdRound = $this->Tournaments->Videos->find('all', array('conditions' => array('Rounds.round_name' => 'Third Round', 'Videos.video_part' => 'Part One', 'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id)));
		$videosSecondRound = $this->Tournaments->Videos->find('all', array('conditions' => array('Rounds.round_name' => 'Second Round', 'Videos.video_part' => 'Part One', 'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id)));
		$videosFirstRound = $this->Tournaments->Videos->find('all', array('conditions' => array('Rounds.round_name' => 'First Round', 'Videos.video_part' => 'Part One', 'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id)));

		$videosHighlights = $this->Tournaments->Videos->find('all', array('conditions' => array('Videos.video_part' => 'Highlights', 'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id)));
		$videosExtra = $this->Tournaments->Videos->find('all', array('conditions' => array('Videos.video_part' => 'Extra', 'Tournaments.' . $this->Tournaments->getPrimaryKey() => $id)));*/

		//$players = $this->Tournament->Video->Player->find('all', array('conditions' => array('Video.tournament_id' => $id)));
		//$this->set(compact('players'));
		$this->set(compact('videosFinal', 'videosSemi', 'videosQuarter',  'videosLast16', 'videosFirstRound', 'videosSecondRound', 'videosThirdRound', 'videosHighlights', 'videosExtra', 'tournaments'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function adminIndex() {
		/*$this->layout = 'layout_back';
		$this->Tournament->recursive = 0;
		$this->paginate = array( 
	        'order' => array('Tournament.tournament_id' => 'DESC')
	    );
		$this->set('tournaments', $this->Paginator->paginate());*/

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
	public function admin_view($id = null) {
		$this->layout = 'layout_back';
		if (!$this->Tournament->exists($id)) {
			throw new NotFoundException(__('Invalid tournament'));
		}
		$options = array('conditions' => array('Tournament.' . $this->Tournament->primaryKey => $id));
		$this->set('tournament', $this->Tournament->find('first', $options));
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
			'all', array(
				'order' =>array(
					'Tournaments.tournament_id DESC'
				)
			)
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
			//$fileBasename = $filename['basename'];
			//$fileExtension = substr(strrchr($filename, "."), 1);
			$uploadpath = 'img/winners/';
			$uploadfile = $uploadpath . $filename; 
			//$uploadfile = $uploadpath . $fileBasename.Security::hash($filename). "." .$fileExtension;

			if(move_uploaded_file($this->request->getData()['tournament_winner']['tmp_name'], $uploadfile)){
				$tournament->tournament_winner = $uploadfile;

				if($this->Tournaments->save($tournament)) {
					$this->Flash->success(__('Your tournament has been saved.', ['id' => 'flashMessage']));
					return $this->redirect(['action' => 'adminAdd']);
				}
			}	
			$this->Flash->error(__('Unable to add your tournament.'));
		}
        $this->set('tournament', $tournament);
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
		if (!$this->Tournament->exists($id)) {
			throw new NotFoundException(__('Invalid tournament'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tournament->save($this->request->data)) {
				$this->Session->setFlash(__('The tournament has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tournament could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tournament.' . $this->Tournament->primaryKey => $id));
			$this->request->data = $this->Tournament->find('first', $options);
		}
		$tournaments = $this->Tournament->find('list');
		$rounds = $this->Tournament->Round->find('list');
		$this->set(compact('tournaments', 'rounds'));
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
		$this->Tournament->id = $id;
		if (!$this->Tournament->exists()) {
			throw new NotFoundException(__('Invalid tournament'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tournament->delete()) {
			$this->Session->setFlash(__('The tournament has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tournament could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
