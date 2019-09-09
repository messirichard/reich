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
    1 => [
        'title' => 'ITEM CODE',
        'isi' => 'HW0021',
    ],
    [
        'title' => 'SIZE',
        'isi' => '36 x 34.5 x 46 cm',
    ],
    [
        'title' => 'MATERIAL',
        'isi' => 'Plastic PP',
    ],
    [
        'title' => 'DESCRIPTION',
        'isi' => 'Keranjang anyam besar plastik Lucky Star diproduksi dengan
        menggunakan material plastik dan teknologi produksi yang terbaik. Seluruh permukaan produk Lucky Star Plastic akan memiliki fitur plastik yang mulus, bersih, kuat dan nyaman dipegang serta mudah dibersihkan. Dengan desain yang atraktif dan warna yang menarik, produk ini akan cocok dalam segala situasi di rumah anda.',
    ]
];
?>

<section class="breadcrumb-det">
    <div class="prelative container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Our Product Collections</a></li>
                <li class="breadcrumb-item"><a href="#">Digital Door Locks</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reich EZ008 Digital Door Lock & Handle With Keypad</li>
            </ol>
            <div class="back">
                <a href="#">
                <p>Kembali</p>
                </a>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-30">
                <div class="image"><img class="w-100" src="<?php echo $this->assetBaseurl; ?>productdetails.jpg" alt=""></div>
            </div>
            <div class="col-md-30">
                <div class="title">
                    <p>Reich EZ008 Digital Door Lock & Handle With Keypad</p>
                </div>
                <div class="hr-garis"></div>
                <?php foreach($mod_prodisi as $key => $value): ?>
                <div class="row no-gutters">
                    <div class="col-md-17">
                        <div class="prodtit">
                            <p><?php echo $value['title'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-43">
                        <div class="prodisi">
                            <p><?php echo $value['isi'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>


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


<section class="category-sec-2">
	<div class="prelative container">
		<div class="row">
			<?php foreach($category as $key => $value): ?>
			<div class="col-md-15">
				<div class="box-content">
					<div class="image">
						<img class="img img-fluid w-100" src="<?php echo $this->assetBaseurl; ?><?php echo $value['gambar'] ?>" alt="">
					</div>
					<div class="title">
						<p><?php echo $value['judul']?></p>
					</div>
					<div class="subtitle">
						<a href="#"><p>View More</p></a>
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