<section class="cover-produk">
  <div class="prelative container py-5">
    <div class="container2 mx-auto py-5">
      <div class="row py-5">
        <div class="col-md-60 text-center pt-3">
          <button class="produk mx-auto">Produk Bahan Bangunan Kami</button>
        </div>
        <div class="col-md-60 text-center pt-4">
          <h2 class="mx-auto">Aneka merk yang tergabung di Arsimetris Djaja dan peluang bekerjasama / keagenan.</h2>  
        </div>
      </div>
    </div>
  </div>
</section>

<section class="produk-sec-1">
  <div class="prelative container">
    <div class="row">
      <div class="col-md-15">
        <div class="title-produk">
          <div class="title">
            <p>Kategori produk arsimetris djaja</p>
            <hr>
            <ul>
              <li>
              <a href="#">
                Semua Produk
              </a>  
            </li>
              <li>
              <a href="#">
                Granit Tile dan Keramik
              </a>  
            </li>
              <li>
              <a href="#">
                Atap / Roofing
              </a>  
            </li>
              <li>
              <a href="#">
                Papan GRC / Gypsum Board
              </a>  
            </li>
              <li>
              <a href="#">
                Sanitary
              </a>  
            </li>
              <li>
              <a href="#">
                Water Heater / Pemanas Air
              </a>  
            </li>
              <li>
              <a href="#">
                Cat & Waterproofing
              </a>  
            </li>
              <li>
              <a href="#">
                Perlengkapan Dapur
              </a>  
            </li>
              <li>
              <a href="#">
                Hardware
              </a>  
            </li>
              <li>
              <a href="#">
                Lain-lain
              </a>  
            </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-45">
        <div class="title-produk-right">
          <div class="title-left">
            <p>Menampilkan: <span>Semua Produk (256 items)</span></p>
          </div>
          <div class="title-right">
            <p></p>
          </div>
          <hr>
        </div>
        <div class="row box-produk pt-3">
          <?php for($i=0;$i<=11;$i++){?>
            <div class="col-md-20">
              <div class="produk-box-container pb-5">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/produk_detail')); ?>">
                  <img src="<?php echo $this->assetBaseurl; ?>2-produk_03.jpg" alt="" class="img w-100">
                </a>
                <div class="title-produk pt-4">
                  <a href="<?php echo CHtml::normalizeUrl(array('/home/produk_detail')); ?>">
                    <h1>Granit Tile 60X60 Arrancar Marble Niro Granit</h1>
                  </a>
                </div>
                <div class="kategori-produk">
                  <p>Hardware</p>
                </div>
                <div class="harga">
                  <p>Rp 250,000  </p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>