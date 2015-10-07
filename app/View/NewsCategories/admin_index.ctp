<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("News categories"); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-header" data-original-title>
         <h2><?php echo __("News categories"); ?></h2>

      </div>
      <div class="box-cate">
        <?php echo $this->Form->create('NewsCategory',array('action'=>'delete_all','admin'=>true)) ?>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><input type="checkbox" id="checkall" onclick="chkallClick(this.id)"></th>
                  <th><?php echo __('news_cate_code');?></th>
                  <th><?php echo __('news_cate_name');?></th>
                  
                  <th><?php echo __('created');?></th>
                  <th><?php echo __('publish');?></th>
                  <th><?php echo __('actions');?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($newsCategories as $key =>$cate): ?>
               <tr>
                  <td><?php echo $this->Form->input("NewsCategory.$key.id",array(
                     'type'      =>'checkbox',
                     'value'=> $cate['NewsCategory']['id'],
                     'div'       =>false,
                     'label'     =>false,
                     'class'=>"mulchk"
                     
                  ));?>
                  </td>
                  <td class="center"><?php echo h($cate['NewsCategory']['code']); ?></td>
                  <td class="center"><?php echo h($cate['NewsCategory']['name']); ?></td>
                   <td class="center"><?php echo $cate['NewsCategory']['created'] ?></td>
                  <td class="center">
                  	<?php if($cate['NewsCategory']['publish']){
                  		 echo $this->Html->link(__('Publish'),array(
                           'action'     => 'unpublish',
                            $cate['NewsCategory']['id']
                        ),array(
                           'class'  => 'label label-success',
                           'escape' => false
                        ),	__('Are you sure you want to unpulish # %s?', $cate['NewsCategory']['name'])
                        ); 
                    }else{ 
						echo $this->Html->link(__('Publish'),array(
                           'action'     => 'publish',
                            $cate['NewsCategory']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        ),
                        	__('Are you sure you want to publish # %s?', $cate['NewsCategory']['name'])
                        ); 
                    } ?>
                  </td>
                  <td class="center">
                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
                           'action'     => 'admin_edit',
                            $cate['NewsCategory']['id']
                        ),array(
                           'class'  => 'btn btn-info',
                           'escape' => false
                        )); ?>
                        <?php echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
                              'action'     => 'admin_delete',
                               $cate['NewsCategory']['id']
                           ),array(
                           'class'  => 'btn btn-danger',
                           'escape' => false

                        	),
                           	__('Are you sure you want to delete # %s?', $cate['NewsCategory']['name'])
                        ); ?>

                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>

         
         <?php echo $this->element('paginator');?>
         <p style="position:absolute;bottom:10px;margin-top:10px">
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