<div class="trainings form">

    <?php
    echo $this->Form->create('Training', array(
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
    ?>
    <fieldset>
        <legend><?php echo __('Admin:: New Training'); ?></legend>
        <?php
        echo $this->Form->input('title', array('type' => 'text'));
        echo $this->Form->input('schedule');
        echo $this->Form->input('image');        
        echo $this->Form->input('content');
        echo $this->Form->input('TrainingUser.user_id', array(
            'class'    => array('checkbox'),
            'label'    => array('text' => 'Host', 'class' => 'col-lg-2 control-label'),
            'type'     => 'select',
            'multiple' => 'checkbox',
            'options'  => $users,
//            'selected' => $selectedWarnings
        ));
//        echo $this->Form->input('users');
        ?>
    </fieldset>
    <?php echo $this->Form->button('submit', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')); ?>
        <?php echo $this->Form->end(); ?>
</div>

<style type="text/css">
    .checkbox{
        display: block;
        width: 25%;
        float: left;

    }
    .radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"]{
        margin-left: 0;
    }
</style>
