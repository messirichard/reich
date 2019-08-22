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
                            <span class="new-back-product"><div class="separators_linetop"></div> <span class="new-back-product">HOME / MERCHANT PARTNER
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
                <div class="clear height-50"></div>
                <div class="clear height-20"></div>
                <div class="row">
                <div class="col-md-60">
                    <div class="contactus-header-top mx-auto d-block text-center">
                        <div class="seen-header-top"><?php echo $this->setting['merchant_hero_title'] ?></div>
                        <div class="clear height-30"></div>
                        <div class="merchant-header-mid">
                            <?php echo $this->setting['merchant_hero_content']; ?>
                        </div>
                    </div>
                    <div class="clear height-50"></div>
                    <div class="clear height-25"></div>
                    <div class="img-merchant-partner lists-defpg_partner">
                        <!-- <img src="<?php echo Yii::app()->baseUrl.Yii::app()->theme->baseUrl; ?>/images/design2-merchant-partner_07.jpg" alt="" class="img-fluid"> -->
                        <div class="row">
                            <?php if ($this->setting['partner_logo_1']): ?>
                                <?php for ($i=1; $i < 5; $i++) { ?>
                                <div class="col-md-15">
                                    <div class="items">
                                        <a target="_blank" href="<?php echo $this->setting['partner_link_'. $i] ?>">
                                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(139,79, '/images/static/'. $this->setting['partner_logo_'. $i] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="d-block img-fluid mx-auto">
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="clear height-50"></div>
                    <div class="clear height-30"></div>
                    <div class="contact-follow">
                        Follow Us <br>
                        <div class="clear height-20"></div>
                        <i class="fa fa-instagram" aria-hidden="true"></i><span class="icon-followus"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                    </div>
                    <div class="clear height-50"></div>
                    <div class="clear height-50"></div>
                </div>
        
    
        </div>
    </section>
</section>