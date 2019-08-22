<?php 
$cover_page = '';

if (isset($this->setting['agen_hero_image'])) {
  $cover_page = Yii::app()->baseUrl.ImageHelper::thumb(1920,562, '/images/static/'. $this->setting['agen_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90'));
}
?>
<section class="cover-insides" <?php if ($cover_page): ?>style="background-image: url(<?php echo $cover_page ?>);"<?php endif ?> >
  <div class="prelative container">
    <div class="container2 mx-auto">
      <div class="row">
        <div class="col-md-60">
          <button class="profil mx-auto"><?php echo $this->setting['agen_hero_title'] ?></button>
        </div>
        <div class="col-md-60">
          <h2 class="mx-auto text-center pt-3"><?php echo nl2br($this->setting['agen_hero_subtitle']) ?></h2>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="agen-sec-1">
  <div class="prelative container pt-5">
    <div class="container2  mx-auto pt-5">
      <div class="row pt-5 mx-auto">
        <div class="content content-isi text-center">
          <?php echo $this->setting['agen1_content'] ?>
          <div class="clear clearfix"></div>
        </div>
        <!-- <div class="content-isi text-center pt-3 pb-5">
          <p>Anda memiliki toko bahan bangunan? Memiliki gudang distribusi? Atau pemasok proyek? Arsimetris Djaja akan siap memberikan dukungan sebagai agen prinsipal berbagai bahan bangunan seperti granit tile, aneka saniter, aneka atap bangunan, dan bahan bangunan lainnya dengan pelayanan terbaik serta harga terbaik.  Kami membuka kesempatan bagi toko atau pelanggan untuk menjadi agen dagang untuk produk produk eksklusif kami. <br><span>Silahkan menghubungi kami dengan mengisi form di bawah ini.</span> </p>
        </div> -->
        <div class="py-4"></div>
      </div>
    </div>
  </div>
</section>

<section class="agen-sec-2">
  <div class="prelative container py-5 pt-5 pb-5">
    <div class="title mx-auto text-center d-block pt-5 ">
      <p>Form Keagenan <br> <span>Silahkan mengisi semua kolom yang ada</span> </p>
    </div>
    <div class="container2 mx-auto pt-3 pb-5 pb-5">
      <form class="">
        <div class="row">
          <div class="col-md-20 pt-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>
          </div>
          <div class="col-md-20 pt-3">
            <div class="form-group">
              <label for="exampleInputEmail1">HP</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>
          </div>
          <div class="col-md-20 pt-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>
          </div>
          <div class="col-md-20 pt-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Perusahaan / Toko</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>
          </div>
          <div class="col-md-20 pt-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Telepon</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>
          </div>
          <div class="col-md-20 pt-3">
            <div class="form-group">
              <label for="exampleInputEmail1">Kota</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
            </div>
          </div>
        </div>
        <div class="pb-3"></div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <div class="pb-5"></div>
      </form>
    </div>
  </div>
</section>

<style type="text/css">
  section.agen-sec-1 .prelative.container .container2 .row .content h3{
    margin-bottom: 25px;
  }
</style>