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
        'training_id'   => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_id'       => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'content_point' => array(
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

    public function afterSave($created, $options = array())
    {
        return $this->updateTraingScoreAfterSave($this->data['Score']['training_id']);
    }

    public function updateTraingScoreAfterSave($training_id = null)
    {
        $scores             = $this->find('all', array(
            'conditions' => array(
                'Score.training_id' => $training_id
            )
        ));
        $user_total         = 0;
        $content_total      = 0;
        $presentation_total = 0;
        $discussion_total   = 0;

        foreach ($scores as $score) {
            $user_total++;
            $content_total      = $content_total + $score['Score']['content_point'];
            $presentation_total = $presentation_total + $score['Score']['presentation_point'];
            $discussion_total   = $discussion_total + $score['Score']['discussion_point'];
        }

        $final_score                        = (($content_total * 5) + ($presentation_total * 3.5) + ($discussion_total * 1.5)) / $user_total;
        $training_data['Training']['id']    = $training_id;
        $training_data['Training']['score'] = $final_score;
        if ($this->Training->save($training_data)) {
            return true;
        } else {
            return false;
        }
    }
}
