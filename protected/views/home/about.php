<?php 
$cover_page = '';

if (isset($this->setting['about_hero_image'])) {
  $cover_page = Yii::app()->baseUrl.ImageHelper::thumb(1920,562, '/images/static/'. $this->setting['about_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90'));
}
?>
<section class="cover-insides" <?php if ($cover_page): ?>style="background-image: url(<?php echo $cover_page ?>);"<?php endif ?> >
	<div class="prelative container">
		<div class="container2 mx-auto">
			<div class="row">
        <div class="col-md-60">
          <button class="profil mx-auto"><?php echo $this->setting['about_hero_title'] ?></button>
        </div>
        <div class="col-md-60">
          <h2 class="mx-auto text-center pt-3"><?php echo $this->setting['about_hero_subtitle'] ?></h2>
        </div>
			</div>
		</div>
	</div>
</section>

<section class="about-sec-1">
  <div class="prelative container pt-5">
    <div class="container2  mx-auto pt-5">
      <div class="row">
        <div class="content pt-3 pb-3">
          <?php echo $this->setting['about1_content'] ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="about-sec-2">
  <div class="prelative container pb-5 mb-5">

    <div class="content-1 pt-5">
      <div class="row">
        <div class="col-md-30">
          <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['about2_pictures_t1']; ?>" alt="">
        </div>
        <div class="col-md-30">
          <div class="content-table p-3">
            <div class="content">
              <h2 class="pb-4"><?php echo $this->setting['about2_title_t1'] ?></h2>
              <p><?php echo $this->setting['about2_content_t1'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content-1 pt-5">
      <div class="row">
        <div class="col-md-30">
          <div class="content-table p-3">
            <div class="content">
              <h2 class="pb-4"><?php echo $this->setting['about2_title_t2'] ?></h2>
              <p><?php echo $this->setting['about2_content_t2'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-30">
          <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['about2_pictures_t2']; ?>" alt="">
        </div>
      </div>
    </div>

    <div class="content-1 pt-5">
      <div class="row">
        <div class="col-md-30">
          <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['about2_pictures_t3']; ?>" alt="">
        </div>
        <div class="col-md-30">
          <div class="content-table p-3">
            <div class="content">
              <h2 class="pb-4"><?php echo $this->setting['about2_title_t3'] ?></h2>
              <p><?php echo $this->setting['about2_content_t3'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>
</section>

<section class="about-sec-3">
  <div class="prelative container">
    <div class="row">
      <div class="col-md-30">
        <div class="content">
          <div class="title pt-5 mt-5">
            <p>Visi</p>
          </div>
          <div class="isi">
            <?php echo $this->setting['about3_visi'] ?>
          </div>
          <div class="title">
            <p>Misi</p>
          </div>
          <div class="isi">
            <?php echo $this->setting['about3_misi'] ?>
          </div>
        </div>
      </div>
      <div class="col-md-30">

      </div>
    </div>
  </div>
</section>

<section class="home-sec-3">
	<div class="prelative container">
		<div class="container2 mx-auto pt-5">
			<div class="row pt-3">
				
        <div class="content">
          <h3><?php echo $this->setting['home_section4_title'] ?></h3>
          <?php 
          $criteria = new CDbCriteria;
          $criteria->with = array('description');
          $criteria->addCondition('active = "1"');
          $criteria->addCondition('description.language_id = :language_id');
          $criteria->params[':language_id'] = $this->languageID;
          // $criteria->order = 'date_input DESC';
          $modelArsim = Brand::model()->findAll($criteria);
          ?>
          <div class="py-3 mb-1"></div>
          <div class="row">
            <?php foreach ($modelArsim as $key => $value): ?>
            <div class="col-md-15 col-30">
              <img src="<?php echo Yii::app()->baseUrl; ?>/images/brand/<?php echo $value->image ?>" alt="">
            </div>
            <?php endforeach ?>
          </div>

        </div>

			</div>
		</div>
	</div>
</section>