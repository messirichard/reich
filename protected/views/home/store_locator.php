<?php
$store_showroom = [
	1 => [
        'kota' => '',
		'name_store' => '',
		'alamat' => '',
        'phone' => '',
        'email' => ''
	],
	[
		'kota' => 'Jakarta',
		'name_store' => 'REICH Hardware',
		'alamat' => 'Jl. Haji Nawi 126, Jakarta Selatan',
        'phone' => 'Tel. 021 22658585',
        'email' => 'Email. jakarta@the-reich.com'
	],
	[
		'kota' => 'Surabaya',
		'name_store' => 'Makmur Abadi Hardware Store',
		'alamat' => 'Jl. Baliwerti 74, Alun alun contong',
        'phone' => 'Tel. 031 5348088',
        'email' => 'Email. surabaya@the-reich.com'
	],
	[
		'kota' => '',
		'name_store' => '',
		'alamat' => '',
        'phone' => '',
        'email' => ''
	]
];

$stores_shoroom = Address::model()->findAll('type = :types', array(':types'=>'store-showroom'));
?>

<section class="store-sec-1">
    <div class="py-4 my-3"></div>
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content-atas">
                    <div class="title">
                        <h3>Store & Showroom</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach($stores_shoroom as $key => $value): ?>
            <div class="col-md-15">
                <div class="box-content-bawah">
                    <div class="kota">
                        <p><?php echo $value->kota ?></p>
                    </div>
                    <div class="name_store">
                        <p><?php echo $value->nama ?></p>
                    </div>
                    <div class="alamat">
                        <p><?php echo $value->address_1 ?></p>
                    </div>
                    <div class="phone">
                        <p><?php echo $value->telp ?></p>
                    </div>
                    <div class="email">
                        <p><a href="mailto:<?php echo $value->email ?>"><?php echo $value->email ?></a></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<?php
$product_display = [
	1 => [
        'kota' => 'Surabaya',
		'name_store' => 'Mitra 10',
		'alamat' => 'Jl. Kedungdoro 121',
        'phone' => 'Tel. 031 22658585',
        'email' => 'Email. surabaya@the-reich.com'
	],
	[
		'kota' => 'Bali',
		'name_store' => 'Depo Bangunan',
		'alamat' => 'Jl. Imam Bonjol 124, Denpasar',
        'phone' => 'Tel. 0341 885545',
        'email' => 'Email. bali@the-reich.com'
	],
	[
		'kota' => 'Jakarta',
		'name_store' => 'Mitra 10',
		'alamat' => 'Jl. TB Simatupang 12, Jakarta Selatan',
        'phone' => 'Tel. 021 52677555',
        'email' => 'Email. jakarta@the-reich.com'
	],
	[
		'kota' => 'Bandung',
		'name_store' => 'Mitra 10',
		'alamat' => 'Jl. IR Juanda 2, Bandung',
        'phone' => 'Tel. 0221 6848088',
        'email' => 'Email. bandung@the-reich.com'
	]
];

$products_display = Address::model()->findAll('type = :types', array(':types'=>'product-display'));
?>

<section class="store-sec-2">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content-atas">
                    <div class="title">
                        <h3>Product Display</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($products_display as $key => $value): ?>
            <div class="col-md-15">
                <div class="box-content-bawah">
                    <div class="kota">
                        <p><?php echo $value->kota ?></p>
                    </div>
                    <div class="name_store">
                        <p><?php echo $value->nama ?></p>
                    </div>
                    <div class="alamat">
                        <p><?php echo $value->address_1 ?></p>
                    </div>
                    <div class="phone">
                        <p><?php echo $value->telp ?></p>
                    </div>
                    <div class="email">
                        <p><a href="mailto:<?php echo $value->email ?>"><?php echo $value->email ?></a></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<section class="about-sec-4">
    <div class="prelative container">
        <div class="row">
            <div class="col-md-60">
                <div class="box-content">
                    <div class="interest">
                        <p>Interested for a partnership opportunity with Reich?</p>
                    </div>
                    <div class="by">
                        <p><a href="<?php echo CHtml::normalizeUrl(array('/home/store_locator')); ?>">Click here</a> to find out many possibilities ahead.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>