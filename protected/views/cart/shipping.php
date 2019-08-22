<?php
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<div class="subpage_product">
  <section class="default_sc blocks_bannerBox_home back-whiteimp" id="block_homesection">
    <div class="clear height-20"></div>
    <div class="container defaults">
        <div class="bloc_breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
                <li class="breadcrumb-item active">My Cart</li>
              </ol>
            </nav>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="in_box_product back-white">
      <div class="prelatife container defaults">
        <div class="content-text text-center">
            <div class="clear height-30"></div>
            <h3>MY CART</h3>
        </div>
        <div class="insides padding-top-15 middles_inProduct_detail">

            <div class="outer-cont-carts"> 
        <div class="clear height-20"></div>
            <div class="row">
                <div class="col-md-60">
                    <div class="left-conts-tabl-cart content-text">
                        
                        <div id="cart-shop">

                        <div class="table-responsive">
                          <table class="table table-hover shopcart">
                              <thead>
                                  <tr>
                                      <td style="width: 51%;">ITEM</td>
                                      <td style="width: 24%;">ORDER DETAIL</td>
                                      <td>PRICE</td>
                                      <td>&nbsp;</td>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php $total = 0 ?>
                              <?php $weight = 0 ?>
                              <?php foreach ($data as $key => $value): ?>
                              <?php
                                        $product = PrdProduct::model()->findByPk($value['id']);
                                      if ($value['option'] != '') {
                                          $option = PrdProductAttributes::model()->find('id_str = :id', array(':id'=>$value['option']));
                                          $value['price'] = $option->price;
                            
                                          $dataHarga = PrdProduct::model()->price(array('harga'=>$value['price'], 'discount'=>$product->harga_retail), $this->setting);
                                          $value['price'] = $dataHarga['price'];

                                      }
                                        $weightItem = $product->berat;
                              ?>
                              <tr>
                                  <td>
                                      <div class="left pic">
                                          <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(70,100, '/images/product/'.$value['image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                                      </div>
                                      <div class="left nm-descr margin-left-20">
                                          <span class="name"><?php echo $value['name'] ?>
                                          <?php if ($option != null): ?>
                                              (<?php echo $option->attribute ?>)
                                          <?php endif ?>
                                          </span> <div class="clear height-3"></div>
                                          <?php if ($value['optional']['garansi'] != ''): ?>
                                          <?php
                                          $value['optional']['garansi'] =  explode('|', $value['optional']['garansi']);
                                          $value['price'] = $value['optional']['garansi'][0] + $value['price'];
                                          ?>
                                          <span class="cat"><?php echo $value['optional']['garansi'][1] ?></span>
                                          <?php endif ?>
                                      </div>
                                  </td>
                                  <td>
                                  <form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
                                    <?php if ($value['option'] != ''): ?>
                                    <?php //echo $option->attribute ?> <div class="clear height-5"></div>
                                    <input type="hidden" value="<?php echo $value['option'] ?>" name="option">
                                    <?php endif ?>
                                    <?php if ($value['optional']['box'] != ''): ?>
                                    With box + <?php echo Cart::money($value['optional']['box']) ?> <div class="clear height-5"></div>
                                    <?php
                                    $value['price'] = $value['optional']['box'] + $value['price'];
                                    ?>
                                    <?php endif ?>
                                  QTY &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $value['qty'] ?>
                                  <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                  <?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
                                      <?php foreach ($value['optional'] as $k => $v): ?>
                                      <input type="hidden" value="<?php echo $v ?>" name="option[<?php echo $k ?>]">
                                      <?php endforeach ?>
                                  <?php endif ?>
                                  </form>
                                  </td>
                                  <td>
                                  <span class="price"><?php echo Cart::money($subTotal = $value['price']*$value['qty']) ?></span>
                                  </td>
                                  <td>
                                      
                                  </td>
                              </tr>
                              <?php $total = $total + $subTotal ?>
                              <?php $weight = ($weightItem*$value['qty']) + $weight ?>
                              <?php endforeach ?>
                              <tr class="sub_total">
                                  <td class="h-0 pt-0">&nbsp;</td>
                                  <td class="text-right"><span class="totl">SUBTOTAL</span></td>
                                  <td><span class="price"><?php echo Cart::money($total) ?></span></td>
                                  <td class="h-0">&nbsp;</td>
                              </tr>
                              <tr class="sub_total">
                                  <td class="h-0 pt-0">&nbsp;</td>
                                  <td class="text-right"><span class="totl">DISKON</span></td>
                                  <?php
                                  $diskon = 0;
                                  ?>
                                  <?php if ($model2['discount_type'] == '0'): ?>
                                  <td><span class="price"><?php echo Cart::money($diskon = $model2['discount']) ?></span></td>
                                  <?php elseif($model2['discount_type'] == '1'): ?>
                                  <td><span class="price"><?php echo Cart::money($diskon = ($model2['discount']/100)*$total) ?></span></td>
                                  <?php else: ?>
                                  <td><span class="price"><?php echo Cart::money(0) ?></span></td>
                                  <?php endif ?>
                                  <td class="h-0">&nbsp;</td>
                              </tr>
                              <tr class="sub_total">
                                  <td class="h-0 pt-0">&nbsp;</td>
                                  <td class="text-right"><span class="totl">SUBTOTAL</span></td>
                                  <td><span class="price"><?php echo Cart::money($total - $diskon) ?></span></td>
                                  <td class="h-0">&nbsp;</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                        
                        <!-- start detail information -->
                        <div class="clear height-20"></div>
                        <div class="boxs_fill_information_order">
              <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                  'id'=>'shipping-form',
                  'type'=>'horizontal',
                  //'htmlOptions'=>array('class'=>'well'),
                'enableClientValidation'=>false,
                'clientOptions'=>array(
                  'validateOnSubmit'=>false,
                ),
              )); ?>
            <?php echo $form->errorSummary($model, '&nbsp; <br><b>Please fix this error</b>', '&nbsp;',array('class'=>'alert-danger text-center')); ?>
            <?php if(Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-info" role="alert">
                  <?php echo Yii::app()->user->getFlash('success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif; ?>

                            <div class="daftar-baru">
                                <div class="height-20"></div>
                                <h3>Please complete your data</h3>
                                <div class="basic-information">
                                <div class="height-20"></div>
                                <div class="row">
                                    <div class="col-md-30 col-sm-60">

                                            <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'shipping_first_name', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                <?php echo $form->textField($model, 'shipping_first_name', array('class'=>'form-control')); ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'shipping_last_name', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                <?php echo $form->textField($model, 'shipping_last_name', array('class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'phone', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                <?php echo $form->textField($model, 'phone', array('class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'email', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
                                                </div>
                                            </div>


                                    </div>
                                    <div class="col-md-30 col-sm-60">
                                             <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'shipping_address_1', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                    <?php echo $form->textArea($model, 'shipping_address_1', array('class'=>'form-control')); ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'shipping_city', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                <?php echo $form->textField($model, 'shipping_city', array('class'=>'form-control')); ?>
                                                                                                  </div>
                                            </div>

                                            <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'shipping_postcode', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                <?php echo $form->textField($model, 'shipping_postcode', array('class'=>'form-control')); ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'shipping_zone', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                <?php echo $form->textField($model, 'shipping_zone', array('class'=>'form-control')); ?>
                                                <?php //echo $form->dropDownList($model, 'shipping_zone',CHtml::listData(City::model()->findAll('1 GROUP BY province_id'),'province_id', 'province'), array('class'=>'form-control', 'empty'=>'Select State')) ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <?php echo $form->labelEx($model, 'comment', array('class'=>'col-sm-20 control-label')); ?>
                                                <div class="col-sm-40">
                                                    <?php echo $form->textArea($model, 'comment', array('class'=>'form-control')); ?>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="height-10"></div>
                            
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType'=>'submit',
                            'htmlOptions'=>array('class'=>"btn btn-primary d-inline-block mx-2", 'value'=>'bank', 'name'=>'submit'),
                            'label'=>'Pay With Bank Transfer',
                        )); ?>
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType'=>'submit',
                            'htmlOptions'=>array('class'=>"btn btn-primary d-inline-block mx-2", 'value'=>'doku', 'name'=>'submit'),
                            'label'=>'Pay With Doku',
                        )); ?>
                        <?php $this->endWidget(); ?>
                        <div class="clear"></div>
                        </div>
                        <!-- end detail information -->
                                                
                        <div class="clear"></div>
                        </div>
                        <!-- end testing html -->
                        
                        <?php /*
                        <div id="cart-shop" style="display:none;">
                        <?php if (count($data)>0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover shopcart">
                                <thead>
                                    <tr>
                                        <td>ITEM</td>
                                        <td style="width: 24%;">ORDER DETAIL</td>
                                        <td style="width: 20%;">PRICE</td>
                                        <td style="width: 3%;">&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0 ?>
                                <?php $weight = 0 ?>
                                <?php foreach ($data as $key => $value): ?>
                                <?php
                                        if ($value['option'] != '') {
                                            $option = PrdProductAttributes::model()->find('id_str = :id_str', array(':id_str'=>$value['option']));
                                            $value['price'] = $option->price;
                                        }
                                        $product = PrdProduct::model()->findByPk($value['id']);
                                        $weightItem = $product->berat;
                                ?>
                                <tr>
                                    <td>
                                        <div class="left pic">
                                            <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(70,100, '/images/product/'.$value['image'] , array('method' => 'resize', 'quality' => '90')) ?>" alt="">
                                        </div>
                                        <div class="left nm-descr margin-left-20">
                                            <span class="name"><?php echo $value['name'] ?></span> <div class="clear height-3"></div>
                                            <span class="cat"><?php echo ViewCategory::model()->find('id = :id', array(':id'=>$product->category_id))->name ?></span>
                                        </div>
                                    </td>
                                    <td>
                                    <form action="<?php echo CHtml::normalizeUrl(array('/product/edit')); ?>" method="post">
                                    <?php if ($value['option'] != ''): ?>
                                    <?php echo $option->attribute ?> <div class="clear height-5"></div>
                                    <input type="hidden" value="<?php echo $value['option'] ?>" name="option">
                                    <?php endif ?>
                                    <?php if ($value['optional']['box'] != ''): ?>
                                    With box + <?php echo Cart::money($value['optional']['box']) ?> <div class="clear height-5"></div>
                                    <?php
                                    $value['price'] = $value['optional']['box'] + $value['price'];
                                    ?>
                                    <?php endif ?>
                                    QTY &nbsp;&nbsp;&nbsp;&nbsp;<input type="number" class="tranparant-back select_qty" name="qty" value="<?php echo $value['qty'] ?>">
                                    <button type="submit" class="btn-edit-cart"><i class="fa fa-refresh"></i></button>
                                    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                                    <?php if (count($value['optional']) > 0 AND $value['optional'] != ''): ?>
                                        <?php foreach ($value['optional'] as $k => $v): ?>
                                        <input type="hidden" value="<?php echo $v ?>" name="optional[<?php echo $k ?>]">
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    </form>
                                    </td>
                                    <td>
                                    <span class="price"><?php echo Cart::money($subTotal = $value['price']*$value['qty']) ?></span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn back-btn-primary-blue btn-delete-cart"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <?php $total = $total + $subTotal ?>
                                <?php $weight = ($weightItem*$value['qty']) + $weight ?>
                                <?php endforeach ?>
                                <tr class="sub_total">
                                    <td>&nbsp;</td>
                                    <td class="text-right"><span class="totl">SUBTOTAL</span></td>
                                    <td><span class="price"><?php echo Cart::money($total) ?></span></td>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right fright">
                            <a href="<?php echo CHtml::normalizeUrl(array('shipping')); ?>" class="btn btn-primary">NEXT</a>
                        </div> 
                        <a href="<?php echo CHtml::normalizeUrl(array('/product/index')); ?>" class="btn btn-default">Back to Product</a>
                        <?php else: ?>
                        <h3>Shopping cart is empty</h3>
                        <?php endif; ?>
                        
                        <div class="clear"></div>
                        </div>
                        */ ?>
                       
                    </div>

                </div>
                <!-- end left content -->
            </div>

        <div class="clear height-50"></div><div class="height-20"></div>
            <div class="clear"></div>
    </div>
    <!-- end cont carts -->

          <div class="clear height-25"></div>
          <div class="clear"></div>
        </div>
        <!-- end insides -->
      </div>
    </div>
    <!-- End sub kategori -->

  </section>
  <div class="clear"></div>
</div>

<script type="text/javascript">
$('#OrOrder_shipping_zone').live('change', function() {
  $.ajax({
      type: "POST",
      url: "<?php echo CHtml::normalizeUrl(array('/cart/getTo')) ?>",
      dataType: "html",
      data: { province: $('#OrOrder_shipping_zone').val()}
  }).done(function( msg ) {
      $("#OrOrder_shipping_city").html(msg);
      $("#OrOrder_shipping_city").val('<?php echo $model->shipping_city ?>');

  })
})
$('#OrOrder_shipping_city').live('change', function() {
  $.ajax({
    type: "POST",
    url: "<?php echo CHtml::normalizeUrl(array('/cart/getShip')) ?>",
    dataType: "json",
    data: { province: $('#OrOrder_shipping_zone').val(), city: $('#OrOrder_shipping_city').val(), weight: <?php echo $weight ?>}
  }).done(function( msg ) {
    $("#OrOrder_delivery_package").html(msg.str);
    hiddenArray = msg.data;
  })
})
$("#OrOrder_delivery_package").live('change',function(){
  var total = <?php echo $total ?>;
  var harganya = hiddenArray[$("#OrOrder_delivery_package").val()].value;
  var diskon = <?php echo ($diskon == '') ? 0 : $diskon ?>;
  // console.log(hiddenArray[$(this).val()]);
  // for (i=0; i < hiddenArray.length ; i++) { 
  //  if(hiddenArray[i].service_code == $(this).val()){
  //    harganya = hiddenArray[i].value*1;
  //  }
  // }
  
  $('#shipping').html('Rp '+formatMoney(harganya, 0, '.', ','));
  $('#total_akhir').html('Rp '+formatMoney(total - diskon + harganya, 0, '.', ','));
  $('#OrOrder_delivery_price').val(harganya);
  $('#OrOrder_total').val(harganya + total)
  // $('#view_ongkir').html("Rp. "+harganya.formatMoney(2,'.',','));
  // $('#ContactForm_ongkir').val(harganya);
  // hitung();
});

if ($('#OrOrder_shipping_zone').val() != '') {
  $.ajax({
      type: "POST",
      url: "<?php echo CHtml::normalizeUrl(array('/cart/getTo')) ?>",
      dataType: "html",
      data: { province: $('#OrOrder_shipping_zone').val()}
  }).done(function( msg ) {
      $("#OrOrder_shipping_city").html(msg);
      $("#OrOrder_shipping_city").val('<?php echo $model->shipping_city ?>');
      if ($("#OrOrder_shipping_city").val() != '') {
        $.ajax({
          type: "POST",
          url: "<?php echo CHtml::normalizeUrl(array('/cart/getShip')) ?>",
          dataType: "json",
          data: { province: $('#OrOrder_shipping_zone').val(), city: $('#OrOrder_shipping_city').val(), weight: $('#OrOrder_delivery_weight').val()}
        }).done(function( msg ) {
          $("#OrOrder_delivery_package").html(msg.str);
          hiddenArray = msg.data;
        })
      };

  })
};

function formatMoney(n ,c, d, t){
    var c = isNaN(c = Math.abs(c)) ? 2 : c, 
        d = d == undefined ? "." : d, 
        t = t == undefined ? "," : t, 
        s = n < 0 ? "-" : "", 
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
        j = (j = i.length) > 3 ? j % 3 : 0;
       return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

function fill_data_shipping () {
 if($('#inlineRadio2:checked').val()==1){
     $('#OrOrder_shipping_first_name').val('');
     $('#OrOrder_email').val('');
     $('#OrOrder_phone').val('');
     $('#OrOrder_shipping_address_1').val('');
     $('#OrOrder_shipping_city').val('');
     $('#OrOrder_shipping_postcode').val('');
     $('#OrOrder_shipping_zone').val('');
 }else{
     $('#OrOrder_shipping_first_name').val('<?php echo $user->first_name ?>');
     $('#OrOrder_email').val('<?php echo $user->email ?>');
     $('#OrOrder_phone').val('<?php echo $user->hp ?>');
     $('#OrOrder_shipping_address_1').val('<?php echo $user->address ?>');
     $('#OrOrder_shipping_city').val('<?php echo $user->city ?>');
     $('#OrOrder_shipping_postcode').val('<?php echo $user->postcode ?>');
     $('#OrOrder_shipping_zone').val('<?php echo $user->province ?>');
 }
}
$('#inlineRadio2, #inlineRadio1').click(function(){
 fill_data_shipping();
})
</script>


