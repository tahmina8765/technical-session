<ul class="nav navbar-nav">
    <li><?php echo $this->Html->link(__('Archive'), array('admin' => false, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'archive')); ?></li>
    <li><?php echo $this->Html->link(__('Upcoming sessions'), array('admin' => false, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'upcoming')); ?></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Management<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Training Sessions</li>
            <li><?php echo $this->Html->link(__('New Training'), array('admin' => true, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Training'), array('admin' => true, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index')); ?></li>
        </ul>
    </li>
</ul>