<section class="cover-produk">
  <div class="prelative container py-5">
    <div class="container2 mx-auto py-5">
      <div class="row py-5">
        <div class="col-md-60 text-center pt-3">
          <button class="produk mx-auto">Produk Bahan Bangunan Kami</button>
        </div>
        <div class="col-md-60 text-center pt-4">
          <h2 class="mx-auto">Aneka merk yang tergabung di Arsimetris Djaja dan peluang bekerjasama / keagenan.</h2>  
        </div>
      </div>
    </div>
  </div>
</section>

<section class="produk-sec-1">
  <div class="prelative container">
    <div class="row">
      <div class="col-md-15">
        <div class="title-produk">
          <div class="title">
            <p>Kategori produk arsimetris djaja</p>
            <hr>
            <?php
              $criteria = new CDbCriteria;
              $criteria->with = array('description');
              $criteria->addCondition('t.type = :type');
              $criteria->params[':type'] = 'category';
              $criteria->addCondition('description.language_id = :language_id');
              $criteria->params[':language_id'] = $this->languageID;
              $criteria->order = 'sort ASC';

              $dCategory = PrdCategory::model()->findAll($criteria);
            ?>
            <ul>
              <?php foreach ($dCategory as $key => $value): ?>
              <li <?php if ($value->id ==  $_GET['category']): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $value->id)); ?>"><?php echo ucwords(strtolower( $value->description->name )); ?></a></li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-45">
        <div class="title-produk-right">
          <div class="title-left">
            <p>Menampilkan: <span>Semua Produk (<?php echo $product->getTotalItemCount(); ?> items)</span></p>
          </div>
          <div class="title-right">
            <p></p>
          </div>
          <hr>
        </div>

        <div class="row box-produk pt-3">

          <?php if ($product->getTotalItemCount() > 0): ?>
          <?php foreach ($product->getData() as $key => $value): ?>
            <div class="col-md-20">
              <div class="produk-box-container pb-5">
                <div class="frame_picture">
                  <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=> $value->id, 'category'=> isset($_GET['category']) ? $_GET['category']: '' )); ?>">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(342,342, '/images/product/'. $value->image, array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img img-fluid">
                  </a>
                </div>
                <div class="title-produk pt-4">
                  <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=> $value->id, 'category'=> isset($_GET['category']) ? $_GET['category']: '' )); ?>">
                    <h1><?php echo $value->description->name ?></h1>
                  </a>
                </div>
                <div class="kategori-produk">
                  <p>Hardware</p>
                </div>
                <div class="harga">
                  <p>Rp <?php echo number_format($value->harga) ?></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          <?php endif ?>

        </div>

         <div class="pagin-products page text-center pagination">
               <?php 
               $this->widget('CLinkPager', array(
                  'pages' => $product->getPagination(),
                  'header'=>'',
                  'footer'=>'',
                  'lastPageCssClass' => 'd-none',
                  'firstPageCssClass' => 'd-none',
                  'nextPageCssClass' => 'd-none',
                  'previousPageCssClass' => 'd-none',
                  'itemCount'=> $product->totalItemCount,
                  'htmlOptions'=>array('class'=>'pagination pagination-sm'),
                  'selectedPageCssClass'=>'active',
              ));
           ?>
          </div>
          <div class="py-4"></div>

      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  $(document).ready(function(){

    $('.pagin-products ul.pagination li').addClass('page-item');
    $('.pagin-products ul.pagination li.page-item a').addClass('page-link');

  });
</script>