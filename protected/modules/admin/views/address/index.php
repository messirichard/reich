<?php
$this->breadcrumbs=array(
	'Dealer Shop Location',
);

$this->pageHeader=array(
	'icon'=>'fa fa-bank',
	'title'=>'Dealer Shop Location',
	'subtitle'=>'Data Dealer Shop Location',
);

$this->menu=array(
	array('label'=>'Add Dealer Shop Location', 'icon'=>'plus-sign','url'=>array('create')),
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
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $form->textFieldRow($model,'nama',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Code')); ?>
		</div>
		<div class="span4">
			<?php echo $form->textFieldRow($model,'kota',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Name')); ?>
		</div>
		<?php /*<div class="span4">
			<label class="required" for="Address_type">Category</label>
			<select id="Address_type" name="Address[type]" class="input-block-level span12">
				<option value="">---- Choose type ----</option>
				<option value="asp">ASP</option>
				<option value="dealer">Dealer</option>
			</select>
		</div>*/ ?>
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


<h1>Dealer Shop Location</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'bank-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'prov',
		'kota',
		'nama',
		'type',
		// 'fax',
		'email',
		'sort',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
</div>
	<div class="span4">
		<?php $this->renderPartial('/setting/page_menu') ?>
	</div>
</div>