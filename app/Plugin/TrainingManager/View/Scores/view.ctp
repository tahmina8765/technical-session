<div class="scores view">
<h2><?php echo __('Score'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($score['Score']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Training'); ?></dt>
		<dd>
			<?php echo $this->Html->link($score['Training']['title'], array('controller' => 'trainings', 'action' => 'view', $score['Training']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($score['User']['name'], array('controller' => 'users', 'action' => 'view', $score['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content Point'); ?></dt>
		<dd>
			<?php echo h($score['Score']['content_point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presentation Point'); ?></dt>
		<dd>
			<?php echo h($score['Score']['presentation_point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discussion Point'); ?></dt>
		<dd>
			<?php echo h($score['Score']['discussion_point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suggetions'); ?></dt>
		<dd>
			<?php echo h($score['Score']['suggetions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($score['Score']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($score['Score']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Score'), array('action' => 'edit', $score['Score']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Score'), array('action' => 'delete', $score['Score']['id']), array(), __('Are you sure you want to delete # %s?', $score['Score']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Scores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Score'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
