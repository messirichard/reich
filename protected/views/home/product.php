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

<?php
$mod_kategori = [
    1 => [
        'judul' => 'Handles & Knobs',
    ],
    [
        'judul' => 'Digital Door Locks',
    ],
    [
        'judul' => 'Aluminium Related Solutions',
    ],
    [
        'judul' => 'Wood Related Solutions',
    ],
    [
        'judul' => 'Glass Related Solutions',
    ],
    [
        'judul' => 'Slim Drawer Solution',
    ],
    [
        'judul' => 'Locks & Accessories',
    ],
    [
        'judul' => 'Bathroom Accessories',
    ]
];
?>

<div class="kategori-produk">
    <div class="prelative container">
        <ul>
            <?php foreach ($mod_kategori as $key => $value): ?>
                <li><a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>"><?php echo $value['judul'] ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<section class="breadcrumb-det">
    <div class="prelative container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Houseware Collection</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Keranjang Anyam Besar</a></li>
            </ol>
            <div class="back">
                <!-- <a href="#"><p>Kembali</p></a> -->
            </div>
        </nav>
	  </div>
</section>

<section class="product-sec-2">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-30">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?>home1.jpg" alt="">
                            <p>Aluminium related solution</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-30">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?>home2.jpg" alt="">
                            <p>Digital door locks</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-20">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?>home3.jpg" alt="">
                            <p>Slim drawer solution</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-20">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?>home4.jpg" alt="">
                            <p>Glass related solution</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-20">
                <div class="box-content">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>">
                        <div class="image">
                            <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?>home5.jpg" alt="">
                            <p>Wood related solution</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-20">
              <div class="box-content">
              <a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>">
                    <div class="image">
                    <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?>product1.jpg" alt="">
                    <p>Handles & Knobs</p>
                    </div>
                </a>
              </div>
            </div>
            <div class="col-md-20">
              <div class="box-content">
              <a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>">
                    <div class="image">
                    <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?>product2.jpg" alt="">
                    <p>Locks & accessories</p>
                    </div>
                </a>
              </div>
            </div>
            <div class="col-md-20">
              <div class="box-content">
              <a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>">
                    <div class="image">
                    <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?>product3.jpg" alt="">
                    <p>Bathroom Accessories</p>
                    </div>
                </a>
              </div>
            </div>
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
