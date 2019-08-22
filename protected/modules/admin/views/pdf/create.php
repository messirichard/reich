<?php
$this->breadcrumbs=array(
	'PDF'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'PDF',
	'subtitle'=>'Add PDF',
);

$this->menu=array(
	array('label'=>'List PDF', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>