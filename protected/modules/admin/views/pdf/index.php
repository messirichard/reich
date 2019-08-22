<?php
$this->breadcrumbs=array(
	'PDF',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'PDF',
	'subtitle'=>'Data PDF',
);

$this->menu=array(
	array('label'=>'Add PDF', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<div class="row-fluid">
	<div class="span8">
<h1>PDF</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		// 'ib_bank',
		'nama',
		'sort',
		'file',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
			// 'deleteButtonUrl'=>'CHtml::normalizeUrl(array("delete", "id"=>$data->id, "category"=>"'.$_GET['category'].'"))',
			// 'updateButtonUrl'=>'CHtml::normalizeUrl(array("update", "id"=>$data->id, "category"=>"'.$_GET['category'].'"))',
		),
	),
)); ?>
</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>