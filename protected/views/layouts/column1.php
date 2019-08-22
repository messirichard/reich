<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php echo $this->renderPartial('//layouts/_header', array()); ?>

<!-- <div class="fcs-wrapper outers_fcs_wrapper prelatife wrapper-slide">
    <img class="w-100 d-none d-sm-block" src="<?php echo $this->assetBaseurl; ?>home-sec-1_02.jpg" alt="">

    <div id="myCarousel_home" class="carousel carousel-fade" data-ride="carousel" data-interval="4500">
            <div class="carousel-inner">
                <div class="carousel-item <?php if($key == 0): ?>active<?php endif ?> home-slider-new">
                    
                    <img class="w-100 d-none d-sm-block" src="<?php echo $this->assetBaseurl; ?>DESIGN.jpg" alt="First slide">
                    <img class="w-100 d-block d-sm-none" src="<?php // echo Yii::app()->baseUrl.ImageHelper::thumb(600,980, '/images/'. $value->image2 , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-caption caption-slider-home mx-auto">
                        <div class="prelatife container mx-auto">
                            <div class="bxsl_tx_fcs">
                                <div class="row no-gutters">
                                    <div class="col-md-60 mx-auto pt-3 text-center">
                                        <?php echo $this->setting['home_section1_hero_content'] ?>
                                    </div>
                                    <div class="col-md-60 mx-auto pt-3">
                                        <button onclick="javascript: window.location.href='<?php echo CHtml::normalizeUrl(array('/home/produk')); ?>';" class="profil mx-auto text-center d-block">Lihat Produk Kami</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div> -->

<?php echo $content ?>
<script type="text/javascript">
    $(document).ready(function(){
        
        if ($(window).width() >= 768) {
            var $item = $('#myCarousel_home.carousel .carousel-item'); 
            var $wHeight = $(window).height();
            $item.eq(0).addClass('active');
            $item.height($wHeight); 
            $item.addClass('full-screen');

            $('#myCarousel_home.carousel img.d-none.d-sm-block').each(function() {
              var $src = $(this).attr('src');
              var $color = $(this).attr('data-color');
              $(this).parent().css({
                'background-image' : 'url(' + $src + ')',
                'background-color' : $color
              });
              $(this).remove();
            });

            $(window).on('resize', function (){
              $wHeight = $(window).height();
              $item.height($wHeight);
            });

            $('#myCarousel_home.carousel').carousel({
              interval: 4000,
              pause: "false"
            });
        }

    });
</script>
<?php echo $this->renderPartial('//layouts/_footer', array()); ?>
<?php $this->endContent(); ?>
