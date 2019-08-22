<div class="blocks_subpage_banner promotion mih393 inside_top_illustration" style="background: none; background-image: none;">
    <div class="picts_full">
      <img src="<?php echo Yii::app()->baseUrl.'/images/static/'.$this->setting['address_hero_image']; ?>" alt="<?php echo $this->setting['address_hero_title'] ?>" class="img-responsive center-block">  
    </div>
    
    <?php if ($this->setting['address_hero_title']): ?>
    <div class="outers_block_text">
      <div class="prelatife blocks_text">
        <h3 class="sub_title_p"><?php echo $this->setting['address_hero_title'] ?></h3>
      </div>
    </div>
    <?php endif; ?>
</div>
<script type="text/javascript">
  $(window).load(function(){
    if ( $(window).width() > 768 ) {
      var get_heightBanner = $('.blocks_subpage_banner.inside_top_illustration .picts_full').height();
      $('.blocks_subpage_banner.inside_top_illustration .outers_block_text').css('height', get_heightBanner+'px');
    }
  });
</script>

<div class="clear"></div>
<div class="subpage static_about">
  <section class="default_sc back-black conts_block_about1">
    <div class="prelatife container text-center">
      <div class="insides">
        <p><?php echo $this->setting['address_hero_subtitle'] ?></p>
        <div class="clear height-15"></div>
        <p class="c2"><?php echo $this->setting['address_hero_content'] ?></p>
        <div class="clear"></div>
      </div>
    </div>
  </section>

  <section class="blocks_middle_store2 default_sc">
    <div class="tops_grey padding-top-25 padding-bottom-25">
      <div class="maw575 tengah bxns_form">
        <form action="" method="get" class="form-inline" id="search-map">
            <div class="row">
            <div class="form-group">
              <label for="">Pilih Provinsi</label>
              <div class="clear"></div>
              <select name="prov" id="select-prov" class="form-control">
                <option value="">Pilih</option>
                <?php foreach ($listProv as $key => $value): ?>
                  <option value="<?php echo $value->prov ?>"><?php echo $value->prov ?></option>
                <?php endforeach ?>
              </select>
              <script type="text/javascript">
                $('#select-prov').val('<?php echo $_GET['prov'] ?>');
              </script>
              </div>
              <div class="form-group last">
              <label for="">Pilih Kota</label>
              <div class="clear"></div>
              <select name="kota" id="select-kota" class="form-control">
                <option value="">Pilih</option>
                <?php foreach ($listKota as $key => $value): ?>
                  <option value="<?php echo $value->kota ?>"><?php echo $value->kota ?></option>
                <?php endforeach ?>
              </select>
              <script type="text/javascript">
                $('#select-kota').val('<?php echo $_GET['kota'] ?>');
              </script>
              </div>
              <!-- <button type="submit" class="btn btn-primary">search</button> -->
            </div>
          </form>
        <div class="clear"></div>
      </div>

      <div class="clear"></div>
    </div>

    <div class="prelatife container middles_contgreyStore_locator">
      <div class="clear height-35"></div>
      <div class="content-text text-center">
        <p>Jika anda tidak menemukan yang anda cari, silahkan menggunakan website untuk melakukan pembelian produk atau menghubungi<br>kami untuk informasi lebih lanjut.</p>
        <div class="clear height-0"></div>

        <?php if (count($dataAddress) > 0): ?>
                  <div class="list_locaion_defaults_d">
          <?php foreach ($dataAddress as $key => $value): ?>
                    <div class="items">
                      <div class="titles"><?php echo $key ?></div>
                      <div class="clear height-20"></div>
          <?php
          $count_loc = count($value);
          $val = array_chunk($value, 3);
          ?>
                    <?php foreach ($val as $data_chunk): ?>
                    <div class="row">
                      <?php if ($count_loc == 2): ?>
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                      <?php endif; ?>
                      <?php foreach ($data_chunk as $k => $v): ?>
                        <?php if ($count_loc == 1): ?>
                        <div class="col-md-12 col-sm-12">
                        <?php elseif($count_loc == 2): ?>
                        <div class="col-md-6 col-sm-6">
                        <?php else: ?>
                        <div class="col-md-4 col-sm-4">
                        <?php endif ?>
                          <div class="item">
                            <p><b><?php echo $v->nama ?></b> <br>
                              <?php echo $v->address_1 ?><br />
                              <?php if ($v->address_2 != ''): ?>
                                <?php echo nl2br($v->address_2) ?><br />
                              <?php endif ?>
                            <?php if ($v->telp != ''): ?>
                            P. <?php echo $v->telp ?><br />
                            <?php endif ?>
                            <?php if ($v->fax != ''): ?>
                            F. <?php echo $v->fax ?> <br>
                            <?php endif ?>
                            <?php if ($v->email != ''): ?>
                            E. <?php echo $v->email ?> <br>
                            <?php endif ?>
                            <?php if ($v->map_link != ''): ?>
                            <a href="<?php echo $v->map_link ?>" target="_blank">View Map Location</a>
                            <?php endif ?>
                            </p>
                            <div class="clear"></div>
                          </div>
                        </div>


                      <?php endforeach ?>
                        <?php if ($count_loc == 2): ?>
                        </div>
                        <div class="col-md-2"></div>
                        <?php endif ?>
                    </div>
                    <?php endforeach ?>
                      <div class="clear"></div>
                    </div>
          <?php endforeach ?>

                    <div class="clear"></div>
                  </div>
          <?php endif ?>
                  <!-- end list download item -->

                    <div class="clear height-50"></div>

                    <div class="clear height-25"></div>
                    <div class="clear"></div>
                  </div>
                  <!-- end insides -->
                </div>


        <div class="clear"></div>
      </div>

      <div class="clear"></div>
    </div>

  </section>

  <div class="clear"></div>
</div>

<script type="text/javascript">
$('#select-kota, #select-prov').on('change', function(){
  $('#search-map').submit();
});

</script>


<?php /*
<div class="clear"></div>
<div class="subpage defaults_static">
  <div class="top_title_page margin-bottom-40">
    <div class="prelatife container">
      <h2 class="title_pg">Lokasi Penjualan Aldo Tools & Hardware</h2>
    </div>
  </div>

  <div class="middle inside_content">
    <div class="prelatife container">
      <div class="clear height-45"></div>
      <div class="insides content-text text-center pLocationstore middles_pgStatic">
          <h3>Cari Distributor / Toko Aldo Tools & Hardware Terdekat</h3>
          <div class="clear height-30"></div>
          <form action="" method="get" class="form-inline">
            <div class="row">
              <div class="form-group">
                <label for="">Pilih area / kota terdekat dengan anda</label>
              </div>
              <div class="form-group">
              <select name="kota" id="select-kota" class="form-control">
                <option value="">Pilih Kota</option>
                <?php foreach ($listKota as $key => $value): ?>
                  <option value="<?php echo $value->kota ?>"><?php echo $value->kota ?></option>
                <?php endforeach ?>
              </select>
              <script type="text/javascript">
                $('#select-kota').val('<?php echo $_GET['kota'] ?>');
              </script>
              </div>
              <button type="submit" class="btn btn-primary">search</button>
            </div>
          </form>
        <div class="clear height-50"></div>
        <div class="block_top_lines_loc">
          <div class="lines-grey"></div>
          <span class="b_title">Daftar Distributor di</span>
        </div>
        <div class="clear height-20"></div>

          <?php if (count($dataAddress) > 0): ?>
                  <div class="list_locaion_defaults_d">
          <?php foreach ($dataAddress as $key => $value): ?>
                    <div class="items">
                      <div class="titles"><?php echo $key ?></div>
                      <div class="clear height-20"></div>
          <?php
          $count_loc = count($value);
          $val = array_chunk($value, 3);
          ?>
                    <?php foreach ($val as $data_chunk): ?>
                    <div class="row">
                      <?php if ($count_loc == 2): ?>
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                      <?php endif; ?>
                      <?php foreach ($data_chunk as $k => $v): ?>
                        <?php if ($count_loc == 1): ?>
                        <div class="col-md-12 col-sm-12">
                        <?php elseif($count_loc == 2): ?>
                        <div class="col-md-6 col-sm-6">
                        <?php else: ?>
                        <div class="col-md-4 col-sm-4">
                        <?php endif ?>
                          <div class="item">
                            <p><b><?php echo $v->nama ?></b> <br>
                              <?php echo $v->address_1 ?><br />
                              <?php if ($v->address_2 != ''): ?>
                                <?php echo nl2br($v->address_2) ?><br />
                              <?php endif ?>
                            <?php if ($v->telp != ''): ?>
                            P. <?php echo $v->telp ?><br />
                            <?php endif ?>
                            <?php if ($v->fax != ''): ?>
                            F. <?php echo $v->fax ?> <br>
                            <?php endif ?>
                            <?php if ($v->email != ''): ?>
                            E. <?php echo $v->email ?>
                            <?php endif ?>
                            </p>
                            <div class="clear"></div>
                          </div>
                        </div>


                      <?php endforeach ?>
                        <?php if ($count_loc == 2): ?>
                        </div>
                        <div class="col-md-2"></div>
                        <?php endif ?>
                    </div>
                    <?php endforeach ?>
                      <div class="clear"></div>
                    </div>
          <?php endforeach ?>

                    <div class="clear"></div>
                  </div>
          <?php endif ?>
                  <!-- end list download item -->

                    <div class="clear height-50"></div>

                    <div class="clear height-25"></div>
                    <div class="clear"></div>
                  </div>
                  <!-- end insides -->
                </div>

              </div>
              <!-- End sub kategori -->
      <!-- end data location store -->
    </div>

    <div class="clear"></div>
  </div>

  <div class="clear"></div>
</div>
*/ ?>