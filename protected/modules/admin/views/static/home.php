<?php
$this->breadcrumbs=array(
	'setting'=>array('/admin/setting/index'),
	'Home Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-home',
	'title'=>'Home',
	'subtitle'=>'Home Edit',
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<div class="row-fluid">
	<div class="span12">

		<div class="widget">
		<h4 class="widgettitle">Section Home Top 1</h4>
		<div class="widgetcontent">
			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>

				<?php if(Yii::app()->user->hasFlash('success')): ?>
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				<?php endif; ?>

				<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
				<?php $this->widget('ImperaviRedactorWidget', array(
				    'selector' => '.redactor',
				    'options' => array(
				        'imageUpload'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'image')),
				        'clipboardUploadUrl'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'clip')),
				    ),
				    'plugins' => array(
				        'clips' => array(
				        ),
				    ),
				)); ?>

				<?php $type = 'home_content_1'; ?>
				<?php Common::createSetting($type, 'Content 1', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
				<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>
				<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
				<span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				<?php endforeach ?>

				<?php $type = 'home_subtitle_1'; ?>
				<?php Common::createSetting($type, 'Subtitle', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
				<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>
				<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
				<span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				<?php endforeach ?>
				
				<div class="divider10"></div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
		</div>
		</div>

		<div class="widget">
		<h4 class="widgettitle">Section Content 2</h4>
		<div class="widgetcontent">
			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>
				<?php if(Yii::app()->user->hasFlash('success')): ?>
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				<?php endif; ?>

				<div class="row-fluid">
					<div class="span6">
						<?php $type = 'home2_subtitle'; ?>
						<?php Common::createSetting($type, 'Subtitle', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10 redactor" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

						<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
						<span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
						<?php endforeach ?>

						<?php /*$type = 'home2_content'; ?>
						<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

						<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
						<span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
						<?php endforeach*/ ?>
						
					</div>
					<div class="span6">
						<?php $type = 'home2_picture' ?>
						<?php Common::createSetting($type, 'Picture', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
						<p class="help-block">NOTE: Picture landscape width 646px X height 413px.</p>
						<?php if ($model[$type]['data']->value): ?>
						<div style="">
						<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
						</div>
						<div class="clearfix" style="height: 15px;"></div>
						<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>
					</div>
				</div>

			</div>
		</div>

		<div class="widget">
		<h4 class="widgettitle">Section Content 3</h4>
		<div class="widgetcontent">
			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>
				<?php if(Yii::app()->user->hasFlash('success')): ?>
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				<?php endif; ?>

				<?php $type = 'home3_title'; ?>
				<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
				<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

				<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
				<span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				<?php endforeach ?>

				<?php $type = 'home3_subtitle'; ?>
				<?php Common::createSetting($type, 'Subtitle', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
				<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

				<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
				<span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				<?php endforeach ?>

				<div class="row-fluid">
					<?php for ($i=1; $i < 5; $i++) { ?>
					<div class="span3">
						<?php $type = 'home3_icons_picture_'. $i ?>
						<?php Common::createSetting($type, 'Picture Icon', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
						<p class="help-block">NOTE: Picture potrait width. 90px height 90px.</p>
						<?php if ($model[$type]['data']->value): ?>
						<div style="">
						<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
						</div>
						<div class="clearfix" style="height: 15px;"></div>
						<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>

						<?php $type = 'home3_icons_title_'. $i; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

						<span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
						<span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
						<?php endforeach ?>

						<div class="clearfix"></div>
					</div>
					<?php } ?>
				</div>

				<div class="divider10"></div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
				
			</div>
		</div>

	</div>
</div>

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
<?php $this->endWidget(); ?>