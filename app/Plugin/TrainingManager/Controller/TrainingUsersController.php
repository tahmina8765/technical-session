<?php

App::uses('TrainingManagerAppController', 'TrainingManager.Controller');

/**
 * TrainingUsers Controller
 *
 * @property TrainingUser $TrainingUser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TrainingUsersController extends TrainingManagerAppController
{

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
    public function index()
    {
        $this->TrainingUser->recursive = 0;
        $this->set('trainingUsers', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->TrainingUser->exists($id)) {
            throw new NotFoundException(__('Invalid training user'));
        }
        $options = array('conditions' => array('TrainingUser.' . $this->TrainingUser->primaryKey => $id));
        $this->set('trainingUser', $this->TrainingUser->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {            
            $this->TrainingUser->create();
            if ($this->TrainingUser->save($this->request->data)) {
                $this->Session->setFlash(__('The training user has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Session->setFlash(__('The training user could not be saved. Please, try again.'));
            }
        }
        $TrainingUsers = $this->TrainingUser->find('list', array(
            'fields' => 'TrainingUser.training_id'
        ));
        $exist         = array();
        foreach ($TrainingUsers as $val) {
            $exist[] = $val;
        }
        $users     = $this->TrainingUser->User->find('list');
        $trainings = $this->TrainingUser->Training->find('list', array(
            'conditions' => array(
                'NOT' => array(
                    'Training.id' => $exist
                )
            )
        ));
        $this->set(compact('users', 'trainings'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->TrainingUser->exists($id)) {
            throw new NotFoundException(__('Invalid training user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->TrainingUser->save($this->request->data)) {
                $this->Session->setFlash(__('The training user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The training user could not be saved. Please, try again.'));
            }
        } else {
            $options             = array('conditions' => array('TrainingUser.' . $this->TrainingUser->primaryKey => $id));
            $this->request->data = $this->TrainingUser->find('first', $options);
        }
        $users     = $this->TrainingUser->User->find('list');
        $trainings = $this->TrainingUser->Training->find('list');
        $this->set(compact('users', 'trainings'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->TrainingUser->id = $id;
        if (!$this->TrainingUser->exists()) {
            throw new NotFoundException(__('Invalid training user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->TrainingUser->delete()) {
            $this->Session->setFlash(__('The training user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The training user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
