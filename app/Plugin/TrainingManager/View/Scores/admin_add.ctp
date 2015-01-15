<div class="scores form">
    <?php
    echo $this->Form->create('Score', array(
        'novalidate'    => true,
        'class'         => 'form-horizontal',
        'role'          => 'form',
        'inputDefaults' => array(
            'format'  => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div'     => array('class' => 'form-group'),
            'class'   => array('form-control'),
            'label'   => array('class' => 'col-lg-2 control-label'),
            'between' => '<div class="col-lg-10">',
            'after'   => '</div>',
            'error'   => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));
    
    $options = array(
        '1'  => 'Less than Unsatisfied',
        '2'  => 'Unsatisfied',
        '3'  => 'More than Unsatisfied',
        '4'  => 'Acceptable',
        '5'  => 'More than Acceptable',
        '6'  => 'Good',
        '7'  => 'Very Good',
        '8'  => 'Nearly Excellent',
        '9'  => 'Excellent',
        '10' => 'Above Excellent',
    );
    ?>
    <fieldset>
        <legend><?php echo __('Add Score'); ?></legend>
        <?php
        echo $this->Form->input('training_id');
        echo $this->Form->input('user_id');
        echo $this->Form->input('content_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('presentation_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('discussion_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('suggetions');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<!--<div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>

                <li><?php echo $this->Html->link(__('List Scores'), array('action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        </ul>
</div>-->
