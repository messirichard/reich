<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'blog-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
	<div class="widget">
		<!-- <h4 class="widgettitle">Data Pages</h4> -->
		<div class="widgetcontent">

			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>

			<?php echo $form->errorSummary($model); ?>
			<?php echo $form->errorSummary($modelDesc, 'Please fix the following input errors:', 'Periksa di semua bahasa'); ?>
			<?php if(Yii::app()->user->hasFlash('success')): ?>
			
			    <?php $this->widget('bootstrap.widgets.TbAlert', array(
			        'alerts'=>array('success'),
			    )); ?>
			
			<?php endif; ?>

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

			<?php echo Common::createFormDatePick('Date Input', 'Date', 'date', $model->date_input) ?>

			<?php
			foreach ($modelDesc as $key => $value) {
				$lang = Language::model()->getName($key);
				?>
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

				<?php
				echo $form->labelEx($value, '['.$lang->code.']title');
			    echo $form->textField($value,'['.$lang->code.']title',array('class'=>'span8'));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				<?php /*
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

				<?php
				echo $form->labelEx($value, '['.$lang->code.']quote');
			    echo $form->textArea($value,'['.$lang->code.']quote',array('class'=>'span11'));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				*/ ?>

				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

				<?php
				echo $form->labelEx($value, '['.$lang->code.']content');
			    echo $form->textArea($value,'['.$lang->code.']content',array('class'=>'span5 redactor'));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
			    <?php
			}
			?>
			<?php 
			// $criteria2=new CDbCriteria;
			// $criteria2->with = array('description');
			// $criteria2->order = 'date DESC';
			// $criteria2->addCondition('status = "1"');
			// $criteria2->addCondition('description.language_id = :language_id');
			// $criteria2->params[':language_id'] = $this->languageID;
			// $listProduct = PrdProduct::model()->findAll($criteria2);
			// $res_product = array();
			// foreach ($listProduct as $key => $value) {
			// 	$res_product[$value->id] = $value->description->name;
			// }
			$res_product = array(
							1=>'Tips & Trik',
							2=>'Artikel',
							3=>'Berita',
							);
			?>
			<?php echo $form->textFieldRow($model, 'link', array('class'=>'form-control span6',)); ?>
			
			<?php echo $form->dropDownListRow($model, 'topik_id', $res_product , array('class'=>'form-control span6', 'empty'=>'-- Pilih Topik --')); ?>


			<?php echo $form->fileFieldRow($model,'image',array(
			'hint'=>'<b>Note:</b> Ukuran gambar adalah 1080 x 725px. Gambar yang lebih besar akan ter-crop otomatis, tolong upload foto ukuran horizontal')); ?>
			<?php if ($model->scenario == 'update'): ?>
			<div class="control-group">
				<label class="control-label">&nbsp;</label>
				<div class="controls">
				<div style="max-width: 25%;">
				<img class="img-polaroid" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1080,730, '/images/blog/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				</div>
				</div>
			</div>
			<?php endif; ?>

        	<?php echo $form->dropDownListRow($model, 'active', array(
        		'1'=>'Di Tampilkan',
        		'0'=>'Di Sembunyikan',
        	)); ?>
		</div>
	<!-- span 12 -->
	</div>
		<div class="clear"></div>
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