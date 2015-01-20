<div class="trainings index">
    <h2><?php echo __('Trainings'); ?></h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('schedule'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trainings as $training): ?>
                <tr>
                    <td><?php echo h($training['Training']['id']); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link(__(h($training['Training']['title'])), array('admin' => true, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'view', $training['Training']['id'])); ?>&nbsp;</td>
                    <td><?php echo h($training['Training']['schedule']); ?>&nbsp;</td>
                    <td><?php echo h($training['Training']['created']); ?>&nbsp;</td>
                    <td><?php echo h($training['Training']['modified']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php // echo $this->Html->link(__('View'), array('action' => 'view', $training['Training']['id'])); ?>
                        <?php echo $this->Html->link(__('Score'), array('admin' => true, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'score', $training['Training']['id'])); ?> | 
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $training['Training']['id'])); ?>
                        <?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $training['Training']['id']), array(), __('Are you sure you want to delete # %s?', $training['Training']['id'])); ?>
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
    <nav>
        <ul class="pagination">
            <?php
            echo $this->Paginator->first('&lsaquo;', array('tag' => 'li', 'title' => __('First page'), 'escape' => false));
            echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'title' => __('Previous page'), 'disabledTag' => 'span', 'escape' => false), null, array('tag' => 'li', 'disabledTag' => 'span', 'escape' => false, 'class' => 'disabled'));
            echo $this->Paginator->numbers(array('separator' => false, 'tag' => 'li', 'currentTag' => 'span', 'currentClass' => 'active'));
            echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'disabledTag' => 'span', 'title' => __('Next page'), 'escape' => false), null, array('tag' => 'li', 'disabledTag' => 'span', 'escape' => false, 'class' => 'disabled'));
            echo $this->Paginator->last('&rsaquo;', array('tag' => 'li', 'title' => __('First page'), 'escape' => false));
            ?>

        </ul>
    </nav>
</div>


