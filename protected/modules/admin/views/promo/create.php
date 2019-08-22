<?php
$this->breadcrumbs=array(
	'Voucher'=>array('index'),
	'Add',
);
$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Voucher',
	'subtitle'=>'Tambah Voucher',
);

$this->menu=array(
	array('label'=>'List Voucher', 'icon'=>'th-list', 'url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>