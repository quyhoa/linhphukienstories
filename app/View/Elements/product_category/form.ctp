<div class="box-content">
	<!-- <form class="form-horizontal"> -->
	<?php echo $this->Form->create('ProductCategory',array(
		'inputDefaults'=>array(
							'label'=>false,
							'div'=>false,
							'novalidate'=>true
						),
		'class'		   => 'form-horizontal',
		'id'=>'ProductCategoryForm'		
	)) ?>
	<?php echo $this->Form->hidden('id');?>
	<fieldset>
	  <div class="control-group">
		<label class="control-label"><?php echo __('category_name') ?>
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
		<label class="control-label" for="selectError3"><?php echo __('parent_category');?></label>
		<div class="controls">
		  <?php echo $this->Form->input('parent',array(
		  		'class'=>'input focused span6',
		  		'type' =>'select',
		  		'options'=>$parentCate,
		  		'empty'=>__("Please select a parent category")
		  )); ?>
		</div>
	  </div>
	  <div class="control-group hidden-phone">
		  <label class="control-label" for="textarea2"><?php echo __('description_category') ?></label>
		  <div class="controls">
			<?php echo $this->Form->input('description',array(
				'rows' => 5,
				'cols' => 100,
				'type' => 'textarea',
				'class'=>'ckeditor'
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
			if(!empty($this->request->data['ProductCategory']['id']))
			{
				echo $this->Form->button(__('Edit_category'),array(
															'type'  => 'submit',
															'class' => 'btn btn-primary'));
			}
			else{
				echo $this->Form->button(__('Add_category'),array(
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
	$("#ProductCategoryForm").validate({
        rules: {
            'data[ProductCategory][name]': {
              	required: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'ProductCategories','action'=>'checkNameExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#ProductCategoryName").val();},id:function(){ return $("#ProductCategoryId").val();}},
				}
            
            },
            'data[ProductCategory][position]': {
              	required: true,
				number: true,
            
            }

        },
        
        messages:{
            'data[ProductCategory][name]': {
              	required: "<?php echo __('Please input name product category');?>",
              	remote:"<?php echo __('Product category is exist');?>"
                        
           },
           'data[ProductCategory][position]': {
              	required: "<?php echo __('Please input postion');?>",
              	number:"<?php echo __('Please input number');?>"
                        
           },
                     

      	}  ,
      
	    errorPlacement: function( label, element ) {
		  	if(label.text() !=''){
		   		label.insertAfter( element );
		  	}
		},
    
        submitHandler: function(form) {
        	form.submit();    
        }
    });
	

});
	
</script>