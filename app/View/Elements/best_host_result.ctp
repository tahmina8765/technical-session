<div class="text-center">
    <h1>Best Host </h1>
</div>
<br><br>
<?php
$result    = $this->requestAction(
        'training_manager/Trainings/index/rank'
);
$trainings = $result['training'];
$besttopic = (int) $result['besttopic'];
if (!empty($trainings)) {
    ?>
    <div class="text-center">
        <?php
        foreach ($trainings as $training) {
            $names = array();
            foreach ($training['TrainingUser'] as $usr) {
                $names[] = $usr['User']['name'];
            }
            $name     = implode(', ', $names);
            ?>
            <?php $divclass = ((int) $training['Training']['id'] === $besttopic) ? 'success' : 'default'; ?>
            <!--<li class="topic ">-->
            <?php
            echo $this->Html->link('<div class="panel panel-' . $divclass . '"><div class="panel-body">' . $training['Training']['title'] . '<br>' . $name . '</div></div>', array('plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'best_topic', $training['Training']['id']), array('escape' => false));
            ?>
            <!--</li>-->
            <?php
            break;
        }
        ?>
    </div>
    <?php
}
?>
