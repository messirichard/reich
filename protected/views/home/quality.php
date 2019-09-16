<?php
    $ill_page = '';
    if ($this->setting['quality_hero_image'] != ''): 
        $ill_page = Yii::app()->baseUrl.ImageHelper::thumb(1920,566, '/images/static/'. $this->setting['quality_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90'));
    endif; 
?>
<section class="cover-insides" <?php if ($ill_page): ?>style="background-image: url(<?php echo $ill_page ?>)" <?php endif ?>>
	<div class="prelative container">
		<div class="text-cover">
            <h3><?php echo $this->setting['quality_hero_title'] ?></h3>
            <div class="hr-insides"></div>
            <p><?php echo $this->setting['quality_hero_subtitle'] ?></p>
		</div>
	</div>
</section>

<section class="about-sec-1">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <?php echo $this->setting['quality1_content'] ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-sec-2">
    <div class="prelative container">
        <div class="row">

            <div class="col-md-30">
                <div class="box-content">
                    <div class="image-kiri">
                        <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['quality2_pictures_1'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-30">
              <div class="box-content-kanan">
                <div class="title">
                    <h3><?php echo $this->setting['quality2_titles_1'] ?></h3>
                </div>
                <div class="subtitle">
                    <?php echo $this->setting['quality2_content_1'] ?>
                </div>
              </div>
            </div>

            <div class="col-md-30">
                <div class="box-content-kiri">
                    <div class="title">
                        <h3><?php echo $this->setting['quality2_titles_2'] ?></h3>
                    </div>
                    <div class="subtitle">
                        <?php echo $this->setting['quality2_content_2'] ?>
                    </div>
                </div>
            </div>
            <div class="col-md-30">
              <div class="box-content">
                <div class="image-kanan">
                    <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['quality2_pictures_2'] ?>" alt="">
                </div>
              </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>
</section>
