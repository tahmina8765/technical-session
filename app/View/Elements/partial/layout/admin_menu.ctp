<ul class="nav navbar-nav">
    <li class="active"><a href="#">Home</a></li>
    <li><?php echo $this->Html->link(__('Archive'), array('plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'archive')); ?></li>
    <li><?php echo $this->Html->link(__('Upcoming sessions'), array('plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'upcoming')); ?></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Groups</li>
            <li><?php echo $this->Html->link(__('New Group'), array('plugin' => 'cauth', 'controller' => 'groups', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Groups'), array('plugin' => 'cauth', 'controller' => 'groups', 'action' => 'index')); ?></li>
            <li class="divider"></li>
            <li class="dropdown-header">Users</li>
            <li><?php echo $this->Html->link(__('New User'), array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Users'), array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'index')); ?></li>
            <li class="divider"></li>
            <li class="dropdown-header">Permission</li>
            <li><?php echo $this->Html->link(__('Permission'), array('plugin' => 'cauth', 'controller' => 'utils', 'action' => 'index')); ?></li>                    
            <li class="divider"></li>
            <li class="dropdown-header">Item</li>
            <li><?php echo $this->Html->link(__('New Item'), array('plugin' => 'cauth', 'controller' => 'items', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Items'), array('plugin' => 'cauth', 'controller' => 'items', 'action' => 'index')); ?></li>
            <li class="divider"></li>
            <li class="dropdown-header">Others</li>
            <li><?php echo $this->Html->link(__('Synchronization'), array('plugin' => 'cauth', 'controller' => 'utils', 'action' => 'acoSync')); ?></li>
            <li><?php echo $this->Html->link(__('Update Item (must run after synchronization)'), array('plugin' => 'cauth', 'controller' => 'utils', 'action' => 'updateItem')); ?></li>
            <li><?php echo $this->Html->link(__('Initialize DB'), array('plugin' => 'cauth', 'controller' => 'utils', 'action' => 'initDB')); ?></li>
        </ul>
    </li>
</ul>