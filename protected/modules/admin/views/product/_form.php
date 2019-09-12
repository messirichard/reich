<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'input-product-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
<?php $this->widget('ImperaviRedactorWidget', array(
    'selector' => '.redactor',
    'options' => array(
        'imageUpload'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'image')),
        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'clip')),
    ),
)); ?>
<div class="row-fluid">
	<div class="span8">
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Category</h4>
		    </div>
		    <div class="widgetcontent">
<?php
$arrayCategory = array();
foreach ($modelCategory as $key => $value) {
	array_push($arrayCategory, $value->category_id);
}
?>
				<div class="row-fluid">
					<div class="span5">
						<h5>Choose Category</h5>
						<select name="asd[]" multiple="multiple" id="multifilter" size="10" class="input-block-level">
							<?php 
							// PrdCategory::model()->deleteCategoryData();
							$dataCategory = (PrdCategory::model()->categoryTree('category', $this->languageID));
							echo PrdCategory::model()->createOption($dataCategory, '', '', $arrayCategory)
							// print_r($dataCategory);
							// exit;
							?>
							<?php /*
							<?php foreach ($dataCategory as $val): ?>
								<?php if (count($val['children']) > 0): ?>
								<optgroup label="<?php echo $val['title'] ?>">
									<?php foreach ($val['children'] as $k => $v): ?>
									<option value="<?php echo $v['id'] ?>" <?php if (in_array($v['id'], $arrayCategory)): ?>selected="selected"<?php endif ?>><?php echo $v['title'] ?></option>
									<?php endforeach ?>
								</optgroup>
								<?php else: ?>
								<option value="<?php echo $val['id'] ?>" <?php if (in_array($val['id'], $arrayCategory)): ?>selected="selected"<?php endif ?>><?php echo $val['title'] ?></option>
								<?php endif ?>
							<?php endforeach ?>
							*/ ?>
						</select>
					</div>
					<div class="span2">
						<div class="divider30"></div>
						<div class="divider30"></div>
						<button type="button" id="multifilter_rightAll" class="btn btn-small btn-fwidth"><i class="fa fa-forward"></i></button>
						<button type="button" id="multifilter_rightSelected" class="btn btn-small btn-fwidth"><i class="fa fa-chevron-right"></i></button>
						<button type="button" id="multifilter_leftSelected" class="btn btn-small btn-fwidth"><i class="fa fa-chevron-left"></i></button>
						<button type="button" id="multifilter_leftAll" class="btn btn-small btn-fwidth"><i class="fa fa-backward"></i></button>
					</div>
					<div class="span5">
						<h5>Selected Category</h5>
						<select name="PrdCategoryProduct[]" id="multifilter_to" multiple="multiple" size="10" class="input-block-level">
						</select>
					</div>
				</div>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/asset/js/multiselect/multiselect.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#multifilter').multiselect({
        search: {
            left: '<input type="text" name="q" class="form-control span12" placeholder="Search..." />',
            right: '<input type="text" name="q" class="form-control span12" placeholder="Search..." />',
        },
        fireSearch: function(value) {
            return value.length > 1;
        }
    });
    $('#multifilter_rightSelected').click();
});
</script>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Data Product</h4>
		    </div>
		    <div class="widgetcontent">
				<div class="multilang pj-form-langbar">
					<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
					<?php endforeach ?>
				</div>
				<div class="divider5"></div>

				<?php echo $form->errorSummary($model); ?>
				<?php echo $form->errorSummary($modelDesc, 'Please fix the following input errors:', 'Cek All Language'); ?>
				<?php if(Yii::app()->user->hasFlash('success')): ?>
				
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				
				<?php endif; ?>

				<div class="row-fluid">
					<div class="span4">
						<?php echo $form->textFieldRow($model,'kode',array('class'=>'input-block-level field', 'placeholder'=>'Your product code')); ?>
					</div>
					<?php /*
					<div class="span4">
					<?php echo $form->labelEx($model, 'category_id'); ?>
					<div class="controls">
						<select id="PrdProduct_category_id" name="PrdProduct[category_id]" class="input-block-level">
							<?php 
							$dataCategory = (PrdCategory::model()->categoryTree('category', $this->languageID));
							?>
							<option value="">---- Choose Category ----</option>
							<?php echo PrdCategory::model()->createOption($dataCategory) ?>
							<?php /*
							*/ ?>
							<?php /*
							<option value="">---- Choose Category ----</option>
							<?php foreach ($dataCategory as $key => $value): ?>
								<?php if (count($value['children']) > 0): ?>
								<optgroup label="<?php echo $value['title'] ?>">
									<?php foreach ($value['children'] as $k => $v): ?>
									<option value="<?php echo $v['id'] ?>"><?php echo $v['title'] ?></option>
									<?php endforeach ?>
								</optgroup>
								<?php else: ?>
								<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
								<?php endif ?>
							<?php endforeach ?>
							* / ?>
						</select>
					</div>
					<script type="text/javascript">
					$('#PrdProduct_category_id').val('<?php echo $model->category_id ?>');
					</script>
					</div>
					*/ ?>
					<div class="span4">
									<?php /*
						<?php 
							$criteria=new CDbCriteria;

							$criteria->select = "t.*, prd_brand_description.title";
							$criteria->join = "
							LEFT JOIN prd_brand_description ON prd_brand_description.brand_id=t.id
							";
							$criteria->addCondition('prd_brand_description.language_id = :language_id');
							$criteria->params = array(
								':language_id'=>$this->languageID,
							);
						?>
			        	<?php echo $form->dropDownListRow($model, 'brand_id', CHtml::listData(Brand::model()->findAll($criteria), 'id', 'title'), array('class'=>'span12', 'empty'=>'--- Choose Type ---')); ?>

						<?php echo $form->labelEx($model, 'data[material]'); ?>
				    	<div class="category-tempel">
				    		<?php foreach ($modelCategory as $key => $value): ?>
							<div class="controls">
								<select id="PrdCategoryProduct_<?php echo $key ?>" name="PrdCategoryProduct[]" class="input-block-level">
									<?php
									PrdCategory::model()->deleteCategoryData();
									$dataCategory = (PrdCategory::model()->categoryTree('filtercat', $this->languageID));
									print_r($dataCategory);
									?>
									<option value="">---- Choose Category ----</option>
									<?php echo PrdCategory::model()->createOption($dataCategory) ?>
									<option value="">---- Choose Category ----</option>
									<?php foreach ($dataCategory as $val): ?>
										<?php if (count($val['children']) > 0): ?>
										<optgroup label="<?php echo $val['title'] ?>">
											<?php foreach ($val['children'] as $k => $v): ?>
											<option value="<?php echo $v['id'] ?>"><?php echo $v['title'] ?></option>
											<?php endforeach ?>
										</optgroup>
										<?php else: ?>
										<option value="<?php echo $val['id'] ?>"><?php echo $val['title'] ?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
								<script type="text/javascript">
								$('#PrdCategoryProduct_<?php echo $key ?>').val('<?php echo $value->category_id ?>');
								</script>
							</div>
				    		<?php endforeach ?>
				    	</div>
									*/ ?>
									<?php /*
				    	<div class="category-add">
							<div class="controls">
								<select id="" name="PrdCategoryProduct[]" class="input-block-level">
									<?php 
									PrdCategory::model()->deleteCategoryData();
									$dataCategory = (PrdCategory::model()->categoryTree('filtercat', $this->languageID));
									// print_r($dataCategory);
									?>
									<option value="">---- Choose Category ----</option>
									<?php echo PrdCategory::model()->createOption($dataCategory) ?>
									<option value="">---- Choose Category ----</option>
									<?php foreach ($dataCategory as $val): ?>
										<?php if (count($val['children']) > 0): ?>
										<optgroup label="<?php echo $val['title'] ?>">
											<?php foreach ($val['children'] as $k => $v): ?>
											<option value="<?php echo $v['id'] ?>"><?php echo $v['title'] ?></option>
											<?php endforeach ?>
										</optgroup>
										<?php else: ?>
										<option value="<?php echo $val['id'] ?>"><?php echo $val['title'] ?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
							</div>
				    	</div>
				    	<a href="#" class="btn btn-primary tambah-category">Add Category</a>
			            <script type="text/javascript">
			            jQuery(function( $ ) {
							$('.tambah-category').tambahData({
								targetHtml: '.category-add',
								// html: '<tr><td></td></tr>',
								tambahkan: '.category-tempel',
							});
							$(document).on('click', '.delete-category',function( e ) {
								$(this).parent().remove();
								return false;
							})
						})
			            </script>
									*/ ?>

					</div>
				</div>


				<?php
				foreach ($modelDesc as $key => $value) {
					$lang = Language::model()->getName($key);
// $value->desc = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $value->desc);
// exit;
					?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

					<?php
					echo $form->labelEx($value, '['.$lang->code.']name');
				    echo $form->textField($value,'['.$lang->code.']name',array('class'=>'span11 form-input-nama-produk', 'placeholder'=>'Your Product Name'));
				    ?>
				    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
				    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				    <?php
				}
				?>
					

				<?php /*
				<?php
				foreach ($modelDesc as $key => $value) {
					$lang = Language::model()->getName($key);
					?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

					<?php
					echo $form->labelEx($value, '['.$lang->code.']subtitle');
				    echo $form->textArea($value,'['.$lang->code.']subtitle',array('class'=>'span11 form-input-nama-produk'));
				    ?>
				    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
				    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				    <?php
				}
				?>
				*/ ?>

				<?php
				foreach ($modelDesc as $key => $value) {
					$lang = Language::model()->getName($key);
					?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">
					<label class="required" for="PrdProductDescription_en_desc"><span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span> <?php ($label = PrdProductDescription::model()->attributeLabels()); echo $label['desc'] ?> <span class="required">*</span> </label>
					<?php
					// echo $form->labelEx($value, '['.$lang->code.']desc');
				    echo $form->textArea($value,'['.$lang->code.']desc',array('class'=>'redactor'));
				    ?>
				    
				    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				    <?php
				}
				?>
				
				<?php /*
				<?php
				foreach ($modelDesc as $key => $value) {
					$lang = Language::model()->getName($key);
					?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">
					<label class="required" for="PrdProductDescription_en_desc"><span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span> <?php ($label = PrdProductDescription::model()->attributeLabels()); echo $label['note'] ?> <span class="required">*</span> </label>
					<?php
					// echo $form->labelEx($value, '['.$lang->code.']note');
				    echo $form->textArea($value,'['.$lang->code.']note',array('class'=>'span5 redactor'));
				    ?>
				    
				    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				    <?php
				}
				?>
				*/ ?>

                <label>Label</label>
                <span class="formwrapper">
                	<?php echo $form->checkBox($model, 'onsale') ?> On Sale &nbsp;
                	<?php echo $form->checkBox($model, 'rekomendasi') ?> Trending Now &nbsp;
					<?php /*
                	<?php echo $form->checkBox($model, 'terbaru') ?> Terbaru &nbsp;
                	<?php echo $form->checkBox($model, 'out_stock') ?> Out Stock &nbsp;
                	<?php echo $form->checkBox($model, 'rekomendasi') ?> rekomendasi &nbsp;
                	<?php echo $form->checkBox($model, 'turun_harga') ?> Turun Harga &nbsp;
                	*/ ?>
                </span>

				<div class="divider10"></div>

				<!-- <div class="row-fluid">
					<div class="span3">
					<?php // echo $form->textFieldRow($model,'urutan',array('class'=>'input-block-level')); ?>
					</div>
				</div>
				 -->
				<div class="divider10"></div>

				<div class="row-fluid">
					<div class="span3">
						<?php echo $form->textFieldRow($model,'harga',array('class'=>'input-block-level')); ?>
					</div>
					<div class="span3">
						<?php echo $form->textFieldRow($model,'data[finish]',array('class'=>'input-block-level')); ?>
					</div>
					<div class="span3">
						<?php echo $form->textFieldRow($model,'data[download]',array('class'=>'input-block-level')); ?>
					</div>
					<?php /*
					<div class="span3">
						<?php echo $form->textFieldRow($model,'stock',array('class'=>'input-block-level',
						'hint'=>'Note: Masukkan Stock Barang')); ?>
					</div>
					*/ ?>
				</div>
				<div class="row-fluid">
					<div class="span3">
						<?php echo $form->textFieldRow($model,'data[material]',array('class'=>'input-block-level')); ?>
					</div>
					<div class="span6">
						<?php echo $form->textFieldRow($model,'berat',array('class'=>'input-block-level',
						'hint'=>'Note: Measurement in grams, for delivery estimation')); ?>
						<?php // echo $form->textFieldRow($model,'data[size]',array('class'=>'input-block-level')); ?>
					</div>
					
					<div class="span3">

					</div>
				</div>

						<?php /*
				<div class="row-fluid">
					<div class="span6">
						<?php echo $form->textAreaRow($model,'data[feature]',array('class'=>'input-block-level',
						'hint'=>'')); ?>
					</div>
					<div class="span6">
						<?php echo $form->textAreaRow($model,'data[qty_pack]',array('class'=>'input-block-level',
						'hint'=>'')); ?>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<?php echo $form->textFieldRow($model,'data[garansi_teks]',array('class'=>'input-block-level', 'placeholder'=>'ex: Tambahan Garansi 1 Tahun',
						'hint'=>'')); ?>
					</div>
					<div class="span6">
						<?php echo $form->textFieldRow($model,'data[garansi_nilai]',array('class'=>'input-block-level',
						'hint'=>'')); ?>
					</div>
				</div>
					<div class="span3">
						<?php echo $form->textFieldRow($model,'data[box]',array('class'=>'input-block-level',
						'hint'=>'Note: kosongkan jika tidak ada tambahan box')); ?>
					</div>
					<div class="span4">
						<?php echo $form->textFieldRow($model,'data[box]',array('class'=>'input-block-level',
						'hint'=>'')); ?>
					</div>
						*/ ?>
					<?php /*
				<div class="row-fluid">
					<div class="span4">
						<?php echo $form->textFieldRow($model,'data[material]',array('class'=>'input-block-level', 'placeholder'=>'')); ?>
					</div>
					<div class="span4">
						<?php echo $form->textFieldRow($model,'data[packing]',array('class'=>'input-block-level', 'placeholder'=>'Ukuran Kemasan',
						'hint'=>'')); ?>
					</div>
					<div class="span3">
						<?php echo $form->textFieldRow($model,'data[shipping]',array('class'=>'input-block-level',
						'hint'=>'')); ?>
					</div>
				</div>
					*/ ?>
				<?php /*
				<div class="row-fluid">
					
					<div class="span4">
						<?php echo $form->textFieldRow($model,'data[color]',array('class'=>'input-block-level', 'placeholder'=>'Warna Produk')); ?>
					</div>
					<div class="span4">
						<?php echo $form->textFieldRow($model,'data[feature]',array('class'=>'input-block-level', 'placeholder'=>'Fitur Kemasan',
						'hint'=>'')); ?>
					</div>
					<div class="span4">
						<?php echo $form->textFieldRow($model,'data[qty_pack]',array('class'=>'input-block-level',
						'hint'=>'')); ?>
					</div>

				</div>
						*/ ?>

				<div class="divider10"></div>
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Warning!</strong> Fields with <span class="required">*</span> are required.
				</div>

		    </div>
		</div>
		
		<!-- ----------------- Add Option ----------------- -->
		<?php /*
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Add Product Variations</h4>
		    </div>
		    <div class="widgetcontent">

                <h4 class="widgettitle">Product Variations</h4>
                <table class="table table-bordered responsive">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Kode</th>
                            <th>Berat(gram)</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="option-tempel">
                    	<?php foreach ($modelAttributes as $key => $value): ?>
                    		<?php if ($_GET['type'] == 'copy'): ?>
                    			<?php $value->id_str = '' ?>
                    		<?php endif ?>
                        <tr>
                            <td><input type="hidden" name="PrdProductAttributes[id_str][]" value="<?php echo $value->id_str ?>">
                            	<input type="text" name="PrdProductAttributes[attribute][]" value="<?php echo $value->attribute ?>" class="input-block-level"></td>
                            <td><input type="text" name="PrdProductAttributes[color][]" value="<?php echo $value->color ?>" class="input-block-level"></td>
                            <td><input type="text" name="PrdProductAttributes[kode][]" value="<?php echo $value->kode ?>" class="input-block-level"></td>
                            <td><input type="text" name="PrdProductAttributes[stock][]" value="<?php echo $value->stock ?>" class="input-block-level"></td>
                            <td><input type="text" name="PrdProductAttributes[price][]" value="<?php echo $value->price ?>" class="input-block-level"></td>
                            <td><button type="button" class="btn btn-danger delete-option"><i class="fa fa-trash-o"></i> Delete</button></td>
                        </tr>
                    	<?php endforeach ?>
                    </tbody>
                    <tbody class="option-add">
                        <tr>
                            <td><input type="hidden" name="PrdProductAttributes[id_str][]">
                            	<input type="text" name="PrdProductAttributes[attribute][]" class="input-block-level"></td>
                            <td><input type="text" name="PrdProductAttributes[color][]" class="input-block-level"></td>
                            <td><input type="text" name="PrdProductAttributes[kode][]" class="input-block-level"></td>
                            <td><input type="text" name="PrdProductAttributes[stock][]" class="input-block-level"></td>
                            <td><input type="text" name="PrdProductAttributes[price][]" class="input-block-level"></td>
                            <td><button type="button" class="btn btn-danger delete-option"><i class="fa fa-trash-o"></i> Delete</button></td>
                        </tr>
                    </tbody>
                </table>
				<div class="divider5"></div>
                <button type="button" class="btn btn-primary tambah-option">Add Product Variations</button>
				<!-- <div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  Bila harga di kosongkan maka akan tersetting sebagai harga default atau harga normal
				</div> -->
				<!-- <div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  Stock tidak mengikat, hanya sebagai catatan penjual
				</div> -->
                <script type="text/javascript">
                jQuery(function( $ ) {
					$('.tambah-option').tambahData({
						targetHtml: '.table tbody.option-add',
						// html: '<tr><td></td></tr>',
						tambahkan: '.table tbody.option-tempel',
					});
					$(document).on('click', '.delete-option',function( e ) {
						$(this).parent().parent().remove();
						return false;
					})
				})

                </script>
		    </div>
		</div>

		
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Styles Gallery</h4>
		    </div>
		    <div class="widgetcontent">
		    	<?php
				foreach ($modelDesc as $key => $value) {
					$lang = Language::model()->getName($key);
					?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">
					<label class="required" for="PrdProductDescription_en_desc"><span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span> <?php ($label = PrdProductDescription::model()->attributeLabels()); echo $label['note'] ?> <span class="required">*</span> </label>
					<?php
					// echo $form->labelEx($value, '['.$lang->code.']note');
				    echo $form->textArea($value,'['.$lang->code.']note',array('class'=>'redactor'));
				    ?>
				    
				    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				    <?php
				}
				?>
		    	<div class="clearfix clear"></div>
		    </div>
		</div>

		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Product Spotlight Gallery</h4>
		    </div>
		    <div class="widgetcontent">
		    	<?php
		    	$models = ViewGallery::model()->findAll();
			    $lists_gallery = CHtml::listData($models, 
			                'id', 'title'); 
			    if ($model->scenario == 'update') {
			    	$model->gallery_id = $modelGalspot->gallery_id;
			    }
		    	?>
				<?php echo $form->dropDownListRow($model,'gallery_id', $lists_gallery,array('class'=>'input-block-level', 'empty'=>'-- Pilih Gallery --')); ?>
		    	<div class="clearfix clear"></div>
		    </div>
		</div>*/ ?>

		<?php /*
		<!-- ----------------- SEO Tools ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">SEO Tools</h4>
		    </div>
		    <div class="widgetcontent">
				<div class="multilang pj-form-langbar">
					<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
					<?php endforeach ?>
				</div>
				<div class="divider5"></div>
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  If left empty, system will set automatically by default
				</div>

				<?php
				foreach ($modelDesc as $key => $value) {
					$lang = Language::model()->getName($key);
					?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

					<?php
					echo $form->labelEx($value, '['.$lang->code.']meta_title');
				    echo $form->textField($value,'['.$lang->code.']meta_title',array('class'=>'span11'));
				    ?>
				    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
				    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>

					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

					<?php
					echo $form->labelEx($value, '['.$lang->code.']meta_desc');
				    echo $form->textArea($value,'['.$lang->code.']meta_desc',array('class'=>'span11'));
				    ?>
				    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
				    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>

					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">

					<?php
					echo $form->labelEx($value, '['.$lang->code.']meta_key');
				    echo $form->textArea($value,'['.$lang->code.']meta_key',array('class'=>'span11'));
				    ?>
				    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
				    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				    <?php
				}
				?>
		    </div>
		</div>
		*/ ?>
		<div class="divider5"></div>
	</div>
	<div class="span4">
		<!-- ----------------- Action ----------------- -->
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo Common::createFormDatePick('Date Input', 'Date', 'date', $model->date_input) ?>
	        	<?php echo $form->dropDownListRow($model, 'status', array(
	        		'1'=>'Show',
	        		'0'=>'Hide',
	        	), array('class'=>'span12')); ?>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Save And Add Item' : 'Save Item',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Cancel',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php if ($model->scenario == 'update'): ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('update', 'id'=>$model->id, 'type'=>'copy')),
					'label'=>'Copy',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php endif ?>
		    </div>
		</div>

		<!-- ----------------- Gambar Utama ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Main Image</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image',array(
				'hint'=>'<b>Note:</b> Image size is 600 x 600px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600,600, '/images/product/'.$model->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>
		
		<?php /*
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Main Image Angle 2</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image2',array(
				'hint'=>'<b>Note:</b> Image size is 600 x 600px. Larger image will be automatically cropped.', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update' AND $model->image2 != ''): ?>
				<img style="width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(600,600, '/images/product/'.$model->image2 , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>
		*/ ?>

		<!-- ----------------- Gambar Tambahan ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <div class="btn-group">
		            <a class="btn tambah-gambar" href="#"><span class="fa fa-plus-circle"></span> &nbsp;Add Image</a>
		        </div>
		        <h4 class="widgettitle">Aditional Picture</h4>
		    </div>
		    <div class="widgetcontent">
		    	<div class="gambar-tempel"></div>
		    	<div class="gambar-add">
					<input type="file" name="PrdProductImage[][image]" style="width: 100%;">
					<div class="divider10"></div>
		    	</div>
		    	<p class="help-block"><b>Note:</b> Image size is 600 x 600px. Larger image will be automatically cropped.</p>
				<style>
					#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
					#sortable li { margin: 5px 2.5%; float: left; width: 20%; text-align: center; }
					#sortable li img {width: 96%; border: 2px solid red;}
				</style>
				<ul id="sortable">
					<?php foreach ($modelImage as $key => $value): ?>
					<li class="ui-state-default">
						<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/product/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
						<a href="#" class="delete-gambar"><i class="fa fa-trash-o"></i></a>
						<input type="hidden" name="PrdProductImage2[]" value="<?php echo $value->image ?>">
					</li>
					<?php endforeach ?>
				</ul>
	            <script type="text/javascript">
	            jQuery(function( $ ) {
					$('.tambah-gambar').tambahData({
						targetHtml: '.gambar-add',
						// html: '<tr><td></td></tr>',
						tambahkan: '.gambar-tempel',
					});
					$( "#sortable" ).sortable();
					$( "#sortable" ).disableSelection();
					$(document).on('click', '.delete-gambar',function( e ) {
						$(this).parent().remove();
						return false;
					})
				})
	            </script>
				<div class="divider5"></div>
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  Drag and drop images to sort
				</div>
		    </div>
	    </div>

		<?php /*
		<!-- ----------------- Warna ----------------- -->
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <div class="btn-group">
		            <a class="btn tambah-gambar2" href="#"><span class="fa fa-plus-circle"></span> &nbsp;Tambah Gambar</a>
		        </div>
		        <h4 class="widgettitle">Warna</h4>
		    </div>
		    <div class="widgetcontent">
		    	<div class="gambar2-tempel"></div>
		    	<div class="gambar2-add">
		    		<b>Gambar</b> <br>
					<input type="file" name="PrdProductColor[image][]" style="width: 100%;">
					<div class="divider5"></div>
					<b>Gambar Warna ukuran 21 x 21 px</b> <br>
		    		<input type="file" name="PrdProductColor[image_color][]" style="width: 100%;">
					<div class="divider5"></div>
					<b>Label Warna</b> <br>
					<input type="text" name="PrdProductColor[label][]">
					<div class="divider10"></div>
		    	</div>
				<style>
					#sortable2 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
					#sortable2 li { margin: 5px 2.5%; float: left; width: 20%; text-align: center; }
					#sortable2 li img {width: 96%; border: 2px solid red;}
				</style>
				<ul id="sortable2">
					<?php foreach ($modelColor as $key => $value): ?>
					<li class="ui-state-default">
						<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/product_color/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
						<a href="#" class="delete-gambar2"><i class="fa fa-trash-o"></i></a>
						<input type="hidden" name="PrdProductColor2[image][]" value="<?php echo $value->image ?>">
						<input type="hidden" name="PrdProductColor2[image_color][]" value="<?php echo $value->image_color ?>">
						<input type="hidden" name="PrdProductColor2[label][]" value="<?php echo $value->label ?>">
					</li>
					<?php endforeach ?>
				</ul>
	            <script type="text/javascript">
	            jQuery(function( $ ) {
					$('.tambah-gambar2').tambahData({
						targetHtml: '.gambar2-add',
						// html: '<tr><td></td></tr>',
						tambahkan: '.gambar2-tempel',
					});
					$( "#sortable2" ).sortable();
					$( "#sortable2" ).disableSelection();
					$(document).on('click', '.delete-gambar2',function( e ) {
						$(this).parent().remove();
						return false;
					})
				})
	            </script>
				<div class="divider5"></div>
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  Drag atau geser gambar untuk mengurutkan
				</div>

		    </div>
		</div>
		*/ ?>
	</div>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
jQuery(function( $ ) {
	$('.multilang').multiLang({
	});
})
</script>

