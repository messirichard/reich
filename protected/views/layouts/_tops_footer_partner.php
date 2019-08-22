<hr class="hr-contact">
<div class="row">
  <div class="col-md-30" style="border-right: 2px #cccccc solid">
    <div class="contact-follow">
      Follow Us <br>
      <div class="clear height-20"></div>
      <a target="_blank" href="<?php echo $this->setting['url_facebook'] ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      <span class="icon-followus"><a target="_blank" href="<?php echo $this->setting['url_instagram'] ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
    </div>
  </div>
  <div class="col-md-30">
    <div class="contact-follow">
      Our Merchant Partner <br>
      <div class="clear height-10"></div>
      <ul class="list-inline">
        <?php for ($i=1; $i < 5; $i++) { ?>
        <li><a target="_blank" href="<?php echo $this->setting['partner_link_'. $i] ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(139,79, '/images/static/'. $this->setting['partner_logo_'. $i] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-fluid d-inline-block mx-auto"></a></li>
        <?php } ?>
      </ul>
  </div>
  </div>
</div>
<div class="mb-4"></div>