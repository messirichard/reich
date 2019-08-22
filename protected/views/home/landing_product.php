<?php
  $criteria=new CDbCriteria;
  $criteria->with = array('description', 'category', 'brand');
  $criteria->order = 'date DESC';
  $criteria->addCondition('status = "1"');
  $criteria->addCondition('terlaris = "1"');
  $criteria->addCondition('description.language_id = :language_id');
  $criteria->params[':language_id'] = $this->languageID;
  // $pageSize = 12;
  $criteria->group = 't.id';
  $dataProduct = PrdProduct::model()->findAll($criteria);
?>
<div class="blocks_subpage_banner landing_product mih393">
  <div class="prelatife container">
    <div class="picts_full"><img src="<?php echo $this->assetBaseurl; ?>ill-picts_landingProducts.jpg" alt="" class="img-responsive"></div>
    <div class="clear"></div>
  </div>
</div>

<div class="clear"></div>
<div class="subpage static_about">
  <section class="default_sc back-orange conts_block_about1">
    <div class="prelatife container text-center">
      <div class="insides">
        <p>Ingin mendapatkan Precise shoesmu dengan harga istimewa, gabung bersama instagram @preciseshoes atau selalu pantau halaman promo ini!</p>
        <div class="clear"></div>
      </div>
    </div>
  </section>

  <section class="blocks_middle_Products default_sc">
    <div class="prelatife container">

        <div class="block_product_data_wrap">
          <div class="top text-center">
            <h6>LIHAT PRECISE BLACK COLLECTION</h6>
          </div>
          <div class="clear"></div>
          <div class="blocks_bxFilters_topPage_prd">
              <div class="row default">
                <div class="col-md-5">
                  <h2 class="views_pagn">MENAMPILKAN 16 DARI 72 PRODUK PRECISE</h2>
                </div>
                <div class="col-md-7">
                  <div class="flot_filter_top_productPg">
                    <div class="d-inline block_itm">
                      <form action="#" method="get">
                        <div class="form-group">
                        <label for="">URUTKAN BERDASAR</label>
                        <select name="#" id="" class="form-control">
                          <option value="">Terbaru</option>
                          <option value="">Option 1</option>
                          <option value="">Option 2</option>
                          <option value="">Option 3</option>
                          <option value="">Option 4</option>
                        </select>
                        </div>
                      </form>
                    </div>
                    <div class="d-inline block_itm filter_pagin">
                      HALAMAN&nbsp;&nbsp;&nbsp;&nbsp;   
                      <a href="#">1</a>&nbsp;&nbsp;
                      <a href="#">2</a>&nbsp;&nbsp;
                      <a href="#">3</a>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </div> <div class="clear"></div>
            <div class="clear"></div>
          </div>
          <div class="clear height-10"></div>

          <div id="owl-demo" class="lists_product_data row">
            <?php for ($i=1; $i < 9; $i++) { ?>
            <?php foreach ($dataProduct as $key => $value): ?>
            <div class="col-md-3 col-sm-6">
              <div class="items">
                <div class="picture prelatife">
                  <?php if ($key == 0): ?>
                  <div class="boxs_inf_head_n1"></div>
                  <?php endif ?>
                  <?php /*<a href="<?php //echo CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)); ?>#">*/ ?>
                  <?php // echo Yii::app()->baseUrl.ImageHelper::thumb(321,321, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>
                  <a href="<?php echo CHtml::normalizeUrl(array('/home/products')); ?>">
                  <?php if ($key == 0): ?>
                  <img src="<?php echo $this->assetBaseurl ?>ex_pict-prd-1.jpg" class="img-responsive" alt="">
                  <?php else: ?>
                  <img src="<?php echo $this->assetBaseurl ?>ex_pict-prd-2.jpg" class="img-responsive" alt="">
                  <?php endif ?>
                  </a>
                  <!-- </a> -->
                </div>
                <div class="info description">
                  <span class="names">DERON BLUE ORANGE</span>
                  <div class="clear"></div>
                  <span class="category">Precise Men</span>
                  <div class="clear"></div>
                  <span class="price">RP 559,000,-</span>
                </div>
              </div>
            </div>
            <?php endforeach; } ?>
          </div>
          <div class="clear height-15"></div>
            <div class="blocks_bxFilters_topPage_prd">
              <div class="row default">
                <div class="col-md-5">
                  <h2 class="views_pagn">MENAMPILKAN 16 DARI 72 PRODUK PRECISE</h2>
                </div>
                <div class="col-md-7">
                  <div class="flot_filter_top_productPg">
                    <div class="d-inline block_itm">
                      <form action="#" method="get">
                        <div class="form-group">
                        <label for="">URUTKAN BERDASAR</label>
                        <select name="#" id="" class="form-control">
                          <option value="">Terbaru</option>
                          <option value="">Option 1</option>
                          <option value="">Option 2</option>
                          <option value="">Option 3</option>
                          <option value="">Option 4</option>
                        </select>
                        </div>
                      </form>
                    </div>
                    <div class="d-inline block_itm filter_pagin">
                      HALAMAN&nbsp;&nbsp;&nbsp;&nbsp;   
                      <a href="#">1</a>&nbsp;&nbsp;
                      <a href="#">2</a>&nbsp;&nbsp;
                      <a href="#">3</a>
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
