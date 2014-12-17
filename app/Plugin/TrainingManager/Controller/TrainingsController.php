<?php

App::uses('TrainingManagerAppController', 'TrainingManager.Controller');

/**
 * Trainings Controller
 *
 * @property Training $Training
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TrainingsController extends TrainingManagerAppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    public $paginate   = array(
        'limit' => 20,
        'order' => array(
            'Training.name' => 'asc'
        )
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    /*
     * search page
     *
     */

    public function search()
    {
        // the page we will redirect to
        $url['action'] = 'index';
        // build a URL will all the search elements in it
        // the resulting URL will be
        // example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
        foreach ($this->data as $k => $v) {
            foreach ($v as $kk => $vv) {
                if (!empty($vv)) {
                    $url[$k . '.' . $kk] = $vv;
                }
            }
        }
        // redirect the user to the url
        $this->redirect($url, null, true);
    }

    /**
     * index method
     *
     * @return void
     */
//    public function index()
//    {
//        $title                              = array();
//        $this->Paginator->settings['limit'] = 30;
//
//        $trainings = $this->Paginator->paginate('Training');
//        if (isset($this->passedArgs['Search.schedule'])) {
//            $this->Paginator->settings['conditions'][]['Training.schedule'] = $this->passedArgs['Search.schedule'];
//            $this->request->data['Search']['schedule']                      = $this->passedArgs['Search.schedule'];
//            $title[]                                                        = __('Name', true) . ': ' . $this->passedArgs['Search.schedule'];
//
//            $trainings = $this->Paginator->paginate('Training');
//        }
//        $this->Training->recursive = 2;
//        $this->set(compact('trainings'));
//    }

    /**
     * archive method
     *
     * @return void
     */
    public function index($type = null)
    {
        $userId = 0;
        $this->Session->destroy('Auth.besttopic');
        $UserAuth = $this->Session->read('Auth');
        if (!empty($UserAuth)) {
            $userId = $this->Session->read('Auth.User.id');
        }

        $this->loadModel('Besttopic');
        if (!empty($userId)) {
            $result = $this->Besttopic->find('first', array('conditions' => array('AND' => array('Besttopic.user_id' => $userId))));
            if(!empty($result)){
                $this->Session->write('Auth.besttopic', $result['Besttopic']['training_id']);
            }
        }

        $title                              = 'Session List';
        $this->Paginator->settings['limit'] = 30;
        $today                              = date('Y-m-d');

        $trainings = $this->Paginator->paginate('Training');

        switch ($type) {
            case 'archive':
                $this->Paginator->settings['order']['Training.schedule']           = 'asc';
                $this->Paginator->settings['conditions'][]['Training.schedule <']  = $today;
                $title                                                             = 'Session Archive List';
                break;
            case 'upcoming':
                $this->Paginator->settings['order']['Training.schedule']           = 'asc';
                $this->Paginator->settings['conditions'][]['Training.schedule >='] = $today;
                $title                                                             = 'Upcoming Sessions';
                break;
            default:

                $this->Paginator->settings['order']['Training.schedule'] = 'desc';
                break;
        }

        $this->Training->recursive = 2;
        $trainings                 = $this->Paginator->paginate('Training');

        if (!empty($this->request->params['requested'])) {
            return $trainings;
        }

        $this->set(compact('trainings', 'title'));
    }

    public function best_topic($id)
    {

        if (!$this->Training->exists($id)) {
            throw new NotFoundException(__('Invalid training'));
        }
        $userId   = 0;
        $courseId = $id;
        $UserAuth = $this->Session->read('Auth');
        if (!empty($UserAuth)) {
            $userId = $this->Session->read('Auth.User.id');
        }

        $this->loadModel('Besttopic');
        if (!empty($courseId) && !empty($userId)) {
            $result = $this->Besttopic->find('first', array('conditions' => array('AND' => array('Besttopic.user_id' => $userId))));
            if ($result) {
                $this->Besttopic->id = $result['Besttopic']['id'];
                $result              = $this->Besttopic->save(array('user_id' => $userId, 'training_id' => $courseId));
//                $this->Session->setFlash(__('Think you for your vote.'));
            } else {
                $result = $this->Besttopic->save(array('user_id' => $userId, 'training_id' => $courseId));
//                $this->Session->setFlash(__('Think you for your vote.'));
            }
            $this->Session->write('Auth.besttopic', $id);
        }
        return $this->redirect('/');
    }

    public function best_host($id)
    {
        
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
        if (!$this->Training->exists($id)) {
            throw new NotFoundException(__('Invalid training'));
        }
        $options = array('conditions' => array('Training.' . $this->Training->primaryKey => $id));
        $this->set('training', $this->Training->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        /*
          $trainings = array(
          array("title" => "AngularJS - What and Why", "schedule" => "2014-02-19"),
          array("title" => "Smells to Refactoring - Primer", "schedule" => "2014-02-27"),
          array("title" => "Smells to Refactoring - Design Principles", "schedule" => "2014-03-06"),
          array("title" => "A day with *NIX - Hands on", "schedule" => "2014-03-13"),
          array("title" => "Introduction to SOA", "schedule" => "2014-03-20"),
          array("title" => "Software Testing: Quality From the Beginning", "schedule" => "2014-03-27"),
          array("title" => "Session on Git Internals", "schedule" => "2014-04-03"),
          array("title" => "Mobile Development Choices", "schedule" => "2014-04-10"),
          array("title" => "Cloud Computing", "schedule" => "2014-04-17"),
          array("title" => "How to write maintainable CSS with Sass", "schedule" => "2014-05-08"),
          array("title" => "Caching in HTTP", "schedule" => "2014-06-05"),
          array("title" => "Angular JS - Walkthrough", "schedule" => "2014-06-19"),
          array("title" => "Improving SQL Server Performance", "schedule" => "2014-08-03"),
          array("title" => "Introduction to Linux command line", "schedule" => "2014-08-14"),
          array("title" => "Android OS Next Generation Mobile Computing", "schedule" => "2014-08-21"),
          array("title" => "Software Testing Life Cycle(STLC)", "schedule" => "2014-08-28"),
          array("title" => "Google Hacking for Fun and Profit", "schedule" => "2014-09-04"),
          array("title" => "Project Management Practices and Agile Intro", "schedule" => "2014-09-11"),
          array("title" => "Unit Testing", "schedule" => "2014-09-18"),
          array("title" => "User Agent CSS and CSS Reset Overview", "schedule" => "2014-09-25"),
          array("title" => "Oracle Application R12 Implementation Developer Guideline", "schedule" => "2014-10-02"),
          array("title" => "Android Project Introduction and anatomy", "schedule" => "2014-10-16"),
          array("title" => "Scrum Introduction", "schedule" => "2014-10-30"),
          array("title" => "Scrum - Follow-up", "schedule" => "2014-11-06"),
          array("title" => "NoSQL (MongoDB)", "schedule" => "2014-11-13"),
          array("title" => "TDD (Test Driven Development)", "schedule" => "2014-11-20"),
          array("title" => "An Introduction to Grails", "schedule" => "2014-11-27"),
          array("title" => "CQRS", "schedule" => "2014-12-04"),
          array("title" => "Drools: Rule Engine", "schedule" => "2014-12-11")
          );


          foreach ($trainings as $training) {
          $data = array(
          'Training' => array(
          'title' => $training['title'],
          'schedule' => $training['schedule']
          )
          );
          $this->Training->create();
          if ($this->Training->save($data)) {
          $saved[] = $training;
          } else {
          $unsaved[] = $training;
          }
          $data = array();
          }
          die();
         */
        if ($this->request->is('post')) {
            $this->Training->create();
            if ($this->Training->save($this->request->data)) {
                $this->Session->setFlash(__('The training has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The training could not be saved. Please, try again.'));
            }
        }
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
        if (!$this->Training->exists($id)) {
            throw new NotFoundException(__('Invalid training'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Training->save($this->request->data)) {
                $this->Session->setFlash(__('The training has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The training could not be saved. Please, try again.'));
            }
        } else {
            $options             = array('conditions' => array('Training.' . $this->Training->primaryKey => $id));
            $this->request->data = $this->Training->find('first', $options);
        }
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
        $this->Training->id = $id;
        if (!$this->Training->exists()) {
            throw new NotFoundException(__('Invalid training'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Training->delete()) {
            $this->Session->setFlash(__('The training has been deleted.'));
        } else {
            $this->Session->setFlash(__('The training could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->Training->recursive = 0;
        $this->set('trainings', $this->Paginator->paginate());
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
        if (!$this->Training->exists($id)) {
            throw new NotFoundException(__('Invalid training'));
        }
        $options = array('conditions' => array('Training.' . $this->Training->primaryKey => $id));
        $this->set('training', $this->Training->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Training->create();
            if ($this->Training->save($this->request->data)) {
                $this->Session->setFlash(__('The training has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The training could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        if (!$this->Training->exists($id)) {
            throw new NotFoundException(__('Invalid training'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Training->save($this->request->data)) {
                $this->Session->setFlash(__('The training has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The training could not be saved. Please, try again.'));
            }
        } else {
            $options             = array('conditions' => array('Training.' . $this->Training->primaryKey => $id));
            $this->request->data = $this->Training->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        $this->Training->id = $id;
        if (!$this->Training->exists()) {
            throw new NotFoundException(__('Invalid training'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Training->delete()) {
            $this->Session->setFlash(__('The training has been deleted.'));
        } else {
            $this->Session->setFlash(__('The training could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
