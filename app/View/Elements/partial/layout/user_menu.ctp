<ul class="nav navbar-nav">
    <li><?php echo $this->Html->link(__('Home'), '/');?></li>
    <li><?php echo $this->Html->link(__('Archive'), array('plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'archive')); ?></li>
    <li><?php echo $this->Html->link(__('Upcoming sessions'), array('plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'index', 'upcoming')); ?></li>
</ul>