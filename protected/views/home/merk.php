<?php 
$cover_page = '';

if (isset($this->setting['merek_hero_image'])) {
  $cover_page = Yii::app()->baseUrl.ImageHelper::thumb(1920,562, '/images/static/'. $this->setting['merek_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90'));
}
?>
<section class="cover-insides" <?php if ($cover_page): ?>style="background-image: url(<?php echo $cover_page ?>);"<?php endif ?> >
    <div class="prelative container">
        <div class="container2 mx-auto">
            <div class="row">
        <div class="col-md-60">
          <button class="profil mx-auto"><?php echo $this->setting['merek_hero_title'] ?></button>
        </div>
        <div class="col-md-60">
          <h2 class="mx-auto text-center pt-3"><?php echo nl2br($this->setting['merek_hero_subtitle']) ?></h2>
        </div>
            </div>
        </div>
    </div>
</section>

<section class="merk-sec-1">
  <div class="prelative container pt-5">
    <div class="container2  mx-auto pt-5 pb-5">
      <div class="row">
        <div class="content pb-5">
          <?php echo $this->setting['merk1_content'] ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="merk-sec-2">
    <div class="prelative container">
        <div class="container2 mx-auto pt-5">
            <div class="row pt-5">
                <div class="col-md-60 mx-auto">
                    <div class="logo d-block mx-auto">
                        <img class="d-block mx-auto" src="<?php echo $this->assetBaseurl; ?>logo-merk.png" alt="">
                    </div>
                </div>
                <div class="col-md-60 mx-auto">
                    <div class="bawah-logo d-block mx-auto py-4">
                        <?php echo $this->setting['merk2_content'] ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php for ($i=0;$i<=11;$i++) {?>
                <div class="col-md-30 pt-3">
                    <div class="box-new">
                        <img class="d-block mx-auto" src="<?php echo $this->assetBaseurl; ?>logo-sec-2.png" alt="">
                        <div class="isi-box">
                            <p>Niro Granite adalah sebuah brand untuk produk Granit Tile yang berkelas dan berkualitas tinggi, memiliki koleksi yang sangat lengkap dan aneka varian yang bergaya modern serta dinamis. Granite Arsimetris Djaja adalah agen resmi dan distributor untuk produk granit tile Niro Granite di Banjarmasin, Kalimantan Selatan dan kota sekitarnya.</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="merk-sec-3">
    <div class="prelative container mx-auto">
        <div class="container2 mx-auto pt-5">
            <div class="row pt-5">
                <div class="col md-60 pt-5">
                    <div class="title mx-auto pt-3">
                        <p class="text-center"><?php echo $this->setting['merk3_sub_title'] ?></p>
                    </div>
                </div>
                <div class="col-md-60">
                    <div class="subtitle pt-3">
                        <?php echo $this->setting['merk3_sub_content'] ?>
                    </div>
                </div>
                <div class="col-md-60">
                    <div class="kalimantan mx-auto text-center pt-5">
                        <img src="<?php echo Yii::app()->baseUrl.'/images/static/'. $this->setting['merk3_picture']; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    section.merk-sec-1 .prelative.container .container2 .row .content h3{
        margin-bottom: 25px;
    }
</style>