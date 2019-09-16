<section class="product-sec-1">
	<div class="prelative container">
		<div class="row">
			<div class="col-md-60">
				<div class="box-content">
					<div class="title">
						<h3>Our Product Collections</h3>
						<div class="line-category"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="kategori-produk">
    <div class="prelative container">
        <ul>
            <?php foreach ($categorys as $key => $value): ?>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $value->id)); ?>"><?php echo $value->description->name ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<section class="breadcrumb-det">
    <div class="prelative container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Houseware Collection</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page"><a href="#">Keranjang Anyam Besar</a></li> -->
            </ol>
            <div class="back">
                <!-- <a href="#"><p>Kembali</p></a> -->
            </div>
        </nav>
	  </div>
</section>
<?php 
$tops_data = array_slice($categorys, 0, 2);
$bottoms_data = array_slice($categorys, 2, 20);
?>
<section class="product-sec-2">
    <div class="prelative container">
        <div class="row">
            <?php foreach ($tops_data as $key => $value): ?>
            <div class="col-md-30">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $value->id)); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/category/'. $value->image ?>" alt="">
                            <p><?php echo $value->description->name ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach ?>

            <?php foreach ($bottoms_data as $key => $value): ?>
            <div class="col-md-20">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/product/index', 'category'=> $value->id)); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo Yii::app()->baseUrl.'/images/category/'. $value->image ?>" alt="">
                            <p><?php echo $value->description->name ?></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach ?>

        </div>
    </div>
</section>

<section class="product-sec-3">
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
