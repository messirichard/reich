<?php
$this->breadcrumbs=array(
	'Product Gallery'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-tag',
	'title'=>'Product Gallery',
	'subtitle'=>'Data Product Gallery',
);

$this->menu=array(
	array('label'=>'List Product Gallery', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Product Gallery', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Product Gallery', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'modelDesc'=>$modelDesc, 'modelImage'=>$modelImage)); ?>
