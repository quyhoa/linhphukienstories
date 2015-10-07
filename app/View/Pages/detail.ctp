<div class="content_center col-md-6 right">
            <div class="content_product">
                <div id="dpro">
                    <div class="dlink">                
                        <i class="fa fa-tree" style="margin-right: 5px;"></i><?= $this->Html->link(__('Trang chủ'),'/'); ?> &gt; <?= $this->Html->link('Bộ chuyển đổi','/'); ?>
                    </div>  
                    <div class="content_detail">                      
                      <div class="pdl zoom-small-image">
                           <a href="<?php echo $product['Product']['image_large'];?>" class='cloud-zoom big_img' id='zoom1' rel="adjustX: 10, adjustY:-4">
              <img src="<?php echo $product['Product']['image_large'];?>" alt="">
                          </a>


                         
                          <a href="<?php echo $product['Product']['image_large'];?>" class="thumnai_img example-image-link" data-lightbox="example-set">
                            <img src="<?php echo $product['Product']['image'];?>" alt="" data-lightbox="example-1" class="example-image">
                          </a>                      
                      </div>
                      <div class="pdr">
                          <h1><a href=""><?php echo h($product['Product']['name']); ?></a></h1>
                          <!-- <h2 class="home_product"><span>Nhà sản xuất: Nokia</span></h2> -->
                          <b class="price" ><?php echo __('Price');?></b>
                          <div class="infor_product">
                          <span class="i1"><?php echo number_format($product['Product']['price']); ?> VNĐ <span class="i2">(Giá trên chưa VAT)</span></span></div>
                          <?php echo $product['Product']['detail_short']; ?>
                          <?php echo $this->Form->create('Product',array('url'=>array('controller'=>'Pages','action'=>'add_cart')));?>
                          <div class="number_product">
                              <b><?php echo __('Number');?>:</b> 
                              <?php echo $this->Form->input('number',array('type'=>'text','class'=>'border_product','value'=>1,'div'=>false,'label'=>false));
                               echo $this->Form->hidden('id',array('value'=>$product['Product']['id']));?>
                              <a  onclick="$('#ProductDetailForm').submit()"><img src="<?php echo $this->webroot;?>images/chitietsanpham/cart.gif" alt="Đặt hàng"></a>
                          </div>  
                          <?php $this->Form->end();?>                    
                      </div>
                    </div>
                    <div class="cl"></div>                    
                    <h2 class="h2dt"><span><i class="fa fa-plus-square"></i><?= __('Thông tin sản phẩm')?></span>
                       
                    </h2>

                    <div class="intro">
                        <?php echo $product['Product']['detail'];?>
                    </div>                                                 
                    <h2 class="h2index"><i class="fa fa-list-ul"></i> Sản phẩm cùng loại</h2>
                    <div class="cl"></div>
                    <div id="ispro">
                    <ul class="upro">
                    <?php foreach($relasts as $key => $relast): ?>
                        <li class=""> 
                            <?php echo $this->Html->link(
                                  $this->Html->image(
                                    $relast['Product']['image'],
                                    array('class'=>'m img-responsive',
                                        'alt'=>$relast['Product']['code'],
                                        'width'=>125,
                                        'height'=>125
                                        )
                                    ),
                                  '/san-pham/'.$relast['Product']['code'].'.html',
                                  array('escape'=>false,'class'=>'m')
                            );
                             ?>
                            <h4>

                                <?php echo $this->Html->link($relast['Product']['name'],'/san-pham/'.$relast['Product']['code']); ?>
                            </h4>
                            <b><?php echo number_format($relast['Product']['price']); ?> VNĐ</b>
                            <?php echo  $this->Html->link(__('Mua Hàng'),'/',array('class'=>'cart_spec_a')); ?>
                        </li> 
                    <?php endforeach; ?>
                    </ul>                
                </div>                    
                <!-- <div id="fpage"><b>Trang:</b>
                 <a id="aa1" href="javascript:delt('#ispro','2335','120800','1')" style="font-weight: bold;">1</a><a id="aa2" href="javascript:delt('#ispro','2335','120800','2')" style="font-weight: normal;">2</a><a id="aa3" href="javascript:delt('#ispro','2335','120800','3')">3</a></div>   
                <div id="fb-root"></div> -->
                
               <!--  <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="2"></div>  -->             
                </div> 
            </div>
        </div>