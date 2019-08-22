<div class="clear"></div>
<div class="subpage defaults_productAlfabet">
  
  <div class="prelatife container">
    <div class="prelatife">
      <div class="middle inside_content boxs_greyAlfabet">
        <div class="tops_p">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <h3>Lihat Produk<br>
                  Aldo Tools & Hardware<br>
                  Berdasar Abjad</h3>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="text-right block_rightpict">
                <div class="pictures"><img src="<?php echo $this->assetBaseurl ?>picts_banner_top_pgAlfabet.png" alt="" class="img-responsive"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
        <div class="middles">
          <?php 
          $alphas = range('A', 'O');
          ?>
          <div class="grid lists_default_bloc_alfabet">
            <?php foreach ($alphas as $key => $value): ?>
            <div class="grid-item">
              <div class="items">
                  <span class="top_alfa"><?php echo $value ?></span>
                  <div class="sub_alfa">
                    <ul class="list-unstyled">
                      <li><a href="#">Alat alat pertukangan</a></li>
                      <li><a href="#">Alat alat pertukangan</a></li>
                      <li><a href="#">Alat alat pertukangan</a></li>
                      <?php if ($key == 0): ?>
                      <li><a href="#">Alat alat pertukangan</a></li>
                      <li><a href="#">Alat alat pertukangan</a></li>
                      <li><a href="#">Alat alat pertukangan</a></li>
                      <?php endif ?>
                    </ul>
                  </div>
              </div>
            </div>
            <?php endforeach ?>

          </div>
          <!-- end bottom default alfabet -->

          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="back_shadow"></div>
    </div>
    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js"></script>
<script type="text/javascript">
  $(function(){

    $('.grid').isotope({
      // set itemSelector so .grid-sizer is not used in layout
      itemSelector: '.grid-item',
      percentPosition: true,
      masonry: {
        // use element for option
        columnWidth: '.grid-item'
      }
    });



  })
</script>