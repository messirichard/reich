<section class="category-sec-1">
	<div class="prelative container">
		<div class="row">
			<div class="col-md-60">
				<div class="box-content">
					<div class="title">
						<h6>Our Product Collections</h6>
						<div class="line-category"></div>
						<h2>Digital Door Locks</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row"></div>
	</div>
</section>

<?php
$mod_prodisi = [
    1 => 
    [
        'title' => 'MATERIAL',
        'isi' => 'Aluminium and acrylic',
    ],
    [
        'title' => 'FINISH',
        'isi' => 'Matt varnish, hairline',
    ],
    [
        'title' => 'DOWNLOAD',
        'isi' => 'Material Data Sheet & Technical Measurement (Click to download)',
    ]
];
?>


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
                <li><a href="<?php echo CHtml::normalizeUrl(array('/home/category')); ?>"><?php echo $value['judul'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>


<section class="breadcrumb-det">
    <div class="prelative container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Our Product Collections</a></li>
                <li class="breadcrumb-item"><a href="#">Digital Door Locks</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Reich EZ008 Digital Door Lock & Handle With Keypad</a></li>
            </ol>
            <div class="back">
                <a href="#">
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
                <div class="image box-image"><img class="w-100" src="<?php echo $this->assetBaseurl; ?>Layer-36.jpg" alt=""></div>
            </div>
            <div class="col-md-30">
                <div class="descriptions">
                    <div class="title">
                        <p>Reich EZ008 Digital Door Lock & Handle With Keypad</p>
                    </div>
                    <div class="item-code">
                        <p>ITEM CODE: EZ008-DAT-DL</p>
                    </div>
                    <div class="hr-garis-prod"></div>
                    <div class="product-detailsss">
                        <div class="title">
                            <p>PRODUCT DETAILS</p>
                        </div>
                        <div class="isi">
                            <p>Digital door lock with keypad - non RF ID. External module with lever handle pointing to the right.</p>
                        </div>
                    </div>
                    <div class="hr-garis-prod"></div>
                    <?php foreach($mod_prodisi as $key => $value): ?>
                    <div class="row no-gutters">
                        <div class="col-md-10">
                            <div class="prodtit">
                                <p><?php echo $value['title'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-50">
                            <div class="prodisi">
                                <p><?php echo $value['isi'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="hr-garis-prod"></div>
                    <?php endforeach ?>
                    <div class="row no-gutters">
                        <div class="col-md-10">
                            <div class="prodtit">
                                <p>more images</p>
                            </div>
                        </div>
                        <div class="col-md-50">
                            <div class="prodgambar">
                                <div class="row">
                                    <?php for ($i=0;$i<5;$i++){?>
                                        <div class="col-md-10">
                                            <div class="image">
                                                <img class="w-100" src="<?php echo $this->assetBaseurl; ?>products-detail_07.jpg" alt="">
                                            </div>
                                        </div>
                                    <?php } ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-garis-prod"></div>
                    <button class="btn btn-info">Inquire This Product</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$category = [
    1 => [
        'gambar' => 'category1.jpg',
		'judul' => 'Reich EZ008 Digital Door Lock &
		Handle With Keypad',
    ],
    [
        'gambar' => 'details1.jpg',
		'judul' => 'Handle, Aluminium - RC0254',
    ],
    [
        'gambar' => 'details2.jpg',
		'judul' => 'Lever Handle, with Half Spindle
        on the Square',
    ],
    [
        'gambar' => 'details3.jpg',
		'judul' => 'Cylindrical Grade 2 Lever',
    ]
];
?>

<div class="prod-yanglain">
    <div class="prelative container">
        <div class="row no-gutters py-5">
            <div class="col-md-30">
                <div class="isi">
                    <p>You might consider looking at these products</p>
                </div>
            </div>
            <div class="col-md-30">
                <div class="back">
                    <a href="#">
                        <p>Back to Product Collections Category</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="category-sec-2">
	<div class="prelative container">
		<div class="row">
			<?php foreach($category as $key => $value): ?>
			<div class="col-md-15">
				<div class="box-content">
					<div class="image">
                        <a href="<?php echo CHtml::normalizeUrl(array('/home/productdet')); ?>">
                        <img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?><?php echo $value['gambar'] ?>" alt="">
                        </a>
					</div>
					<div class="title">
                        <a href="<?php echo CHtml::normalizeUrl(array('/home/productdet')); ?>">
                            <p><?php echo $value['judul']?></p>
                        </a>
					</div>
					<div class="subtitle">
						<a href="<?php echo CHtml::normalizeUrl(array('/home/productdet')); ?>"><p>View Product</p></a>
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