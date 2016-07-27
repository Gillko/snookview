<?php
App::uses('AppController', 'Controller');
/**
 * Tournaments Controller
 *
 * @property Tournament $Tournament
 * @property PaginatorComponent $Paginator
 */
class TournamentsController extends AppController {

public function beforeFilter() {
	$this->Auth->allow('index', 'uk', 'tm', 'wc', 'view');
	$this->set('logged_in', $this->Auth->loggedIn());
	$this->set('current_user', $this->Auth->user());
}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layout_front';
		$this->Tournament->recursive = 1;
		$options['joins'] = array(
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
	        'order' => array('Tournament.tournament_id' => 'DESC')
	    );

		$this->set('tournaments', $this->Paginator->paginate());
	}

	public function uk() {
		$this->layout = 'layout_front';
		$this->Tournament->recursive = 1;
		$options['joins'] = array(
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

		$this->set('tournaments', $this->Paginator->paginate());
	}

	public function tm() {
		$this->layout = 'layout_front';
		$this->Tournament->recursive = 1;
		$options['joins'] = array(
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

		$this->set('tournaments', $this->Paginator->paginate());
	}

	public function wc() {
		$this->layout = 'layout_front';
		$this->Tournament->recursive = 1;
		$options['joins'] = array(
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

		$this->set('tournaments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('Video', 'Player');

		$this->layout = 'layout_front';
		if (!$this->Tournament->exists($id)) {
			throw new NotFoundException(__('Invalid tournament'));
		}
		$options = array('conditions' => array('Tournament.' . $this->Tournament->primaryKey => $id));
		$this->set('tournament', $this->Tournament->find('first', $options));

		$videosFinal = $this->Tournament->Video->find('all', array('conditions' => array('Round.round_name' => 'Final', 'Video.video_part' => 'Part One','Tournament.' . $this->Tournament->primaryKey => $id)));
		$videosSemi = $this->Tournament->Video->find('all', array('conditions' => array('Round.round_name' => 'Semi Finals', 'Video.video_part' => 'Part One', 'Tournament.' . $this->Tournament->primaryKey => $id)));
		$videosQuarter = $this->Tournament->Video->find('all', array('conditions' => array('Round.round_name' => 'Quarter Finals', 'Video.video_part' => 'Part One', 'Tournament.' . $this->Tournament->primaryKey => $id)));
		$videosLast16 = $this->Tournament->Video->find('all', array('conditions' => array('Round.round_name' => 'Last 16', 'Video.video_part' => 'Part One', 'Tournament.' . $this->Tournament->primaryKey => $id)));
		$videosThirdRound = $this->Tournament->Video->find('all', array('conditions' => array('Round.round_name' => 'Third Round', 'Video.video_part' => 'Part One', 'Tournament.' . $this->Tournament->primaryKey => $id)));
		$videosSecondRound = $this->Tournament->Video->find('all', array('conditions' => array('Round.round_name' => 'Second Round', 'Video.video_part' => 'Part One', 'Tournament.' . $this->Tournament->primaryKey => $id)));
		$videosFirstRound = $this->Tournament->Video->find('all', array('conditions' => array('Round.round_name' => 'First Round', 'Video.video_part' => 'Part One', 'Tournament.' . $this->Tournament->primaryKey => $id)));

		$videosHighlights = $this->Tournament->Video->find('all', array('conditions' => array('Video.video_part' => 'Highlights', 'Tournament.' . $this->Tournament->primaryKey => $id)));
		$videosExtra = $this->Tournament->Video->find('all', array('conditions' => array('Video.video_part' => 'Extra', 'Tournament.' . $this->Tournament->primaryKey => $id)));

		//$players = $this->Tournament->Video->Player->find('all', array('conditions' => array('Video.tournament_id' => $id)));
		//$this->set(compact('players'));
		$this->set(compact('videosFinal', 'videosSemi', 'videosQuarter',  'videosLast16', 'videosFirstRound', 'videosSecondRound', 'videosThirdRound', 'videosHighlights', 'videosExtra'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->layout = 'layout_back';
		$this->Tournament->recursive = 0;
		$this->paginate = array( 
	        'order' => array('Tournament.tournament_id' => 'DESC')
	    );
		$this->set('tournaments', $this->Paginator->paginate());
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
	public function admin_add() {
		$this->layout = 'layout_back';
		if ($this->request->is('post')) {
			$this->Tournament->create();
			if ($this->Tournament->save($this->request->data)) {
				$this->Session->setFlash(__('The tournament has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tournament could not be saved. Please, try again.'));
			}
		}
		$tournaments = $this->Tournament->find('list');
		$rounds = $this->Tournament->Round->find('list');
		$this->set(compact('tournaments', 'rounds'));

		$lastTournamentID = $this->Tournament->find('first', array('order' =>array('Tournament.tournament_id DESC')));
		$this->set(compact('lastTournamentID'));
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
