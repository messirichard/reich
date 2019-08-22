<h2 class="text-right"><?php echo date( "d F Y", strtotime($model->date_add)); ?> (<?php echo OrOrderStatus::model()->findByPk($model->order_status_id)->name ?>)</h2>
<table width="100%">
	<tr>
        <td colspan="5"><h3 class="widgettitle">Customer details & Contact</h3></td>
	</tr>
	<tr>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</th>
        <td><?php echo CHtml::encode($model->email); ?></td>
        <td>&nbsp;</td>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('shipping_first_name')); ?>:</th>
        <td><?php echo CHtml::encode($model->shipping_first_name); ?></td>
	</tr>
	<tr>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('phone')); ?>:</th>
        <td><?php echo CHtml::encode($model->phone); ?></td>
        <td>&nbsp;</td>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('shipping_last_name')); ?>:</th>
        <td><?php echo CHtml::encode($model->shipping_last_name); ?></td>
	</tr>
	<tr>
        <th align="right">&nbsp;</th>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('shipping_address_1')); ?>:</th>
        <td><?php echo CHtml::encode($model->shipping_address_1); ?></td>
	</tr>
	<tr>
        <th align="right">&nbsp;</th>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('shipping_city')); ?>:</th>
        <td><?php echo CHtml::encode($model->shipping_city); ?></td>
	</tr>
	<tr>
        <th align="right">&nbsp;</th>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('shipping_postcode')); ?>:</th>
        <td><?php echo CHtml::encode($model->shipping_postcode); ?></td>
	</tr>
	<tr>
        <th align="right">&nbsp;</th>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('shipping_zone')); ?>:</th>
        <td><?php echo City::model()->find('province_id = :province_id GROUP BY province_id', array(':province_id'=>$model->shipping_zone))->province ?></td>
	</tr>
	<tr>
        <td colspan="5"><h3 class="widgettitle">Total</h3></td>
	</tr>

	<tr>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('total')); ?>:</th>
        <td><?php echo CHtml::encode(Cart::money($model->total)); ?></td>
        <td>&nbsp;</td>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('delivery_weight')); ?>:</th>
        <td><?php echo CHtml::encode($model->delivery_weight); ?> gram</td>
	</tr>
	<tr>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('discount_total')); ?>:</th>
        <td><?php echo CHtml::encode(Cart::money($model->discount_total)); ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
	</tr>
	<tr>
        <th align="right"><?php echo CHtml::encode($model->getAttributeLabel('grand_total')); ?>:</th>
        <td><?php echo CHtml::encode(Cart::money($model->grand_total)); ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
	</tr>
</table>
<h3 class="widgettitle">Data Product</h3>
<table width="100%">
	<?php foreach ($data as $key => $value): ?>
	<?php
	$dataSerialize = unserialize($value->data);
	?>
	<tr>
		<td width="20%">
			<img style="width: 100%; max-width: 200px;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
		</td>
		<td>
			<h3 class="title-product">
				<?php echo ucwords($value->name) ?>
				<?php if ($dataSerialize['garansi'][1] != ''): ?>
				<br>Garansi: <?php echo $dataSerialize['garansi'][1] ?>
				<?php endif ?>
			</h3>
            <table class="table table-bordered responsive table-slim">
            	<?php /*
                */ ?>
            	<thead>
                    <tr>
                        <th>Item Code</th>
                        <th>Option</th>
                        <th>Weight</th>
                    </tr>
            	</thead>
                <tbody>
                    <tr>
                        <td><?php echo $value->kode ?></td>
                        <td><?php echo $value->attributes_name ?></td>
                        <td><?php echo $value->berat ?></td>
                    </tr>
                </tbody>
            	<thead>
                    <tr>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                    </tr>
            	</thead>
                <tbody>
                    <tr>
                        <td><?php echo $value->qty ?></td>
                        <td>
                        	<?php echo Cart::money($value->price) ?>
	    					<?php if ($dataSerialize['box'] != ''): ?>
	    					+ <?php echo Cart::money($dataSerialize['box']) ?>
	    					<?php endif ?>
                        </td>
                        <td><?php echo Cart::money($value->total) ?></td>
                    </tr>
                </tbody>
            </table>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<script type="text/javascript">
window.print();
</script>