<ul class="nav navbar-nav">
    <li class="active"><?php echo $this->Html->link(__('Home'), '/');?></li>
    <li><?php echo $this->Html->link(__('Archive'), array('admin' => false, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'archive')); ?></li>
    <li><?php echo $this->Html->link(__('Upcoming sessions'), array('admin' => false, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'upcoming')); ?></li>
    <li><?php echo $this->Html->link(__('Result'), array('admin' => false, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'rank')); ?></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Management<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Training Sessions</li>
            <li><?php echo $this->Html->link(__('New Training'), array('admin' => true, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Training'), array('admin' => true, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index')); ?></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Groups</li>
            <li><?php echo $this->Html->link(__('New Group'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'groups', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Groups'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'groups', 'action' => 'index')); ?></li>
            <li class="divider"></li>
            <li class="dropdown-header">Users</li>
            <li><?php echo $this->Html->link(__('New User'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'users', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Users'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'users', 'action' => 'index')); ?></li>
            <li class="divider"></li>
            <li class="dropdown-header">Permission</li>
            <li><?php echo $this->Html->link(__('Permission'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'utils', 'action' => 'index')); ?></li>                    
            <li class="divider"></li>
            <li class="dropdown-header">Item</li>
            <li><?php echo $this->Html->link(__('New Item'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'items', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Items'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'items', 'action' => 'index')); ?></li>
            <li class="divider"></li>
            <li class="dropdown-header">Others</li>
            <li><?php echo $this->Html->link(__('Synchronization'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'utils', 'action' => 'acoSync')); ?></li>
            <li><?php echo $this->Html->link(__('Update Item (must run after synchronization)'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'utils', 'action' => 'updateItem')); ?></li>
            <li><?php echo $this->Html->link(__('Initialize DB'), array('admin' => false, 'plugin' => 'cauth', 'controller' => 'utils', 'action' => 'initDB')); ?></li>
        </ul>
    </li>
</ul>