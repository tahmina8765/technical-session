<?php
$result     = $this->requestAction(
        'training_manager/Trainings/index/upcoming'
);
date_default_timezone_set('Asia/Dhaka');
$trainings  = $result['training'];
$today      = date('Y-m-d H:i:s');
$today_date = date('Y-m-d');

if (!empty($trainings)) {
    foreach ($trainings as $training) {
        ?>
        <div class="jumbotron">
            <div class="container">
                <?php
                echo $this->Html->image($training['Training']['image'], array('class' => 'pull-right img-rounded'));
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
                <p>By - <?php echo $name; ?>
                </p>

                <?php
//            echo $diff;
//            echo $today_date;
//            echo $schedule;
                if (($diff == '-') && ($today_date == $schedule)) {
                    ?>
                    <?php echo $this->Html->link(__('Rate this session'), array('admin' => false, 'plugin' => 'training_manager', 'controller' => 'Trainings', 'action' => 'score', $training['Training']['id']), array('class' => 'btn btn-primary btn-rate btn-lg')); ?>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>What will be covered?</h1>
                    <p><?php echo nl2br(htmlspecialchars($training['Training']['content'])); ?></p>
                </div>
            </div>
        </div>
        <?php
        break;
    }
}
