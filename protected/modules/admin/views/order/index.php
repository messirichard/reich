<?php
$session = new CHttpSession;
$session->open();


$this->breadcrumbs=array(
	'Order',
);
$this->pageHeader=array(
	'icon'=>'fa fa-fax',
	'title'=>'Order',
	'subtitle'=>'Data Order',
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
		<?php /*
		<div class="span3">
			<?php // echo $form->textFieldRow($model,'kode',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search Product Code')); ?>
		</div>
		*/ ?>
		<div class="span6">
			<?php echo $form->textFieldRow($model,'invoice_no',array('class'=>'span12','maxlength'=>200, 'placeholder'=>'Search No Invoice')); ?>
		</div>
		<div class="span6">
			<?php echo $form->dropDownListRow($model,'order_status_id',array(
	    		'1'=>'Pending',
	    		'2'=>'Processing',
	    		'3'=>'Shipped',
	    		'5'=>'Complete',
	    		'7'=>'Canceled',
	    		'14'=>'Expired',
	    		'11'=>'Refunded',
			),array('class'=>'span12','maxlength'=>200, 'empty'=>'All Status')); ?>
		</div>
	</div>
	
</script>

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
<h1>Users</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'or-order-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	// 'htmlOptions'=>array('class'=>''),
	'rowCssClassExpression'=>'($data->is_read == 0) ? "row-bold" : ""',
	'columns'=>array(
		array(
			'header'=>'Invoice',
			'type'=>'raw',
			'value'=>'CHtml::link($data->invoice_prefix."-".$data->invoice_no, array("/admin/order/detail", "id"=>$data->id))',
		),
		'email',
		'shipping_first_name',
		array(
			'header'=>'GRAND TOTAL',
			'type'=>'raw',
			'value'=>'Cart::money($data->grand_total)',
		),
		array(
			'header'=>'PROMO NAME',
			'type'=>'raw',
			'value'=>'$data->promo_name',
		),
		array(
			'header'=>'Order Status',
			'type'=>'raw',
			'value'=>'OrOrderStatus::model()->findByPk($data->order_status_id)->name',
		),
		// 'login_terakhir',
		// 'tanggal_input',
		// array(
		// 	'name'=>'aktif',
		// 	'filter'=>array(
		// 		'0'=>'No',
		// 		'1'=>'Yes',
		// 	),
		// 	'value'=>'($data->aktif=="1")? "Yes" : "No" ',
		// ),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{detail}',
			'header'=>'Action',
			'buttons'=>array(
				'detail' => array(
				    'label'=>'View',     // text label of the button
				    'url'=>'CHtml::normalizeUrl(array("/admin/order/detail", "id"=>$data->id))',       // a PHP expression for generating the URL of the button
				    'options'=>array('class'=>'btn'),
				),
			)
		),
	),
)); ?>
<style type="text/css">
tr.row-bold{
	font-weight: bold;
}
</style>