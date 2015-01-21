<div class="scores form">
    <?php
    echo $this->Form->create('Score', array(
        'class'         => 'form-horizontal',
        'role'          => 'form',
        'inputDefaults' => array(
            'format'  => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div'     => array('class' => 'form-group'),
            'class'   => array('form-control'),
            'label'   => array('class' => 'col-lg-2 control-label'),
            'between' => '<div class="col-lg-10">',
            'after'   => '</div>',
            'error'   => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));
    $options = array(
        ''   => '--Select--',
        '0'  => '0 - N/A',
        '1'  => '1 - Less than Unsatisfied',
        '2'  => '2 - Unsatisfied',
        '3'  => '3 - More than Unsatisfied',
        '4'  => '4 - Acceptable',
        '5'  => '5 - More than Acceptable',
        '6'  => '6 - Good',
        '7'  => '7 - Very Good',
        '8'  => '8 - Nearly Excellent',
        '9'  => '9 - Excellent',
        '10' => 'Above Excellent',
    );
    ?>
    <fieldset>
        <legend><?php echo __('Add Score'); ?>: <?php echo __($trainings['Training']['title']); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('training_id', array('type' => 'hidden'));
        echo $this->Form->input('user_id', array(
            'type'    => 'select',
            'options' => $users));
        echo $this->Form->input('content_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('presentation_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('discussion_point', array(
            'type'    => 'select',
            'options' => $options));
        echo $this->Form->input('suggetions', array('label' => array('class' => 'col-lg-2 control-label', 'text' => 'Suggestions to improve')));
        ?>
    </fieldset>
    <?php echo $this->Form->button('submit', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')); ?>
    <?php echo $this->Form->end(); ?>
</div>

<div class="scores index">
    <h2><?php echo __('Scores'); ?>: <?php echo count($scores);?></h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Content point</th>
                <th>Presentation point</th>
                <th>Discussion point</th>
                <th>Suggestions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scores as $score): ?>
                <tr>
    <!--                    <td><?php // echo h($score['Score']['id']);  ?>&nbsp;</td>
                    <td>
                    <?php // echo $this->Html->link($score['Training']['title'], array('controller' => 'trainings', 'action' => 'view', $score['Training']['id'])); ?>
                    </td>-->
                    <td>
                        <?php echo $this->Html->link($score['User']['name'], array('controller' => 'users', 'action' => 'view', $score['User']['id'])); ?>
                    </td>
                    <td><?php echo h($score['Score']['content_point']); ?>&nbsp;</td>
                    <td><?php echo h($score['Score']['presentation_point']); ?>&nbsp;</td>
                    <td><?php echo h($score['Score']['discussion_point']); ?>&nbsp;</td>
                    <td><?php echo h($score['Score']['suggetions']); ?>&nbsp;</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>