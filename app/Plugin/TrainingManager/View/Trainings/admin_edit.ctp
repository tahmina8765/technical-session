<div class="trainings form">

    <?php
    echo $this->Form->create('Training', array(
        'type' => 'file',
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
        <legend><?php echo __('Admin:: Edit Training'); ?></legend>
        <?php
        $selectedWarnings = array();
        foreach ($this->data['TrainingUser'] as $tuser) {
            $selectedWarnings[] = $tuser['user_id'];
        }
        echo $this->Form->input('id');
        echo $this->Form->input('title', array('type' => 'text'));
        echo $this->Form->input('schedule', array('type' => 'text', 'class' => 'datepicker form-control'));
        echo $this->Form->input('image'); 
        echo $this->Form->input('content');
        echo $this->Form->input('upload', array(
            'label'    => array('text' => 'Document', 'class' => 'col-lg-2 control-label'),
            'type'     => 'file',
        ));
        ?>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <?php                
                    echo empty($this->data['Training']['upload']) ? "n/a" : $this->Html->link(__($this->data['Training']['upload'], true), Configure::read('Site.url') . 'documents/' . $this->data['Training']['upload'], array ('escape' => false, 'target' => '_blank'));                                       
                ?>
            </div>
        </div>
        <?php
        echo $this->Form->input('TrainingUser.user_id', array(
            'class'    => array('checkbox'),
            'label'    => array('text' => 'Host', 'class' => 'col-lg-2 control-label'),
            'type'     => 'select',
            'multiple' => 'checkbox',
            'options'  => $users,
            'selected' => $selectedWarnings
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

