<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><a href="/"><?php echo __('Home');?></a> &gt; <a href=""><?php echo __('Product Category');?></a>&gt; <?php echo h($productCategory['ProductCategory']['name']);?>
                    </div>                             
                </div>  
                <?php echo $this->Form->create('Product',array('url'=>'/danh-muc/'.$productCategory['ProductCategory']['code'].'.html'));?>
                <div class="content_search_bar">
                  <form action="" method="">
                    <div class="content_detail_child">                      
                      <div class="left">Sắp xếp: </div>
                      <div>
                        <?php echo $this->Form->input('type_order',array('type'=>'select','options'=>array('asc'=>__('Asc'),'desc'=>__('Desc')),'empty'=>'','label'=>false,'div'=>false));?>
                        
                      </div>
                    </div>
                    <div class="content_detail_child">
                      <div class="left">Theo: </div>
                      <div>
                        <?php echo $this->Form->input('field_order',array('type'=>'select','options'=>array('Product.name'=>__('Product Name'),'Product.price'=>__('Price')),'empty'=>'','label'=>false,'div'=>false));?>
                      </div>
                    </div>
                    <div class="content_detail_child">
                      <div class="left">Số sản phẩm: </div>
                      <div>
                         <?php echo $this->Form->input('limit',array('type'=>'select','options'=>array('8'=>8,16=>16,24=>24,32=>32,48=>48),'label'=>false,'div'=>false,'empty'=>16));?>
                      </div>
                    </div>

                    <input type="submit" name="button" value="Đồng ý" >
                                  
              </div>
              <div id="ispro">
                  <ul class="upro upro_spec_fix">
                    <?php foreach($products as $key=>$product):?>
                      <li class="">                        
                          <a class="m" href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>"><img src="<?php echo $product['Product']['image'];?>" alt="" class="imagesizeauto"></a>
                          <h4><a href="<?php echo $this->Html->url('/san-pham/'.$product['Product']['code'].'.html');?>"><?php echo h($product['Product']['name']);?></a></h4>
                          <b><?php echo number_format($product['Product']['price']); echo __('VNĐ');?></b>
                          <a href="<?php echo $this->Html->url(array('controller'=>'Pages','action'=>'add_cart',$product['Product']['id']));?>" class="cart_spec_a">Mua Hàng</a>
                      </li> 
                     <?php endforeach;?> 
                  </ul>                
              </div>
              <!-- <div id="fpage"><b>Trang:</b> <a id="aa1" href="javascript:delt('#ispro','2335','120800','1')" style="font-weight: bold;">1</a><a id="aa2" href="javascript:delt('#ispro','2335','120800','2')" style="font-weight: normal;">2</a><a id="aa3" href="javascript:delt('#ispro','2335','120800','3')">3</a></div> -->
              <?php echo $this->Form->end();?>
          </div> 
        </div>