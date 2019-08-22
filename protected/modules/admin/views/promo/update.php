<?php
$this->breadcrumbs=array(
	'Voucher'=>array('index'),
	'Edit Voucher',
);
$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Voucher',
	'subtitle'=>'Update Voucher',
);

$this->menu=array(
	array('label'=>'List Voucher', 'icon'=>'th-list', 'url'=>array('index')),
	array('label'=>'Add Voucher', 'icon'=>'plus-sign', 'url'=>array('create')),
	// array('label'=>'View Voucher', 'icon'=>'eye-open', 'url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelList'=>$modelList)); ?>