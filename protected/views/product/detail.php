<?php
$session=new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<?php
$bread = PrdCategory::model()->getBreadcrump($_GET['category'], $this->languageID);
$bread = array_reverse($bread,true);
$dataCategory = array();
foreach ($bread as $key => $value) {
  // $this->breadcrumbs[$key]=$value;
  array_push($dataCategory, $key);
}
$dataCategory = array_reverse($dataCategory);
?>
<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.css">

<section class="default-sc inside-page product-details">
  
  <section class="top-product-detail">
    <div class="container defaults">
      <div class="tops">
        <div class="row">
          <div class="col-md-40">
            <div class="shn-back-products">
              <a href="javascript:void(-1);"><i class="fa fa-long-arrow-left"></i> &nbsp;BACK</a>
            </div>
          </div>
          <div class="col-md-20">
            <div class="box-search">
              <form class="form-inline" method="GET" action="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>">
              <label for="inlineFormInputNN2">SEARCH</label>
              <div class="blob-input">
                  <input type="text" class="form-control mb-2" id="inlineFormInputNN2" placeholder="" name="q">
                  <button type="submit" class="btn mb-2"><i class="fa fa-search"></i></button>
              </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="middles">
        <div class="row">
          <div class="col-md-40">
            <div class="big-slides-product prelatife">
              <div id="carouselPrdDet" class="carousel slide carousel-fade" data-ride="carousel" data-interval="50000000">
                <ol class="carousel-indicators">
                  <li data-target="#carouselPrdDet" data-slide-to="0" class="active"></li>
                  <?php if (count($data->alternateImage) > 0): ?>
                    <?php foreach ($data->alternateImage as $key => $value): ?>
                      <?php $key= $key+1; ?>
                      <li data-target="#carouselPrdDet" data-slide-to="<?php echo $key ?>"></li>
                      <?php endforeach ?>
                  <?php endif ?>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600,600, '/images/product/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="d-block img-fluid mx-auto my-auto d-block"> 
                  </div>
                  <?php if (count($data->alternateImage) > 0): ?>
                    <?php foreach ($data->alternateImage as $key => $value): ?>
                    <div class="carousel-item">
                      <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600,600, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="d-block img-fluid mx-auto my-auto d-block"> 
                    </div>
                    <?php endforeach ?>
                  <?php endif ?>
                </div>

              </div>

              <div class="clear"></div>
            </div>

          </div>
          <div class="col-md-20">
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

            <div class="decsriptions-product">
              <h2 class="title"><?php echo $data->description->name ?></h2>
              <?php echo $data->description->desc ?>
              <form action="<?php echo CHtml::normalizeUrl(array('addcart', 'category'=>$_GET['category'])); ?>" method="post">
              <input type="hidden" id="price-item" value="<?php echo $data->harga ?>">
              <input type="hidden" name="id" value="<?php echo $data->id ?>">
              <input type="hidden" name="option" class="form_size_id" value="">
              <input type="hidden" name="qty" value="1">
              <div class="block-filters">
                <?php if (count($data->attributes) > 0): ?>
                <div class="list sizes">
                  <span>SIZE</span> <div class="clear"></div>
                  <ul class="list-inline">
                    <?php foreach ($data->attributes as $key => $value): ?>
                    <li class="list-inline-item"><a class="t_filter_size" data-id="<?php echo $value->id_str ?>" data-color="<?php echo $value->color ?>" href="javascript:void(0);"><?php echo $value->attribute ?></a></li>
                    <?php endforeach ?>
                  </ul>
                  <div class="clear"></div>
                </div>
                <?php endif ?>
                <div class="clear"></div>
                <div class="list">
                  <span>STYLE</span> <div class="clear"></div>
                  <p>Low-Top Sneakers</p>
                </div>
                <div class="clear"></div>
                <div class="list" id="color_choose">
                  <span>AVAILABLE COLOR</span> <div class="clear"></div>
                  <p>
                    <label>NA</label>
                  </p>
                </div>
                <div class="clear"></div>
                <div class="list">
                  <span>PRICE</span> <div class="clear"></div>
                  <p class="prices">
                    <?php if ($data->harga_coret > $data->harga): ?>
                        <?php echo Cart::money(round($data->harga/1000)) ?>K
                        <span style="text-decoration: line-through; color: red; font-size: 13px;"><?php echo Cart::money(round($data->harga_coret/1000)) ?>K</span>
                    <?php else: ?>
                    <?php echo Cart::money(round($data->harga/1000)) ?>K
                    <?php endif ?>
                  </p>
                </div>
                <button class="btn btn-primary buys-product">BUY</button>
                <div class="clear"></div>
              </div>
              </form>
              <script type="text/javascript">
                $(document).ready(function(){
                  
                  $('.t_filter_size').click(function(){
                    $('a.t_filter_size').removeClass('active');
                    $(this).addClass('active');
                    var s_size = $(this).attr('data-id');
                    var s_color = $(this).attr('data-color').toUpperCase();
                    
                    $('.form_size_id').val(s_size);
                    $('#color_choose label').text('');
                    $('#color_choose label').text(s_color);
                  });
                  
                });
              </script>
            </div>
          </div>
        </div>
      </div>

      <div class="clear"></div>
    </div>
  </section>
  
  <?php if ($data->description->note): ?>
  <section class="gallery-products">
    <div class="top text-center">
      <h3>Style Gallery</h3>
    </div>

    <div class="middles">
      <div class="container defaults">
        <?php echo $data->description->note; ?>
        <div class="clear"></div>
      </div>
    </div>
  </section>
  <?php endif ?>

  <?php /*
  <?php 
  $gallersn_id = PrdGalleryHighlight::model()->find('product_id = :product_id', array(':product_id'=>$data->id));
  ?>
  <?php if ($gallersn_id): ?>    
  <section class="gallery-products">
    <div class="top text-center">
      <h3>Style Gallery</h3>
    </div>

    <div class="middles">
      <div class="container defaults">
        <?php 
        $view_gallery_d = ViewGallery::model()->find('t.id = :ids', array(':ids'=>$gallersn_id->gallery_id));
        ?>
        <p><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1268,730, '/images/gallery/'.$view_gallery_d->image , array('method' => 'resize', 'quality' => '90')) ?>" alt="" class="d-block mx-auto img-fluid w-100"></p>
        <?php echo $view_gallery_d->content; ?>
        <!-- <ul class="list-unstyled">
          <li><img src="<?php echo Yii::app()->baseUrl; ?>/asset/images/gallery-s1.jpg" alt="" class="img-fluid"></li>
        </ul> -->
        <div class="clear"></div>
      </div>
    </div>
  </section>
  <?php endif ?>*/ ?>

  <section class="block-related-products py-5 my-5">
    <div class="prelatife container">
      <div class="top text-center">
      <h3>Related Products</h3>
    </div>
    <div class="middles py-1">
      <div class="container defaults">
        
        <!-- Start list related product -->
        <div class="listproducts-default">
          <div class="row">
            <?php foreach ($product as $key => $value): ?>
              <div class="col-md-15">
                <div class="item">
                  <div class="judulproduk">
                    <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><?php echo $value->description->name ?></a>
                  </div>
                  <div class="hargaproduk">
                              <?php if ($value->harga_coret > $value->harga): ?>
                                
                                  <?php echo Cart::money(round($value->harga/1000)) ?>K
                                  <span class="diskonproduk"><?php echo Cart::money(round($value->harga_coret/1000)) ?>K</span>
                              <?php else: ?>
                      <?php echo Cart::money(round($value->harga/1000)) ?>K
                              <?php endif ?>
                  </div>
                  <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>">
                    <img data-alt-src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/product/'.$value->image2 , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(500,500, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" class="xyz img-fluid samakan">
                  </a>
                  <!-- <img class="xyz" data-alt-src="http://cdn1.iconfinder.com/data/icons/fatcow/32/accept.png" src="http://cdn1.iconfinder.com/data/icons/fatcow/32/cancel.png" /> -->
                  <div class="row">
                    <div class="col-md-30">
                      <div class="avaiable">
                        AVAILABLE SIZE
                      </div>
                      <div class="ukuran">
                        <?php if (count($value->attributes) > 0): ?>
                        <p>
                          <?php foreach ($value->attributes as $key => $value): ?>
                          <?php echo $value->attribute." "; ?>
                          <?php endforeach; ?>
                        </p>
                        <?php endif ?>
                      </div>
                    </div>
                    <div class="col-md-30">
                      <div class="mx-auto">
                        <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>"><button type="button" class="buttonbuy">BUY</button></a>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            <?php endforeach ?>
            
          </div>
        </div>
        <!-- End list related product -->

      </div>
    </div>

      <div class="clear clearfix"></div>
    </div>
  </section>

</section>
<script type="text/javascript">
  if ($(window).width() < 980) {
    $(".listproducts-default .item").addClass('actived');
  }
</script>






<?php /*
<script src="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl ?>/asset/js/sweetalert/sweetalert.css">

<div class="clear"></div>
<div class="subpage static_productDetail">
  <section class="blocks_middle_DetailsProductpage default_sc">
    <div class="clear height-45"></div>
    <div class="prelatife container">

      <div class="tops_detail">
        <div class="row">
          <div class="col-md-8 col-sm-8">
            <div class="blc_name_product">
              <span class="category">PRECISE <?php echo $category->description->name ?></span>
              <div class="clear"></div>
              <h5 class="name"><?php echo $data->description->name ?></h5>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="text-right backs_tCategory_links">
              <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$_GET['category'])); ?>" class="btn btn-link"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;BACK TO PRECISE <?php echo $category->description->name ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="middles_detail">
        <div class="row default">
          <div class="col-md-8">
            <div class="picture_big">
              <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(726,507, '/images/product/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive">
            </div>
          </div>

          <div class="col-md-4">
            <div class="descriptions padding-top-40">
              <h3 class="titles_product"><?php echo $data->description->name ?></h3>
              <div class="clear height-20"></div>
              <div class="prices">
                <?php
                $dataHarga = PrdProduct::model()->price(array('harga'=>$data->harga, 'discount'=>$data->harga_retail), $this->setting)
                ?>
                <?php if ($dataHarga['price_coret'] > 0): ?>
                  <span class="through" style="color: red;"><?php echo Cart::money($dataHarga['price_coret']) ?></span>
                  <span><?php echo Cart::money($dataHarga['price']) ?></span>
                <?php else: ?>
                  <span><?php echo Cart::money($dataHarga['price']) ?></span>
                <?php endif ?>

              </div>
              <div class="clear height-10"></div>
              <?php if ($data->onsale == 1): ?>
              <div class="blc_prmSales"><span>SALE</span></div>
              <?php endif ?>
              <div class="clear height-15"></div>
              <p><?php echo nl2br($data->description->subtitle) ?></p>
              <div class="clear"></div>
              <?php if (count($data->alternateImage) > 0): ?>
                
              <div class="picts_other_prdt">
                <b>OTHER IMAGES</b>
                <ul class="list-inline">
                <li><a href="#"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(82,57, '/images/product/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive select-image"  data-big="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(726,507, '/images/product/'.$data->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"></a></li>
                <?php foreach ($data->alternateImage as $key => $value): ?>
                <li><a href="#"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(82,57, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive select-image"  data-big="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(726,507, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"></a></li>
                <?php endforeach ?>
                </ul>
              </div>
              <div class="clear"></div>
              <?php endif ?>
              <div class="box_form_addCart">
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
                <form class="form-inline" action="<?php echo CHtml::normalizeUrl(array('addcart', 'category'=>$_GET['category'])); ?>" method="post">
                  <input type="hidden" id="price-item" value="<?php echo $data->harga ?>">
                  <input type="hidden" name="id" value="<?php echo $data->id ?>">
                  <?php if (count($data->attributes) > 0): ?>
                    
                  <div class="form-group">
                    <label for="exampleInputName2">SIZE</label>
                    <select name="option" id="" class="form-control">
                    <?php foreach ($data->attributes as $key => $value): ?>
                      <option value="<?php echo $value->id_str ?>"><?php echo $value->attribute ?></option>
                    <?php endforeach ?>
                    </select>
                  </div>
                  <?php endif ?>
                  <div class="form-group">
                    <label for="exampleInputEmail2">QTY</label>
                    <input type="number" name="qty" value="1" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-default btns_orangeBlock">ADD TO CART</button>
                </form>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>

      <div class="clear height-50"></div>
      <div class="clear height-20"></div>
    </div>
    <div class="clear"></div>
    <div class="bottoms_block_productDetail back-white">
      <div class="tops back-black">
        <h6>MORE ON <?php echo strtoupper($data->description->name) ?></h6>
        <div class="clear"></div>
      </div>
      <div class="clear height-45"></div>
      
      <div class="prelatife container">
        <div class="blocks_description_bottom-DetailProducts ">
          <?php echo $data->description->desc ?>
          <div class="clear"></div>
        </div>
      </div>

      <div class="clear height-50"></div>
      <div class="clear height-25"></div>
    </div>
    <div class="clear"></div>
  </section>

  <div class="clear"></div>
</div>
<script type="text/javascript">
  $(function(){
      $(document).on('click', '.select-image', function(e){
          $('.select-image').removeClass('active');
          $(this).addClass('active');
          $('.picture_big img').attr('src', $(this).attr('data-big'));
          return false;
       });
    });
</script>
*/ ?>