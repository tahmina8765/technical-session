<style>
    
    .topic{
        display: block; float: left; width: 18%; margin-right: 2%; margin-bottom: 2%;
    }
    .topic a{
        color: white;
    }
    .topic div{
        background: #2a2a2a;
        display: block; height: 80px; border: 1px solid #f6f6f6;
    }
    .topic div a{
        text-decoration: none;
        color: white;
    }
    .best div{
        background: green;
        color: white;
    }
</style>
<?php
$besttopic = (int) $this->Session->read('besttopic');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Vote to your favorite session :) </h3>
    </div>
    <div class="panel-body">
        <?php
        $trainings = $this->requestAction(
                'training_manager/Trainings/index/archive'
        );
        if (!empty($trainings)) {
            ?>
            <ul>
                <?php
                foreach ($trainings as $training) {
                    ?>
                    <li class="topic <?php echo ((int) $training['Training']['id'] === $besttopic) ? 'best' : ''; ?>">
                        <?php
                        echo $this->Html->link('<div class="text-center">' . $training['Training']['title'] . '</div>', array('plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'best_topic', $training['Training']['id']), array('escape' => false));
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <?php
        }
        ?>
    </div>
</div>