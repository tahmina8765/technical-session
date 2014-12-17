
<div class="panel panel-default">
    <?php echo $this->Form->create('Training', array('plugin' => 'training_management', 'controller' => 'Trainings', 'action' => 'search', 'class' => '')); ?>
    <div class="panel-body">
        <fieldset>
            <?php
            echo $this->Form->input('Search.title', array('div' => array('class' => 'form-group'), 'label' => 'Training Name', 'type' => 'text', 'class' => 'form-control', 'required' => false));
            ?>
            <?php
            echo $this->Form->input('Search.schedule', array('div' => array('class' => 'form-group'), 'label' => 'Training Schedule', 'type' => 'text', 'class' => 'form-control', 'required' => false));
            ?>

            <?php
//                        echo $this->Form->input('Search.cuisines', array (
//                            'empty'    => __('All', true),
//                            'type'     => 'select',
//                            'label'=>false,
//                            'multiple' => 'checkbox',
//                        ));
            ?>
        </fieldset>

    </div>

    <div class="panel-footer">
        <?php echo $this->Form->submit('Find', array('class' => 'btn btn-success')); ?>
    </div>
    <?php echo $this->Form->end(); //debug($this->passedArgs['Search.cuisines']) ?>

</div>

<div class="trainings index">
    <h2><?php echo __('Trainings'); ?></h2>
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
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Training'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Polls'), array('controller' => 'polls', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Poll'), array('controller' => 'polls', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Training Users'), array('controller' => 'training_users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Training User'), array('controller' => 'training_users', 'action' => 'add')); ?> </li>
    </ul>
</div>
