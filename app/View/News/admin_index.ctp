<ul class="breadcrumb">
   <li>
      <i class="icon-home"></i>
      <a href="index.html"><?php echo __("Home"); ?></a> 
      <i class="icon-angle-right"></i>
   </li>
   <li><a href="#"><?php echo __("News list"); ?></a></li>
</ul>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid sortable">
   <div class="box span12" style="position:relative">
      <div class="box-header" data-original-title>
         <h2><?php echo __("News list"); ?></h2>

      </div>
      <div class="box-content">
        
         <?php echo $this->Form->create('News',array('action'=>'delete_all','admin'=>true)) ?>
         <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
               <tr>
                  <th><input type="checkbox" id="checkall" onclick="chkallClick(this.id)"></th>
                  <th><?php echo __('news_code');?></th>
                  <th><?php echo __('news_title');?></th>
                  <th><?php echo __('description');?></th>
                  <th><?php echo __('news_category');?></th>
                  <th><?php echo __('created');?></th>
                  <th><?php echo __('view');?></th>
                  <th><?php echo __('publish');?></th>
                  <th><?php echo __('actions');?></th>
               </tr>
            </thead>
            <tbody>
            <?php foreach($newss as $key =>$news): ?>
               <tr>
                  <td><?php echo $this->Form->input("News.$key.id",array(
                     'type'      =>'checkbox',
                     'value'=> $news['News']['id'],
                     'div'       =>false,
                     'label'     =>false,
                     'class'=>"mulchk"
                     
                  ));?>
                  </td>
                  <td class="center"><?php echo h($news['News']['code']); ?></td>
                  <td class="center"><?php echo h($news['News']['title']); ?></td>
                  <td class="center"><?php echo h($news['News']['description']); ?></td>
                  <td class="center"><?php echo h($news['NewsCategory']['name']); ?></td>
                  <td class="center"><?php echo date('Y-m-d',strtotime($news['News']['created'])) ?></td>
                  <td class="center"><?php echo $this->Html->link(__('view'),array(
                           'action'     => 'view',
                            $news['News']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        )
                           
                        ); ?></td>
                  <td class="center">
                  	<?php if($news['News']['publish']){
                  		 echo $this->Html->link(__('Publish'),array(
                           'action'     => 'unpublish',
                            $news['News']['id']
                        ),array(
                           'class'  => 'label label-success',
                           'escape' => false
                        ),	__('Are you sure you want to unpulish # %s?', $news['News']['title'])
                        ); 
                    }else{ 
						echo $this->Html->link(__('Publish'),array(
                           'action'     => 'publish',
                            $news['News']['id']
                        ),array(
                           'class'  => 'label',
                           'escape' => false
                        ),
                        	__('Are you sure you want to publish # %s?', $news['News']['title'])
                        ); 
                    } ?>
                  </td>
                  <td class="center">
                     <?php echo $this->Html->link('<i class="halflings-icon white edit"></i> ',array(
                           'action'     => 'admin_edit',
                            $news['News']['id']
                        ),array(
                           'class'  => 'btn btn-info',
                           'escape' => false
                        )); ?>
                        <?php echo $this->Html->link('<i class="halflings-icon white trash"></i>',array(
                              'action'     => 'admin_delete',
                               $news['News']['id']
                           ),array(
                           'class'  => 'btn btn-danger',
                           'escape' => false

                        	),
                           	__('Are you sure you want to delete # %s?', $news['News']['title'])
                        ); ?>

                  </td>
               </tr>
            <?php endforeach; ?>
            </tbody>
         </table>

         
         <?php echo $this->element('paginator');?>
         <p style="position:absolute;bottom:26px">
         <?php echo $this->Html->link(__('Add news'),array(
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