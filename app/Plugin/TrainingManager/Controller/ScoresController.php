<?php

App::uses('TrainingManagerAppController', 'TrainingManager.Controller');

/**
 * Scores Controller
 *
 * @property Score $Score
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ScoresController extends TrainingManagerAppController
{

    private $hostGroup = 2;

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($training_id)
    {
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
    public function admin_view($id = null)
    {
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
    public function admin_add($training_id)
    {

        $this->loadModel('User');

        if ($this->request->is('post')) {
            $this->Score->create();
            if ($this->Score->save($this->request->data)) {
                $this->Session->setFlash(__('The score has been saved.'));
                return $this->redirect(array('action' => 'admin_add', $training_id));
            } else {
                $this->Session->setFlash(__('The score could not be saved. Please, try again.'));
            }
        }
        $trainings  = $this->Score->Training->find('list', array(
            'conditions' => array(
                'Training.id' => $training_id
            )
        ));
        $ScoreUsers = $this->Score->find('list', array(
            'fields'     => 'Score.user_id',
            'conditions' => array(
                'Score.training_id' => $training_id,
            )
        ));
        $exist      = array();
        foreach ($ScoreUsers as $val) {
            $exist[] = $val;
        }
        $users = $this->User->find('list', array(
            'conditions' => array(
                'NOT' => array(
                    'User.id' => $exist
                ),
                'AND' => array(
                    'User.group_id' => $this->hostGroup,
                    'User.is_disabled IS NULL'
                )
            )
        ));
//        $users     = $this->Score->User->find('list', array(
//            'fields'     => array('User.id', 'User.name'),
//            'conditions' => array(
//                'User.group_id' => $this->hostGroup
//            )
//        ));
        $this->set(compact('trainings', 'users'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($training_id, $id = null)
    {
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
            $options             = array('conditions' => array('Score.' . $this->Score->primaryKey => $id));
            $this->request->data = $this->Score->find('first', $options);
        }
        $trainings = $this->Score->Training->find('list');
        $users     = $this->Score->User->find('list');
        $this->set(compact('trainings', 'users'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($training_id, $id = null)
    {
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
