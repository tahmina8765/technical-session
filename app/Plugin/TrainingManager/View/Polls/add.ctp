<div class="polls form">
    <?php echo $this->Form->create('Poll'); ?>
    <fieldset>
        <legend><?php echo __('Add Poll'); ?></legend>
        <?php
        echo $this->Form->input('poll_type');
        echo $this->Form->input('training_id');
        echo $this->Form->input('user_id');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Polls'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
