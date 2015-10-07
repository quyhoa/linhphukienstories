<div class="contentCategories form">
<?php echo $this->Form->create('ContentCategory'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Content Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('parent');
		echo $this->Form->input('description');
		echo $this->Form->input('sort');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ContentCategory.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ContentCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Content Categories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
