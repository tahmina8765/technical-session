<div class="trainings view">
    <h2><?php echo __('Training'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($training['Training']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Title'); ?></dt>
        <dd>
            <?php echo h($training['Training']['title']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Schedule'); ?></dt>
        <dd>
            <?php echo h($training['Training']['schedule']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($training['Training']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($training['Training']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Training'), array('action' => 'edit', $training['Training']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Training'), array('action' => 'delete', $training['Training']['id']), array(), __('Are you sure you want to delete # %s?', $training['Training']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Trainings'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Training Users'), array('controller' => 'training_users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training User'), array('controller' => 'training_users', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Polls'); ?></h3>
    <?php if (!empty($training['Poll'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Poll Type'); ?></th>
                <th><?php echo __('Training Id'); ?></th>
                <th><?php echo __('User Id'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($training['Poll'] as $poll): ?>
                <tr>
                    <td><?php echo $poll['id']; ?></td>
                    <td><?php echo $poll['poll_type']; ?></td>
                    <td><?php echo $poll['training_id']; ?></td>
                    <td><?php echo $poll['user_id']; ?></td>
                    <td><?php echo $poll['created']; ?></td>
                    <td><?php echo $poll['modified']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'polls', 'action' => 'view', $poll['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'polls', 'action' => 'edit', $poll['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'polls', 'action' => 'delete', $poll['id']), array(), __('Are you sure you want to delete # %s?', $poll['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="related">
    <h3><?php echo __('Related Training Users'); ?></h3>
    <?php if (!empty($training['TrainingUser'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('User Id'); ?></th>
                <th><?php echo __('Training Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php foreach ($training['TrainingUser'] as $trainingUser): ?>
                <tr>
                    <td><?php echo $trainingUser['id']; ?></td>
                    <td><?php echo $trainingUser['user_id']; ?></td>
                    <td><?php echo $trainingUser['training_id']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'training_users', 'action' => 'view', $trainingUser['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'training_users', 'action' => 'edit', $trainingUser['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'training_users', 'action' => 'delete', $trainingUser['id']), array(), __('Are you sure you want to delete # %s?', $trainingUser['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Training User'), array('controller' => 'training_users', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
