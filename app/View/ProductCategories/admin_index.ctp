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
         <!-- <div class="row-fluid">
            <div class="span6">
               <div id="DataTables_Table_0_length" class="dataTables_length">
                  <label>
                     <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
                        <option value="10" selected="selected">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                     </select>
                     <?php //echo __('number row per page'); ?>
                  </label>
               </div>
            </div>
            <div class="span6">
               <div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Search: <input type="text" aria-controls="DataTables_Table_0"></label></div>
            </div>
         </div> -->
         <?php echo $this->Form->create('ProductCategory',array('action'=>'delete_all','admin'=>true)) ?>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><input type="checkbox" id="checkall" onclick="chkallClick(this.id)"></th>
                  <th><?php echo __('category_code');?></th>
                  <th><?php echo __('category_name');?></th>
                  <th><?php echo __('cate_descrition');?></th>
                  <th><?php echo __('position');?></th>
                  <th><?php echo __('category parent');?></th>
                  <th><?php echo __('created');?></th>
                  <th><?php echo __('publish');?></th>
                  <th><?php echo __('actions');?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($productCategories as $key =>$product): ?>
               <tr>
                  <td><?php echo $this->Form->input("ProductCategory.$key.id",array(
                     'type'      =>'checkbox',
                     'value'=> $product['ProductCategory']['id'],
                     'div'       =>false,
                     'label'     =>false,
                     'class'=>"mulchk"
                     
                  ));?>
                  </td>
                  <td class="center"><?php echo h($product['ProductCategory']['code']); ?></td>
                  <td class="center"><?php echo h($product['ProductCategory']['name']); ?></td>
                  <td class="center"><?php echo $product['ProductCategory']['description'] ?></td>
                  <td class="center"><?php echo $product['ProductCategory']['position'] ?></td>
                  <td class="center"><?php echo h($product['ProductCategoryParent']['name']); ?></td>
                  <td class="center">2<?php echo $product['ProductCategory']['created'] ?></td>
                  <td class="center">
                  	<?php if($product['ProductCategory']['publish']){
                  		 echo $this->Html->link(__('Publish'),array(
                           'action'     => 'unpublish',
                            $product['ProductCategory']['id']
                        ),array(
                           'class'  => 'label label-success',
                           'escape' => false
                        ),	__('Are you sure you want to unpulish # %s?', $product['ProductCategory']['name'])
                        ); 
                    }else{ 
						echo $this->Html->link(__('Publish'),array(
                           'action'     => 'publish',
                            $product['ProductCategory']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        ),
                        	__('Are you sure you want to publish # %s?', $product['ProductCategory']['name'])
                        ); 
                    } ?>
                  </td>
                  <td class="center">
                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
                           'controller' => 'product_categories',
                           'action'     => 'admin_edit',
                            $product['ProductCategory']['id']
                        ),array(
                           'class'  => 'btn btn-info',
                           'escape' => false
                        )); ?>
                        <?php echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
                              'controller' => 'product_categories',
                              'action'     => 'admin_delete',
                               $product['ProductCategory']['id']
                           ),array(
                           'class'  => 'btn btn-danger',
                           'escape' => false

                        	),
                           	__('Are you sure you want to delete # %s?', $product['ProductCategory']['name'])
                        ); ?>

                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>

         
         <?php echo $this->element('paginator');?>
         <p style="position:absolute;bottom:26px">
         <?php echo $this->Html->link(__('Add product category'),array(
         'controller'=>'ProductCategories',
         'action'    =>'admin_add'
         ),array('class'=>'btn btn-small btn-info')); ?>
         <?php echo $this->Form->button(__('Delete selected'),array('class'=>'small btn-inverse')); ?>
		</p>
		<?php echo $this->Form->end();?>
      </div>
   </div>
   <!--/span-->
</div>
<!--/row-->