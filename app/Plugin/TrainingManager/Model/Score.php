<?php

App::uses('TrainingManagerAppModel', 'TrainingManager.Model');

/**
 * Score Model
 *
 * @property Training $Training
 * @property User $User
 */
class Score extends TrainingManagerAppModel
{

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'training_id'        => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_id'            => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'content_point'      => array(
            'required' => array(
                'rule'       => array('minLength', 1),
                'allowEmpty' => false,
                'message'    => 'Please select a point.'
            )
        ),
//        'presentation_point' => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'discussion_point'   => array(
//            'numeric' => array(
//                'rule' => array('numeric'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
//        'suggetions'         => array(
//            'notEmpty' => array(
//                'rule' => array('notEmpty'),
//            //'message' => 'Your custom message here',
//            //'allowEmpty' => false,
//            //'required' => false,
//            //'last' => false, // Stop validation after this rule
//            //'on' => 'create', // Limit validation to 'create' or 'update' operations
//            ),
//        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Training' => array(
            'className'  => 'Training',
            'foreignKey' => 'training_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        ),
        'User'     => array(
            'className'  => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields'     => '',
            'order'      => ''
        )
    );

}
