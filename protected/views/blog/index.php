<section class="cover-blog">
  <div class="prelative container py-5">
    <div class="container2 mx-auto py-5">
      <div class="row py-5">
        <div class="col-md-60 text-center pt-3">
          <button class="profil mx-auto">Blog</button>
        </div>
        <div class="col-md-60 text-center pt-4">
          <h2 class="mx-auto">Aneka Artikel Dan Tips Seputar Dunia Bahan Bangunan Oleh Arsimetris Djaja Banjarmasin.</h2>  
        </div>
      </div>
    </div>
  </div>
</section>

<section class="blog-sec-1">
  <div class="prelative container">
    <div class="row">
      <div class="col-md-15">
        <div class="title-blog">
          <div class="title">
            <p>Kategori blog arsimetris djaja</p>
            <hr>
            <ul>
              <li><a href="<?php echo CHtml::normalizeUrl(array('/blog/index')); ?>">
                Semua
              </a> 
            </li>
            <?php 
            $res_product = array(
              1=>'Tips & Trik',
              2=>'Artikel',
              3=>'Berita',
              );
            ?>
            <?php foreach ($res_product as $key => $value): ?>
            <li>
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/index', 'topik'=>$key)); ?>"><?php echo $value ?></a> 
            </li>
            <?php endforeach ?>
            </ul>
          </div>
        </div>
        <div class="py-4"></div>
      </div>
      <div class="col-md-45">
        <div class="title-blog-right">
          <div class="title-left">
            <p>Menampilkan: <span>Semua Artikel (<?php echo $dataBlog->getTotalItemCount(); ?> artikel)</span></p>
          </div>
          <div class="title-right">
            <p></p>
          </div>
          <hr>
        </div>
        <div class="row box-blog pt-3">
          <?php if ($dataBlog->getTotalItemCount() > 0): ?>
          <?php foreach ($dataBlog->getData() as $key => $value): ?>
            <div class="col-md-20">
              <div class="blog-box-container pb-5">
                <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=> $value->id)); ?>">
                  <img class="img w-100" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(342,235, '/images/blog/'. $value->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="">
                </a>
                <div class="kategori-blog pt-4">
                  <p>- <?php echo $res_product[$value->topik_id] ?></p>
                </div>
                <div class="title-blog">
                  <a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=> $value->id)); ?>">
                  <h1><?php echo $value->description->title ?></h1>
                  </a>
                </div>
                <div class="baca-selanjutnya pt-2">
                  <p><a href="<?php echo CHtml::normalizeUrl(array('/blog/detail', 'id'=> $value->id)); ?>">BACA ARTIKEL</a></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <?php endif ?>

        </div>
      </div>
    </div>
  </div>
</section>