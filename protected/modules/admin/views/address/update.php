<?php
$this->breadcrumbs=array(
	'Dealer Shop Location'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Dealer Shop Location',
	'subtitle'=>'Edit Dealer Shop Location',
);

$this->menu=array(
	array('label'=>'List Dealer Shop Location', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Dealer Shop Location', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Dealer Shop Location', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>