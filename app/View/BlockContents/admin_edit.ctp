<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li>
   		<a href="#"><?php echo __("Block content"); ?></a>
   		<i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Edit block's content"); ?></a></li>
</ul>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-content">
				<div class="box span12">
					<?php echo $this->element('block_content/form'); ?>
				</div><!--/span-->
			
		</div>
	</div>
</div>
