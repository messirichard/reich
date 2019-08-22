<?php
$this->breadcrumbs=array(
	'Gallery Spotlight',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Gallery Spotlight',
	'subtitle'=>'Data Gallery Spotlight',
);

$this->menu=array(
	array('label'=>'Add Gallery Spotlight', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Gallery Spotlight</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'prd-gallery-highlight-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'nama',
		// 'product_id',
		// 'gallery_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
