<div class="outer_subpage_wrapper">

  <div class="middles_cont back-white">
    <section class="middle_conts_1_inside">
      <div class="container defaults">
        <div class="tops">
          <div class="row">
            <div class="col-md-40">
              
              <div class="shn-back-products">
              <a href="javascript:void(-1);"><i class="fa fa-long-arrow-left"></i> &nbsp;BACK</a> 
              <span class="new-back-product"><div class="separators_linetop"></div> <span class="new-back-product">HOME / STORE LOCATOR
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
      </div>
      <div class="clear height-50"></div>
      <div class="clear height-20"></div>

      <div class="prelatife container container_insides">
        <div class="inside content-text conts_pDealer">
          <h2 class="titlepage text-center">Store Locator</h2>
          <div class="clear height-30"></div>

          <div class="boxs_grey tengah text-left">
            <div class="row">
              <div class="col-md-60">
                <div class="rights">
                  <div class="text-center">
                    <p>Find Jackson Fashion Shoes, Clothing & Accessories near your location</p>
                  </div>
                  <div class="clear height-35"></div>

                  <div class="blocksn_form_filter text-center mx-auto my-auto">
                    <form action="<?php echo CHtml::normalizeUrl(array('dealer', 'loc'=>$_GET['loc'])); ?>" id="search-map" class="form-inline">
                      <div class="form-row align-items-center mx-auto">
                        <div class="col-auto form-group">
                          <select name="prov" id="select-prov" class="form-control">
                            <option value="">Pilih Province</option>
                            <?php foreach ($listProv as $key => $value): ?>
                              <option value="<?php echo $value->prov ?>"><?php echo $value->prov ?></option>
                            <?php endforeach ?>
                          </select>
                          <script type="text/javascript">
                            $('#select-prov').val('<?php echo $_GET['prov'] ?>');
                          </script>
                        </div>
                        <div class="col-auto form-group">
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
                      </div>
                    </form>
                    <div class="clear"></div>
                  </div>

                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>

          <?php if ($_GET['prov'] != '' OR $_GET['kota'] != ''): ?>
              <div class="boxs_view_maps text-center">
                <div class="clear height-50"></div>
                <div class="clear height-25"></div>
                <!-- <div class="tops_title text-center padding-bottom-25">
                  DISPLAYING LOCATION MAP FOR:<br>
                  <b>JACKSON</b>
                </div> -->
                <div class="maps_area">
                  <div id="map" style="width: 100%; height: 350px;"></div>
                </div>

                <div class="clear"></div>
              </div>

              <div class="boxs_list_location_finds_n text-center">
              <div class="clear height-50"></div><div class="height-10"></div>
                <p class="help-block">Click “View Location” on your choosen location to display the map.</p>
                <div class="clear height-20"></div>

                <div class="blocks_lists_locat_data">
                <?php if (count($dataAddress) > 0): ?>
                  <div class="row default">
                    <?php foreach ($dataAddress as $key => $value): ?>
                    <div class="col-md-20 col-sm-30">
                      <div class="items">
                        <address>
                            <b><?php if ($value->link != ''): ?>
                            <a href="<?php echo $value->link; ?>" target="_blank" class="links_dealer_loc">
                            <?php endif ?>
                            <?php echo $value->nama ?>
                            <?php if ($value->link != ''): ?>
                            </a>
                            <?php endif ?>
                            </b>
                            <br>
                            <?php echo $value->address_1 ?><br />
                            <?php if ($value->address_2 != ''): ?>
                              <?php echo nl2br($value->address_2) ?><br />
                            <?php endif ?>
                          <?php if ($value->telp != ''): ?>
                          P. <?php echo $value->telp ?><br />
                          <?php endif ?>
                          <?php if ($value->fax != ''): ?>
                          F. <?php echo $value->fax ?> <br>
                          <?php endif ?>
                          <?php if ($value->email != ''): ?>
                          E. <?php echo $value->email ?>
                          <?php endif ?>
                          <a href="#" onclick="myClick(<?php echo $key ?>);return false;" class="views_map_loc">View Location</a>
                        </address>
                      </div>
                    </div>
                    <?php endforeach ?>
                  </div>
                <?php endif ?>
                </div>
                <div class="clear"></div>
              </div>


          <div class="clear height-25"></div>
          <p class="help-block">If you found difficulties finding the right experts near you or need further assistance , please call our customer service hotline at (031) 3889955</p>
          <?php endif ?>

          <div class="clear height-25"></div>
        </div>
      </div>
    </section>

    <!-- End middle conts -->
  </div>

  <div class="clear"></div>
</div>

<div class="clear height-20"></div>
<div class="clear height-10"></div>

<div class="container defaults">
  <?php echo $this->renderPartial('//layouts/_tops_footer_partner', array()); ?>
</div>
<script type="text/javascript">
  $(function(){

    $('#select-kota, #select-prov').on('change', function(){
      $('#search-map').submit();
    });

    $('a.views_map_loc').on('click', function(){
      $('.boxs_view_maps').removeClass('hide').slideDown('slow');
    });

  });
var markers = [];
function initMap() {
  var locations = [
  <?php if (count($dataAddress) > 0): ?>
  <?php foreach ($dataAddress as $key => $value): ?>
    ['<?php echo $value->nama ?>', <?php echo $value->lat ?>, <?php echo $value->lng ?>, <?php echo $key ?>],
  <?php endforeach ?>
  <?php endif ?>
  ];
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: new google.maps.LatLng(41.923, 12.513), 
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var marker, i;

  //create empty LatLngBounds object
  var bounds = new google.maps.LatLngBounds();
  var infowindow = new google.maps.InfoWindow();    

  for (i = 0; i < locations.length; i++) {  
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map,
      icon: '<?php echo Yii::app()->baseUrl ?>/asset/images/marker-jackson.png'
    });

    //extend the bounds to include each marker's position
    bounds.extend(marker.position);

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
        scrollAtas();
      }

    })(marker, i));
    markers.push(marker);
  }

  //now fit the map to the newly inclusive bounds
  map.fitBounds(bounds);
  if (locations.length == 1) {
    zoomChangeBoundsListener = 
        google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
            if (this.getZoom()){
                this.setZoom(16);
            }
    });
    setTimeout(function(){google.maps.event.removeListener(zoomChangeBoundsListener)}, 2000);
  }
  //(optional) restore the zoom level after the map is done scaling
  // var listener = google.maps.event.addListener(map, "idle", function () {
  //     map.setZoom(15);
  //     google.maps.event.removeListener(listener);
  // });
}
function myClick(id){
    google.maps.event.trigger(markers[id], 'click');
}
function scrollAtas() {
  var target = $('#map');
  $('body,html').animate({
    scrollTop: target.offset().top
  }, 800);
}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnVYV9PU2hDS4GMEJ_TZ2Hy-zy1iXfQX0&callback=initMap">
</script>
