<?php
$result     = $this->requestAction(
        'training_manager/Trainings/index/upcoming'
);
date_default_timezone_set('Asia/Dhaka');
$trainings  = $result['training'];
$today      = date('Y-m-d H:i:s');
$today_date = date('Y-m-d');

if (!empty($trainings)) {
    ?>
    <div class='text-center'>
        <?php
        foreach ($trainings as $training) {
            $schedule   = $training['Training']['schedule'];
            $votingtime = $schedule . ' 17:00:00';

            $datetime1 = new DateTime($today);
            $datetime2 = new DateTime($votingtime);
            $interval  = $datetime1->diff($datetime2);
            $diff      = $interval->format('%R');
//            echo $interval->format('%R%a days %H hours %i min %s sec');


            if ($today_date == $schedule) {
                ?>
                <h3>Today's session on</h3>
                <?php
            } else {
                ?>
                <h3>Next session on</h3>
                <?php
            }
            $names = array();
            foreach ($training['TrainingUser'] as $usr) {
                $names[] = $usr['User']['name'];
            }
            $name = implode(', ', $names);
            ?>

            <h1><?php echo $training['Training']['title']; ?></h1>
            <p>By<br><br>
                <strong><?php echo $name; ?></strong>
            </p>

            <?php
//            echo $diff;
//            echo $today_date;
//            echo $schedule;
            if (($diff == '-') && ($today_date == $schedule)) {
                ?>
                <?php echo $this->Html->link(__('Rate this session'), array('admin' => false, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'score', $training['Training']['id']), array('class' => 'btn btn-primary')); ?>
                <?php
            }
            ?>
            <?php
            break;
        }
        ?>
    </div>
    <?php
}
