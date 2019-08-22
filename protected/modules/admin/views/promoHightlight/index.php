<?php
$this->breadcrumbs=array(
	'Home Product Spot',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Home Spotlight',
	'subtitle'=>'Data Home Spotlight',
);

$this->menu=array(
	array('label'=>'Add Home Spotlight', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>
<?php endif; ?>
<h1>Home Spotlight</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'home-product-spot-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		// 'nama',
		array(
			'header'=>'Nama',
			'type'=>'raw',
			'value'=>'strip_tags($data->nama)',
		),
		array(
			'header'=>'Product',
			'type'=>'raw',
			'value'=>'HomeProductSpot::model()->getProductNames($data->product_id)',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
