<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php echo $this->renderPartial('//layouts/_header', array()); ?>
<div class="clear"></div>
<div class="yellows_headBottoms"></div>
<div class="clear"></div>
<?php echo $content ?>

<?php echo $this->renderPartial('//layouts/_footer2', array()); ?>
<?php $this->endContent(); ?>