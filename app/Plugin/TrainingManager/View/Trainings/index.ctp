<div class="trainings index">
    <h2><?php echo __($title); ?></h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('schedule'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sl = 1;
            foreach ($trainings as $training):
                ?>
                <tr>                    
                    <td><?php echo h($training['Training']['title']); ?>&nbsp;</td>
                    <td><?php
                        echo $this->Time->format(
                                'F jS, Y', $training['Training']['schedule'], null
                        );
                        //          echo h($training['Training']['schedule']); 
                        ?>&nbsp;</td>
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
