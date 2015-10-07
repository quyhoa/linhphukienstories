<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Product categories"); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-header" data-original-title>
         <h2><?php echo __("Product categories"); ?></h2>

      </div>
      <div class="box-content">
         <?php echo $this->Form->create('ProductSpecial',array('action'=>'delete_all','admin'=>true)) ?>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><input type="checkbox" id="checkall" onclick="chkallClick(this.id)"></th>
                  <th><?php echo __('Name product');?></th>
                  <th><?php echo __('sort');?></th>
                  <th><?php echo __('created');?></th>
                  <th><?php echo __('publish');?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($productCategories as $key =>$product): ?>
               <tr>
                  <td><?php echo $this->Form->input("ProductSpecial.$key.id",array(
                     'type'      =>'checkbox',
                     'value'=> $product['ProductSpecial']['id'],
                     'div'       =>false,
                     'label'     =>false,
                     'class'=>"mulchk"
                     
                  ));?>
                  </td>
                  <td class="center"><?php echo h($product['Product']['name']); ?></td>
                  <td class="center"><?php echo h($product['ProductSpecial']['sort']); ?></td>
                  <td class="center">2<?php echo $product['ProductSpecial']['created'] ?></td>
                  <td class="center">
                  	<?php if($product['ProductSpecial']['publish']){
                  		 echo $this->Html->link(__('Publish'),array(
                           'action'     => 'unpublish',
                            $product['ProductSpecial']['id']
                        ),array(
                           'class'  => 'label label-success',
                           'escape' => false
                        ),	__('Are you sure you want to unpulish # %s?', $product['ProductSpecial']['id'])
                        ); 
                    }else{ 
						echo $this->Html->link(__('Unblish'),array(
                           'action'     => 'publish',
                            $product['ProductSpecial']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        ),
                        	__('Are you sure you want to publish # %s?', $product['ProductSpecial']['id'])
                        ); 
                    } ?>
                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>

         
         <?php echo $this->element('paginator');?>
         <p style="position:absolute;bottom:26px">
         <?php echo $this->Form->button(__('Delete selected'),array('class'=>'small btn-inverse')); ?>
		</p>
		<?php echo $this->Form->end();?>
      </div>
   </div>
   <!--/span-->
</div>
<!--/row-->