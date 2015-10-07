<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Pages list"); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-header" data-original-title>
         <h2><?php echo __("Page list"); ?></h2>

      </div>
      <div class="box-content">
        
         <?php echo $this->Form->create('PageList',array('action'=>'delete_all','admin'=>true)) ?>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><input type="checkbox" id="checkall" onclick="chkallClick(this.id)"></th>
                  <th><?php echo __('page_code');?></th>
                  <th><?php echo __('page_name');?></th>
                  <th><?php echo __('page_type');?></th>
                  <th><?php echo __('position');?></th>
                  <th><?php echo __('category parent');?></th>
                  <th><?php echo __('created');?></th>
                  <th><?php echo __('view');?></th>
                  <th><?php echo __('publish');?></th>
                  <th><?php echo __('actions');?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($pageLists as $key =>$page): ?>
               <tr>
                  <td><?php echo $this->Form->input("PageList.$key.id",array(
                     'type'      =>'checkbox',
                     'value'=> $page['PageList']['id'],
                     'div'       =>false,
                     'label'     =>false,
                     'class'=>"mulchk"
                     
                  ));?>
                  </td>
                  <td class="center"><?php echo h($page['PageList']['code']); ?></td>
                  <td class="center"><?php echo h($page['PageList']['name']); ?></td>
                  <td class="center"><?php echo ($page['PageList']['type']==1)?__('page_static'):__('page_dynamic'); ?></td>
                  <td class="center"><?php echo $page['PageList']['position'] ?></td>
                  <td class="center"><?php echo h($page['PageListParent']['name']); ?></td>
                  <td class="center"><?php echo date('Y-m-d',strtotime($page['PageList']['created'])) ?></td>
                  <td class="center"><?php echo $this->Html->link(__('view'),array(
                           'action'     => 'view',
                            $page['PageList']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        )
                           
                        ); ?></td>
                  <td class="center">
                  	<?php if($page['PageList']['publish']){
                  		 echo $this->Html->link(__('Publish'),array(
                           'action'     => 'unpublish',
                            $page['PageList']['id']
                        ),array(
                           'class'  => 'label label-success',
                           'escape' => false
                        ),	__('Are you sure you want to unpulish # %s?', $page['PageList']['name'])
                        ); 
                    }else{ 
						echo $this->Html->link(__('Publish'),array(
                           'action'     => 'publish',
                            $page['PageList']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        ),
                        	__('Are you sure you want to publish # %s?', $page['PageList']['name'])
                        ); 
                    } ?>
                  </td>
                  <td class="center">
                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
                           'action'     => 'admin_edit',
                            $page['PageList']['id']
                        ),array(
                           'class'  => 'btn btn-info',
                           'escape' => false
                        )); ?>
                        <?php echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
                              'action'     => 'admin_delete',
                               $page['PageList']['id']
                           ),array(
                           'class'  => 'btn btn-danger',
                           'escape' => false

                        	),
                           	__('Are you sure you want to delete # %s?', $page['PageList']['name'])
                        ); ?>

                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>

         
         <?php echo $this->element('paginator');?>
         <p style="position:absolute;bottom:26px">
         <?php echo $this->Html->link(__('Add page'),array(
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