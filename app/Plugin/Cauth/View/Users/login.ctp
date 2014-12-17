<div class="row">
    <?php
    echo $this->Form->create('User', array(
        'class'         => 'form-signin',
        'url'           => array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'login'),
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
    <h2 class="form-signin-heading">Please sign in</h2>

    <?php
    echo $this->Form->input('User.username', array('label' => array('text' => 'Login ID', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => "Username"));
    echo $this->Form->input('User.password', array('label' => array('text' => 'Password', 'class' => 'sr-only'), 'class' => 'form-control', 'placeholder' => "Password"));
    ?>
    <?php
    echo $this->html->link('Forget Password? Click here', array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'forgetPassword'));
    ?>

    <div class="control-group">
        <div class="controls">
            <?php
            echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block', 'div' => false));
            ?>
        </div>
    </div>

    <?php
    echo $this->Form->end();
    ?>
</div>

