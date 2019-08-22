<?php
$this->breadcrumbs=array(
	'Product Gallery'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Product Gallery',
	'subtitle'=>'Data Product Gallery',
);

$this->menu=array(
	array('label'=>'List Product Gallery', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelImage'=>$modelImage)); ?>
