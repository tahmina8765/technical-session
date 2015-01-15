<div class="scores form">
    <?php
    echo $this->Form->create('Score', array(
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
        ''  => '--Select--',
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
        <legend><?php echo __('Add Score'); ?>: <?php echo __($trainings['Training']['title']); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('training_id', array('type' => 'hidden'));
        echo $this->Form->input('user_id', array(
            'type'    => 'select',
            'options' => $users));
        echo $this->Form->input('content_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('presentation_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('discussion_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('suggetions', array('label' => array('class' => 'col-lg-2 control-label', 'text' => 'Suggestions to improve')));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
