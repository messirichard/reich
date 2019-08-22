<?php
  $session=new CHttpSession;
  $session->open();
  $login_member = $session['login_member'];
  
  $sn_name = ($strParentCategory != null) ? $strParentCategory : $strCategory;

  $cor_criteria = new CDbCriteria;
  $cor_criteria->with = array('description');
  $cor_criteria->addCondition('t.id = :c_par');
  $cor_criteria->params[':c_par'] = $strParentCategory->parent_id;
  $cor_criteria->addCondition('t.type = :type');
  $cor_criteria->params[':type'] = 'category';
  $cor_criteria->order = 'sort ASC';
  $CorCategorySubm = PrdCategory::model()->find($cor_criteria);
?>
<section class="default-sc inside-page product-details"> 
    <section class="top-product-detail">
        <div class="container defaults">
            <div class="tops">
                <div class="row">
                    <div class="col-md-40">
                        <div class="shn-back-products">
                            <a href="javascript: window.history.back();"><i class="fa fa-long-arrow-left"></i> &nbsp;BACK</a> 
                            <span class="new-back-product"><div class="separators_linetop"></div> <span class="new-back-product">
                              <nav aria-label="breadcrumb" class="breadcrumbs">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">HOME</a></li>
                                  <?php if ($CorCategorySubm != null): ?>
                                  <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $CorCategorySubm->id)); ?>"><?php echo $CorCategorySubm->description->name ?></a></li>
                                  <?php endif ?>

                                  <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $sn_name->id)); ?>"><?php echo $sn_name->description->name ?></a></li>

                                  <?php if (count($CategorySubm) > 0): ?>
                                  <li class="breadcrumb-item active" aria-current="page"><?php echo ($strCategory != null)? $strCategory->description->name :'ALL' ?></li>
                                  <?php endif ?>
                                </ol>
                              </nav>
                            </span>
                            </span>
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
            <div class="clear height-50"></div>
            <div class="clear height-20"></div>
            <div class="seen-header-top">
                <?php echo ($sn_name->description->name != null)? ucwords(strtolower($sn_name->description->name)) : 'Products'; ?>
            </div>
            <div class="clear height-30"></div>
            <div class="sticky-top blocks-topm-filters">
              <div class="container defaults">
                <div class="row">
                    <div class="col-md-20">
                        <div class="textaboveheader-landing">
                            Sortby
                            <span class="last">
                                Latest
                            </span>
                            <span class="last">
                                $-$$$
                            </span>
                            <span class="last">
                                $-$$$ 
                            </span>
                        </div>
                    </div>
                    <?php 
                    $strsn_parent_all = ($strParentCategory != null)? $strParentCategory->id: $strCategory->id;
                    ?>
                    <div class="col-md-20 col-centered">
                        <div class="textaboveheader-landing">
                            <ul class="list-inline categoryfiter-menu">
                              <li class="list-inline-item menu-mid <?php if ($strsn_parent_all == $_GET['category']): ?>active<?php endif ?>"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$strsn_parent_all)); ?>">All</a></li>

                              <?php if ($CategorySubm): ?>
                                <?php foreach ($CategorySubm as $key => $val_cats): ?>
                                <?php 
                                // Check sub category 3
                                $criteria3 = new CDbCriteria;
                                $criteria3->with = array('description');
                                $criteria3->addCondition('t.parent_id = :parents_id');
                                $criteria3->params[':parents_id'] = $val_cats->id;
                                $criteria3->addCondition('t.type = :type');
                                $criteria3->params[':type'] = 'category';
                                $criteria3->order = 'sort ASC';
                                $CategorySub2 = PrdCategory::model()->findAll($criteria3);
                                ?>
                                <li class="<?php if (count($CategorySub2) > 0): ?>dropdown-toggle<?php endif ?> list-inline-item menu-mid <?php if ($_GET['category'] == $val_cats->id): ?>active<?php endif ?>"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$val_cats->id)); ?>"><?php echo $val_cats->description->name ?></a>
                                  <?php 
                                  if (count($CategorySub2) > 0) {
                                    $strpr2 = '';
                                    $strpr2 .="<ul class='dropdown-menu'>";
                                    foreach ($CategorySub2 as $kes_3 => $vle3) {
                                      $strpr2 .= '<li class="list-item"><a href="'.CHtml::normalizeUrl(array('/product/index', 'category'=>$vle3->id)).'">'.$vle3->description->name.'</a></li>';
                                    }
                                    $strpr2 .= "</ul>";
                                    echo $strpr2;
                                  }
                                  ?>
                                </li>
                                <?php endforeach ?>
                              <?php endif ?>

                              <?php if ($strChildCategory): ?>
                                <?php foreach ($strChildCategory as $key => $val_cats): ?>
                                <li class="dropdown list-inline-item menu-mid <?php if ($_GET['category'] == $val_cats->id): ?>active<?php endif ?>"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$val_cats->id)); ?>"><?php echo $val_cats->description->name ?></a>
                                </li>
                                <?php endforeach ?>
                              <?php endif ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-20">
                        <div class="textaboveheader-landing page">
                            <span class="d-none d-sm-block">Page &nbsp;&nbsp;</span>
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
                                'htmlOptions'=>array('class'=>'pagination'),
                                'selectedPageCssClass'=>'active',
                            ));
                         ?>
                        </div>
                    </div>
                </div>
              </div>
              <div class="clear clearfix"></div>
            </div>
            <hr class="mt-0">
            <div class="clear clearfix"></div>
            <div class="my-5"></div>

            <div class="listproducts-default">
            <?php if ($product->totalItemCount == 0): ?>
              <h4 class="d-flex justify-content-center py-5">Sorry, Product is empty!.</h4>
            <?php else: ?>
            <div class="row">
              <?php foreach ($product->getData() as $key => $value): ?>
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
            <?php endif ?>

            </div>
            <div class="clear height-50"></div>
            <div class="clear height-10"></div>
            <?php echo $this->renderPartial('//layouts/_tops_footer_partner', array()); ?>

    </section>
</section>


<script>
  var sourceSwap = function () {
    var $this = $(this);
    var newSource = $this.data('alt-src');
    $this.data('alt-src', $this.attr('src'));
    $this.attr('src', newSource);
  }
  if ($(window).width() > 980) {

    $(function () {
        $('img.xyz').hover(sourceSwap, sourceSwap);
    });

    $(".listproducts-default .item").mouseover(function(){
        $(this).addClass('actived');

    });
    $(".listproducts-default .item").mouseleave(function(){
      if ($(this).hasClass('actived'))
      {
          $(this).removeClass('actived');
      }
    });
  }else{
    $(".listproducts-default .item").addClass('actived');
  }

  // blocks-topm-filters
  var sn_width = $(window).width();
  if (sn_width > 1200) {
    $(window).scroll(function(){
      var sntop2 = $(window).scrollTop();
      if(sntop2 > 350){
        console.log(sntop2);
        $('.blocks-topm-filters').removeClass('affix-top');
        $('.blocks-topm-filters').addClass('affix');
      }else{
        $('.blocks-topm-filters.affix').removeClass('affix').addClass('affix-top');
      }
    });
  }else{
     $(window).scroll(function(){
        var sntop2 = $(window).scrollTop();
        if(sntop2 > 350){
          $('.blocks-topm-filters').removeClass('sticky-top');
        }
      });
  }

  //  $(".img-fluid").mouseleave(function(){
  //    $(".judulproduk").css("color","white");
  //    $(".hargaproduk").css("color","white");
  //  });
  //  $( ".img-fluid" ).click(function(){
 //        $(this).toggleClass('active');
  // });
</script>

<?php 
/*
------------------------------------------------------
<?php if ($strCategory != null): ?>
<div class="blocks_subpage_banner landing_product mih393">
  <div class="prelatife container">
    <div class="picts_full"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1264,668, '/images/category/'.$strCategory->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></div>
    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<?php endif ?>
<div class="subpage static_about">
<?php if ($strCategory != null): ?>
  <section class="default_sc back-orange conts_block_about1">
    <div class="prelatife container text-center">
      <div class="insides">
        <p>Ingin mendapatkan Precise shoesmu dengan harga istimewa, gabung bersama instagram @preciseshoes atau selalu pantau halaman promo ini!</p>
        <div class="clear"></div>
      </div>
    </div>
  </section>
<?php endif ?>

  <section class="blocks_middle_Products default_sc">
    <div class="prelatife container">

        <div class="block_product_data_wrap">
          <div class="top text-center">
              <?php if ($strCategory != null): ?>

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

                <?php if ($_GET['q'] != ''): ?>
                <h6>CARI "<?php echo $_GET['q'] ?>" di kategori <?php echo implode(' -> ', $dataCategory) ?></h6>
                <?php else: ?>
                <h6>LIHAT PRECISE <?php echo implode(' -> ', $dataCategory) ?></h6>
                <?php endif ?>
              <?php elseif($_GET['q'] != ''): ?>
              <h6>CARI "<?php echo $_GET['q'] ?>" DI SEMUA KATEGORI</h6>
              <?php else: ?>
              <h6>CARI SEMUA PRODUK</h6>
              <?php endif ?>

          </div>
          <div class="clear"></div>
          <div class="blocks_bxFilters_topPage_prd">
              <div class="row default">
                <div class="col-md-5">
                  <h2 class="views_pagn">MENAMPILKAN <?php echo $product->getItemCount() ?> DARI <?php echo $product->getTotalItemCount() ?> PRODUK PRECISE</h2>
                </div>
                <div class="col-md-7">
                  <div class="flot_filter_top_productPg">
                    <div class="d-inline block_itm">
<?php
$data = $product->getData();
?>
<?php
$get = $_GET;
unset($get['order']);
?>
                      <form action="<?php echo $this->createUrl('/product/index', $get) ?>" method="get" id="form-filter">
                        <div class="form-group">
                        <label for="">URUTKAN BERDASAR</label>
                        <select name="order" id="select-order" class="form-control select-filter">
                          <option value="new">Terbaru</option>
                          <option value="low-price">Harga Terendah</option>
                          <option value="hight-price">Harga Tetinggi</option>
                        </select>
                        </div>
                      </form>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div> <div class="clear"></div>
            <div class="clear"></div>
          </div>
<script type="text/javascript">
$('.select-filter').on('change', function() {
  $('#form-filter').submit();
})
<?php if ($_GET['order'] != ''): ?>
$('#select-order').val('<?php echo $_GET['order'] ?>');
  
<?php endif ?>
</script>
          <div class="clear height-10"></div>
          <?php if ($product->getItemCount() > 0): ?>
            
          <div id="owl-demo" class="lists_product_data row">
            <?php foreach ($data as $key => $value): ?>
              
            <div class="col-md-3 col-sm-6">
              <div class="items">
                <div class="picture prelatife">
                  <?php if ($value->onsale == 1): ?>
                  <div class="boxs_inf_head_n1"></div>
                  <?php endif ?>
                  <?php // echo Yii::app()->baseUrl.ImageHelper::thumb(321,321, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>
                  <?php if ($_GET['category'] != ''): ?>
                  <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id, 'category'=>$_GET['category'])); ?>">
                  <?php else: ?>
                  <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>">
                  <?php endif ?>
                  <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(273,191, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" class="img-responsive" alt="">
                  </a>
                  <!-- </a> -->
                </div>
                <div class="info description">
                  <?php if ($_GET['category'] != ''): ?>
                  <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id, 'category'=>$_GET['category'])); ?>">
                  <?php else: ?>
                  <a href="<?php echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>">
                  <?php endif ?>
                  <span class="names"><?php echo $value->description->name ?></span>
                  </a>
                  <div class="clear"></div>
                  <span class="category"><?php echo $strCategory->description->name ?></span>
                  <div class="clear"></div>
                    <?php
                    $dataHarga = PrdProduct::model()->price(array('harga'=>$value->harga, 'discount'=>$value->harga_retail), $this->setting)
                    ?>
                    <?php if ($dataHarga['price_coret'] > 0): ?>
                      <span style="text-decoration: line-through; color: red;"><?php echo Cart::money($dataHarga['price_coret']) ?></span> <span class="price"><?php echo Cart::money($dataHarga['price']) ?></span>
                    <?php else: ?>
                      <span class="price"><?php echo Cart::money($dataHarga['price']) ?></span>
                    <?php endif ?>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>
          <?php else: ?>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h3>No Data</h3>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          <?php endif ?>
          <div class="clear height-15"></div>
            <div class="blocks_bxFilters_topPage_prd">
              <div class="row default">
                <div class="col-md-5">
                  <h2 class="views_pagn">MENAMPILKAN <?php echo $product->getItemCount() ?> DARI <?php echo $product->getTotalItemCount() ?> PRODUK PRECISE</h2>
                </div>
                <div class="col-md-7">
                  <div class="flot_filter_top_productPg">
                    <div class="d-inline block_itm filter_pagin">
                      <?php $this->widget('CLinkPager', array(
                        'pages' => $product->getPagination(),
                        'header' => 'HALAMAN',
                        'htmlOptions' => array('class' => 'pagination'),
                        'lastPageCssClass'=>'hide',
                        'firstPageCssClass'=>'hide',
                        'nextPageCssClass'=>'hide',
                        'previousPageCssClass'=>'hide',
                      )) ?>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div> <div class="clear"></div>
            <div class="clear"></div>
          </div>
          

          <div class="clear"></div>
        </div>

        <div class="clear"></div>
      </div>

      <div class="clear"></div>
    </div>

  </section>

  <div class="clear"></div>
</div>

*/ ?>
