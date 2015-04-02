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

                                    if ($display_rank) {
                                        ?>
                        <span class="badge"><?php echo h($training['Training']['point']); ?></span>
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
    <div class="row">
        <div class="col-lg-12 text-muted" style="font-size: 12px;">Sort By <?php echo $this->Paginator->sort('schedule'); ?> | <?php echo $this->Paginator->sort('title'); ?> | <?php echo $this->Paginator->sort('score'); ?></div>
    </div>
    <br>
    <table class="table table-bordered table-archives">
        <tbody>
                    <?php
                    $sl = 1;
                    foreach ($trainings as $training):
                        ?>
            <tr>
                <td>
                    <div class="title"><?php echo h($training['Training']['title']); ?></div>

                    <?php
                    if(date('Y', strtotime($training['Training']['schedule'])) > 2014){
                    ?>
                    <div class="rating">
                        <?php
                        $score  = $training['Training']['score'];
                        $star = 10;
                        
                        for($i = 0; $i < $score; $i+=10){
                            $remaining = $score - ($i+10);
                            if($remaining > 0){
                                $star--;
                            ?>
                        <span class="star full"></span>
                            <?php
                            }else if($remaining>-5){
                                $star--;
                            ?>
                        <span class="star half"></span>
                            <?php    
                            }
                            
                        }
                        for($i = 1; $i <= $star; $i++){
                            ?>
                        <span class="star"></span>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="date-user">
                        <?php
                            if(date('Y', strtotime($training['Training']['schedule'])) > 2014){
                        ?>
                        Rating - <span class="score"><?php echo h($training['Training']['score']); ?></span> | 
                            <?php
                            }
                            echo $this->Time->format(
                                        'M d, Y', $training['Training']['schedule'], null
                                );
                            echo ' - <strong>';    
                            if (!empty($training['TrainingUser'])) {
                                $users = array();
                                foreach ($training['TrainingUser'] as $user) {
                                    $users[] = $user['User']['name'];
                                }
                                $user = implode(', ', $users);
                                echo $user;
                            }
                            echo '<strong>';    
                            ?>
                            
                    </div>
                    <div class="download">                        
                       <?php                
                            echo empty($training['Training']['upload']) ? "" : $this->Html->link(__('<span class="glyphicon glyphicon-download"></span> Download Material', true), Configure::read('Site.url') . 'documents/' . $training['Training']['upload'], array ('escape' => false, 'target' => '_blank'));                                       
                        ?> 
                    </div>

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
            <?php
            break;
    }
    ?>
</div>
