<?php
$this->breadcrumbs=array(
	'PDF'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'PDF',
	'subtitle'=>'Edit PDF',
);

$this->menu=array(
	array('label'=>'List PDF', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add PDF', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View PDF', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>