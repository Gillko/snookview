<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Items Controller
 *
 * @property Item $Item
 */
class ItemsController extends AppController {

	/*Pagination*/
	public $paginate = [
        'limit' => 25,
        'order' => [
            'Items.item_id' => 'desc'
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
				'adminAdd',
				'edit',
				'adminIndex'
			]
		);
		//$this->set('logged_in', $this->Auth->loggedIn());
		//$this->set('current_user', $this->Auth->user());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'layout_front';
		if ($this->request->is('post')) {
			$this->Item->create();
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		}
		$timelines = $this->Item->Timeline->find('list', array('order' => array('Timeline.timeline_id' => 'desc')));
		$this->set(compact('timelines'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function adminIndex() {
		/*$this->layout = 'layout_back';
		$this->Item->recursive = 1;

		$this->paginate = array( 
	        'order' => array('Item.item_id' => 'DESC')
	    );

	    $this->set('items', $this->Paginator->paginate());*/

	    $this->viewBuilder()->setLayout('layout_back');
	    $items = $this->paginate($this->Items, [
	    	'contain' => [
	    		'Timelines'
	    	]
	    ]);
        $this->set(
        	compact(
        		'items'
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
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('item', $this->Item->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function adminAdd() {

		$this->viewBuilder()->setLayout('layout_back');


		//$this->layout = 'layout_back';
		/*if ($this->request->is('post')) {
			$this->Item->create();
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		}
		$parts = array('part-one' => 'part-one', 'part-two' => 'part-two', 'part-three' => 'part-three', 'part-four' => 'part-four', 'part-five' => 'part-five', 'part-six' => 'part-six', 'part-seven' => 'part-seven', 'part-eight' => 'part-eight', 'part-nine' => 'part-nine', 'part-ten' => 'part-ten', 'part-eleven' => 'part-eleven', 'part-twelve' => 'part-twelve', 'part-thirteen' => 'part-thirteen', 'part-fourteen' => 'part-fourteen', 'part-fifteen' => 'part-fifteen', 'part-sixteen' => 'part-sixteen', 'part-seventeen' => 'part-seventeen', 'part-eighteen' => 'part-eighteen', 'part-nineteen' => 'part-nineteen', 'part-twenty' => 'part-twenty', 'part-twenty-one' => 'part-twenty-one', 'part-twenty-two' => 'part-twenty-two', 'part-twenty-three' => 'part-twenty-three', 'part-twenty-four' => 'part-twenty-four', 'part-twenty-five' => 'part-twenty-five', 'part-twenty-six' => 'part-twenty-six', 'part-twenty-seven' => 'part-twenty-seven', 'part-twenty-eight' => 'part-twenty-eight', 'part-twenty-nine' => 'part-twenty-nine', 'part-thirty' => 'part-thirty');
		$timelines = $this->Item->Timeline->find('list', array('order' => array('Timeline.timeline_id' => 'desc')));
		$players = $this->Item->Player->find('list', array('order' => array('Player.player_firstname' => 'asc')));
		$this->set(compact('timelines', 'players', 'parts'));*/

		$players 
		= $this->Items->Players->find(
			'list', array(
				'keyField' => 'player_id',
				'valueField' => function ($row) {
            		return $row['player_firstname'] . ' ' . $row['player_surname'];
        		},
				'order' => array(
						'Players.player_firstname' => 'asc'
				)
			)
		);

		$timelines 
		= $this->Items->Timelines->find(
			'list', array(
				'valueField' => [
					'timeline_title'
				],
				'order' => array(
					'Timelines.timeline_id' => 'desc'
				)
			)
		);

		$this->set(
			compact(
				'timelines',
				'players'
			)
		);

		$item = $this->Items->newEntity();

		if($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->getData());

            if($this->Items->save($item)) {
                $this->Flash->success(__('Your item has been saved.', ['id' => 'flashMessage']));
                return $this->redirect(['action' => 'adminAdd']);
            }
            $this->Flash->error(__('Unable to add your item.'));
        }
        $this->set('item', $item);
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->viewBuilder()->setLayout('layout_back');
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		$parts = array('part-one' => 'part-one', 'part-two' => 'part-two', 'part-three' => 'part-three', 'part-four' => 'part-four', 'part-five' => 'part-five', 'part-six' => 'part-six', 'part-seven' => 'part-seven', 'part-eight' => 'part-eight', 'part-nine' => 'part-nine', 'part-ten' => 'part-ten', 'part-eleven' => 'part-eleven', 'part-twelve' => 'part-twelve', 'part-thirteen' => 'part-thirteen', 'part-fourteen' => 'part-fourteen', 'part-fifteen' => 'part-fifteen', 'part-sixteen' => 'part-sixteen', 'part-seventeen' => 'part-seventeen', 'part-eighteen' => 'part-eighteen', 'part-nineteen' => 'part-nineteen', 'part-twenty' => 'part-twenty', 'part-twenty-one' => 'part-twenty-one', 'part-twenty-two' => 'part-twenty-two', 'part-twenty-three' => 'part-twenty-three', 'part-twenty-four' => 'part-twenty-four', 'part-twenty-five' => 'part-twenty-five', 'part-twenty-six' => 'part-twenty-six', 'part-twenty-seven' => 'part-twenty-seven', 'part-twenty-eight' => 'part-twenty-eight', 'part-twenty-nine' => 'part-twenty-nine', 'part-thirty' => 'part-thirty');
		$timelines = $this->Item->Timeline->find('list');
		$players = $this->Item->Player->find('list', array('order' => array('Player.player_firstname' => 'asc')));
		$this->set(compact('timelines', 'parts', 'players'));
	}

 /**
 * Edit method
 *
 * @param string|null $id Article id.
 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
 * @throws \Cake\Network\Exception\NotFoundException When record not found.
 */
	public function edit($id = null) {
		/*$this->viewBuilder()->setLayout('layout_back');
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		$parts = array('part-one' => 'part-one', 'part-two' => 'part-two', 'part-three' => 'part-three', 'part-four' => 'part-four', 'part-five' => 'part-five', 'part-six' => 'part-six', 'part-seven' => 'part-seven', 'part-eight' => 'part-eight', 'part-nine' => 'part-nine', 'part-ten' => 'part-ten', 'part-eleven' => 'part-eleven', 'part-twelve' => 'part-twelve', 'part-thirteen' => 'part-thirteen', 'part-fourteen' => 'part-fourteen', 'part-fifteen' => 'part-fifteen', 'part-sixteen' => 'part-sixteen', 'part-seventeen' => 'part-seventeen', 'part-eighteen' => 'part-eighteen', 'part-nineteen' => 'part-nineteen', 'part-twenty' => 'part-twenty', 'part-twenty-one' => 'part-twenty-one', 'part-twenty-two' => 'part-twenty-two', 'part-twenty-three' => 'part-twenty-three', 'part-twenty-four' => 'part-twenty-four', 'part-twenty-five' => 'part-twenty-five', 'part-twenty-six' => 'part-twenty-six', 'part-twenty-seven' => 'part-twenty-seven', 'part-twenty-eight' => 'part-twenty-eight', 'part-twenty-nine' => 'part-twenty-nine', 'part-thirty' => 'part-thirty');
		$timelines = $this->Item->Timeline->find('list');
		$players = $this->Item->Player->find('list', array('order' => array('Player.player_firstname' => 'asc')));
		$this->set(compact('timelines', 'parts', 'players'));*/


		$this->viewBuilder()->setLayout('layout_back');

        $item = $this->Items->get($id, [
            'contain' => [
            	'Players'
            ]
        ]);

        //debug($item);

        $idPlusOne = $id + 1;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been updated.'));
                return $this->redirect(['action' => 'edit/' . $idPlusOne]);
            } else {
                $this->Flash->error(__('The item could not be updated. Please, try again.'));
            }
        }

        $this->set(compact('item'));
        $this->set('_serialize', ['item']);


        //$this->set('_serialize', ['item']);

        /*$tournaments 
		= $this->Videos->Tournaments->find(
			'list', array(
				'valueField' => function ($row) {
            		return $row['tournament_name'] . ' ' . $row['tournament_year'];
        		},
				'order' => array(
					'Tournaments.tournament_id' => 'desc'
				)
			)
		);
		
		$rounds 
		= $this->Videos->Rounds->find(
			'list', array(
				'valueField' => [
					'round_name'
				],
				'order' => array(
					'Rounds.round_id' => 'desc'
				)
			)
		);*/
		
		$timelines 
		= $this->Items->Timelines->find(
			'list', array(
				'valueField' => [
					'timeline_title'
				],
				'order' => array(
					'Timelines.timeline_id' => 'desc'
				)
			)
		);
		
		/*$players 
		= $this->Videos->Players->find(
			'list', array(
				'keyField' => 'player_id',
				'valueField' => function ($row) {
            		return $row['player_firstname'] . ' ' . $row['player_surname'];
        		},
				'order' => array(
						'Players.player_firstname' => 'asc'
				)
			)
		);*/
		
		/*$parts 
		= array(
			'part-one' => 'part-one', 
			'part-two' => 'part-two', 
			'part-three' => 'part-three', 
			'part-four' => 'part-four', 
			'part-five' => 'part-five',
			'part-six' => 'part-six',
			'part-seven' => 'part-seven',
			'part-eight' => 'part-eight',
			'part-nine' => 'part-nine',
			'part-ten' => 'part-ten',
			'part-eleven' => 'part-eleven',
			'part-twelve' => 'part-twelve',
			'part-thirteen' => 'part-thirteen',
			'part-fourteen' => 'part-fourteen',
			'part-fifteen' => 'part-fifteen',
			'part-sixteen' => 'part-sixteen',
			'part-seventeen' => 'part-seventeen',
			'part-eighteen' => 'part-eighteen',
			'part-nineteen' => 'part-nineteen',
			'part-twenty' => 'part-twenty',
			'part-twenty-one' => 'part-twenty-one',
			'part-twenty-two' => 'part-twenty-two',
			'part-twenty-three' => 'part-twenty-three',
			'part-twenty-four' => 'part-twenty-four',
			'part-twenty-five' => 'part-twenty-five',
			'part-twenty-six' => 'part-twenty-six',
			'part-twenty-seven' => 'part-twenty-seven',
			'part-twenty-eight' => 'part-twenty-eight',
			'part-twenty-nine' => 'part-twenty-nine',
			'part-thirty' => 'part-thirty'
		);
*/
		$players 
		= $this->Items->Players->find(
			'list', array(
				'keyField' => 'player_id',
				'valueField' => function ($row) {
            		return $row['player_firstname'] . ' ' . $row['player_surname'];
        		},
				'order' => array(
						'Players.player_firstname' => 'asc'
				)
			)
		);

		foreach($item->players as $player){
			$playerSelect = $player['player_id'];
		}
		
		/*$sorts 
		= array(
			'Single' => 'Single', 
			'Playlist' => 'Playlist'
		);*/

		/*$lastVideoIDs 
		= $this->Videos->find(
			'all', array(
				'order' =>array(
					'Videos.video_id DESC'
				)
			)
		);

		$lastVideoID 
		= $lastVideoIDs->first();*/
		
		$this->set(
			compact(
				'items',
				'timelines',
				//'parts',
				'players'
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
	public function admin_delete($id = null) {
		$this->layout = 'layout_back';
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Item->delete()) {
			$this->Session->setFlash(__('The item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}