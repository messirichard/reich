<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'home-product-spot-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>
<?php endif; ?>
<div class="widget">
<h4 class="widgettitle">Data HomeProductSpot</h4>
<div class="widgetcontent">
	<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
	<?php $this->widget('ImperaviRedactorWidget', array(
	    'selector' => '.redactor',
	    'options' => array(
	        'imageUpload'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'image')),
	        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'clip')),
	    ),
	    'plugins' => array(
	        'clips' => array(
	        ),
	    ),
	)); ?>

	<?php echo $form->textAreaRow($model,'nama',array('rows'=>2, 'class'=>'span8 redactor')); ?>

	<?php 
	// Lists gallery
	$criteria=new CDbCriteria;
	$criteria->with = array('description');
	$criteria->order = 'date DESC';
	$criteria->addCondition('status = "1"');
	$criteria->addCondition('description.language_id = :language_id');
	$criteria->params[':language_id'] = $this->languageID;
	$models = PrdProduct::model()->findAll($criteria);
	?>
	<div class="control-group "><label class="control-label required" for="HomeProductSpot_product_id">Product <span class="required">*</span></label>
		<div class="controls">
			<select class="form-control" name="HomeProductSpot[product_id]" id="HomeProductSpot_product_id">
				<option value="">-- Pilih Product --</option>
				<?php foreach ($models as $key => $value): ?>
					<?php if ($model->scenario == 'update'): ?>
					<option <?php if ($value->id == $model->product_id): ?>selected="selected"<?php endif ?> value="<?php echo $value->id ?>"><?php echo $value->description->name ?></option>
					<?php else: ?>
					<option value="<?php echo $value->id ?>"><?php echo $value->description->name ?></option>
					<?php endif ?>
				<?php endforeach ?>
			</select>
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
<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
jQuery(function( $ ) {
	$('.multilang').multiLang({
	});
})

</script>