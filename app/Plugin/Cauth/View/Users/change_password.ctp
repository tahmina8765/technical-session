<div class="users form">
    <?php
    echo $this->Form->create('User', array(
        'class'         => 'form-signin',
        'inputDefaults' => array(
            'format'  => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div'     => array('class' => 'control-group'),
            'label'   => array('class' => 'sr-only'),
            'between' => '<div class="controls">',
            'after'   => '</div>',
            'error'   => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        )
    ));
    ?>


    <h2><?php echo __('Change Password'); ?></h2>
    <?php
    echo $this->Form->input('id');
    if (!empty($password_access_token)) {
        echo $this->Form->input('password_access_token', array('type' => 'hidden', 'label' => 'Password Change Code'));
    } else {
        echo $this->Form->input('cpassword', array('type' => 'password', 'label' => array('text' => 'Current Password', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => "Current Password"));
    }
    echo $this->Form->input('password', array('type' => 'password', 'label' => array('text' => 'New Password', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => "New Password"));   
    echo $this->Form->input('rpassword', array('type' => 'password', 'label' => array('text' => 'Re-type Password', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => "Re-type Password"));

    ?>

    <div class="control-group">
        <div class="controls">
            <?php
            echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn btn-lg btn-success btn-block', 'div' => false));
            ?>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>