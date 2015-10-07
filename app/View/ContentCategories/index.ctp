<div class="contentCategories index">
	<h2><?php echo __('Content Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('parent'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('sort'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($contentCategories as $contentCategory): ?>
	<tr>
		<td><?php echo h($contentCategory['ContentCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($contentCategory['ContentCategory']['code']); ?>&nbsp;</td>
		<td><?php echo h($contentCategory['ContentCategory']['name']); ?>&nbsp;</td>
		<td><?php echo h($contentCategory['ContentCategory']['parent']); ?>&nbsp;</td>
		<td><?php echo h($contentCategory['ContentCategory']['description']); ?>&nbsp;</td>
		<td><?php echo h($contentCategory['ContentCategory']['sort']); ?>&nbsp;</td>
		<td><?php echo h($contentCategory['ContentCategory']['status']); ?>&nbsp;</td>
		<td><?php echo h($contentCategory['ContentCategory']['created']); ?>&nbsp;</td>
		<td><?php echo h($contentCategory['ContentCategory']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contentCategory['ContentCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contentCategory['ContentCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contentCategory['ContentCategory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $contentCategory['ContentCategory']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Content Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
