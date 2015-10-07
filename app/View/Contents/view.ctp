<div class="contents view">
<h2><?php echo __('Content'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($content['Content']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($content['Content']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($content['Content']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail Short'); ?></dt>
		<dd>
			<?php echo h($content['Content']['detail_short']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detail'); ?></dt>
		<dd>
			<?php echo h($content['Content']['detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($content['ContentCategory']['name'], array('controller' => 'content_categories', 'action' => 'view', $content['ContentCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($content['Content']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Large'); ?></dt>
		<dd>
			<?php echo h($content['Content']['image_large']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File'); ?></dt>
		<dd>
			<?php echo h($content['Content']['file']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort'); ?></dt>
		<dd>
			<?php echo h($content['Content']['sort']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($content['Content']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($content['Content']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($content['Content']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Content'), array('action' => 'edit', $content['Content']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Content'), array('action' => 'delete', $content['Content']['id']), array(), __('Are you sure you want to delete # %s?', $content['Content']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Content Categories'), array('controller' => 'content_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content Category'), array('controller' => 'content_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
