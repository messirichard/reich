<?php
$mod_kategori = [
    1 => [
        'gambar' => 'furniture.jpg',
        'judul' => 'Furniture',
    ],
    [
        'gambar' => 'houseware.jpg',
        'judul' => 'Houseware',
    ],
    [
        'gambar' => 'tableware.jpg',
        'judul' => 'Tableware',
    ],
    [
        'gambar' => 'container.jpg',
        'judul' => 'Container',
    ]
];
?>



<section class="home-sec-1">
	<div class="prelative container">
		<div class="row">
			<div class="title-top">
				<p>Kategori Favorit Produk Plastik Lucky Star</p>
			</div>
		</div>
		<div class="row">
			<?php foreach($mod_kategori as $key => $value): ?>
				<div class="col-md-15">
					<div class="image"><img class="w-100" src="<?php echo $this->assetBaseurl; ?><?php echo $value['gambar'] ?>" alt=""></div>
					<div class="title">
						<p><?php echo $value['judul'] ?></p>
					</div>
					<div class="lihat_kat">
						<a href="#">lihat kategori</a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>

<?php
$mod_fav = [
    1 => [
        'gambar' => 'favorite1.jpg',
        'judul' => 'Baki Anyam Besar',
    ],
    [
        'gambar' => 'favorite2.jpg',
        'judul' => 'Baki Anyam Kecil',
    ],
    [
        'gambar' => 'favorite3.jpg',
        'judul' => 'Keranjang Anyam Bundar',
    ],
    [
        'gambar' => 'favorite4.jpg',
        'judul' => 'Keranjang Anyam Besar',
    ],
    [
        'gambar' => 'favorite5.jpg',
        'judul' => 'Pel pelan plastik',
    ],
    [
        'gambar' => 'favorite6.jpg',
        'judul' => 'Pemeras Jeruk',
    ],
    [
        'gambar' => 'favorite7.jpg',
        'judul' => 'Baki Anyam Besar',
    ],
    [
        'gambar' => 'favorite8.jpg',
        'judul' => 'Baki Anyam Kecil',
    ],
    [
        'gambar' => 'favorite9.jpg',
        'judul' => 'Keranjang Anyam Bundar',
    ],
    [
        'gambar' => 'favorite10.jpg',
        'judul' => 'Keranjang Anyam Besar',
    ],
    [
        'gambar' => 'favorite11.jpg',
        'judul' => 'Pel pelan plastik',
    ],
    [
        'gambar' => 'favorite12.jpg',
        'judul' => 'Pemeras Jeruk',
    ],
    [
        'gambar' => 'favorite13.jpg',
        'judul' => 'Baki Anyam Besar',
    ],
    [
        'gambar' => 'favorite14.jpg',
        'judul' => 'Baki Anyam Kecil',
    ],
    [
        'gambar' => 'favorite15.jpg',
        'judul' => 'Keranjang Anyam Bundar',
    ],
    [
        'gambar' => 'favorite16.jpg',
        'judul' => 'Keranjang Anyam Besar',
    ],
    [
        'gambar' => 'favorite17.jpg',
        'judul' => 'Pel pelan plastik',
    ],
    [
        'gambar' => 'favorite18.jpg',
        'judul' => 'Pemeras Jeruk',
    ]
];
?>

<section class="home-sec-2">
	<div class="prelative container">
		<div class="row">
			<div class="col-md-60">
				<div class="title">
					<p>Produk Plastik Favorit Lucky Star</p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach($mod_fav as $key => $value): ?>
				<div class="col-md-10">
					<div class="box-content">
						<div class="image"><img class="w-100" src="<?php echo $this->assetBaseurl; ?><?php echo $value['gambar'] ?>" alt=""></div>
						<div class="judul">
							<p><?php echo $value['judul'] ?></p>
						</div>
						<div class="lihat"><a href="#">lihat produk</a></div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="lihat-semua">
			<a href="#">lihat semua produk</a>
		</div>
	</div>
</section>

<section class="home-sec-3">
	<div class="prelative container">
		<div class="row">
			<div class="col-md-60">
				<div class="title">
					<p>Dapatkan Koleksi Lengkap Produk Plastik Lucky Star</p>
				</div>
				<div class="download">
					<a href="#"><i></i>Download Katalog</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$mod_blog = [
    1 => [
        'gambar' => 'furniture.jpg',
        'judul' => 'Cara mengurangi limbah plastik adalah dengan tidak membuangnya',
        'kat' => 'artikel'
    ],
    [
        'gambar' => 'houseware.jpg',
        'judul' => 'Lucky Star berpartisi meramaikan Java Big Bang 2019',
        'kat' => 'berita'
    ],
    [
        'gambar' => 'tableware.jpg',
        'judul' => 'Sale & Pameran Plastic Lucky Star di PRJ Expo Jakarta 2019',
        'kat' => 'berita'
    ],
    [
        'gambar' => 'container.jpg',
        'judul' => 'Apa saja istilah di dunia plastik, dan mengapa penting mengetahuinya?',
        'kat' => 'artikel'
    ]
];
?>

<section class="home-sec-4">
	<div class="prelative container">
		<div class="row">
			<div class="col-md-60">
				<div class="title">
					<p>Blog Terbaru</p>
				</div>
			</div>
			<?php foreach($mod_blog as $key => $value): ?>
			<div class="col-md-15">
				<div class="box-content">
					<div class="image"><img src="<?php echo $this->assetBaseurl; ?><?php echo $value['gambar'] ?>" alt=""></div>
					<div class="kategori">
						<p><?php echo $value['kat'] ?></p>
					</div>
					<div class="judul">
						<p><?php echo $value['judul'] ?></p>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</section>

<section class="home-sec-5">
	<div class="prelative container">
		<div class="row">
			<div class="col-md-60">
				<div class="title">
					<p>mari berbicara dengan kami</p>
				</div>
			</div>
		</div>
		<form action=""></form>
	</div>
</section>