<?php
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<section class="default-sc inside-page product-details"> 
    <section class="top-product-detail">
        <div class="container defaults">
            <div class="tops">
                <div class="row">
                    <div class="col-md-40">
                        <div class="shn-back-products">
                        <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>"><i class="fa fa-long-arrow-left"></i> &nbsp;BACK</a> 
                        <span class="new-back-product"><div class="separators_linetop"></div> <span class="new-back-product">HOME / AS SEEN ON
                        </span>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-20">
                        <div class="box-search">
                            <form class="form-inline">
                            <label for="inlineFormInputNN2">SEARCH</label>
                            <div class="blob-input">
                              <form method="GET" action="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>">
                                <input type="text" class="form-control mb-2" id="inlineFormInputNN2" placeholder="" name="q">
                                <button type="submit" class="btn mb-2"><i class="fa fa-search"></i></button>
                              </form>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear height-50"></div>
            <div class="clear height-20"></div>
            <div class="row">
                <div class="col-md-60">
                    <div class="seen-header-top">
                        As Seen On
                        <div class="seen-header-mid">
                            Instagram <a href="https://instagram.com/jackson.id">@jackson.id</a>   /   01 August 2018
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear height-50"></div>
            <div class="clear height-20"></div>
            <div class="row">
                <div class="col-md-30">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(782,929, '/images/blog/'.$dataBlog->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="img-fluid img-seen_on">
                </div>
                <div class="col-md-30">
                    <div class="igpost">
                        <?php echo strtoupper($dataBlog->description->title); ?>
                        <div class="clear height-30"></div> 
                        <div class="text">
                            <?php echo $dataBlog->description->content ?>
                            <div class="clear height-20"></div> 
                            <div class="view">
                                <a target="_blank" href="<?php echo $dataBlog->link; ?>">VIEW POST ON INSTAGRAM<span class="viewpost"><i class="fa fa-long-arrow-right"></i> </span></a>
                            </div>
                        </div>
                        <div class="clear height-20"></div>
                        <div class="clear height-20"></div>
                        <hr>
                        <div class="clear height-20"></div>
                        <div class="clear height-20"></div>
                        <?php 
                        $criteria=new CDbCriteria;
                        $criteria->with = array('description');
                        $criteria->order = 'date DESC';
                        $criteria->addCondition('status = "1"');
                        $criteria->addCondition('description.language_id = :language_id');
                        $criteria->params[':language_id'] = $this->languageID;
                        $criteria->addCondition('t.id = :ls_id');
                        $criteria->params[':ls_id'] = $dataBlog->topik_id; 
                        $products = PrdProduct::model()->find($criteria);
                        ?>
                        <div class="product">
                            PRODUCT FEATURED IN ARTICLE   
                            <div class="clear height-20"></div>
                            <div class="clear height-20"></div>
                            <div class="item">
                                <div class="judulproduk">
                                    <?php echo strtoupper($products->description->name); ?>
                                </div>
                                <div class="hargaproduk">
                                <?php if ($products->harga_coret > $products->harga): ?>
                                
                                  <?php echo Cart::money(round($products->harga/1000)) ?>K
                                  <span class="diskonproduk"><?php echo Cart::money(round($products->harga_coret/1000)) ?>K</span>
                                <?php else: ?>
                                  <?php echo Cart::money(round($products->harga/1000)) ?>K
                                <?php endif ?>
                                </div>
                                <div class="img-produk-seen">
                                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(460,460, '/images/product/'.$products->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-fluid">    
                                </div>
                                <div class="beli">
                                    <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=> $products->id)); ?>"><button type="submit" class="buttonbuy">BUY</button></a>
                                </div>
                            </div>
                            <div class="clear height-50"></div>
                            <div class="clear height-50"></div>
                            <div class="prevnext">
                                <?php if ($prevId != null): ?>
                                <a href="<?php echo CHtml::normalizeUrl(array('/home/blogs', 'id'=>$prevId->id)); ?>">
                                <i class="fa fa-long-arrow-left"></i>
                                <span class="prev">
                                    PREVIOUS ARTICLE
                                </span>
                                </a>
                                <?php endif; ?>
                                <div class="divider-line"></div>
                                <?php if ($nextId != null): ?>
                                <a href="<?php echo CHtml::normalizeUrl(array('/home/blogs', 'id'=>$nextId->id)); ?>">
                                <span class="next">
                                    NEXT ARTICLE
                                </span>
                                <i class="fa fa-long-arrow-right"></i>
                                </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear height-50"></div>
            
            <?php echo $this->renderPartial('//layouts/_tops_footer_partner', array()); ?>
    </section>
</section>
