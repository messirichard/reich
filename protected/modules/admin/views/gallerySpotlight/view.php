<?php
$this->breadcrumbs=array(
	'Prd Gallery Highlights'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PrdGalleryHighlight', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add PrdGalleryHighlight', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit PrdGalleryHighlight', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PrdGalleryHighlight', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View PrdGalleryHighlight #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'product_id',
		'gallery_id',
	),
)); ?>
