<div class="scores form">
<?php echo $this->Form->create('Score'); ?>
	<fieldset>
		<legend><?php echo __('Edit Score'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('training_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('content_point');
		echo $this->Form->input('presentation_point');
		echo $this->Form->input('discussion_point');
		echo $this->Form->input('suggetions');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Score.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Score.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Scores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
