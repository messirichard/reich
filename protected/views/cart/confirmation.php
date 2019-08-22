<?php
$session = new CHttpSession;
$session->open();
?>
<div class="subpage product">

  <div class="prelatife container">

    <div class="clear height-20"></div>
    <div class="container defaults">
        <div class="bloc_breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">Home</a></li>
                <li class="breadcrumb-item active">Confirmation</li>
              </ol>
            </nav>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>


    <div class="outer-cont-carts"> 
        <div class="clear height-20"></div>

		<div class="blocks_border_defaults block-thanks-order my-3">
			<div class="ins text-center">
				<div class="top">
					<h2>Thank you for your order</h2>
				</div>
				<div class="middle content-text">
					<div class="clear height-25"></div>
					<p>Please complete your shopping process <br> by a bank transfer to this bank account details:</p>
          <?php if ($bank): ?>
            <?php foreach ($bank as $key => $value): ?>
              <?php 
              $name_bank = ListBank::model()->find('t.id = :ids', array(':ids'=>$value->id_bank))->nama;
              ?>
            <p><?php echo '<b>'.strtoupper($name_bank).'</b>'; ?> <br> <?php echo $value->rekening ?> - <?php echo $value->nama ?></p>
            <?php endforeach ?>
          <?php endif ?>
          

					<p>And please confirm your transfer via SMS / Phone number <?php echo $this->setting['contact_phone'] ?> <br>
						or email to <?php echo $this->setting['contact_email'] ?> with mentioning your invoice number.</p>

					<p>We will deliver the goods as soon as you confirm your payments.</p>

					<h5><a class="btn btn-light" href="<?php echo CHtml::normalizeUrl(array('/member/vieworder', 'nota'=>$_GET['nota'])); ?>">See your order here</a></h5>
					<div class="clear"></div>
				</div>
			</div>
		</div>
        <div class="clear height-50"></div><div class="height-20"></div>
            <div class="clear"></div>
    </div>


    <div class="clear"></div>
  </div>
</div>







