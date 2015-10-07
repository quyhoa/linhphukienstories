<div class="blockCategories view">
<h2><?php echo __('Block Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['publish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($blockCategory['BlockCategory']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Block Category'), array('action' => 'edit', $blockCategory['BlockCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Block Category'), array('action' => 'delete', $blockCategory['BlockCategory']['id']), array(), __('Are you sure you want to delete # %s?', $blockCategory['BlockCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Block Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Block Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Block Contents'), array('controller' => 'block_contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Block Content'), array('controller' => 'block_contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Block Contents'); ?></h3>
	<?php if (!empty($blockCategory['BlockContent'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Block Category Id'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($blockCategory['BlockContent'] as $blockContent): ?>
		<tr>
			<td><?php echo $blockContent['id']; ?></td>
			<td><?php echo $blockContent['code']; ?></td>
			<td><?php echo $blockContent['name']; ?></td>
			<td><?php echo $blockContent['description']; ?></td>
			<td><?php echo $blockContent['content']; ?></td>
			<td><?php echo $blockContent['block_category_id']; ?></td>
			<td><?php echo $blockContent['image']; ?></td>
			<td><?php echo $blockContent['file']; ?></td>
			<td><?php echo $blockContent['position']; ?></td>
			<td><?php echo $blockContent['status']; ?></td>
			<td><?php echo $blockContent['created']; ?></td>
			<td><?php echo $blockContent['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'block_contents', 'action' => 'view', $blockContent['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'block_contents', 'action' => 'edit', $blockContent['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'block_contents', 'action' => 'delete', $blockContent['id']), array(), __('Are you sure you want to delete # %s?', $blockContent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Block Content'), array('controller' => 'block_contents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
