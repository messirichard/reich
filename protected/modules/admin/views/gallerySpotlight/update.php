<?php
$this->breadcrumbs=array(
	'Gallery Spotlight'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Gallery Spotlight',
	'subtitle'=>'Edit Gallery Spotlight',
);

$this->menu=array(
	array('label'=>'List Gallery Spotlight', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Gallery Spotlight', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Gallery Spotlight', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>