<?php
$this->breadcrumbs=array(
	' Customers',
);

$this->pageHeader=array(
	'icon'=>'fa fa-group',
	'title'=>'Customer',
	'subtitle'=>'Data Customer',
);

$this->menu=array(
	array('label'=>'Add Customer', 'icon'=>'th-list','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->textFieldRow($model,'email',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Code')); ?>
		</div>
		<div class="span4">
			<?php echo $form->textFieldRow($model,'hp',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Name')); ?>
		</div>
		<div class="span4">
			<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Name')); ?>
		</div>
	</div>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Search',
	)); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		// 'buttonType'=>'button',
		'type'=>'primary',
		'label'=>'Reset',
		'url'=>Yii::app()->createUrl($this->route),
	)); ?>

<?php $this->endWidget(); ?>

<h1>Customer</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cs-customer-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		array(
			'header'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link($data->email, array("update", "id"=>$data->id))',
		),
		// 'id',
		// 'email',
		// 'pass',
		'hp',
		'first_name',
		'last_name',
		// 'group_member_id',
		array(
			'name'=>'aktif',
			'filter'=>array(
				'0'=>'Non Active',
				'1'=>'Active',
			),
			'type'=>'raw',
			'value'=>'($data->aktif == "1") ? "Aktif" : "Tidak Aktif"',
		),
		'type',
		/*
		'last_login',
		'data',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}',
		),
	),
)); ?>
