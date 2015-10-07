<div class="content_center col-md-6 right">
    <div class="content_product">
        <div id="dpro">
            <div class="dlink">                
                <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="index.html">Trang chủ</a> &gt; Xác nhận tài khoản
            </div>                             
        </div>  
        <div class="content_product">
            <div class="new_customer">
              <?php 
                echo  __('Thông tin mua hàng');
              ?>
            </div>
            <div id="check_out">    
                <?php echo  $this->Form->create(
                                    'User',
                                    array(
                                          'url'=>array('controller'=>'Pages','action'=>'confirm2'),
                                          'type'=>'POST',
                                          'id'=>'confirmForm',
                                          'inputDefaults' =>array(
                                                          'label'       =>false,
                                                          'div'         =>false,
                                                          'novalidate'=>true
                                                           )
                                      )                                            
                                ); 
                  ?> 

                  <div class="customer_options">
                        <?php echo  $this->Form->input('id',array('type'=>'text','hidden'=>true));?>
                        
                        
                    <div class="note">
                        <?php echo  __('Xin vui lòng nhập thông tin ở dưới để tiếp tục mua sắm.')?>                
                    </div>
                    <div class="">
                    <table class="table table_customer table">                                      
                      <tbody><tr>
                        <th><?php echo  __('Họ tên')?>
                                  <span class="require">*</span>
                        </th>
                        <td>
                          <?php echo  $this->Form->input('name',array(
                            'type'        => 'text',
                            'class'       => 'input_name'
                          ));?>
                        </td>
                      </tr>
                      <tr>
                        <th>Số điện thoại
                                  <span class="require">*</span>
                        </th>
                        <td>
                          <?php echo  $this->Form->input('tel',array(
                            'type'        => 'text',
                            'class'       => 'input_tel'
                          ));?>
                        </td>
                      </tr>
                      <tr>
                        <th>Địa chỉ<span class="require">*</span>
                        </th>
                        <td>
                          <?php echo  $this->Form->input('address',array(
                            'type'        => 'text',
                            'class'       => 'input_address1'
                          ));?>
                        </td>
                      </tr>
                    <tr>
                      <th>
                        Tỉnh/Thành phố
                      </th>
                      <td>
                        <?php $options= array();
                          $options[158]="Hà Nội";
                          $options[159]="TP-Hồ Chí Minh";
                          $options[160]="Đà Nẵng";
                          $options[161]="An Giang";
                          $options[162]="Bà Rịa - Vũng Tàu";
                          $options[163]="Bạc Liêu";
                          $options[164]="Bắc Kạn";
                          $options[165]="Bắc Giang";
                          $options[166]="Bắc Ninh";
                          $options[167]="Bến Tre";
                          $options[168]="Bình Dương";
                          $options[169]="Bình Định";
                          $options[170]="Bình Phước";
                          $options[171]="Bình Thuận";
                          $options[172]="Cà Mau";
                          $options[173]="Cao Bằng";
                          $options[174]="Cần Thơ (TP)";
                          $options[176]="Đắk Lắk";
                          $options[177]="Đắk Nông";
                          $options[178]="Điện Biên";
                          $options[179]="Đồng Nai";
                          $options[180]="Đồng Tháp";
                          $options[181]="Gia Lai";
                          $options[182]="Hà Giang";
                          $options[183]="Hà Nam";
                          $options[184]="Hà Tỉnh";
                          $options[185]="Hải Dương";
                          $options[186]="Hải Phòng (TP)";
                          $options[187]="Hòa Bình";
                          $options[188]="Hậu Giang";
                          $options[189]="Hưng Yên";
                          $options[190]="Khánh Hòa";
                          $options[191]="Kiên Giang";
                          $options[192]="Kon Tum";
                          $options[193]="Lai Châu";
                          $options[194]="Lào Cai";
                          $options[195]="Lạng Sơn";
                          $options[196]="Lâm Đồng";
                          $options[197]="Long An";
                          $options[198]="Nam Định";
                          $options[199]="Nghệ An";
                          $options[200]="Ninh Bình";
                          $options[201]="Ninh Thuận";
                          $options[202]="Phú Thọ";
                          $options[203]="Phú Yên";
                          $options[204]="Quảng Bình";
                          $options[205]="Quảng Nam";
                          $options[206]="Quảng Ngãi";
                          $options[207]="Quảng Ninh";
                          $options[208]="Quảng Trị";
                          $options[209]="Sóc Trăng";
                          $options[210]="Sơn La";
                          $options[211]="Tây Ninh";
                          $options[212]="Thái Nguyên";
                          $options[213]="Thanh Hóa";
                          $options[214]="Thừa Thiên - Huế";
                          $options[215]="Tiêng Giang";
                          $options[216]="Trà Vinh";
                          $options[217]="Tuyên Quang";
                          $options[218]="Vĩnh Long";
                          $options[219]="Vĩnh Phúc";
                          $options[220]="Yên Bái";
                          echo $this->Form->input('city',array('options'=>$options));?>
                       
                      </td>
                    </tr>
                    <tr>
                      <th>
                        Huyện/quận
                      </th>
                      <td>
                        <?php echo $this->Form->input('district',array('type'=>'text','class'=>'input_city'));?>
                        
                      </td>
                    </tr>
                        <tr>
                          <th>Địa chỉ E-mail
                              <span class="require">*</span>
                          </th>
                          <td>
                            <?php echo $this->Form->input('email',array('type'=>'text','class'=>'input_email'));?>
                            
                          </td>
                        </tr>
                                                
                      </tbody>
                  </table>
                </div>
              </div>
              <div class="shipping_options">
                    <h3>Thông tin vận chuyển</h3>
                    <div class="note">
                      Vui lòng nhập thông tin địa chỉ nhận hàng dưới đây
                    </div>

                    <div class="toggle_action">
                      <label for="ship_chk01"><input type="radio" name="delivery_type" value="1" style="vertical-align:middle;" id="ship_chk01" onclick="$('#sendto_options_sub').css('display', 'none');" checked="">Địa chỉ giao hàng như trên</label>
                      <label for="ship_chk02"><input type="radio" name="delivery_type" value="2" style="vertical-align:middle;" id="ship_chk02" onclick="$('#sendto_options_sub').css('display', 'table');">Địa chỉ giao hàng khác</label>
                    </div>

                    <table id="sendto_options_sub" class="table table_shipping" style="display:none">

                      <tbody><tr>
                        <th>Họ Tên<span class="require">*</span></th>
                        <td>
                         
                          <?php echo $this->Form->input('delivery_name',array('type'=>'text','class'=>'input_name'));?>
                         
                        </td>
                      </tr>

                      <tr>
                        <th>Số điện thoại<span class="require">*</span></th>
                        <td>
                        <?php echo $this->Form->input('delivery_tel',array('type'=>'text','class'=>'input_tel', 'autofocus'=>"autofocus"));?>
                        
                        </td>
                      </tr>

                      <tr>
                        <th>Địa chỉ<span class="require">*</span></th>
                        <td>
                         
                          <?php echo $this->Form->input('delivery_address',array('type'=>'text','class'=>'input_address1'));?>
                        </td>
                      </tr>

                     
                      <tr>
                        <th>
                          Tỉnh /Thành phố
                        </th>
                        <td>
                          <?php echo $this->Form->input('delivery_city',array('class'=>'input_address1','options'=>$options));?>
                        </td>
                      </tr>
                    <tr>
                        <th>
                          Huyện / quận
                        </th>
                        <td>
                          
                          <?php echo $this->Form->input('delivery_district',array('type'=>'text','class'=>'input_city'));?>
                        </td>
                      </tr>
                      <tr>
                        <th>Ghi chú</th>
                        <td>
                          <?php echo $this->Form->textarea('delivery_memo',array('type'=>'text','class'=>'other'));?>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="button_area">
              <a href=""><input type="button" class="btn btn-default" value="Quay lại"></a>
              <a><input type="submit" class="btn btn-warning btn-large" value="Tiếp theo"></a>
            </div>                      
          <?php echo  $this->Form->end();?>
        </div>
      </div>
    </div>
</div>
<!-- custom javascript-->
<script>
$(document).ready(function(){
  /*
    Validated data using jquery.validator
  */
  

   $("#confirmForm").validate({
        rules: {
            'data[User][name]': {
                required: true,
                
            
            },
            'data[User][tel]':{
                required: true,
               
            },
            'data[User][address]':{
                required: true,
               
               
            },
           
            'data[User][email]':{
                required: true,
                email:true
               
            },
            
            //delivery info 
            'data[User][delivery_name]': {
                required: true,
                
            
            },
            
            'data[User][delivery_tel]':{
                required: true,
               
            },
            'data[User][delivery_address]':{
                required: true,
               
               
            },
           
           

        },
        
        messages:{
            'data[User][name]': {
                required: '<?php echo __('Please input your name');?>',
                
            
            },
            'data[User][gender]':{
                required: '<?php echo __('Please select your gender');?>',
               
            },
            'data[User][tel]':{
                required: '<?php echo __('Please input your phone');?>',
               
            },
            'data[User][address]':{
                required: '<?php echo __('Please input your address');?>',
                
               
            },
            'data[User][city]':{
                required: '<?php echo __('Please select a city');?>',
               
            },
            'data[User][email]':{
                required: '<?php echo __('Please input your email');?>',
                email:'<?php echo __('Your email is incorrect format');?>'
               
            },
            'data[User][password]':{
                required: '<?php echo __('Please input your passowrd');?>',
                minlength:'<?php echo __('Please input password less 4 character');?>',
                maxlength:'<?php echo __('Please input your password not more 32 character ');?>'
               
            },
            'data[User][district]':{
                required: '<?php echo __('Please input your district');?>',
               
            },
              //delivery info 
            'data[User][delivery_name]': {
                required: '<?php echo __('Please input name delivery');?>',
                
            
            },
            
            'data[User][delivery_tel]':{
                required: '<?php echo __('Please input delivery_tel');?>',
               
            },
            'data[User][delivery_address]':{
                required: '<?php echo __('Please input delivery_address');?>',
               
               
            },
            'data[User][delivery_city]':{
                required: '<?php echo __('Please input delivery_city');?>',
               
            },
            'data[User][delivery_district]':{
                required: '<?php echo __('Please input delivery_district');?>',
               
            },
            'data[User][delivery_memo]':{
                required: '<?php echo __('Please input delivery_memo');?>',
              
            },
           
                     

        }  ,
        onkeyup:     false,
        errorPlacement: function( label, element ) {
           label.insertAfter(element);
        },
        
        submitHandler: function(form) {
          form.submit();    
        }
    });
  

});
  
</script>