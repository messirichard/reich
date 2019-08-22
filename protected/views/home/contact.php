<?php
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<!-- Bawah header -->
<section class="default-sc inside-page product-details"> 
  <section class="top-product-detail">
    <div class="container defaults">
      <div class="tops">
        <div class="row">
          <div class="col-md-40">
            <div class="shn-back-products">
              <a href="javascript:void(-1);"><i class="fa fa-long-arrow-left"></i> &nbsp;BACK</a> 
              <span class="new-back-product"><div class="separators_linetop"></div> <span class="new-back-product">HOME / CONTACT US
              </span>
              </span>
            </div>
          </div>
          <div class="col-md-20">
            <div class="box-search">
              <form class="form-inline">
              <label for="inlineFormInputNN2">SEARCH</label>
              <div class="blob-input">
                <form method="GET" action="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>">
                  <input type="text" class="form-control mb-2" id="inlineFormInputNN2" placeholder="" name="q">
                  <button type="submit" class="btn mb-2"><i class="fa fa-search"></i></button>
                </form>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="clear height-50"></div>
      <div class="clear height-20"></div>
      <div class="row">
        <div class="col-md-60">
          <div class="contactus-header-top mx-auto d-block text-center">
            <div class="seen-header-top"><?php echo $this->setting['contact_hero_title'] ?></div>
            <div class="clear height-30"></div>
            <div class="contactus-header-mid">
              <?php echo $this->setting['contact_hero_subtitle'] ?>
            </div>
            <div class="clear height-30"></div>
            <div class="clear height-25"></div>
            <div class="contactus-header-hotline">
              OUR HOTLINE
            </div>
            <div class="clear height-40"></div>
            <div class="contactus-header-nomor">
              <i class="fa fa-whatsapp" aria-hidden="true"></i><span class="after-logo-wa">Phone / Whatsapp: <?php echo $this->setting['contact_phone'] ?></span><div class="d-block d-sm-none clear clearfix"></div><span class="after-number-wa"><i class="fa fa-envelope" aria-hidden="true"></i><span class="after-logo-wa">Email: <?php echo $this->setting['email'] ?></span></span>
            </div>
            <div class="clear height-30"></div>
            <div class="clear height-25"></div>
            <div class="contactus-header-hotline">
              FACTORY & HEAD OFFICE
            </div>
            <div class="clear height-25"></div>
            <div class="contactus-header-nomor">
              <?php echo $this->setting['contact_content'] ?>
            </div>
            <div class="clear height-50"></div>
            <div class="clear height-50"></div>
            <div class="contactus-header-inquiries">
              For any other inquiries, you can drop us a message and we’ll respond to you shortly.
            </div>
            <div class="clear height-20"></div>
            <div class="clear height-20"></div>
          </div>
        </div>
      </div>
      <div class="form-contact">
        <div class="row">
          <div class="col-md-60">
            <div class="title-form">
              <div class="clear height-50"></div>
              <div class="clear height-40"></div>
              ONLINE INQUIRY FORM
            </div>
            <div class="clear height-50"></div>
            <div class="title-form-label">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-20">
                    <label for="inputEmail4" class="label-form-contact">NAME</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="">
                  </div>
                  <div class="form-group col-md-20">
                    <label for="inputEmail4" class="label-form-contact">EMAIL</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="">
                  </div>
                  <div class="form-group col-md-20">
                    <label for="inputEmail4" class="label-form-contact">PHONE</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleTextarea" class="label-form-contact">MESSAGE</label>
                  <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary submitform">SUBMIT</button>
              </form>
            </div>
            <div class="clear height-50"></div>
            <div class="clear height-50"></div>
          </div>
        </div>
      </div>
      <div class="clear height-50"></div>
      <div class="clear height-10"></div>

      <?php echo $this->renderPartial('//layouts/_tops_footer_partner', array()); ?>
  </section>
</section>