<?php
$this->pageTitle = $this->setting['faq_hero_title'].' - '.$this->pageTitle;
?>

<div class="blocks_subpage_banner promotion mih393 inside_top_illustration" style="background: none; background-image: none;">
    <div class="picts_full">
      <img src="<?php echo Yii::app()->baseUrl.'/images/static/'.$this->setting['faq_hero_image']; ?>" alt="<?php echo $this->setting['faq_hero_title'] ?>" class="img-responsive center-block">  
    </div>
    
    <?php if ($this->setting['faq_hero_title']): ?>
    <div class="outers_block_text">
      <div class="prelatife blocks_text">
        <h3 class="sub_title_p"><?php echo $this->setting['faq_hero_title'] ?></h3>
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
  <section class="default_sc back-black conts_block_about1 hide hidden">
    <div class="prelatife container text-center">
      <div class="insides">
        <p><?php echo $this->setting['faq_hero_subtitle'] ?></p>
        <div class="clear"></div>
      </div>
    </div>
  </section>

  <section class="default_sc back-white blocks_middle_inside_outern text-left padding-top-50 pg_contact">
    <div class="prelatife container pb-0">
      <div class="insides content-text">
        <h1 class="n_title_top text-center"><?php echo $this->setting['faq_hero_subtitle'] ?></h1>
        <div class="clear height-50"></div>

        <div class="blocks_inner_faq_cnt">
          <div class="row">
            <div class="col-md-3">
              <div class="lefts_con">
                <div class="tops">
                  TOPICS
                </div>
                <div class="clear"></div>

                <?php 
                $data_faq = array(
                            1 => array(
                                  'question' => 'How many bottles in each case and what does it consist of?',
                                  'answer' => '<p><strong>How many bottles in each case and what does it consist of?</strong><br />
                                               There are 6 bottles in each case. It consists of 2 bottles of Realfit&trade; Classic, 2 bottles of Realfit&trade; Calm and 2 bottles Realfit&trade; Beauty.</p>',
                                  ),
                                array(
                                  'question' => 'How much is your monthly subscription?',
                                  'answer' => '<p><strong>How much is your monthly subscription?</strong><br />
                                                We are currently offering minimum 1 case monthly subscription at S$49.90. This includes free delivery within Singapore.</p>',
                                  ),
                            );
                ?>
				<?php
				$data = $dataFaq->getData();
				?>
                <ul class="list-unstyled">
                  <?php foreach ($data as $key_faq => $val_faq): ?>
                  <li><a href="#" class="toScroll" data-id="list_<?php echo $key_faq ?>" data-minusl="0"><?php echo $val_faq->description->question ?></a></li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
            <div class="col-md-9">
              <div class="rights_con">
                <div class="tops">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                    ANSWER
                    </div>
                    <div class="col-md-6 col-sm-6 text-right">
                    <span>(<?php echo count($data); ?> answers)</span>
                    </div>
                  </div>
                </div>
                <div class="clear"></div>


                <div class="lists_in_faqn">
                  <?php foreach ($data as $key_faq => $val_faq): ?>
                  <div class="list data1" id="list_<?php echo $key_faq ?>">
                    <p><strong><?php echo $val_faq->description->question ?></strong><br />
                    <?php echo $val_faq->description->answer ?>
                    <div class="clear"></div>
                  </div>
                  <?php endforeach; ?>                  

                </div>

                <div class="clear"></div>
              </div>
            </div>
          </div>
          <div class="claer"></div>
        </div>
        <!-- End block inner Faq -->


        <div class="clear height-50"></div>
        <div class="clear height-20"></div>
      </div>
    </div>

  </section>

  <div class="clear"></div>
</div>