<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'prd-gallery-highlight-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="widget">
<h4 class="widgettitle">Data PrdGalleryHighlight</h4>
<div class="widgetcontent">


	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5')); ?>
	<?php 
	$criteria=new CDbCriteria;
	$criteria->with = array('description');
	$criteria->order = 'date DESC';
	$criteria->addCondition('status = "1"');
	$criteria->addCondition('description.language_id = :language_id');
	$criteria->params[':language_id'] = $this->languageID;

	$data_prd = PrdProduct::model()->findAll($criteria);
	$list_prd = CHtml::listData($data_prd, 
                'id', 'description.name');
	?>
	<?php echo $form->dropDownListRow($model,'product_id', $list_prd,array('class'=>'span5')); ?>

	<?php 
	$criteria=new CDbCriteria;
	$criteria->with = array('description');
	$criteria->order = 't.id DESC';
	$criteria->addCondition('description.language_id = :language_id');
	$criteria->params[':language_id'] = $this->languageID;

	$data_gal = Gallery::model()->findAll($criteria);
	$list_gal = CHtml::listData($data_gal, 
                'id', 'description.title');
	?>
	<?php echo $form->dropDownListRow($model,'gallery_id', $list_gal,array('class'=>'span5')); ?>

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
