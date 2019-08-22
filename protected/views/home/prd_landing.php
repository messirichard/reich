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
                            <a href="javascript:void(-1);"><i class="fa fa-long-arrow-left"></i> &nbsp;BACK</a> 
                            <span class="new-back-product"><div class="separators_linetop"></div> <span class="new-back-product">HOME / MEN / ALL
                            </span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-20">
                        <div class="box-search">
                            <form class="form-inline">
                            <label for="inlineFormInputNN2">SEARCH</label>
                            <div class="blob-input">
                                <input type="text" class="form-control mb-2" id="inlineFormInputNN2" placeholder="">
                                <button type="submit" class="btn mb-2"><i class="fa fa-search"></i></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear height-50"></div>
            <div class="clear height-20"></div>
            <div class="seen-header-top">
                Men
            </div>
            <div class="clear height-30"></div>
            <div class="row">
                <div class="col-md-20">
                    <div class="textaboveheader-landing">
                        Sortby
                        <span class="last">
                            Latest
                        </span>
                        <span class="last">
                            $-$$$
                        </span>
                        <span class="last">
                            $-$$$ 
                        </span>
                    </div>
                </div>
                <div class="col-md-20">
                    <div class="textaboveheader-landing">
                        All
                        <span class="last">
                            Shoes
                        </span>
                        <span class="last">
                            Clothing
                        </span>
                        <span class="last">
                            Accessories 
                        </span>
                    </div>
                </div>
                <div class="col-md-20">
                    <div class="textaboveheader-landing page">
                        Page
                        <span class="last">
                            1
                        </span>
                        <span class="last">
                            2
                        </span>
                        <span class="last">
                            3 
                        </span>
                        <span class="last">
                            4 
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="containertrending listproducts-default">
				<div class="row">
					<?php foreach ($product->getData() as $key => $value): ?>
						
					<div class="col-md-15">
						<div class="item">
							<div class="judulproduk">
								<a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><?php echo $value->description->name ?></a>
							</div>
							<div class="hargaproduk">
			                    <?php if ($value->harga_coret > $value->harga): ?>
			                      
			                      	<?php echo Cart::money(round($value->harga/1000)) ?>K
			                      	<span class="diskonproduk"><?php echo Cart::money(round($value->harga_coret/1000)) ?>K</span>
			                    <?php else: ?>
									<?php echo Cart::money(round($value->harga/1000)) ?>K
			                    <?php endif ?>
							</div>
							<a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>">
								<img data-alt-src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/product/'.$value->image2 , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" class="xyz img-fluid samakan">
							</a>
							<!-- <img class="xyz" data-alt-src="http://cdn1.iconfinder.com/data/icons/fatcow/32/accept.png" src="http://cdn1.iconfinder.com/data/icons/fatcow/32/cancel.png" /> -->
							<div class="row">
								<div class="col-md-30">
									<div class="avaiable">
										AVAILABLE SIZE
									</div>
									<div class="ukuran">
										<p>
											36 37 38 39 40 41 42 43 44 45	
										</p>
									</div>
								</div>
								<div class="col-md-30">
									<div class="mx-auto">
										<button type="submit" class="buttonbuy">BUY</button>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<?php endforeach ?>
					
				</div>
            </div>
            <div class="clear height-50"></div>
            <div class="clear height-10"></div>
            <hr class="hr-contact">
            <div class="row">
                <div class="col-md-30" style="border-right: 2px #cccccc solid">
                <div class="contact-follow">
                    Follow Us <br>
                    <div class="clear height-20"></div>
                    <i class="fa fa-instagram" aria-hidden="true"></i><span class="icon-followus"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                </div>
                </div>
                <div class="col-md-30">
                <div class="contact-follow">
                    Our Merchant Partner <br>
                    <div class="clear height-20"></div>
                    <img src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/images/design2-contact_84.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
</section> 