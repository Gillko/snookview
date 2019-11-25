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
	public function adminView($id = null) {
		$this->viewBuilder()->setLayout('layout_back');

		if (!$this->Items->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}

		$item = $this->Items->get($id, [
			'contain' => [
				'Timelines',
	    		'Players'
			]
		]);

        $this->set(compact('item'));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		$players 
		= $this->Items->Players->find(
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

		$timelines 
		= $this->Items->Timelines->find(
			'list', [
				'valueField' => [
					'timeline_title'
				],
				'order' => [
					'Timelines.timeline_id' => 'desc'
				]
			]
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
        $this->set(
        	'item', $item
        );
	}

	 /**
	 * admin edit method
	 *
	 * @param string|null $id Article id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function adminEdit($id = null) {
		$this->viewBuilder()->setLayout('layout_back');

        $item = $this->Items->get($id, [
            'contain' => [
            	'Players'
            ]
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->data);
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been updated.'));
                return $this->redirect(['action' => 'adminIndex']);
            } else {
                $this->Flash->error(__('The item could not be updated. Please, try again.'));
            }
        }

        $this->set(
        	compact(
        		'item'
        	)
        );
		
		$timelines 
		= $this->Items->Timelines->find(
			'list', [
				'valueField' => [
					'timeline_title'
				],
				'order' => [
					'Timelines.timeline_id' => 'desc'
				]
			]
		);
		
		$players 
		= $this->Items->Players->find(
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

		foreach($item->players as $player){
			$playerSelect = $player['player_id'];
		}
		
		$this->set(
			compact(
				'items',
				'timelines',
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
	public function adminDelete($id) {
		$this->request->allowMethod(['post', 'delete']);

		$item = $this->Items->get($id);

		if ($this->Items->delete($item)) {
			$this->Flash->success(__('The item with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'adminIndex']);
		}
	}
}