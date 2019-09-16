<?php
    $ill_page = '';
    if ($this->setting['how_hero_image'] != ''): 
        $ill_page = Yii::app()->baseUrl.ImageHelper::thumb(1920,566, '/images/static/'. $this->setting['how_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90'));
    endif; 
?>
<section class="cover-insides" <?php if ($ill_page): ?>style="background-image: url(<?php echo $ill_page ?>)" <?php endif ?>>
    <div class="prelative container">
        <div class="text-cover">
            <h3><?php echo $this->setting['how_hero_title'] ?></h3>
            <div class="hr-insides"></div>
            <p><?php echo $this->setting['how_hero_subtitle'] ?></p>
        </div>
    </div>
</section>

<section class="howtobuy-sec-1">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <div class="title">
                        <h3><?php echo $this->setting['how_content_1'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="howtobuy-sec-2">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-30">
                <div class="box-content">
                    <div class="caption">
                        <p>Our Distribution Stores</p>
                    </div>
                    <div class="subcaption">
                        <p><a href="#">Click here</a> to view our stores.</p>
                    </div>
                    <div class="have-chat">
                        <p>Or have a chat with our customer service to get the nearest location to you.</p>
                    </div>
                    <div class="image">
                        <img class="img img-fluid" src="<?php echo $this->assetBaseurl; ?>wa-logo-footer.png" alt="">
                        <p><?php echo $this->setting['how_wa_contacts'] ?></p>
                    </div>
                    <div class="clicktochat">
                        <?php 
                        $n_wa = str_replace('08', '62', str_replace(' ', '', $this->setting['how_wa_contacts']) );
                        ?>
                        <a href="https://wa.me/<?php echo $n_wa ?>"><p>Click to chat</p></a>
                    </div>
                </div>
            </div>
            <div class="col-md-30">
                <div class="box-content">
                    <div class="caption">
                        <p>Our Online Merchant Partner</p>
                    </div>
                    <div class="subcaption">
                        <p>Click on the logo below to visit our merchant and start to browse our products.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-30">
                        <div class="box-content-bawah-kiri">
                            <div class="image">
                                <img class="img img-fluid" src="<?php echo $this->assetBaseurl; ?>tokped.png" alt="">
                                <p>Tokopedia</p>
                            </div>
                            <div class="clickhere">
                                <a target="_blank" href="<?php echo $this->setting['url_tokopedia'] ?>"><p>Click Here</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-30">
                        <div class="box-content-bawah-kanan">
                            <div class="image">
                                <img class="img img-fluid" src="<?php echo $this->assetBaseurl; ?>bukalapak.png" alt="">
                                <p>Bukalapak</p>
                            </div>
                            <div class="clickhere">
                                <a target="_blank" href="<?php echo $this->setting['url_bukalapak'] ?>"><p>Click Here</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-sec-4">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <div class="interest">
                        <?php echo $this->setting['how_content_bottom_2'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>