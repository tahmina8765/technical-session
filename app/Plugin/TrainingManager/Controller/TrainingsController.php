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
    private $hostGroup = 2;
    public $components = array('Paginator', 'Session');
    public $paginate   = array(
        'limit' => 10,
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
    public function index($type = null)
    {
        $userId   = 0;
        $UserAuth = $this->Session->read('Auth');
        if (!empty($UserAuth)) {
            $userId = $this->Session->read('Auth.User.id');
        }

        $this->loadModel('Besttopic');
        $besttopic = 0;
        if (!empty($userId)) {
            $result = $this->Besttopic->find('first', array('conditions' => array('AND' => array('Besttopic.user_id' => $userId))));
            if (!empty($result)) {
                $besttopic = $result['Besttopic']['training_id'];
            }
        }

        $title = 'Session List';
        $today = date('Y-m-d');

        // $trainings = $this->Paginator->paginate('Training');

        switch ($type) {
            case 'vote':
                $this->Paginator->settings['limit']                                = 100;
                $this->Paginator->settings['order']['Training.schedule']           = 'asc';
                $this->Paginator->settings['conditions'][]['Training.schedule <']  = $today;
                $title                                                             = 'Session Archive List';
                break;
            case 'archive':
                $this->Paginator->settings['order']['Training.schedule']           = 'desc';
                $this->Paginator->settings['conditions'][]['Training.schedule <']  = $today;
                $title                                                             = 'Session Archive List';
                break;
            case 'upcoming':
                $this->Paginator->settings['order']['Training.schedule']           = 'asc';
                $this->Paginator->settings['conditions'][]['Training.schedule >='] = $today;
                $title                                                             = 'Upcoming Sessions';
                break;
            case 'rank':
                $this->Paginator->settings['limit']                                = 100;
                $this->Training->virtualFields                                     = array(
                    'point' => 'training_rank (Training.id)',
                );
                $this->Paginator->settings['order']                                = array('Training.point' => 'desc');
                $this->Paginator->settings['conditions'][]['Training.schedule <']  = $today;
                $title                                                             = 'Rank';
                break;
            default:
                $this->Paginator->settings['order']['Training.schedule']           = 'desc';
                break;
        }

        $this->Training->recursive = 2;
        $trainings                 = $this->Paginator->paginate('Training');

        if (!empty($this->request->params['requested'])) {
            return array(
                'training'  => $trainings,
                'besttopic' => $besttopic
            );
        }

        $this->set(compact('trainings', 'title', 'type'));
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
        $this->Training->recursive                               = 0;
        $this->Paginator->settings['order']['Training.schedule'] = 'desc';
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
        $this->loadModel('User');
        $this->loadModel('TrainingUser');

        $users = $this->User->find('list', array(
            'fields'     => array('User.id', 'User.name'),
            'conditions' => array(
                'User.group_id' => $this->hostGroup
            )
        ));

        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $this->Training->create();

            if (!empty($postData['TrainingUser']['user_id'])) {
                $user_ids = array();
                foreach ($postData['TrainingUser']['user_id'] as $key => $val) {
                    $user_ids[$key]['user_id'] = $val;
                }
                unset($postData['TrainingUser']);
                $postData['TrainingUser'] = $user_ids;
            }

            $datasource = $this->Training->getDataSource();
            try {
                $datasource->begin();
                if (!$this->Training->save($postData)) {
                    throw new Exception();
                }

                $training_id = $this->Training->getLastInsertId();
                if (!empty($postData['TrainingUser'])) {
                    foreach ($postData['TrainingUser'] as $key => $val) {
                        $postData['TrainingUser'][$key]['training_id'] = $training_id;
                    }
                }

                if (!$this->TrainingUser->saveAll($postData['TrainingUser'])) {
                    throw new Exception();
                }
                $datasource->commit();
                $this->Session->setFlash(__('The training has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } catch (Exception $e) {
                $datasource->rollback();
                $this->Session->setFlash(__('The training could not be saved. Please, try again.'));
            }

//            if ($this->Training->saveAll($this->request->data)) {
//                $this->Session->setFlash(__('The training has been saved.'));
//                return $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The training could not be saved. Please, try again.'));
//            }
        }
        $this->set(compact('users'));
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
        $this->loadModel('User');
        $this->loadModel('TrainingUser');

        if (!$this->Training->exists($id)) {
            throw new NotFoundException(__('Invalid training'));
        }

        $users = $this->User->find('list', array(
            'fields'     => array('User.id', 'User.name'),
            'conditions' => array(
                'User.group_id' => $this->hostGroup
            )
        ));

        if ($this->request->is('put')) {

            $postData = $this->request->data;
            $this->Training->create();

            $existingTrainingUsers = $this->TrainingUser->find('list', array(
                'fields'     => array('TrainingUser.id', 'TrainingUser.user_id'),
                'conditions' => array(
                    'TrainingUser.training_id' => $id
                )
            ));

            $submittedUsers         = $postData['TrainingUser']['user_id'];
            $removeTrainingUsersKey = array();
            $newUsers               = array();


            if (!empty($postData['TrainingUser']['user_id'])) {
                $user_ids = array();
                foreach ($postData['TrainingUser']['user_id'] as $key => $val) {
                    if (!in_array($val, $existingTrainingUsers)) {
                        $user_ids[$key]['user_id'] = $val;
                    }
                    $newUsers[] = $val;
                }
                unset($postData['TrainingUser']);
                $postData['TrainingUser'] = $user_ids;
            }

            foreach ($existingTrainingUsers as $key => $val) {
                if (!in_array($val, $newUsers)) {
                    $removeTrainingUsersKey[] = $key;
                }
            }

            $removeTrainingUsersKey = array_reverse($removeTrainingUsersKey);

            $datasource = $this->Training->getDataSource();
            try {
                $datasource->begin();
                if (!$this->Training->save($postData)) {
                    throw new Exception();
                }
                $training_id = $id;

                if (!empty($postData['TrainingUser'])) {
                    foreach ($postData['TrainingUser'] as $key => $val) {
                        if (!empty($removeTrainingUsersKey)) {
                            $postData['TrainingUser'][$key]['id'] = array_pop($removeTrainingUsersKey);
                        }
                        $postData['TrainingUser'][$key]['training_id'] = $training_id;
                    }
                }

                if (!empty($postData['TrainingUser'])) {
                    if (!$this->TrainingUser->saveAll($postData['TrainingUser'])) {
                        throw new Exception();
                    }
                }
                $datasource->commit();

                if (!empty($removeTrainingUsersKey)) {
                    foreach ($removeTrainingUsersKey as $key) {
                        $this->TrainingUser->id = $key;
                        $this->TrainingUser->delete();
                    }
                }

                $this->Session->setFlash(__('The training has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } catch (Exception $e) {
                $datasource->rollback();
                unset($this->request->data['TrainingUser']);
                foreach ($submittedUsers as $key => $val) {
                    $this->request->data['TrainingUser'][$key]['user_id']     = $val;
                    $this->request->data['TrainingUser'][$key]['training_id'] = $id;
                }
                $this->Session->setFlash(__('The training could not be saved. Please, try again.'));
            }
        } else {
            $options             = array('conditions' => array('Training.' . $this->Training->primaryKey => $id));
            $this->request->data = $this->Training->find('first', $options);
        }
        $this->set(compact('users'));
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

    public function admin_score($trainingId = null)
    {
        $this->loadModel('TrainingManager.Score');
        $this->loadModel('User');

        $this->Score->recursive = 0;
        $scores = $this->Score->find('all', array(
            'conditions' => array(
                'Score.training_id' => $trainingId,
            ),
            'order' => array(
                'User.name' => 'asc'
            )
        ));

        // Validate training id
        if (!$this->Training->exists($trainingId)) {
            throw new NotFoundException(__('Invalid training'));
        }

        if ($this->request->is('post')) {
            $this->Score->create();

            $options = array('conditions' => array(
                    'Score.user_id'     => $this->request->data['Score']['user_id'],
                    'Score.training_id' => $trainingId,
            ));
            $score   = $this->Score->find('first', $options);

            if (!empty($score)) {
                $this->request->data['Score']['id'] = $score['Score']['id'];
            }

            $this->request->data['Score']['training_id'] = $trainingId;

            if ($this->Score->save($this->request->data)) {
                $this->Session->setFlash(__('The score has been saved.'), 'success');
                return $this->redirect(array('action' => 'admin_score', $trainingId));
            } else {
                $this->Session->setFlash(__('The score could not be saved. Please, try again.'), 'error');
            }
        }
        $options = array('conditions' => array(
                'Training.id' => $trainingId,
        ));

        $trainings = $this->Training->find('first', $options);

        $ScoreUsers = $this->Score->find('list', array(
            'fields'     => 'Score.user_id',
            'conditions' => array(
                'Score.training_id' => $trainingId,
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
        $this->set(compact('trainings', 'users', 'scores'));
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
            $result   = $this->Besttopic->find('first', array('conditions' => array('AND' => array('Besttopic.user_id' => $userId))));
            $options  = array('conditions' => array('Training.' . $this->Training->primaryKey => $courseId));
            $training = $this->Training->find('first', $options);
            // Check Validation
            $valid    = true;
            if (!empty($training['TrainingUser'])) {
                $trainers = array();
                foreach ($training['TrainingUser'] as $trainer) {
                    $trainers[] = $trainer['user_id'];
                }
                if (in_array($userId, $trainers)) {
                    $valid = false;
                    $this->Session->setFlash(__('Opps! you can not vote for your own session.'), 'error');
                }
            }
            if ($result && $training && $valid) {
                $this->Besttopic->id = $result['Besttopic']['id'];
                $result              = $this->Besttopic->save(array('user_id' => $userId, 'training_id' => $courseId));
                $this->Session->setFlash(__('Thank you for your valuable vote.'), 'success');
            } else if ($training && $valid) {
                $result = $this->Besttopic->save(array('user_id' => $userId, 'training_id' => $courseId));
                $this->Session->setFlash(__('Thank you for your valuable vote.'), 'success');
            }
        }
        return $this->redirect('/');
    }

    public function score($trainingId = null)
    {
        $this->loadModel('Score');

        // Validate training id
        if (!$this->Training->exists($trainingId)) {
            throw new NotFoundException(__('Invalid training'));
        }
        // Validate user id
        $userId   = 0;
        $UserAuth = $this->Session->read('Auth');
        if (!empty($UserAuth)) {
            $userId = $this->Session->read('Auth.User.id');
        } else {
            throw new NotFoundException(__('Invalid user'));
        }

        $options = array('conditions' => array(
                'Score.user_id'     => $userId,
                'Score.training_id' => $trainingId,
        ));
        $score   = $this->Score->find('first', $options);

        if ($this->request->is('post') && empty($score)) {
            $this->Score->create();
            $this->request->data['Score']['user_id']     = $userId;
            $this->request->data['Score']['training_id'] = $trainingId;

            if ($this->Score->save($this->request->data)) {
                $this->Session->setFlash(__('The score has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The score could not be saved. Please, try again.'));
            }
        }
        $trainings = $this->Training->find('list');
        $this->set(compact('trainings', 'score'));
    }

}

/*
DROP FUNCTION `training_rank`;
DELIMITER $$
CREATE FUNCTION `training_rank`(id int) RETURNS int
BEGIN
DECLARE output int;
SET output = (SELECT COUNT(*) FROM besttopics WHERE besttopics.training_id = id);
RETURN output;
END
 * 
 */
