<?php
$this->breadcrumbs=array(
	'Gallery Spotlight'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Gallery Spotlight',
	'subtitle'=>'Add Gallery Spotlight',
);

$this->menu=array(
	array('label'=>'List Gallery Spotlight', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>