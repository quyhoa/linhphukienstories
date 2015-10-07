<div class="contents index">
	<h2><?php echo __('Contents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('detail_short'); ?></th>
			<th><?php echo $this->Paginator->sort('detail'); ?></th>
			<th><?php echo $this->Paginator->sort('content_category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('image_large'); ?></th>
			<th><?php echo $this->Paginator->sort('file'); ?></th>
			<th><?php echo $this->Paginator->sort('sort'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($contents as $content): ?>
	<tr>
		<td><?php echo h($content['Content']['id']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['code']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['name']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['detail_short']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['detail']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($content['ContentCategory']['name'], array('controller' => 'content_categories', 'action' => 'view', $content['ContentCategory']['id'])); ?>
		</td>
		<td><?php echo h($content['Content']['image']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['image_large']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['file']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['sort']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['status']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['created']); ?>&nbsp;</td>
		<td><?php echo h($content['Content']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $content['Content']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $content['Content']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $content['Content']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $content['Content']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Content'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Content Categories'), array('controller' => 'content_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content Category'), array('controller' => 'content_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
