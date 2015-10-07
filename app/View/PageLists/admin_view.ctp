<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li>
   		<a href="#"><?php echo __("Page list"); ?></a>
   		<i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("view page"); ?></a></li>
</ul>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-content">
				<div class="box span12" style="border:none">
					<?php 
						if(!empty($page))
						{
							echo $page['PageList']['content'];
						}
						else{
							echo __('Page no content');
						}
					?>
				</div><!--/span-->
				<div class="form-actions" style="margin:0">
				  	<?php echo $this->Form->button(__('Back'),array(
							'type'  => 'button',
							'class' => 'btn',
							'onclick'=>'back()'
					)); ?>
				</div>
		</div>
	</div>
</div>
