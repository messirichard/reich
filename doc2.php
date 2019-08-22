<?php $type = 'home_iconbrand' ?>
<?php Common::createSetting($type, 'Picture Icon', 'image', 'n') ?>
<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
<p class="help-block">NOTE: Picture landscape maxheight 32px.</p>
<?php if ($model[$type]['data']->value): ?>
<div style="">
<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
</div>
<div class="clearfix" style="height: 15px;"></div>
<div class="clearfix" style="height: 1px;"></div>
<?php endif ?>


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


<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>


------- 
statis no language

<?php $type = 'home3_short1_links' ?>
<?php Common::createSetting($type, 'Links', 'text', 'n') ?>
<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>


------- 

 style="background-image: url(<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1920,566, '/images/static/'. $this->setting['about_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>);"

<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600,980, '/images/'. $value->image2 , array('method' => 'adaptiveResize', 'quality' => '90')); ?>

<?php echo Yii::app()->baseUrl.ImageHelper::thumb(1920,566, '/images/static/'. $this->setting['about_hero_image'] , array('method' => 'adaptiveResize', 'quality' => '90')) ?>

<?php echo $this->setting['asdfasdf'] ?>