<div class="contentCategories view">
<h2><?php echo __('Content Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['sort']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($contentCategory['ContentCategory']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Content Category'), array('action' => 'edit', $contentCategory['ContentCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Content Category'), array('action' => 'delete', $contentCategory['ContentCategory']['id']), array(), __('Are you sure you want to delete # %s?', $contentCategory['ContentCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Content Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Contents'); ?></h3>
	<?php if (!empty($contentCategory['Content'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Detail Short'); ?></th>
		<th><?php echo __('Detail'); ?></th>
		<th><?php echo __('Content Category Id'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Image Large'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Sort'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($contentCategory['Content'] as $content): ?>
		<tr>
			<td><?php echo $content['id']; ?></td>
			<td><?php echo $content['code']; ?></td>
			<td><?php echo $content['name']; ?></td>
			<td><?php echo $content['detail_short']; ?></td>
			<td><?php echo $content['detail']; ?></td>
			<td><?php echo $content['content_category_id']; ?></td>
			<td><?php echo $content['image']; ?></td>
			<td><?php echo $content['image_large']; ?></td>
			<td><?php echo $content['file']; ?></td>
			<td><?php echo $content['sort']; ?></td>
			<td><?php echo $content['status']; ?></td>
			<td><?php echo $content['created']; ?></td>
			<td><?php echo $content['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contents', 'action' => 'view', $content['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contents', 'action' => 'edit', $content['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contents', 'action' => 'delete', $content['id']), array(), __('Are you sure you want to delete # %s?', $content['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
