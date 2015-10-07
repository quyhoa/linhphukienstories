<?php echo $this->Html->script('ckeditor/ckeditor');?>
<?php echo $this->Session->flash();?>
<div class="box-content">
	<!-- <form class="form-horizontal"> -->
	<?php echo $this->Form->create('BlockContent',array(
		'inputDefaults'=>array(
							'label'=>false,
							'div'=>false,
							'novalidate'=>true
						),
		'class'		   => 'form-horizontal',
		'id'=>'BlockContentForm'		
	)) ?>
	<?php echo $this->Form->hidden('id');?>
	<fieldset>
	  <div class="control-group">
		<label class="control-label"><?php echo __('Block_content_name') ?>
		(<span class="required">*</span>)</label>								
		<div class="controls">
		<!-- <span class='note'>(*)</span> -->
		  <?php echo $this->Form->input('name',array(
		  		'class'=>'input-xlarge focused span6',
		  		'type' =>'text'

		  )); ?>
		</div>
	  </div>							  
	  <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('Block category');?>(<span class="required">*</span>)</label>
		<div class="controls">
		  <?php echo $this->Form->input('block_category_id',array(
		  		'class'=>'input focused span6',
		  		'type' =>'select',
		  		'empty'=>__("Please select block category")
		  )); ?>
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('Block type');?>(<span class="required">*</span>)</label>
		<div class="controls">
		  <?php echo $this->Form->input('type',array(
		  		'class'=>'input focused span6',
		  		'type' =>'select',
		  		'options'=>$type,
		  		'empty'=>__("Please select block type")
		  )); ?>
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('description');?></label>
		<div class="controls">
		  <?php echo $this->Form->input('description',array(
		  		'class'=>'input focused span6',
		  		'type' =>'textarea',
		  	
		  )); ?>
		</div>
	  </div>
	  <div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2"><?php echo __('content') ?>(<span class="required">*</span>)</label>
		  <div class="controls">
			<?php echo $this->Form->input('content',array(
				'rows' => 20,
				'cols' => 100,
				'type' => 'textarea',
				'class'=>'ckeditor'
			)); ?>
		  </div>
	   </div>
	   <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('content_image');?></label>
		<div class="controls">
		  <?php echo $this->Form->input('image',array(
		  		'class'=>'input focused span6',
		  		'type' =>'file',
		  		
		  )); ?>
		</div>
	  </div>
	   <div class="control-group">
		<label class="control-label" for="selectError3"><?php echo __('content_file');?></label>
		<div class="controls">
		  <?php echo $this->Form->input('file',array(
		  		'class'=>'input focused span6',
		  		'type' =>'file',
		  		
		  )); ?>
		</div>
	  </div>
	   <div class="control-group">
		<label class="control-label" for="optionsCheckbox2"><?php echo __('Position') ?>(<span class="required">*</span>)</label>
		<div class="controls">
		 	<?php echo $this->Form->input('position', 
	            array(
	              'label' => false, 
	              'type'  =>'text',
	              'class'=>'input focused span2',	
	              'div'   => false
	          )); ?> 
	          </label>
		</div>
	  </div>	
	  <div class="control-group">
		<label class="control-label" for="optionsCheckbox2"><?php echo __('Publish') ?></label>
		<div class="controls">
		  <label class="checkbox">
			<?php echo $this->Form->input('publish', 
	            array(
	              'label' => false, 
	              'type'  =>'checkbox',
	              'default'=>'1',	
	              'div'   => false
	          )); ?> 
		  </label>
		</div>
	  </div>
	  <div class="control-group">
						
		<div class="controls">
		(<span class="required">*</span>)<?php echo __("Required information");?>
		</div>
	  </div>					  
	  <div class="form-actions">
	  	<?php echo $this->Form->button(__('Back'),array(
				'type'  => 'button',
				'class' => 'btn',
				'onclick'=>'back()'
		)); ?>

		<?php
			if(!empty($this->request->data['BlockContent']['id']))
			{
				echo $this->Form->button(__('Edit_page'),array(
															'type'  => 'submit',
															'class' => 'btn btn-primary'));
			}
			else{
				echo $this->Form->button(__('Add_page'),array(
															'type'  => 'submit',
															'class' => 'btn btn-primary'));
			}
			 
		?>
		
	  </div>
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
<!-- custom javascript-->
<script>
$(document).ready(function(){
	/*
		Validated data using jquery.validator
	*/
	$("#BlockContentForm").validate({
        rules: {
            'data[BlockContent][name]': {
              	required: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'BlockContents','action'=>'checkNameExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#BlockContentName").val();},id:function(){ return $("#BlockContentId").val();}},
				}
            
            },
            'data[BlockContent][content]':{
                required: true,
               
          	},
          	'data[BlockContent][block_category_id]':{
          		required:true
          	},
          	'data[BlockContent][type]':{
          		required:true
          	},
            'data[BlockContent][position]': {
              	required: true,
				number: true,
            
            }

        },
        
        messages:{
            'data[BlockContent][name]': {
              	required: "<?php echo __('Please input page name');?>",
              	remote:"<?php echo __('Block content is exist');?>"
                        
           },
           'data[BlockContent][position]': {
              	required: "<?php echo __('Please input postion');?>",
              	number:"<?php echo __('Please input number');?>"
                        
           },
           'data[BlockContent][content]': {
              	required: "<?php echo __('Please input content');?>",
              	
                        
           },
           'data[BlockContent][block_category_id]': {
              	required: "<?php echo __('Please select block category');?>",
              	
                        
           },
            'data[BlockContent][type]': {
              	required: "<?php echo __('Please select block content type');?>",
              	
                        
           },
                     

      	}  ,
        ignore: [],
	    errorPlacement: function( label, element ) {
	    	if (element.is('textarea') && element.is('.ckeditor')) {
                 label.insertAfter($("#cke_BlockContentContent"));

            }
            else{
            	label.insertAfter(element);

            }
		},
    
        submitHandler: function(form) {
        	form.submit();    
        }
    });
	

});
	
</script>