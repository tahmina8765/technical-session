<div class="trainingUsers view">
    <h2><?php echo __('Training User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($trainingUser['TrainingUser']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($trainingUser['User']['id'], array('controller' => 'users', 'action' => 'view', $trainingUser['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Training'); ?></dt>
        <dd>
            <?php echo $this->Html->link($trainingUser['Training']['title'], array('controller' => 'trainings', 'action' => 'view', $trainingUser['Training']['id'])); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Training User'), array('action' => 'edit', $trainingUser['TrainingUser']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Training User'), array('action' => 'delete', $trainingUser['TrainingUser']['id']), array(), __('Are you sure you want to delete # %s?', $trainingUser['TrainingUser']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Training Users'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training User'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
    </ul>
</div>
