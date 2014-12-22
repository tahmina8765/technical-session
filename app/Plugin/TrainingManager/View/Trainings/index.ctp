<div class="trainings index">
    <h2><?php echo __($title); ?></h2>
    <?php
    foreach ($trainings as $training) {
        ?>
        <div class="panel panel-default">    
            <div class="panel-heading">
                <strong><?php echo h($training['Training']['title']); ?></strong>
            </div>
            <div class="panel-body">         
                <div class="row">
                    <div class="col-sm-9">
                        <p><?php
                            if (!empty($training['TrainingUser'])) {
                                $users = array();
                                foreach ($training['TrainingUser'] as $user) {
                                    $users[] = $user['User']['name'];
                                }
                                $user = implode(',', $users);
                                echo 'Host - ' . $user;
                            }
                            ?>
                            <span class="badge"><?php echo h($training['Training']['point']); ?></span>
                            <br>
                            <i>
                            <?php
                            
                            if (!empty($training['Training']['schedule'])) {

                                echo $this->Time->format(
                                        'F jS, Y', $training['Training']['schedule'], null
                                );
                            }
                            ?>
                            </i>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
    /*
    ?>
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

*/