<?php
$this->breadcrumbs=array(
	'Home Product Spot'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Home Spotlight',
	'subtitle'=>'Add Home Spotlight',
);

$this->menu=array(
	array('label'=>'List Home Spotlight', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>