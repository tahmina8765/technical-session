
<div class="text-center">
    <h1>Vote for your favorite session! </h1>
</div>
<br><br>
<?php
$result = $this->requestAction(
        'training_manager/Trainings/index/vote'
);

$trainings = $result['training'];
$besttopic = (int) $result['besttopic'];
if (!empty($trainings)) {
    ?>
    <ul>
        <?php
        foreach ($trainings as $training) {
            $names = array();
            foreach ($training['TrainingUser'] as $usr) {
                $names[] = $usr['User']['name'];
            }
            $name     = implode(', ', $names);
            ?>
            <?php $divclass = ((int) $training['Training']['id'] === $besttopic) ? 'success' : 'default'; ?>
            <?php $voteimg = ((int) $training['Training']['id'] === $besttopic) ? '<br>' .$this->Html->image('thumbs-up.png') : ''; ?>
            <li class="topic ">
                <?php
                echo $this->Html->link('<div class="panel panel-' . $divclass . '"><div class="panel-heading">' . $training['Training']['title'] . $voteimg .'</div><div class="panel-footer">' . $name . '</div></div>', array('plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'best_topic', $training['Training']['id']), array('escape' => false));
                ?>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>
