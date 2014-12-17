<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Vote to your favorite Host :) </h3>
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
            foreach($trainings as $training){
                ?>
            <li style="display: block; float: left; width: 18%; margin-right: 2%; margin-bottom: 2%; height: 200px; border: 1px solid #f6f6f6;"><div class="text-center">
                <?php
                echo $training['Training']['title'];
                ?>
                </div></li>
            <?php
            }
            ?>
        </ul>
        <?php
        }
        ?>
    </div>
</div>