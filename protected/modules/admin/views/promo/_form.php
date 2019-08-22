<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'promo-form',
	// 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<style type="text/css">
.ui-datepicker-month, .ui-datepicker-year{
	width: auto;
}
</style>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
	<div class="span8">
		<div class="widget">
		<h4 class="widgettitle">Data Voucher</h4>
		<div class="widgetcontent">

			<?php echo $form->textFieldRow($model,'nama',array('class'=>'span10','placeholder'=>'Masukkan nama Voucher')); ?>

			<?php if ($model->scenario == 'insert'): ?>
			<?php echo $form->textFieldRow($model,'kode',array('class'=>'span10','placeholder'=>'Masukkan kode prefix')); ?>

			<?php echo $form->textFieldRow($model,'jml_voucher',array('class'=>'span10','placeholder'=>'Masukkan jumlah voucher yang ingin di generate, ex: 100', 'hint'=>'Note: Masukkan 1 jika voucher berlaku untuk semua orang, dan reusable: "Ya"')); ?>
			
			<?php echo $form->textFieldRow($model,'min_pembelian',array('class'=>'span10','placeholder'=>'Minimal pembelian, ex: 500000')); ?>

			<?php echo $form->dropDownListRow($model, 'type_potongan', array(
				'1'=>'Persen, masukkan nilai potongan 1-100, potongan otomatis dalam persen',
				'0'=>'Nominal, masukkan nilai potongan dengan harga potongan yang di inginkan',
			)); ?>

			<?php echo $form->textFieldRow($model,'potongan',array('class'=>'span10','placeholder'=>'masukkan angka 1-100 bila persen, masukkan nilai rupiah jika pilih nominal')); ?>
			
			<?php echo $form->textFieldRow($model,'aktif_dari',array('class'=>'span10 datepicker','placeholder'=>'Pilih tanggal aktif dari')); ?>
			
			<?php echo $form->textFieldRow($model,'aktif_sampai',array('class'=>'span10 datepicker','placeholder'=>'Pilih tanggal aktif')); ?>

			<?php echo $form->dropDownListRow($model, 'reusable', array(
				'0'=>'Tidak, Hanya 1 kali pakai',
				'1'=>'Ya, Bisa di pakai lagi',
			)); ?>
			<?php endif ?>

			<?php if ($model->scenario == 'update'): ?>
			<?php echo $form->textFieldRow($model,'kode',array('class'=>'span10','placeholder'=>'Masukkan kode prefix', 'disabled'=>'disabled')); ?>
			
			<?php echo $form->textFieldRow($model,'min_pembelian',array('class'=>'span10','placeholder'=>'Minimal pembelian, ex: 500000', 'disabled'=>'disabled')); ?>

			<?php echo $form->dropDownListRow($model, 'type_potongan', array(
				'1'=>'Persen, masukkan nilai potongan 1-100, potongan otomatis dalam persen',
				'0'=>'Nominal, masukkan nilai potongan dengan harga potongan yang di inginkan',
			), array('disabled'=>'disabled')); ?>

			<?php echo $form->textFieldRow($model,'potongan',array('class'=>'span10','placeholder'=>'masukkan angka 1-100 bila persen, masukkan nilai rupiah jika pilih nominal', 'disabled'=>'disabled')); ?>
			
			<?php echo $form->textFieldRow($model,'aktif_dari',array('class'=>'span10 datepicker','placeholder'=>'Pilih tanggal aktif dari', 'disabled'=>'disabled')); ?>
			
			<?php echo $form->textFieldRow($model,'aktif_sampai',array('class'=>'span10 datepicker','placeholder'=>'Pilih tanggal aktif', 'disabled'=>'disabled')); ?>

			<?php echo $form->dropDownListRow($model, 'reusable', array(
				'0'=>'Tidak, Hanya 1 kali pakai',
				'1'=>'Ya, Bisa di pakai lagi',
			), array('disabled'=>'disabled')); ?>
			<?php endif ?>
			
			<?php echo $form->dropDownListRow($model, 'aktif', array(
				'1'=>'Active',
				'0'=>'Non Active',
			)); ?>
			<br>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Create' : 'Save',
			)); ?>

		</div>
		</div>
		<div class="alert">
		  <button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
		</div>
	</div>
	<div class="span4">
	<?php if ($model->scenario == 'update'): ?>
		<div class="widget">
		<h4 class="widgettitle">Generated Voucher</h4>
		<div class="widgetcontent">
		<table>
			<tr>
				<th>Kode Voucher</th>
				<th>Terpakai</th>
			</tr>
			<?php foreach ($modelList as $key => $value): ?>
				<tr>
					<td><?php echo $value->kode ?></td>
					<td align="center"><?php if ($value->terpakai == 1): ?><i class="fa fa-check"></i><?php endif ?></td>
				</tr>
			<?php endforeach ?>
		</table>
		<?php if (count($modelList) > 1): ?>
		<?php echo $form->textFieldRow($model,'jml_voucher',array('class'=>'span10','placeholder'=>'ex: 100', 'hint'=>'Note: Masukkan jumlah voucher bila ingin menambah voucher baru')); ?>
		<?php endif ?>
			
		</div>
		</div>
	<?php endif ?>
	</div>
</div>


<?php $this->endWidget(); ?>
<script type="text/javascript">
jQuery('.datepicker').datepicker({
	'showAnim':'fold',
	'dateFormat': 'yy-mm-dd',
	'changeMonth': true,
	'changeYear': true,
	// 'showOn':'button',
	// 'buttonImage':'/surabaya/asset/images/icon-calender.png',
	// 'buttonImageOnly':true
});
</script>
