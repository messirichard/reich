<?php
    $ill_page = '';
    if ($this->setting['about_hero_image'] != ''): 
        $ill_page = Yii::app()->baseUrl.ImageHelper::thumb(1920,566, '/images/static/'. $this->setting['about_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90'));
    endif; 
?>
<section class="cover-insides" <?php if ($ill_page): ?>style="background-image: url(<?php echo $ill_page ?>)" <?php endif ?>>
	<div class="prelative container">
		<div class="text-cover">
            <h3><?php echo $this->setting['about_hero_title'] ?></h3>
            <div class="hr-insides"></div>
            <p><?php echo $this->setting['about_hero_subtitle'] ?></p>
		</div>
	</div>
</section>

<section class="about-sec-1">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <?php echo $this->setting['about1_content'] ?>
                    <!-- <div class="title">
                        <h3>Born from opportunity</h3>
                    </div>
                    <div class="subtitle">
                        <p>The story of Reich Architectural & Interior Furnishing Hardware unfolded over three decades ago in a successful hardware appliances shop owned by the founders of Reich. We are working closely with architects, designers and builders in a fast forward modern civilisation that requires high end quality furnished doors, windows and door hardware for upscale, custom-built homes.</p>
                    </div>
                    <div class="caption">
                        <p>Looking from the opportunity that our founders sees in their daily operationals, Reich was meant to answer the need for quality furnishings, as many architects and furniture makers repeatedly asked for pieces that simply didn't exist. They were looking for accessories that would tie their projects together–products with one-of-a-kind appliances that could be used throughout the entire system to function well. Reich products are dream pieces, something outside ordinary to make those furnishing exceptional.</p>
                    </div> -->
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
                        <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['about2_pictures_1'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-30">
              <div class="box-content-kanan">
                <div class="title">
                    <h3><?php echo $this->setting['about2_titles_1'] ?></h3>
                </div>
                <div class="subtitle">
                    <?php echo $this->setting['about2_content_1'] ?>
                </div>
              </div>
            </div>

            <div class="col-md-30">
                <div class="box-content-kiri">
                    <div class="title">
                        <h3><?php echo $this->setting['about2_titles_2'] ?></h3>
                    </div>
                    <div class="subtitle">
                        <?php echo $this->setting['about2_content_2'] ?>
                    </div>
                </div>
            </div>
            <div class="col-md-30">
              <div class="box-content">
                <div class="image-kanan">
                    <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['about2_pictures_2'] ?>" alt="">
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<section class="about-sec-3">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <div class="image">
                        <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['about3_background'] ?>" alt="">
                    </div>
                    <div class="caption">
                        <h3><?php echo $this->setting['about3_title'] ?></h3>
                    </div>
                    <div class="subcaption">
                        <p><?php echo $this->setting['about3_content'] ?></p>
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
                        <p><?php echo $this->setting['about4_subtitle'] ?></p>
                    </div>
                    <div class="by">
                        <?php echo $this->setting['about4_contents'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
