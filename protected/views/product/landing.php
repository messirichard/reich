<div class="clear"></div>
<div class="subpage defaults_static">
  <div class="top_title_page margin-bottom-40">
    <div class="prelatife container">
      <h2 class="title_pg">Lihat Kategori Produk Aldo Tools & Hardware</h2>
    </div>
  </div>

  <div class="middle inside_content">
    <div class="prelatife container">

    	<div class="lists_subCategory_dataLanding">
    		<div class="row">
    			<?php foreach ($subCategory as $key => $value): ?>
    			<div class="col-lg-3 col-md-4 col-sm-6">
    				<div class="items text-center">
    					<div class="pict"><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(319,365, '/images/category/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a></div>
    					<div class="titles">
    						<a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=>$value->id)); ?>"><?php echo $value->description->name ?></a>
    					</div>
    					<div class="clear"></div>
    				</div>
    			</div>
    			<?php endforeach ?>
    		</div>
    	</div>
    	<div class="clear height-20"></div>

    	<div class="lists_banner_home_dt new_picture">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="items prelatife">
						<div class="pict">
							<img src="<?php echo $this->assetBaseurl ?>banner_atHome_1.jpg" alt="" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="items prelatife">
						<div class="pict">
							<img src="<?php echo $this->assetBaseurl ?>banner_atHome_2.jpg" alt="" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="items prelatife">
						<div class="pict">
							<img src="<?php echo $this->assetBaseurl ?>banner_atHome_3.jpg" alt="" class="img-responsive">
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="items prelatife">
						<div class="pict">
							<img src="<?php echo $this->assetBaseurl ?>banner_atHome_4.jpg" alt="" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		</div>

    	<!-- End landing product -->
    	<div class="clear"></div>
    </div>

    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>


