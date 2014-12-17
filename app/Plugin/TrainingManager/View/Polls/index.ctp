<div class="polls index">
    <h2><?php echo __('Polls'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('poll_type'); ?></th>
                <th><?php echo $this->Paginator->sort('training_id'); ?></th>
                <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll): ?>
                <tr>
                    <td><?php echo h($poll['Poll']['id']); ?>&nbsp;</td>
                    <td><?php echo h($poll['Poll']['poll_type']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($poll['Training']['title'], array('controller' => 'trainings', 'action' => 'view', $poll['Training']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($poll['User']['id'], array('controller' => 'users', 'action' => 'view', $poll['User']['id'])); ?>
                    </td>
                    <td><?php echo h($poll['Poll']['created']); ?>&nbsp;</td>
                    <td><?php echo h($poll['Poll']['modified']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $poll['Poll']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $poll['Poll']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $poll['Poll']['id']), array(), __('Are you sure you want to delete # %s?', $poll['Poll']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Poll'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
