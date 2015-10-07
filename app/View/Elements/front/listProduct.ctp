<div class="g">
    <ul class="upro">
        <?php foreach($productHots as $k=>$product){ ?>
        <li class="">
            <div class="b">&nbsp;</div>
            <a class="m" href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>">
            <img src="<?php echo $product['Product']['image'] ?>" alt="<?php echo $product['Product']['code'] ?>"></a>
            <h4><a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>"><?php echo h($product['Product']['name']);?></a></h4>
            <b><?php echo number_format($product['Product']['price']) ; echo __(' VNĐ');?></b>
            <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'add_cart',$product['Product']['id']));?>" class="cart_spec_a">Mua Hàng</a>
        </li>
        <?php } ?>                
    </ul>
    <div class="cl"></div>        
    </div>
 