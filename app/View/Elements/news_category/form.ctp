<div class="box-content">
	<!-- <form class="form-horizontal"> -->
	<?php echo $this->Form->create('NewsCategory',array(
		'inputDefaults'=>array(
							'label'=>false,
							'div'=>false,
							'novalidate'=>true
						),
		'class'		   => 'form-horizontal',
		'id'=>'NewsCategoryForm'		
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
			if(!empty($this->request->data['NewsCategory']['id']))
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
	$("#NewsCategoryForm").validate({
        rules: {
            'data[NewsCategory][name]': {
              	required: true,
				remote:{
				 url:'<?php echo $this->Html->url(array('controller'=>'NewsCategories','action'=>'checkNameExist','admin'=>false));?>',
				    method: 'POST',
				    data:{name:function(){ return $("#NewsCategoryName").val();},id:function(){ return $("#NewsCategoryId").val();}},
				}
            
            },
          

        },
        
        messages:{
            'data[NewsCategory][name]': {
              	required: "<?php echo __('Please input name news category');?>",
              	remote:"<?php echo __('news category is exist');?>"
                        
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