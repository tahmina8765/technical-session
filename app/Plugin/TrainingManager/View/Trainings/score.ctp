<?php
if (empty($score) && !$datefail) {
    ?>
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
            '0'  => 'N/A',
            '1'  => 'Very Unsatisfied',
            '2'  => 'Unsatisfied',
            '3'  => 'Nearly Acceptable',
            '4'  => 'Acceptable',
            '5'  => 'More than Acceptable',
            '6'  => 'Good',
            '7'  => 'Very Good',
            '8'  => 'Nearly Excellent',
            '9'  => 'Excellent',
            '10' => 'Awesome',
        );
        ?>
        <fieldset>
            <legend><?php echo __('Rate this session'); ?></legend>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('training_id', array('type' => 'hidden'));
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

        <?php echo $this->Form->button('submit', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')); ?>
        <?php echo $this->Form->end(); ?>
    </div>
    <?php
} else {
    ?>
    <div class="text-center">
        <img src="http://skypolatory.cyberplant.net/icon/animated/emoticon-0110-tongueout.gif" width="30">
    </div>

    <?php
}
?>