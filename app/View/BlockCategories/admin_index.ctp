<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Block categories"); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-header" data-original-title>
         <h2><?php echo __("Block categories"); ?></h2>

      </div>
      <div class="box-content">
        <?php echo $this->Form->create('BlockCategory',array('action'=>'delete_all','admin'=>true)) ?>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><input type="checkbox" id="checkall" onclick="chkallClick(this.id)"></th>
                  <th><?php echo __('block_cate_code');?></th>
                  <th><?php echo __('block_cate_name');?></th>
                  <th><?php echo __('descrition');?></th>
                  <th><?php echo __('position');?></th>
                  <th><?php echo __('block_cate_parent');?></th>
                  <th><?php echo __('created');?></th>
                  <th><?php echo __('publish');?></th>
                  <th><?php echo __('actions');?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($blockCategories as $key =>$cate): ?>
               <tr>
                  <td><?php echo $this->Form->input("BlockCategory.$key.id",array(
                     'type'      =>'checkbox',
                     'value'=> $cate['BlockCategory']['id'],
                     'div'       =>false,
                     'label'     =>false,
                     'class'=>"mulchk"
                     
                  ));?>
                  </td>
                  <td class="center"><?php echo h($cate['BlockCategory']['code']); ?></td>
                  <td class="center"><?php echo h($cate['BlockCategory']['name']); ?></td>
                  <td class="center"><?php echo $cate['BlockCategory']['description'] ?></td>
                  <td class="center"><?php echo $cate['BlockCategory']['position'] ?></td>
                  <td class="center"><?php echo h($cate['BlockCategoryParent']['name']); ?></td>
                  <td class="center">2<?php echo $cate['BlockCategory']['created'] ?></td>
                  <td class="center">
                  	<?php if($cate['BlockCategory']['publish']){
                  		 echo $this->Html->link(__('Publish'),array(
                           'action'     => 'unpublish',
                            $cate['BlockCategory']['id']
                        ),array(
                           'class'  => 'label label-success',
                           'escape' => false
                        ),	__('Are you sure you want to unpulish # %s?', $cate['BlockCategory']['name'])
                        ); 
                    }else{ 
						echo $this->Html->link(__('Publish'),array(
                           'action'     => 'publish',
                            $cate['BlockCategory']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        ),
                        	__('Are you sure you want to publish # %s?', $cate['BlockCategory']['name'])
                        ); 
                    } ?>
                  </td>
                  <td class="center">
                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
                           'action'     => 'admin_edit',
                            $cate['BlockCategory']['id']
                        ),array(
                           'class'  => 'btn btn-info',
                           'escape' => false
                        )); ?>
                        <?php echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
                              'action'     => 'admin_delete',
                               $cate['BlockCategory']['id']
                           ),array(
                           'class'  => 'btn btn-danger',
                           'escape' => false

                        	),
                           	__('Are you sure you want to delete # %s?', $cate['BlockCategory']['name'])
                        ); ?>

                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>

         
         <?php echo $this->element('paginator');?>
         <p style="position:absolute;bottom:26px">
         <?php echo $this->Html->link(__('Add cate category'),array(
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