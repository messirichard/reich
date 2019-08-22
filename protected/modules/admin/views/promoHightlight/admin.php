<?php
$this->breadcrumbs=array(
	'Home Product Spots'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HomeProductSpot','url'=>array('index')),
	array('label'=>'Add HomeProductSpot','url'=>array('create')),
);
?>

<h1>Manage Home Product Spots</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'home-product-spot-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama',
		'product_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
