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

<section class="breadcrumb-det">
    <div class="prelative container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Houseware Collection</a></li>
				<li class="breadcrumb-item"><a href="#">Houseware Collection</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keranjang Anyam Besar</li>
            </ol>
            <div class="back">
                <a href="#">
                <p>Kembali</p>
                </a>
            </div>
        </nav>
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
        'gambar' => 'category2.jpg',
		'judul' => 'Reich EZ002 Digital Door Lock',
    ],
    [
        'gambar' => 'category1.jpg',
		'judul' => 'Reich EZ008 Digital Door Lock &
		Handle With Keypad',
    ],
    [
        'gambar' => 'category2.jpg',
		'judul' => 'Reich EZ002 Digital Door Lock',
    ],
    [
        'gambar' => 'category1.jpg',
		'judul' => 'Reich EZ008 Digital Door Lock &
		Handle With Keypad',
    ],
    [
        'gambar' => 'category2.jpg',
		'judul' => 'Reich EZ002 Digital Door Lock',
    ],
    [
        'gambar' => 'category1.jpg',
		'judul' => 'Reich EZ008 Digital Door Lock &
		Handle With Keypad',
    ],
    [
        'gambar' => 'category2.jpg',
		'judul' => 'Reich EZ002 Digital Door Lock',
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