<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="active">
			<a href="index.html"><i class="icon-bar-chart"></i><span class="hidden-tablet"><?php echo __('Product'); ?></span></a>
			</li>	
			<li>
			<a href="<?php echo $this->Html->url(array('controller'=>'ProductCategories','action'=>'index','admin'=>true));?>">
			<i class="icon-folder-open"></i>
			<span class="hidden-tablet"> <?php echo __('Category Product');?></span>
			</a>
			</li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'Products','action'=>'index','admin'=>true));?>">
			<i class="icon-folder-open"></i><span class="hidden-tablet"> 
			<?php echo __("Products list");?></span></a></li>

			<li><a href="<?php echo $this->Html->url(array('controller'=>'ProductNews','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __('Sản phẩm mới');?></span></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'ProductSpecials','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"> <?php echo __("Hot Product"); ?></span></a></li>
			
		<!--content block -->	
			<li class="active"><a><i class="icon-tasks"></i><span class="hidden-tablet"> <?php echo __("Block content"); ?></span></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'Banners','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __("Quản lý banner");?></span></a></li>
		    <!-- <li><a href="<?php echo $this->Html->url(array('controller'=>'BlockCategories','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __("Block category");?></span></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'BlockContents','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"> <?php echo __("BlockContents");?></span></a></li> -->
			
		<!-- Pages list -->		
			<li class="active"><a><i class="icon-tasks"></i><span class="hidden-tablet"> <?php echo __('Pages');?></span></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'PageLists','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __('List page');?></span></a></li>
		<!-- News -->	
			<li class="active"><a><i class="icon-tasks"></i><span class="hidden-tablet"><?php echo __("News"); ?></span></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'NewsCategories','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __('News category');?></span></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'News','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __('News list');?></span></a></li>
			
			<li class="active"><a><i class="icon-tasks"></i><span class="hidden-tablet"> <?php echo  __('Danh mục thành viên'); ?></span></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'Admins','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __('Quản trị viên');?></span></a></li>
			<!-- <li><a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __('Member');?></span></a></li> -->

			<li class="active"><a><i class="icon-tasks"></i><span class="hidden-tablet"> <?php echo  __('Danh mục đặt hàng'); ?></span></a></li>
			<li><a href="<?php echo $this->Html->url(array('controller'=>'Orders','action'=>'index','admin'=>true));?>"><i class="icon-folder-open"></i><span class="hidden-tablet"><?php echo __('Danh sách đặt hàng');?></span></a></li>
		</ul>
	</div>
</div>