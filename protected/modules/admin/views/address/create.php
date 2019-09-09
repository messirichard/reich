<?php
$this->breadcrumbs=array(
	'Store Location'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Store Location',
	'subtitle'=>'Add Store Location',
);

$this->menu=array(
	array('label'=>'List Store Location', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>