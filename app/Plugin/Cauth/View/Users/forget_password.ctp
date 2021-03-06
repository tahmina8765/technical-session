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
    <h2 class="form-signin-heading">Forget Password</h2>

    <?php
    echo $this->Form->input('username', array('label' => array('text' => 'Login ID', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => "Username"));
    ?>
    <div style="text-align: center;"><strong>OR</strong></div>
    <?php
    echo $this->Form->input('email', array('label' => array('text' => 'Email', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => "Email"));
    ?>
    <br>
    <div class="control-group">
        <div class="controls">
            <?php
            echo $this->Form->button('Submit', array('type' => 'submit', 'class' => 'btn btn-lg btn-success btn-block', 'div' => false));
            ?>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>