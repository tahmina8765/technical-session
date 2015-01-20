<div class="trainings index">
    <h2><?php echo __($title); ?></h2>
    <?php
    $display_rank = false;
    switch ($type) {
        case 'rank':
            $display_rank = true;
        case 'vote':        
        case 'upcoming':
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
                                    
                                    if($display_rank){
                                    ?>
                                    <span class="badge"><?php echo h($training['Training']['point']);       ?></span>
                                    <br>
                                    <?php
                                    }
                                    ?>
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
            break;
        default:
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('schedule'); ?></th>
                        <th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th>Host</th>                        
                        <th>Score</th>                        
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl = 1;
                    foreach ($trainings as $training):
                        ?>
                        <tr> 
                            <td><?php
                                echo $this->Time->format(
                                        'M dS, Y', $training['Training']['schedule'], null
                                );
                                //          echo h($training['Training']['schedule']); 
                                ?>
                            </td>
                            <td><?php echo h($training['Training']['title']); ?></td>
                            <td><?php
                                if (!empty($training['TrainingUser'])) {
                                    $users = array();
                                    foreach ($training['TrainingUser'] as $user) {
                                        $users[] = $user['User']['name'];
                                    }
                                    $user = implode(',', $users);
                                    echo $user;
                                }
                                ?></td>

                            <td><?php echo h($training['Training']['score']); ?></td>
                            <td></td>
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
            <?php
            break;
    }
    ?>
</div>