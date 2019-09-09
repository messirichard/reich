<?php
$this->breadcrumbs=array(
	'Store Location'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Store Location',
	'subtitle'=>'Edit Store Location',
);

$this->menu=array(
	array('label'=>'List Store Location', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Store Location', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Store Location', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>