<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            echo $this->Html->link(
                    $this->Html->image('top-logo.png', array('alt' => 'Genweb2 Technical Session', 'border' => '0')), 'http://www.cakephp.org/', array('class' => 'navbar-brand', 'target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
            );
            ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><?php echo $this->Html->link(__('Archive'), array('plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'archive')); ?></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Right Nav Section -->
            <ul class="nav navbar-nav navbar-right">
                <?php
                $userId = AuthComponent::user('id');
                if (!empty($userId)) {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Welcome <?php echo AuthComponent::user('username'); ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><?php echo $this->Html->link(__('Change Password'), array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'changePassword')); ?></li>
                            <li class="divider"></li>
                            <li><?php echo $this->Html->link(__('Logout'), array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'logout')); ?></li>
                        </ul>
                    </li>  

                    <?php
                } else {
                    ?>
                    <li><?php echo $this->Html->link('Login', array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'login')); ?></li>
                    <?php
                }
                ?>
            </ul>

        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>