<?php echo $this->Form->create('User',
                                    array(
                                          '/sing_up',
                                          'inputDefaults' =>array(
                                                          'label'       =>false,
                                                          'div'         =>false,
                                                          'novalidate'  =>true,
                                                          'required'    =>false
                                            )
                                      )                                            
                                ); 
?>   
<div class="content_product">
    <?php echo $this->Session->flash();?>
    <div class="new_customer new_customer">
        Đăng kí tài khoản
    </div>
    <table class="table table_customer">                                      
        <tbody><tr>
            <th>Họ tên
                        <span class="require">*</span>
            </th>
            <td>
                <?php echo $this->Form->input('name',array('class'=>'input_name')); ?>
               
            </td>
        </tr>
        <tr>
            <th>Giới tính
                    <span class="require">*</span>
            </th>
            <td>
            <?php echo $this->Form->input('gender',array('class'=>'input_name','type'=>'select','options'=>array('1'=>'Nam','2'=>'Nữ'))); ?>
            </td>
        </tr>
        <tr>
            <th>Số điện thoại
                    <span class="require">*</span>
            </th>
            <td>
            <?php echo $this->Form->input('tel',array('class'=>'input_name','maxlength'=>"20")); ?>
            </td>
        </tr>
        <tr>
          <th>Địa chỉ 
                <span class="require">*</span>
          </th>
          <td>
            <?php echo $this->Form->input('address',array('class'=>'input_name','maxlength'=>"100")); ?>
           
          </td>
        </tr>  
    
         <tr>
        <th>
          Tỉnh/Thành phố
          <span class="require">*</span>
        </th>
        <td>
          <select name="data[User][city]">
            <option value="158">Hà Nội</option>
            <option value="159">TP-Hồ Chí Minh</option>
            <option value="160">Đà Nẵng</option>
            <option value="161">An Giang</option>
            <option value="162">Bà Rịa - Vũng Tàu</option>
            <option value="163">Bạc Liêu</option>
            <option value="164">Bắc Kạn</option>
            <option value="165">Bắc Giang</option>
            <option value="166">Bắc Ninh</option>
            <option value="167">Bến Tre</option>
            <option value="168">Bình Dương</option>
            <option value="169">Bình Định</option>
            <option value="170">Bình Phước</option>
            <option value="171">Bình Thuận</option>
            <option value="172">Cà Mau</option>
            <option value="173">Cao Bằng</option>
            <option value="174">Cần Thơ (TP)</option>
            <option value="176">Đắk Lắk</option>
            <option value="177">Đắk Nông</option>
            <option value="178">Điện Biên</option>
            <option value="179">Đồng Nai</option>
            <option value="180">Đồng Tháp</option>
            <option value="181">Gia Lai</option>
            <option value="182">Hà Giang</option>
            <option value="183">Hà Nam</option>
            <option value="184">Hà Tỉnh</option>
            <option value="185">Hải Dương</option>
            <option value="186">Hải Phòng (TP)</option>
            <option value="187">Hòa Bình</option>
            <option value="188">Hậu Giang</option>
            <option value="189">Hưng Yên</option>
            <option value="190">Khánh Hòa</option>
            <option value="191">Kiên Giang</option>
            <option value="192">Kon Tum</option>
            <option value="193">Lai Châu</option>
            <option value="194">Lào Cai</option>
            <option value="195">Lạng Sơn</option>
            <option value="196">Lâm Đồng</option>
            <option value="197">Long An</option>
            <option value="198">Nam Định</option>
            <option value="199">Nghệ An</option>
            <option value="200">Ninh Bình</option>
            <option value="201">Ninh Thuận</option>
            <option value="202">Phú Thọ</option>
            <option value="203">Phú Yên</option>
            <option value="204">Quảng Bình</option>
            <option value="205">Quảng Nam</option>
            <option value="206">Quảng Ngãi</option>
            <option value="207">Quảng Ninh</option>
            <option value="208">Quảng Trị</option>
            <option value="209">Sóc Trăng</option>
            <option value="210">Sơn La</option>
            <option value="211">Tây Ninh</option>
            <option value="212">Thái Nguyên</option>
            <option value="213">Thanh Hóa</option>
            <option value="214">Thừa Thiên - Huế</option>
            <option value="215">Tiêng Giang</option>
            <option value="216">Trà Vinh</option>
            <option value="217">Tuyên Quang</option>
            <option value="218">Vĩnh Long</option>
            <option value="219">Vĩnh Phúc</option>
            <option value="220">Yên Bái</option>
          </select>
         
        </td>
      </tr>
      <tr>
            <th>Địa chỉ E-mail
                <span class="require">*</span>
            </th>
            <td>
               <?php echo $this->Form->input('email',array('class'=>'input_name','maxlength'=>50)); ?>
            </td>
          </tr>
          <tr>
            <th>Mật khẩu 
                <span class="require">*</span>
            </th>
            <td>
           
                  <?php echo $this->Form->input('password',array('class'=>'input_name')); ?>
                  <span class="explain">( sử dụng 4-32 ký tự )</span>
              
            </td>
          </tr>  

        </tbody>
    </table>
    <div class="button_area">
      
       <?php echo $this->Form->input(__('Back'),array('type'=>'button','class'=>'btn btn-default','onclick'=>"return window.history.back()")); ?>
       <input type="submit" name="<?php echo __('Regist');?>" class='btn btn-warning btn-large'/>
       
    </div>
</div>
<?php $this->Form->end(); ?>
<script>
$(document).ready(function(){
  /*
    Validated data using jquery.validator
  */
  $("#UserSingUpForm").validate({
        rules: {
            'data[User][name]': {
                required: true,
                
            
            },
            'data[User][gender]':{
                required: true,
               
            },
            'data[User][tel]':{
                required: true,
               
            },
            'data[User][address]':{
                required: true,
               
               
            },
            'data[User][city]':{
                required: true,
               
            },
            'data[User][email]':{
                required: true,
                email:true
               
            },
            'data[User][password]':{
                required: true,
                minlength:4,
                maxlength:32
               
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
           
                     

        }  ,
        errorPlacement: function( label, element ) {
           label.insertAfter(element);
        },
        
        submitHandler: function(form) {
          form.submit();    
        }
    });
  

});
  
</script>