<div class="trainings form">
    <?php echo $this->Form->create('Training'); ?>
    <fieldset>
        <legend><?php echo __('Admin Edit Training'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title');
        echo $this->Form->input('schedule');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Training.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Training.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Trainings'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Training Users'), array('controller' => 'training_users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training User'), array('controller' => 'training_users', 'action' => 'add')); ?> </li>
    </ul>
</div>
