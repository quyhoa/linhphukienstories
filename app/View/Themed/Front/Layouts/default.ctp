<!DOCTYPE html>
<html>
<head>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta content="width=device-width; initial-scale=1.0" name="viewport">
    <title><?php echo $title_for_layout;?></title>
    <?php echo $this->Html->css('font-awesome/css/font-awesome');?>
    <?php echo $this->Html->css('bootstrap/css/bootstrap');?>
    <?php echo $this->Html->css('common');?>
    <?php echo $this->Html->css('style1');?>
    <?php echo $this->Html->css('slicknav');?>
    <?php echo $this->Html->css('lightbox');?>
    <?php echo $this->Html->script('jquery-1.9.1.min');?>
    <?php echo $this->Html->script('custom');?>
    <?php echo $this->Html->css('cloud-zoom');?>
    <?php echo $this->Html->css('fancybox/jquery.fancybox-1.3.4');?>
    <?php echo $this->Html->script('jquery.min');?>
    <?php echo $this->Html->script('cloud-zoom.1.0.2');?>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
</head>
<body> 
<div class="header">
    <div class="inner">    
        <div class="logo left">
            <a href="<?php echo $this->Html->url('/');?>">
            <?php if($mobileDeteted):?>
              <img class="logo_mobile" src="<?php echo $this->webroot;?>img/logo_mobile.png"/>
            <?php else :?>  
              <img class="logo_pc" src="<?php echo $this->webroot;?>img/logo.png"/>
            <?php endif;?>  
            </a>
        </div>  
        <?php if(!$mobileDeteted):?>
        <div class="toplogo right">

           
           <div class="search">
                <?php echo $this->Form->create(
                                            'Product',
                                            array(
                                                  'url'=>array('controller'=>'Pages','action'=>'search'),
                                                  'inputDefaults' =>array(
                                                                  'label'       =>false,
                                                                  'div'         =>false,
                                                                  'novalidate'  =>true,
                                                                  'required'    =>false
                                                    ),
                                                  'id'=>'search_form'
                                              )                                            
                                        ); 
                          ?> 
                   <?php echo $this->Form->input('key',array('type'=>'text','class'=>'input','div'=>false,'label'=>false,'placeholder'=>"Từ khóa"));?>
                   <?php  echo $this->Form->input('number',array(
                                'options'   => $productCategories,
                                'class'     => 'select',
                                'empty'     =>"Tất cả"
                              )); ?> 
                   <input type="submit" value="" class="icon-search">

                <?php echo $this->Form->end();?>

           </div>
           <div class="cart_header">
              <a rel="" href="<?php echo $this->Html->url('/Pages/view_cart');?>">
                <span class="text"><?php echo __('cart'); ?></span>
              </a>
              <span id="cart-num" class="cart-number"><?php echo $numberOrder;?></span>
          </div>
        </div> 
        <?php endif;?>  
              
    </div>
</div>
<!-- top menu -->
<div id="mainNav">
  <div class="inner">
  <?php if(!$mobileDeteted):?>
      <div class="menu" id="globalNavi">
          <ul>
            <li class="menu0 active">
              <a class="menu0" href="<?php echo $this->Html->url('/'); ?>">Trang chủ</a>
            </li>
            <li class="menu1">
              <a class="menu1" href="<?php echo $this->Html->url('/gioi-thieu.html'); ?>">Giới Thiệu</a>
            </li>
            <li class="menu2 hasSub">
              <a class="menu2"><?php echo __('Tin Tức') ?></a>
              <ul class="subNav" >
              <?php foreach($listnews as $key => $listnew): ?>
                  <li class="subNav">
                    <?php echo $this->Html->link($listnew['NewsCategory']['name'],'/tin-tuc/'.$listnew['NewsCategory']['code'],array('class'=>'subNav subNav1')); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li class="menu3">
              <a class="menu3" href="<?php echo $this->Html->url('/huong-dan-mua-hang.html'); ?>">Hướng dẫn mua hàng</a>
            </li>
            <li class="menu4">
              <a class="menu4" href="<?php echo $this->Html->url('/lien-he.html'); ?>">Liên hệ</a>
            </li>
           
          </ul>

      </div>
    <?php else:?>
      <!-- memu for mobile -->
        <div class="menu" id="menuMobile">
          <ul>             
            <li>
              <a href="/" class="btn2 width100"><img src="<?php echo $this->webroot;?>img/icon_home.png" alt="Home" width="20" height="20"></a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/Pages/view_cart');?>" class="btn2 width100"><img src="<?php echo $this->webroot;?>img/icon_cart_2.png" alt="Giỏ hàng" width="20" height="20"></a>
            </li>         
            <li>
              <a href="#cmsearch" class="btn2"><img src="<?php echo $this->webroot;?>img/icon_search.png" alt="Tìm kiếm" width="20" height="20">Tìm kiếm</a>             
            </li>
          </ul>
        </div>
        <!-- end -->
    <?php endif;?>    
  </div>
</div>
<?php if($mobileDeteted):?>
<div class="none_destop">
    <div class="inner">
        
         <ul id="menu">
            <li class="menu0 active">
              <a class="menu0" href="<?php echo $this->Html->url('/'); ?>">Trang chủ</a>
            </li>
            <li class="menu1">
              <a class="menu1" href="<?php echo $this->Html->url('/gioi-thieu.html'); ?>">Giới Thiệu</a>
            </li>
            <li class="menu2 hasSub">
              <a class="menu2"><?php echo __('Tin Tức') ?></a>
              <ul class="subNav" >
              <?php foreach($listnews as $key => $listnew): ?>
                  <li class="subNav">
                    <?php echo $this->Html->link($listnew['NewsCategory']['name'],'/tin-tuc/'.$listnew['NewsCategory']['code'],array('class'=>'subNav subNav1')); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li class="menu3">
              <a class="menu3" href="<?php echo $this->Html->url('/huong-dan-mua-hang.html'); ?>">Hướng dẫn mua hàng</a>
            </li>
            <li class="menu4">
              <a class="menu4" href="<?php echo $this->Html->url('/lien-he.html'); ?>">Liên hệ</a>
            </li>
    </div>
</div>
<?php endif;?>
<!-- end menu -->
<div id="wrapper">
    <div class="inner"> 
        <?php echo $this->fetch('content');?>
        <!--content -->   
        <!-- sidebar left -->
        <div class="sidebar_left col-md-3 left">
            <?php if($mobileDeteted):
                  echo $this->element('front/search_advance');
                  endif;
            ?>    
            <?php echo $this->element('front/left_menu');?>            
            <?php echo $this->element('front/top_view');?>
                
            <?php echo $this->element('front/news_new');?>
            <?php echo $this->element('front/support');?>
            <!--
            <div class="sidebar_first none_desktop">
                <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span>Menu</span></h2>
                <ul class="menusmart">
                    <li class="menu0 active">
                      <i class="fa fa-plus-square"></i> <a class="menu0" href="index.html">Trang chủ</a>
                    </li>
                    <li class="menu1">
                      <i class="fa fa-plus-square"></i> <a class="menu1" href="introduct.html">Giới Thiệu</a>
                    </li>
                    <li class="menu2 hasSub">
                      <i class="fa fa-plus-square"></i> <a class="menu2">Tin Tức</a>
                      <ul class="subNav" >
                          <li class="subNav">
                            <a class="subNav subNav1" href="info_company.html"><i class="fa fa-minus-square"></i> Tin công ty</a>
                          </li>
                          <li class="subNav">
                            <a class="subNav subNav2" href="info_promotion.html"><i class="fa fa-minus-square"></i> Tin khuyến mãi</a>
                          </li>
                          <li class="subNav">
                            <a class="subNav subNav3" href="info_technoly.html"> <i class="fa fa-minus-square"></i> Tin công nghệ</a>
                          </li>
                      </ul>
                    </li>
                    <li class="menu3">
                      <i class="fa fa-plus-square"></i> <a class="menu3" href="">Hướng dẫn mua hàng</a>
                    </li>
                    <li class="menu4">
                      <i class="fa fa-plus-square"></i> <a class="menu4" href="contact.html">Liên hệ</a>
                    </li>
                    <li class="menu5 hasSub">
                      <i class="fa fa-plus-square"></i> <a class="menu5" href="">Hỗ trợ kỹ thuật</a>
                      <ul class="subNav" >
                          <li class="subNav">
                            <a class="subNav subNav1" href=""><i class="fa fa-minus-square"></i> Hướng dẫn</a>
                          </li>
                          <li class="subNav">
                            <a class="subNav subNav2" href=""><i class="fa fa-minus-square"></i> Download</a>
                          </li>
                          <li class="subNav">
                            <a class="subNav subNav3" href=""><i class="fa fa-minus-square"></i> Nghe nhạc</a>
                          </li>
                          <li class="subNav">
                            <a class="subNav subNav3" href=""><i class="fa fa-minus-square"></i> Cài đăt teamviewer 9</a>
                          </li>
                          <li class="subNav">
                            <a class="subNav subNav3" href=""><i class="fa fa-minus-square"></i> Cài đăt teamviewer 10</a>
                          </li>
                      </ul>
                    </li>
                </ul>
            </div>-->
        </div>
        <!-- end sidebar -->       
    </div>
</div>
<!-- footer -->
<div id="footer">
  <div class="inner">
    <div class="topFooter">
        <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" scrolldelay="25">  
            <ul id="" class="listslow">
              <?php foreach($imageProduct as $k=>$product):?>
                <li>
                  <a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>" target="_blank">
                    <img style="max-height:50px;" src="<?php echo $product['Product']['image'];?>" alt="<?php echo $product['Product']['code'];?>">
                  </a>
                </li> 
                <?php endforeach;?>       
                             
            </ul>
        </marquee>        
    </div>
    <!-- <ul class="ulmft">    
        <li>
            <h3 class="h3_footer"><a href=""><i class="fa fa-ellipsis-v"></i><i class="fa fa-ellipsis-v"></i>Tin tức công nghệ</a></h3>                
            <h4><a href="info_technoly.html">Công nghệ HD-SDI là gì?</a></h4>
            <a href=""><img src="<?php echo $this->webroot; ?>images/352.gif" alt=""></a>
            <span>HD-SDI viết tắt của "High Definition - Serial Digital Interface" được phát triển dựa trên tiêu chuẩn SMPTE 292M (xem hình) tốc độ tối đa của Bit-rate lên đến 1.485G-bit/s, nên tín hiệu định dạng HD 720P và full HD 1080P có thể được truyền đi mà không bị delay (độ trễ).</span>                
            <h4><a href="">Tìm hiểu hệ thống mạng PoE</a></h4>
            <a href=""><img src="<?php echo $this->webroot; ?>images/335.jpg" alt="Tìm hiểu hệ thống mạng PoE"></a>
            <span>Công nghệ PoE tạo ra một nền tảng đơn giản hỗ trợ cung cấp điện năng và kiểm soát các thiết bị mạng như điện thoại sử dụng IP (VoIP), thiết bị hội nghị truyền hình trực tuyến, điểm truy cập không dây (WAP), camera an ninh…</span>                
            <h4><a href="">Tổng hợp điện thoại (SmartPhone) hỗ trợ cáp MHL ra HDMI, VGA</a></h4>
            <a href=""><img src="<?php echo $this->webroot; ?>images/329.jpg" alt=""></a>
            <span>MHL (Mobile High-Definition Link) là một chuẩn công nghiệp và là một giao diện để truyền âm thanh, hình ảnh từ một thiết bị phát ra một màn hình ngoài, chuẩn HDMI hoặc VGA xuất hình ảnh qua cổng sạc.</span>
        </li>            
        <li>
            <h3 class="h3_footer"><a href="info_company.html"><i class="fa fa-ellipsis-v"></i><i class="fa fa-ellipsis-v"></i>Kinh nghiệm</a></h3>  
            <h4><a href="">Hướng dẫn Root Minix Neo X8-H và Neo X8</a></h4>
            <a href=""></a>
            <span>Bán Minix Neo X8H Android Tv Box Minix Neo X8H Quad-Core Cortex A9r4 Kèm Chuột Bay M1. Minix Neo X8H được tích hợp thêm Anten wifi gắn ngoài hai băng tần WLAN 2,4 GHz và 5 GHz cung cấp khả năng kết nối tuyệt vời trong việc kết nối wifi phạm vi rộng.</span>                
            <h4><a href="">Cáp OTG, HDMI không dây HKPhone Revo MAX8</a></h4>
            <a href=""></a>
            <span>Nhattin.vn Bán Cáp OTG, HDMI không dâyHKPhone Revo MAX8 giá rẻ nhất Hà Nội. Chuẩn Miracast cho phép chúng ta truyền không dây nội dung từ 1 thiết bị này sang thiết bị khác</span>                
            <h4><a href="">Cơ bản và ghép nối về chuẩn giao tiếp cổng Com RS232</a></h4>
            <a href=""></a>
            <span>Cơ bản và ghép nối về chuẩn giao tiếp cổng Com RS232 Chuẩn giao tiếp được coi là đơn giản và dễ dùng đó là RS232.</span>                
        </li>            
        <li>
            <h3 class="h3_footer"><a href=""><i class="fa fa-ellipsis-v"></i><i class="fa fa-ellipsis-v"></i>Đời sống số</a></h3>               
            <h4><a href="">Nhattin.vn giới thiệu Keyboard Bluetooth, Bàn phím cho máy tính bảng, tablet, smart phone mới nhất hiện nay</a></h4>
            <a href=""><img src="<?php echo $this->webroot; ?>images/341.jpg" alt=""></a>
            <span>Bán bàn phím không dây, bàn phím bluetooth cho Samsung tab,note, ipad, tivi smart. Nhattin.vn chuyên cung cấp Bàn phím không dây bluetooth cho Samsung Tab 2, Tab 3, Note và ipad mini - iPad 2 - iPad 3 - iPad 4 bàn phím cho Smart Tivi giá rẻ nhất Hà Nội : LH 0912808081</span>                
            <h4><a href="">Android Tivi biến Tivi Thường thành Android Smart TV với Minix Neo X5, Neo X7 mini, Neo X7</a></h4>
            <a href=""><img src="<?php echo $this->webroot; ?>images/286.jpg" alt=""></a>
            <span>Chuyên bán buôn Android Tivi MiniX - Android Tivi biến Tivi Thường thành Android Smart TV với Minix Neo X5, Neo X7 mini, Neo X7 bạn chỉ cần bỏ ra hơn 1 triệu đồng, bạn có thể sở hữu 1 thiết bị giải trị đang được ưa chuộng nhất hiện nay.</span>                
            <h4><a href="">Đầu tư máy chiếu cho phòng giải trí gia đình</a></h4>
            <a href=""></a>
            <span>Màn hình là một thiết bị không thể thiếu trong hệ thống nghe nhìn giải trí gia đình. So với TV kích thước càng lớn giá càng cao, máy chiếu với khả năng cung cấp màn ảnh lớn từ 80 inch trở lên là một giải pháp đáng để bạn đầu tư.</span>                
        </li>
    </ul> -->
    <div class="contact">
        <div class="menufooter">
          <ul class="listmenu">
            <li>
              <a href="<?php echo $this->Html->url('/');?>">Trang Chủ | </a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/gioi-thieu');?>">Giới Thiệu | </a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/tin-tuc/tin-tuc-cong-ty');?>">Tin Tức Công Ty | </a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/tin-tuc/tin-tuc-khuyen-mai');?>">Tin Tức Khuyến Mãi | </a>
            </li>
            <li>
              <a href="<?php echo $this->Html->url('/tin-tuc/tin-tuc-cong-nghe');?>">Tin Tức Công Nghệ | </a>
            </li>
            <!-- <li>
              <a href="">Hướng Dẫn Mua Hàng | </a>
            </li> -->
            <li>
              <a href="<?php echo $this->Html->url('/gioi-thieu');?>">Liên Hệ | </a>
            </li>
           <!--  <li>
              <a href="">Hướng Dẫn  </a>
            </li>  -->             
          </ul>
        </div>
        <div class="col-md-12">
            <span class="nameCompany"><strong>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ TIN HỌC NHẤT TÍN</strong></span>
            <ul class="content_detail">
                <li>
                    <i class="fa fa-map-marker"></i> Địa chỉ: 18 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội 
                </li>
                <li>
                    <i class="fa fa-phone"></i> Điện thoại: <span><a href="">04.3868 3905</a></span> - <span><a href="">04.66 58 68 58</a>  Hỗ trợ kỹ thuật: <span><a href="">0164 2287922</a></span>
                </li>
                <li><i class="fa fa-home"></i> Website: <a href="http://nhattin.vn">http://nhattin.vn</a>   <i class="fa fa-envelope"></i> Email: <a href="mailto:maytinhnhattin@gmail.com">maytinhnhattin@gmail.com</a></li>
                <li><i class="fa fa-clock-o"></i> Thời gian làm việc: Từ 8h - 18h30 - Cả tuần trừ lễ Tết</li>
            </ul>
        </div>        
    </div>
</div>
</div>
<a href="#0" class="cd-top"></a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php echo $this->Html->script('main');?>
<?php echo $this->Html->script('lightbox-plus-jquery.min');?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<?php echo $this->Html->script('jquery.slicknav');?>
<?php echo $this->Html->script('jquery.validate.min');?>
<script type="text/javascript">
$(document).ready(function(){
    $('#menu').slicknav();
    $("#hasSub1").click(function(){
            $("#subNav1").slideToggle();
        });
      $("#hasSub_spec").click(function(){
          $("#subNav_spec").slideToggle();
      });
      $("#toogle").click(function(){
          $(".link_list").slideToggle();
      });
});
</script>

</body>
</html> 