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

<section class="blog-detail">
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
        <div class="kategori-date">
          <div class="kategori-kanan">
            <p>- <?php echo $res_product[$dataBlog->topik_id] ?> | <span><?php echo date("d F Y", strtotime($dataBlog->date_input)); ?></span></p>
          </div>
        </div>
        <div class="title">
          <h1><?php echo $dataBlog->description->title ?></h1>
        </div>
        <div class="image pt-4">
          <img class="w-100 img img-fluid" src="<?php echo Yii::app()->baseUrl.'/images/blog/'. $dataBlog->image ?>" alt="">
        </div>
        <div class="content-blog py-4 pb-5">
         <?php echo $dataBlog->description->content ?>
        </div>

        <div class="lainnya">
          <div class="kategori-bottom">
            <p>artikel blog arsimetris djaja lainnya</p>
          </div>
          <hr>
          <div class="blog-box-container pb-5">
            <div class="row">

            <?php foreach ($dataBlogs->getData() as $key => $value): ?>
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

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>





<?php
/*
<section class="outers_page_static back_cream mh500 back_grey_pattern">
  <div class="insides sub_page_static about_us">
    <div class="prelatife container">
      <div class="clear height-50"></div><div class="height-10"></div>

      <div class="content-text insides_static">
        <h1 class="title_page">BLOGS</h1>
        <div class="clear"></div>
        <h3 class="tagline"><?php echo $dataBlog->description->title ?></h3>
        <div class="clear"></div>
        <div class="row details_cont_articles">
          <div class="col-md-9 text-left">
            <div class="left_cont">
              <div class="mw906">

                <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(980,1000, '/images/blog/'.$dataBlog->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="">

                <?php echo $dataBlog->description->content ?>

                <div class="clear height-10"></div>
                <div class="shares-text text-left p_shares_article">
                    <span class="inline-t">SHARE</span>&nbsp; / &nbsp;<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=#">FACEBOOK</a>&nbsp; /
                    &nbsp;<a target="_blank" href="https://plus.google.com/share?url=#">GOOGLE PLUS</a>&nbsp; /
                    &nbsp;<a target="_blank" href="https://twitter.com/home?status=#">TWITTER</a>
                </div>

                <div class="clear"></div>
              </div>
            </div>

          </div>
          <div class="col-md-3 text-left">
            <div class="right_cont">
              <div class="padding-left-25">
                  <span class="sub_page_title">Other Blogs</span>
              </div>
              <div class="clear"></div>
              <div class="right_sub_menu">
                <ul class="list-unstyled">
                    <?php foreach ($dataBlogs->getData() as $key => $value): ?>
                        
                  <li><a href="<?php echo CHtml::normalizeUrl(array('detail', 'id'=>$value->id)); ?>"><?php echo $value->description->title ?></a></li>
                    <?php endforeach ?>
                </ul>
                <div class="clear"></div>
              </div>

              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        

        <div class="clear"></div>
      </div>
      
      <div class="clear height-20"></div>
      <div class="clear height-50"></div>
    </div>
    <div class="clear"></div>
  </div>
</section>
*/ ?>