<div class="trainings index">
    <h2><?php echo __('Training Archive'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>SL</th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('schedule'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sl = 1;
            foreach ($trainings as $training):
                ?>
                <tr>                    
                    <td><?php echo $sl++; ?>&nbsp;</td>
                    <td><?php echo h($training['Training']['title']); ?>&nbsp;</td>
                    <td><?php echo h($training['Training']['schedule']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $training['Training']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $training['Training']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $training['Training']['id']), array(), __('Are you sure you want to delete # %s?', $training['Training']['id'])); ?>
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
