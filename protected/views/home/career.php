<div class="blocks_subpage_banner promotion mih393 inside_top_illustration" style="background: none; background-image: none;">
    <div class="picts_full">
      <img src="<?php echo Yii::app()->baseUrl.'/images/static/'.$this->setting['career_hero_image']; ?>" alt="<?php echo $this->setting['career_hero_title'] ?>" class="img-responsive center-block">  
    </div>
    
    <?php if ($this->setting['career_hero_title']): ?>
    <div class="outers_block_text">
      <div class="prelatife blocks_text">
        <h3 class="sub_title_p"><?php echo $this->setting['career_hero_title'] ?></h3>
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
        <p><?php echo $this->setting['career_hero_subtitle'] ?></p>
        <div class="clear"></div>
      </div>
    </div>
  </section>

  <section class="blocks_middle_store2 default_sc pg_contact">
    <div class="prelatife container">
      <div class="clear height-50"></div>
      <div class="content-text text-center maw750 tengah">
        <?php echo $this->setting['career_content'] ?>
        <!-- <div class="clear height-20"></div> -->
        <?php //echo $this->renderPartial('//home/_form_contact3', array('model' => $model)); ?>

        <div class="clear"></div>
      </div>

      <div class="clear height-50"></div>
      <div class="clear height-25"></div>
    </div>

  </section>

  <div class="clear"></div>
</div>