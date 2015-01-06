<?php
App::uses('TrainingManagerAppController', 'TrainingManager.Controller');
/**
 * Scores Controller
 *
 * @property Score $Score
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ScoresController extends TrainingManagerAppController {

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
		$this->Score->recursive = 0;
		$this->set('scores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Score->exists($id)) {
			throw new NotFoundException(__('Invalid score'));
		}
		$options = array('conditions' => array('Score.' . $this->Score->primaryKey => $id));
		$this->set('score', $this->Score->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Score->create();
			if ($this->Score->save($this->request->data)) {
				$this->Session->setFlash(__('The score has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The score could not be saved. Please, try again.'));
			}
		}
		$trainings = $this->Score->Training->find('list');
		$users = $this->Score->User->find('list');
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
		if (!$this->Score->exists($id)) {
			throw new NotFoundException(__('Invalid score'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Score->save($this->request->data)) {
				$this->Session->setFlash(__('The score has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The score could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Score.' . $this->Score->primaryKey => $id));
			$this->request->data = $this->Score->find('first', $options);
		}
		$trainings = $this->Score->Training->find('list');
		$users = $this->Score->User->find('list');
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
		$this->Score->id = $id;
		if (!$this->Score->exists()) {
			throw new NotFoundException(__('Invalid score'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Score->delete()) {
			$this->Session->setFlash(__('The score has been deleted.'));
		} else {
			$this->Session->setFlash(__('The score could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Score->recursive = 0;
		$this->set('scores', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Score->exists($id)) {
			throw new NotFoundException(__('Invalid score'));
		}
		$options = array('conditions' => array('Score.' . $this->Score->primaryKey => $id));
		$this->set('score', $this->Score->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Score->create();
			if ($this->Score->save($this->request->data)) {
				$this->Session->setFlash(__('The score has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The score could not be saved. Please, try again.'));
			}
		}
		$trainings = $this->Score->Training->find('list');
		$users = $this->Score->User->find('list');
		$this->set(compact('trainings', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Score->exists($id)) {
			throw new NotFoundException(__('Invalid score'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Score->save($this->request->data)) {
				$this->Session->setFlash(__('The score has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The score could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Score.' . $this->Score->primaryKey => $id));
			$this->request->data = $this->Score->find('first', $options);
		}
		$trainings = $this->Score->Training->find('list');
		$users = $this->Score->User->find('list');
		$this->set(compact('trainings', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Score->id = $id;
		if (!$this->Score->exists()) {
			throw new NotFoundException(__('Invalid score'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Score->delete()) {
			$this->Session->setFlash(__('The score has been deleted.'));
		} else {
			$this->Session->setFlash(__('The score could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
