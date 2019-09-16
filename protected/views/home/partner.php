<?php
    $ill_page = '';
    if ($this->setting['partner_hero_image'] != ''): 
        $ill_page = Yii::app()->baseUrl.ImageHelper::thumb(1920,566, '/images/static/'. $this->setting['partner_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90'));
    endif; 
?>
<section class="cover-insides" <?php if ($ill_page): ?>style="background-image: url(<?php echo $ill_page ?>)" <?php endif ?>>
    <div class="prelative container">
        <div class="text-cover">
            <h3><?php echo $this->setting['partner_hero_title'] ?></h3>
            <div class="hr-insides"></div>
            <p><?php echo $this->setting['partner_hero_subtitle'] ?></p>
        </div>
    </div>
</section>


<section class="partner-sec-1">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <!-- <h3>We believe that by growing together we are stronger</h3>
                    <h5>Reich invites you to join our successful sales plan, and let’s grow it together. Whether you are an interior furniture maket, a contractor or furnishing industry applicator, an architect, or professional consultant for buildings and interiors, we have so many business models that you can take benefits from to your side.</h5>
                    <p>With our strong Reich brand that will be seen as the benchmark of smart efficent and high quality product, we will be covering all areas of infrastructure development and interior furnishings for all sorts of buildings. Working towards a partnership with Reich ensures your upcoming business projects and sales to increase and to be successful - For sure.</p> -->
                    <?php echo $this->setting['partner_content_1'] ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partner-sec-2">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-30">
                <div class="box-content">
                    <div class="image-kiri">
                        <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['partner2_image'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-30">
                <div class="box-content-kanan">
                    <?php echo $this->setting['partner2_content'] ?>
                    <!-- <div class="title">
                        <h3>Are you an interior and architectural accessories store, or a sales distribution dealership?</h3>
                    </div>
                    <div class="subtitle">
                        <p>Reich products can easily benefit you through an exciting and profitable  marketing plan for long term partnership. Reich’s solution based products are within reach when it comes to price, and it brings value to the customers who bought it and applied it to the furnishing projects. Reich is committed to provide exceptinal product warranty that benefits your store and bring a worry free feel to all your customers.</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partner-sec-3">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-30">
                <div class="box-content">
                    <?php echo $this->setting['partner3_content'] ?>
                    <!-- <div class="caption">
                        <h3>With Quality Products, You Only Need To Concentrate On Marketing Strategy</h3>
                    </div>
                    <div class="subcaption">
                        <p>Reich’s architectural hardware and interior furnishings appliances product lines are dedicating an in-house R&D department to execute thorough and complex one on one checking processes as well as invention of new product, driven by market request and trends.</p>
                    </div> -->
                </div>
            </div>
            <div class="col-md-30">
                <div class="box-content-kanan">
                    <div class="image">
                        <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['partner3_image'] ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partner-sec-4">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <div class="title">
                        <p><?php echo $this->setting['partner4_subtitle'] ?></p>
                    </div>
                    <div class="subtitle">
                        <?php echo $this->setting['partner4_content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>