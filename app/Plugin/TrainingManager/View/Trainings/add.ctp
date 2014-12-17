<div class="trainings form">
    <?php echo $this->Form->create('Training'); ?>
    <fieldset>
        <legend><?php echo __('Add Training'); ?></legend>
        <?php
        echo $this->Form->input('title');
        echo $this->Form->input('schedule');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Trainings'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Training Users'), array('controller' => 'training_users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training User'), array('controller' => 'training_users', 'action' => 'add')); ?> </li>
    </ul>
</div>
