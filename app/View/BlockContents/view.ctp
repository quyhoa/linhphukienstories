<div class="blockContents view">
<h2><?php echo __('Block Content'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Block Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($blockContent['BlockCategory']['name'], array('controller' => 'block_categories', 'action' => 'view', $blockContent['BlockCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($blockContent['BlockContent']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Block Content'), array('action' => 'edit', $blockContent['BlockContent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Block Content'), array('action' => 'delete', $blockContent['BlockContent']['id']), array(), __('Are you sure you want to delete # %s?', $blockContent['BlockContent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Block Contents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Block Content'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Block Categories'), array('controller' => 'block_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Block Category'), array('controller' => 'block_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
