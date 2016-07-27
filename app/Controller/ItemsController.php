<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

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
	public function admin_index() {
		$this->layout = 'layout_back';
		$this->Item->recursive = 1;

		$this->paginate = array( 
	        'order' => array('Item.item_id' => 'DESC')
	    );

	    $this->set('items', $this->Paginator->paginate());
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
	public function admin_add() {
		$this->layout = 'layout_back';
		if ($this->request->is('post')) {
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
		$this->set(compact('timelines', 'players', 'parts'));
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