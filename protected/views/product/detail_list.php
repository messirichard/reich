<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

<section class="category-sec-1">
  <div class="prelative container">
    <div class="row">
      <div class="col-md-60">
        <div class="box-content">
          <div class="title">
            <h6>Our Product Collections</h6>
            <div class="line-category"></div>
            <h2><?php echo $category->description->name ?></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row"></div>
  </div>
</section>

<?php
$criteria4 = new CDbCriteria;
$criteria4->with = array('description');
$criteria4->addCondition('t.type = :type');
$criteria4->params[':type'] = 'category';
$criteria4->order = 'sort ASC';
$all_categorys = PrdCategory::model()->findAll($criteria4);

?>

<div class="kategori-produk">
    <div class="prelative container">
        <ul>
            <?php foreach ($all_categorys as $key => $value): ?>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $value->id)); ?>"><?php echo $value->description->name ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>


<section class="breadcrumb-det">
    <div class="prelative container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/products')); ?>">Our Product Collections</a></li>
                <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $category->id)); ?>"><?php echo $category->description->name ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#"><?php echo $data->description->name ?></a></li>
            </ol>
            <div class="back">
                <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $category->id)); ?>">
                <p>Back to Product Collections Category</p>
                </a>
            </div>
        </nav>

    </div>
</section>

<div class="product-det outers_blockdetail_inprddetail">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-30">
                <div class="image box-image">
                  <img class="w-100" src="<?php echo $this->assetBaseurl; ?>Layer-36.jpg" alt="">
                </div>
            </div>
            <div class="col-md-30">
              <?php 
              $datas = unserialize($data->data);
              $mod_prodisi = [
                              1 => 
                              [
                                  'title' => 'MATERIAL',
                                  'isi' => $datas['material'],
                              ],
                              [
                                  'title' => 'FINISH',
                                  'isi' => $datas['finish'],
                              ],
                              [
                                  'title' => 'DOWNLOAD',
                                  'isi' => $datas['download'],
                              ]
                          ];
              ?>
                <div class="descriptions">
                    <div class="title">
                        <p><?php echo $data->description->name ?></p>
                    </div>
                    <div class="item-code">
                        <p>ITEM CODE: <?php echo $data->kode ?></p>
                    </div>
                    <div class="hr-garis-prod"></div>
                    <div class="product-detailsss">
                        <div class="title titles_prd">
                            <p>PRODUCT DETAILS</p>
                        </div>
                        <div class="isi">
                            <p><?php echo $data->description->desc ?></p>
                        </div>
                    </div>
                    <div class="hr-garis-prod"></div>
                    <?php foreach($mod_prodisi as $key => $value): ?>
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="prodtit">
                                <p><?php echo $value['title'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-48">
                            <div class="prodisi">
                                <p><?php echo $value['isi'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="hr-garis-prod"></div>
                    <?php endforeach ?>
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="prodtit">
                                <p>more images</p>
                            </div>
                        </div>
                        <div class="col-md-48">
                            <div class="prodgambar">
                                <ul class="list-inline">
                                    <?php for ($i=0;$i<4;$i++){?>
                                        <li class="list-inline-item">
                                            <div class="image">
                                                <img class="img img-fluid" src="<?php echo $this->assetBaseurl; ?>products-detail_07.jpg" alt="">
                                            </div>
                                        </li>
                                    <?php } ?> 
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="hr-garis-prod"></div>
                    <button class="btn btn-info" onclick="javascript: alert('underconstruction'); return false;">Inquire This Product</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5"></div>

<div class="prod-yanglain">
    <div class="prelative container">
        <div class="row no-gutters">
            <div class="col-md-30">
                <div class="isi">
                    <p>You might consider looking at these products</p>
                </div>
            </div>
            <div class="col-md-30">
                <div class="back text-right">
                    <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $category->id)); ?>" class="backs_categr_collect">
                        Back to Product Collections Category
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-4"></div>

<section class="category-sec-2">
  <div class="prelative container">
    <div class="row">
      <?php foreach($product as $key => $value): ?>
      <div class="col-md-15">
        <div class="box-content">
          <div class="image">
            <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=> $value->id )); ?>">
                <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/product/'. $value->image ?>" alt="">
            </a>
          </div>
          <div class="title">
            <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=> $value->id )); ?>">
                <p><?php echo $value->description->name ?></p>
            </a>
          </div>
          <div class="subtitle">
            <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=> $value->id )); ?>"><p>View product</p></a>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<section class="category-sec-3">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <div class="interest">
                        <p>Couldn’t find what you’re looking for?</p>
                    </div>
                    <div class="by">
                        <p>Please consult to our product specialist, we will help you find the right products.</p>
          </div>
          <div class="box-content-wa">
            <h6>Whatsapp Hotline & Chat</h6>
            <img class="wa-footer" src="<?php echo $this->assetBaseurl; ?>wa-logo-footer.png" alt="">
            <a href="#"><p>081 5530 78875 (Click To Chat)</p></a>
                  </div>
                </div>
            </div>
        </div>
    </div>

</section>






<?php /*
<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

<section class="produk-detail-sec-1 pt-5">
  <div class="py-5"></div>
  <div class="prelative container pt-4">
    <div class="row">
      <div class="col-md-15">
        <div class="title-produk">
          <div class="title">
            <p>Kategori produk arsimetris djaja</p>
            <hr>
            <ul>
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
              <?php foreach ($dCategory as $key => $value): ?>
              <li <?php if ($value->id ==  $_GET['category']): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $value->id)); ?>"><?php echo ucwords(strtolower( $value->description->name )); ?></a></li>
              <?php endforeach ?>

            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-45 rights_det_product">
        <div class="title-produk-right">
          <div class="title-left">
            <p>HOME > Produk Bahan Bangunan Kami >  <span><?php echo $data->description->name ?></span></p>
          </div>
          <div class="title-right">
            <p></p>
          </div>
          <hr>
        </div>
        <div class="row box-produk pt-3 pb-5 py-2">
            <div class="col-md-30">
                <div class="image">
                    <img src="<?php echo $this->assetBaseurl; ?>2-produk-detail_03.jpg" class="img img-fluid" alt="">
                </div>
            </div>
            <div class="col-md-30 pl-4 ">
              <?php if(Yii::app()->user->hasFlash('success')): ?>
              <script type="text/javascript">
              swal({
                title: "<?php echo Yii::app()->user->getFlash('success') ?>",
                text: "Do you want to continue shopping?",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Continue Shopping",
                cancelButtonText: "Go to Cart",
                // closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm){
                if (isConfirm) {
                  
                } else {
                  window.location.href = '<?php echo CHtml::normalizeUrl(array('/cart/shop')); ?>';
                }
              });
              </script>
              <?php endif; ?>

              <?php if(Yii::app()->user->hasFlash('danger')): ?>
                  <?php $this->widget('bootstrap.widgets.TbAlert', array(
                      'alerts'=>array('danger'),
                  )); ?>
              <?php endif; ?>

              <form action="<?php echo CHtml::normalizeUrl(array('addcart', 'category'=>$_GET['category'])); ?>" method="post">
              <input type="hidden" id="price-item" value="<?php echo $data->harga ?>">
              <input type="hidden" name="id" value="<?php echo $data->id ?>">
              <input type="hidden" name="option" class="form_size_id" value="">

                <div class="title">
                    <p><?php echo ucwords($data->description->name); ?></p>
                </div>
                <div class="kategori pt-2">
                    <p><?php echo ucwords(strtolower($category->description->name)); ?></p>
                </div>
                <hr>
                <div class="harga">
                    <p>Rp <?php echo number_format($data->harga) ?></p>
                </div>
                <hr>
                <?php 
                $datas = unserialize($data->data);
                ?>
                <div class="warna">
                    <div class="row">
                        <div class="col-md-15">
                            <p class="warna-kiri">
                                Warna
                            </p>
                        </div>
                        <div class="col-md-45">
                            <p class="warna-kanan">
                                <?php echo $datas['warna'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="warna">
                    <div class="row">
                        <div class="col-md-15">
                            <p class="warna-kiri">
                                Kemasan
                            </p>
                        </div>
                        <div class="col-md-45">
                            <p class="warna-kanan">
                                <?php echo $datas['kemasan'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="warna">
                    <div class="row">
                        <div class="col-md-15">
                            <p class="warna-kiri">
                                Kuantiti
                            </p>
                        </div>
                        <div class="col-md-5">
                            <p class="warna-kanan">
                                <input type="number" name="qty" value="1">
                            </p>
                        </div>
                        <div class="col-md-40 pl-5">
                              <button type="submit">MASUKKAN KERANJANG</button>
                        </div>
                    </div>
                </div>
                </form>
                <hr>
                <div class="warna">
                    <div class="row">
                        <div class="col-md-15">
                            <p class="warna-kiri">
                                Deskripsi
                            </p>
                        </div>
                        <div class="col-md-45">
                            <p class="warna-kanan">
                            <?php echo $data->description->desc ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lainnya">
          <div class="kategori-bottom">
          <p>Produk Bahan Bangunan Kami yang lain</p>
          </div>
          <hr>

          <div class="blog-box-container pb-5">
          <div class="row">
          <?php if (count($product) > 0): ?>
            <?php foreach ($product as $key => $value): ?>
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
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
*/ ?>