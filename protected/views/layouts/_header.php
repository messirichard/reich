<?php
$e_activemenu = $this->action->id;
$controllers_ac = $this->id;
$session=new CHttpSession;
$session->open();
$login_member = $session['login_member'];

$active_menu_pg = $controllers_ac.'/'.$e_activemenu;
?>

<header class="header">
    <div class="row no-gutters all">
        <div class="col-md-20">
            <ul class="list-inline text-center">
                <li class="list-inline-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/products')); ?>">Our Product Collections</a></li>
                <li class="list-inline-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/about')); ?>">About Us</a></li>
                <li class="list-inline-item"><a href="#">Our Quality</a></li>
            </ul>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-10">
          <div class="logo">
            <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">
                <img src="<?php echo $this->assetBaseurl; ?>Layer-25.png" alt="">
            </a>
          </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-13">
            <ul class="list-inline text-right">
                <li class="list-inline-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/howtobuy')); ?>">How To Buy</a></li>
                <li class="list-inline-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/store_locator')); ?>">Stores</a></li>
                <li class="list-inline-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/partner')); ?>">Partnership</a></li>
            </ul>
        </div>
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-25">
              <div class="image-wa">
                <a href="#">
                  <img src="<?php echo $this->assetBaseurl; ?>WA-Logo-copy.png" alt="">
                </a>
              </div>
            </div>
            <div class="col-md-10">
              <div class="garis-head"></div> 
            </div>
            <div class="col-md-25">
              <div class="seacrh">
                <a href="#">
                  <img src="<?php echo $this->assetBaseurl; ?>search.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
</header>

<?php
/*
<section id="myAffix" class="header-affixs affix-top">-->
  <div class="clear height-15"></div>
  <div class="prelatife container">
    <div class="row">
      <div class="col-md-15 col-sm-15">
        <div class="lgo_web_headrs_wb">
          <a href="#">
            <img src="<?php //echo $this->assetBaseurl; ?>logo-footer.png" alt="" class="img img-fluid">
          </a>
        </div>
      </div>
      <div class="col-md-45 col-sm-45">
        <div class="text-right"> 
          <div class="menu-taffix">
            <ul class="list-inline d-inline">
              <li class="list-inline-item"><a href="<?php //echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
              <li class="list-inline-item"><a href="<?php //echo CHtml::normalizeUrl(array('/product/index')); ?>">Produk Bahan Bangunan</a></li>
              <li class="list-inline-item"><a href="<?php //echo CHtml::normalizeUrl(array('/home/about')); ?>">Profil</a></li>
              <li class="list-inline-item"><a href="<?php //echo CHtml::normalizeUrl(array('/home/merk')); ?>">Merk & Keagenan</a></li>
              <li class="list-inline-item"><a href="<?php //echo CHtml::normalizeUrl(array('/home/jadiagen')); ?>">Jadi Agen</a></li>
              <li class="list-inline-item"><a href="<?php //echo CHtml::normalizeUrl(array('/home/hubungi')); ?>">Hubungi</a></li>
              <li class="list-inline-item"><a href="<?php //echo CHtml::normalizeUrl(array('/blog/index')); ?>">Blog</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</section>
*/ ?>

<script type="text/javascript">
  $(document).ready(function(){
      // $('.nl_popup a').live('hover', function(){
      //     $('.popup_carts_header').fadeIn();
      // });
      // $('.popup_carts_header').live('mouseleave', function(){
      //   setTimeout(function(){ 
      //       $('.popup_carts_header').fadeOut();
      //   }, 500);
      // });
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
      // $('.nl_popup a').live('hover', function(){
      //     $('.popup_carts_header').fadeIn();
      // });
      // $('.popup_carts_header').live('mouseleave', function(){
      //   setTimeout(function(){ 
      //       $('.popup_carts_header').fadeOut();
      //   }, 500);
      // });
      $('a.closes_btn').on('click', function(){
        $('.collapsesn_viewmenu').removeClass('show');
      });
      $('.navbar-toggler').on('click', function(){
        $('.collapsesn_viewmenu').addClass('show');
      });

      var ns_height = $(window).height();
      $('.collapsesn_viewmenu').css('height', ns_height+"px");
  });
  $(function(){

// show and hide m\enu responsive
    $('a.showmenu_barresponsive').on('click', function() {
      $('.outer-blok-black-menuresponss-hides').slideToggle('slow');
      return false;
    });
    $('a.closemrespobtn').on('click', function() {
      $('.outer-blok-black-menuresponss-hides').slideUp('slow');
      return false;
        });
        
    });
</script>
<script type="text/javascript">
  $(function(){

  var sn_width = $(window).width();
  if (sn_width > 1150) {

      $(window).scroll(function(){
        var sntop1 = $(window).scrollTop();

        if(sntop1 > 115){
          // console.log(sntop1);
          $('.header-affixs').removeClass('affix-top').addClass('affix');
          // $('.header-affixs').addClass('affix');
        }else{
          $('.header-affixs.affix').removeClass('affix').addClass('affix-top');
          // $('body').css('padding-top', '0px');
        }
      });

    }

  });
</script>
