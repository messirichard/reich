<div class="row-fluid">
	<div class="span8">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'bank-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data Address</h4>
<div class="widgetcontent">

	<div class="row-fluid">
		<div class="span8">
					<?php /*
			<?php echo $form->labelEx($model, 'category_id'); ?>
			<div class="controls">
				<select id="category_id" name="Address[category_id]" class="input-block-level">
					<?php 
					$dataCategory = (PrdCategory::model()->categoryTree('addresscat', $this->languageID));
					?>
					<option value="">---- Choose Category ----</option>
					<?php echo PrdCategory::model()->createOption($dataCategory) ?>
					<option value="">---- Choose Category ----</option>
					<?php foreach ($dataCategory as $key => $value): ?>
						<?php if (count($value['children']) > 0): ?>
						<optgroup label="<?php echo $value['title'] ?>">
							<?php foreach ($value['children'] as $k => $v): ?>
							<option value="<?php echo $v['id'] ?>"><?php echo $v['title'] ?></option>
							<?php endforeach ?>
						</optgroup>
						<?php else: ?>
						<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<script type="text/javascript">
			jQuery('#category_id').val('<?php echo $model->category_id ?>');
			</script>
					*/ ?>

			<?php echo $form->textFieldRow($model,'prov',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'kota',array('class'=>'span12')); ?>

			<?php echo $form->hiddenField($model,'lat',array('class'=>'span12')); ?>
			
			<?php echo $form->hiddenField($model,'lng',array('class'=>'span12')); ?>
			
			<?php echo $form->textFieldRow($model,'nama',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'link',array('class'=>'span12', 'hint'=>'Example: http://www.urldealer.com/')); ?>

			<?php /*echo $form->dropDownListRow($model,'type', array(
				'dealer'=>'Dealer',
				// 'asp'=>'ASP',
			),array('class'=>'span12'));*/ ?>
			
			<?php echo $form->textFieldRow($model,'address_1',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'address_2',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'telp',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'fax',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'email',array('class'=>'span12')); ?>
			
			<?php echo $form->textFieldRow($model,'sort',array('class'=>'span12')); ?>

			<?php echo $form->textFieldRow($model,'latlng',array('class'=>'span12')); ?>

<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script> -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnVYV9PU2hDS4GMEJ_TZ2Hy-zy1iXfQX0&callback=initialize"></script>
<div id="map_canvas" style="width:100%; height:400px;"></div>
<p>Drag and drop pin, untuk memindahkan lokasi</p>
<div class="height-20"></div>
<script type="text/javascript">
var map;
var marker;
function initialize() {
  <?php if ($model->scenario == 'update' AND $model->lat != 0): ?>
  var myLatlng = new google.maps.LatLng(<?php echo $model->lat ?>,<?php echo $model->lng ?>);
  var myOptions = {
     zoom: 17,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  <?php else: ?>
  var myLatlng = new google.maps.LatLng(-7.355905, 109.987140);
  var myOptions = {
     zoom: 6,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  <?php endif ?>


  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

  marker = new google.maps.Marker({
    draggable: true,
    position: myLatlng, 
    map: map,
  title: "Your location"
  });

  google.maps.event.addListener(marker, 'dragend', function (event) {
      document.getElementById("Address_lat").value = this.getPosition().lat();
      document.getElementById("Address_lng").value = this.getPosition().lng();
      document.getElementById("Address_latlng").value = this.getPosition().lat() + ', ' +this.getPosition().lng();
  });

	google.maps.event.addDomListener(document.getElementById("Address_latlng"), 'change', function() {
		position = document.getElementById("Address_latlng").value.split(',');
		// alert(position[0]);
	      var pos = {
	        lat: position[0],
	        lng: position[1]
	      };
	    var myLatlng = new google.maps.LatLng(position[0],position[1]);
		map.setCenter(myLatlng);
		// setMapOnAll(null);
		marker.setMap(null);
		marker = null;
		marker = new google.maps.Marker({
	        draggable: true,
	        position: myLatlng, 
	        map: map,
	        title: "Your location"
	    });
	    marker.setMap(map);
		  google.maps.event.addListener(marker, 'dragend', function (event) {
		      document.getElementById("Address_lat").value = this.getPosition().lat();
		      document.getElementById("Address_lng").value = this.getPosition().lng();
		      document.getElementById("Address_latlng").value = this.getPosition().lat() + ', ' +this.getPosition().lng();
		  });

	});


  // if (navigator.geolocation) {
  //   navigator.geolocation.getCurrentPosition(function(position) {
  //     var pos = {
  //       lat: position.coords.latitude,
  //       lng: position.coords.longitude
  //     };

  //     map.setCenter(pos);
  //     marker.setMap(null);

  //     // map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

  //     var marker = new google.maps.Marker({
  //       draggable: true,
  //       position: pos, 
  //       map: map,
  //       title: "Your location"
  //     });

  //     marker.setMap(map);

  //     google.maps.event.addListener(marker, 'dragend', function (event) {
  //         // document.getElementById("DoctorClinic_latitude").value = this.getPosition().lat();
  //         // document.getElementById("DoctorClinic_longitude").value = this.getPosition().lng();
  //     });
      

  //   }, function() {
  //     handleLocationError(true, infoWindow, map.getCenter());
  //   });
  // } else {
  //   // Browser doesn't support Geolocation
  //   handleLocationError(false, infoWindow, map.getCenter());
  // }

}

// $(document).load(function() {
//   initialize()
// })
</script> 
		</div>
		<div class="span4">
			<?php /*
			<?php echo $form->fileFieldRow($model,'image',array(
			'hint'=>'<b>Note:</b> Image size is 509 x 458px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
			<?php if ($model->scenario == 'update'): ?>
			<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(307,150, '/images/address/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
			<?php endif; ?>
			<br>
			*/ ?>
		</div>
	</div>


	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
		
</div>
</div>

<div class="alert">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
</div>

<?php $this->endWidget(); ?>
</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#Address_latlng').on('change', function() {
		var latlng = $('#Address_latlng').val();
		var result = latlng.split(",");
		$('#Address_lat').val(result[0].trim());
		$('#Address_lng').val(result[1].trim());
	})
})
</script>