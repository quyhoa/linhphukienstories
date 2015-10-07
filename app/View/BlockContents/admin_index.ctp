<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("Block content"); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-header" data-original-title>
         <h2><?php echo __("Block contentgories"); ?></h2>

      </div>
      <div class="box-content">
        <?php echo $this->Form->create('BlockContent',array('action'=>'delete_all','admin'=>true)) ?>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><input type="checkbox" id="checkall" onclick="chkallClick(this.id)"></th>
                  <th><?php echo __('block_content_code');?></th>
                  <th><?php echo __('block_content_name');?></th>
                  <th><?php echo __('descrition');?></th>
                  <th><?php echo __('position');?></th>
                  <th><?php echo __('block_cate');?></th>
                  <th><?php echo __('created');?></th>
                  <th><?php echo __('publish');?></th>
                  <th><?php echo __('actions');?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($blockContents as $key =>$content): ?>
               <tr>
                  <td><?php echo $this->Form->input("BlockContent.$key.id",array(
                     'type'      =>'checkbox',
                     'value'=> $content['BlockContent']['id'],
                     'div'       =>false,
                     'label'     =>false,
                     'class'=>"mulchk"
                     
                  ));?>
                  </td>
                  <td class="center"><?php echo h($content['BlockContent']['code']); ?></td>
                  <td class="center"><?php echo h($content['BlockContent']['name']); ?></td>
                  <td class="center"><?php echo $content['BlockContent']['description'] ?></td>
                  <td class="center"><?php echo $content['BlockContent']['position'] ?></td>
                  <td class="center"><?php echo h($content['BlockCategory']['name']); ?></td>
                  <td class="center">2<?php echo $content['BlockContent']['created'] ?></td>
                  <td class="center">
                  	<?php if($content['BlockContent']['publish']){
                  		 echo $this->Html->link(__('Publish'),array(
                           'action'     => 'unpublish',
                            $content['BlockContent']['id']
                        ),array(
                           'class'  => 'label label-success',
                           'escape' => false
                        ),	__('Are you sure you want to unpulish # %s?', $content['BlockContent']['name'])
                        ); 
                    }else{ 
						echo $this->Html->link(__('Publish'),array(
                           'action'     => 'publish',
                            $content['BlockContent']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        ),
                        	__('Are you sure you want to publish # %s?', $content['BlockContent']['name'])
                        ); 
                    } ?>
                  </td>
                  <td class="center">
                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
                           'action'     => 'admin_edit',
                            $content['BlockContent']['id']
                        ),array(
                           'class'  => 'btn btn-info',
                           'escape' => false
                        )); ?>
                        <?php echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
                              'action'     => 'admin_delete',
                               $content['BlockContent']['id']
                           ),array(
                           'class'  => 'btn btn-danger',
                           'escape' => false

                        	),
                           	__('Are you sure you want to delete # %s?', $content['BlockContent']['name'])
                        ); ?>

                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>

         
         <?php echo $this->element('paginator');?>
         <p style="position:absolute;bottom:26px">
         <?php echo $this->Html->link(__('Add content contentgory'),array(
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