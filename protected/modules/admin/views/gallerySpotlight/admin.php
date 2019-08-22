<?php
$this->breadcrumbs=array(
	'Prd Gallery Highlights'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PrdGalleryHighlight','url'=>array('index')),
	array('label'=>'Add PrdGalleryHighlight','url'=>array('create')),
);
?>

<h1>Manage Prd Gallery Highlights</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'prd-gallery-highlight-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama',
		'product_id',
		'gallery_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
