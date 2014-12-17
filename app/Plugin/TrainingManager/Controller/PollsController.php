<?php
App::uses('TrainingManagerAppController', 'TrainingManager.Controller');
/**
 * Polls Controller
 *
 * @property Poll $Poll
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PollsController extends TrainingManagerAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Poll->recursive = 0;
		$this->set('polls', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Poll->exists($id)) {
			throw new NotFoundException(__('Invalid poll'));
		}
		$options = array('conditions' => array('Poll.' . $this->Poll->primaryKey => $id));
		$this->set('poll', $this->Poll->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Poll->create();
			if ($this->Poll->save($this->request->data)) {
				$this->Session->setFlash(__('The poll has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.'));
			}
		}
		$trainings = $this->Poll->Training->find('list');
		$users = $this->Poll->User->find('list');
		$this->set(compact('trainings', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Poll->exists($id)) {
			throw new NotFoundException(__('Invalid poll'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Poll->save($this->request->data)) {
				$this->Session->setFlash(__('The poll has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Poll.' . $this->Poll->primaryKey => $id));
			$this->request->data = $this->Poll->find('first', $options);
		}
		$trainings = $this->Poll->Training->find('list');
		$users = $this->Poll->User->find('list');
		$this->set(compact('trainings', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Poll->id = $id;
		if (!$this->Poll->exists()) {
			throw new NotFoundException(__('Invalid poll'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Poll->delete()) {
			$this->Session->setFlash(__('The poll has been deleted.'));
		} else {
			$this->Session->setFlash(__('The poll could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
