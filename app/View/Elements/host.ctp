<?php
$besttopic = (int) $this->Session->read('Auth.besttopic');
?>
<div class="panel panel-success">
    <div class="panel-heading text-center">
        <h3>Vote for your favorite session! </h3>
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