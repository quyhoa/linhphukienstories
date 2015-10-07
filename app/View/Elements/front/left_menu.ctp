<div class="sidebar_first none_smart">
    <h2 class="h2index"><i class="fa fa-keyboard-o"></i><span>SẢN PHẨM</span></h2>
    <ul class="list_product_spec" id="menu">
      <?php foreach($leftMenu as $k=>$vl){?>
        <li class="hassub"><a href="<?php echo "/danh-muc/".$vl['ProductCategory']['code'].".html" ?>"><?php echo $vl['ProductCategory']['name'];?></a>
          <?php if(!empty($vl['child'])){ ?>
            <ul class="submenu">
            <?php  foreach($vl['child'] as $child){?>

                <li><a href="<?php echo "/danh-muc/".$child['ProductCategory']['name'] ?>"><?php echo $child['ProductCategory']['code'].".html"; ?>1</a></li>
              

            <?php 
            }
            ?>
            </ul>
            <?php
          }
          ?>
          
        </li>
      <?php } ?>  
        
    </ul>
</div>