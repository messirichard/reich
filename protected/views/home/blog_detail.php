<section class="cover-blog">
  <div class="prelative container py-5">
    <div class="container2 mx-auto py-5">
      <div class="row py-5">
        <div class="col-md-60 text-center pt-3">
          <button class="profil mx-auto">Blog</button>
        </div>
        <div class="col-md-60 text-center pt-4">
          <h2 class="mx-auto">Aneka Artikel Dan Tips Seputar Dunia Bahan Bangunan Oleh Arsimetris Djaja Banjarmasin.</h2>  
        </div>
      </div>
    </div>
  </div>
</section>

<section class="blog-detail">
  <div class="prelative container">
    <div class="row">
      <div class="col-md-15">
        <div class="title-blog">
          <div class="title">
            <p>Kategori blog arsimetris djaja</p>
            <hr>
            <ul>
              <li>Semua</li>
              <li>Tips & Trik</li>
              <li>Artikel Informasi</li>
              <li>Berita</li>
            </ul>
          </div>
        </div>
        <div class="py-4"></div>
      </div>  
      <div class="col-md-45">
        <div class="kategori-date">
          <div class="kategori-kanan">
            <p>- Tips & Trik | <span>29 JANUARY 2019</span></p>
          </div>
        </div>
        <div class="title">
          <h1>Cara cepat membersihkan perabot saniter kotor</h1>
        </div>
        <div class="image pt-4">
          <img class="w-100 img" src="<?php echo $this->assetBaseurl; ?>2-blog-detail_03.jpg" alt="">
        </div>
        <div class="content-blog py-4 pb-5">
          <p>Maecenas orci orci, placerat hendrerit lorem sit amet, faucibus gravida eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras in rhoncus dolor. Suspendisse elementum sem pellentesque metus finibus, vel placerat tortor feugiat. <br><br>
          Donec ullamcorper neque quis ante egestas, at tincidunt massa aliquam. Aenean vel mauris elementum, malesuada est eu, tincidunt nisl. Suspendisse pulvinar, risus id aliquam pretium, mauris arcu fringilla purus, sed blandit est tortor id metus. Phasellus eu enim eget enim aliquet aliquam in a risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque id dictum ipsum. Mauris vel pellentesque erat, eget interdum quam. Etiam at lacus massa. Vestibulum euismod egestas nibh, ut porttitor lectus imperdiet sed. Suspendisse elementum sem pellentesque metus finibus, vel placerat tortor feugiat. <br><br>

          Donec ullamcorper neque quis ante egestas, at tincidunt massa aliquam. Aenean vel mauris elementum, malesuada est eu, tincidunt nisl. Suspendisse pulvinar, risus id aliquam pretium, mauris arcu fringilla purus, sed blandit est tortor id metus. Phasellus eu enim eget enim aliquet aliquam in a risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque id dictum ipsum. Mauris vel pellentesque erat, eget interdum quam. Etiam at lacus massa. Vestibulum euismod egestas nibh, ut porttitor lectus imperdiet sed.Suspendisse elementum sem pellentesque metus finibus, vel placerat tortor feugiat. <br><br>

          Donec ullamcorper neque quis ante egestas, at tincidunt massa aliquam. Aenean vel mauris elementum, malesuada est eu, tincidunt nisl. Suspendisse pulvinar, risus id aliquam pretium, mauris arcu fringilla purus, sed blandit est tortor id metus. Phasellus eu enim eget enim aliquet aliquam in a risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque id dictum ipsum. Mauris vel pellentesque erat, eget interdum quam. Etiam at lacus massa. Vestibulum euismod egestas nibh, ut porttitor lectus imperdiet sed.
          </p>
        </div>
        <div class="lainnya">
          <div class="kategori-bottom">
            <p>artikel blog arsimetris djaja lainnya</p>
          </div>
          <hr>
          <div class="blog-box-container pb-5">
            <div class="row">
              <?php for ($i=0;$i<=2;$i++){ ?>
              <div class="col-md-20 pt-3">
                <a href="<?php echo CHtml::normalizeUrl(array('/home/blog_detail')); ?>">
                <img class="img w-100" src="<?php echo $this->assetBaseurl; ?>2-blog_03.jpg" alt="">
                </a>
                <div class="kategori-blog pt-4">
                  <p>- Tips & Trik</p>
                </div>
                <div class="title-blog">
                  <a href="<?php echo CHtml::normalizeUrl(array('/home/blog_detail')); ?>">
                  <h1>Cara cepat membersihkan perabot saniter kotor</h1>
                  </a>
                </div>
                <div class="baca-selanjutnya pt-3 ">
                  <p><a href="<?php echo CHtml::normalizeUrl(array('/home/blog_detail')); ?>">BACA ARTIKEL</a></p>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>