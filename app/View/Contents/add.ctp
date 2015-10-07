<div class="contents form">
<?php echo $this->Form->create('Content'); ?>
	<fieldset>
		<legend><?php echo __('Add Content'); ?></legend>
	<?php
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('detail_short');
		echo $this->Form->input('detail');
		echo $this->Form->input('content_category_id');
		echo $this->Form->input('image');
		echo $this->Form->input('image_large');
		echo $this->Form->input('file');
		echo $this->Form->input('sort');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Content Categories'), array('controller' => 'content_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content Category'), array('controller' => 'content_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
