<?php
$this->breadcrumbs=array(
	'Dealer Shop Location'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Dealer Shop Location',
	'subtitle'=>'Add Dealer Shop Location',
);

$this->menu=array(
	array('label'=>'List Dealer Shop Location', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>