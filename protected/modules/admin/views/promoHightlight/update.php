<?php
$this->breadcrumbs=array(
	'Home Product Spot'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Home Spotlight',
	'subtitle'=>'Edit Home Spotlight',
);

$this->menu=array(
	array('label'=>'List Home Spotlight', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Home Spotlight', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Home Spotlight', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>