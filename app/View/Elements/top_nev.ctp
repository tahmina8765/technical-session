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
                    $this->Html->image('top-logo.png', array('alt' => 'Genweb2 Technical Session', 'border' => '0')), '/', array('class' => 'navbar-brand', 'escape' => false, 'id' => 'cake-powered')
            );
            ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php
            $groupId = AuthComponent::user('group_id');
            switch ($groupId) {
                case 1:
                    echo $this->element('partial/layout/admin_menu');
                    break;
                case 2:
                    echo $this->element('partial/layout/user_menu');
                    break;
                default:
                    echo $this->element('partial/layout/guest_menu');
                    break;
            }
            ?>
            
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