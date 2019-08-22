<div class="blocks_subpage_banner promotion mih393 inside_top_illustration" style="background: none; background-image: none;">
    <div class="picts_full">
      <img src="<?php echo Yii::app()->baseUrl.'/images/static/'.$this->setting['promotion_hero_image']; ?>" alt="<?php echo $this->setting['promotion_hero_title'] ?>" class="img-responsive center-block">  
    </div>
    
    <?php if ($this->setting['promotion_hero_title']): ?>
    <div class="outers_block_text">
      <div class="prelatife blocks_text">
        <h3 class="sub_title_p"><?php echo $this->setting['promotion_hero_title'] ?></h3>
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
        <p><?php echo $this->setting['promotion_hero_subtitle'] ?></p>
        <div class="clear"></div>
      </div>
    </div>
  </section>

  <section class="blocks_middle_store2 default_sc">
    <div class="prelatife container">
      <div class="clear height-50"></div>
      <div class="content-text text-left">

        <div class="lists_data_promotions">
          <div class="row default">
            <?php
            $data = $promotions->getData();
            ?>
            <?php foreach ($data as $key => $value): ?>
            <div class="col-md-6 col-sm-6">
              <div class="items">
                <div class="picture">
                  <a href="#" class="btn btn-link btn_reset" data-toggle="modal" data-target="#myModal<?php echo $value->id ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(570,317, '/images/slide/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a>
                </div>
                <div class="info padding-top-15">
                  <p><?php echo $value->description->subtitle ?></p>
                  <div class="clear"></div>
                  <a href="#" class="btn btn-link btn_reset" data-toggle="modal" data-target="#myModal<?php echo $key ?>">Baca lebih lanjut</a>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <?php endforeach ?>

            </div>

          </div>
        </div>
        <!-- end list promotions -->
        <div class="clear height-50"></div>
        <div class="clear height-10"></div>

        <div class="clear"></div>
      </div>

      <div class="clear"></div>
    </div>

  </section>

  <div class="clear"></div>
</div>

<?php foreach ($data as $key => $value): ?>
<!-- Modal -->
<div class="modal fade customsModal" id="myModal<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div> -->
      <div class="modal-body">
        <div class="ins_bodyModals text-center">
          <div class="pictures margin-bottom-40"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(570,317, '/images/slide/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive center-block"></div>
          <div class="clear"></div>
          <?php echo $value->description->content ?>

          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
<?php if ($_GET['id']): ?>
<script type="text/javascript">
$('#myModal<?php echo $_GET['id'] ?>').modal();
</script>
<?php endif ?>