<div class="polls view">
    <h2><?php echo __('Poll'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($poll['Poll']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Poll Type'); ?></dt>
        <dd>
            <?php echo h($poll['Poll']['poll_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Training'); ?></dt>
        <dd>
            <?php echo $this->Html->link($poll['Training']['title'], array('controller' => 'trainings', 'action' => 'view', $poll['Training']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($poll['User']['id'], array('controller' => 'users', 'action' => 'view', $poll['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($poll['Poll']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($poll['Poll']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Poll'), array('action' => 'edit', $poll['Poll']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Poll'), array('action' => 'delete', $poll['Poll']['id']), array(), __('Are you sure you want to delete # %s?', $poll['Poll']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Polls'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Poll'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
