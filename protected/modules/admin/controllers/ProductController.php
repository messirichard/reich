<?php

class ProductController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('admin.filter.AuthFilter', 
				'params'=>array(
					'actionAllowOnLogin'=>array('upload'),
				)
			),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCreate2()
	{
		// if(isset($_POST['Url']))
		// {
			set_time_limit(0);
			$link = array(

			);
			foreach ($link as $url) {
				Yii::import('ext.SimpleHTMLDOM.SimpleHTMLDOM');
				// Create DOM from URL or file
				$simpleHTML = new SimpleHTMLDOM;
				$html = $simpleHTML->file_get_html($url);

				$title =  $html->find('h1', 0)->plaintext;
				$kode =  $html->find('.skufloat', 0)->plaintext;
				$description = trim(preg_replace('#<a(.*?)</a>#', '', $html->find('.description .std', 0)->innertext));
				$price = trim(preg_replace('#\£#', '', $html->find('.price', 0)->innertext));
				$gambar = array();
				foreach ($html->find('#thumbs img[alt="Click to view"]') as $key => $value) {
					$gambar[] = preg_replace('#thumbnail/50x50#', 'image/1000x1000', $value->src);;
				}
				$gambar_baru = array();
				foreach ($gambar as $key => $value) {
					$nama_file = Slug::create($title).'-'.rand().'.jpg';
					copy($value, Yii::getPathOfAlias('webroot').'/images/product/'.$nama_file);
					$gambar_baru[] = $nama_file;
				}
				$model= new PrdProduct;
				$model->date_input = date("Y-m-d H:i:s");
				$model->date_update = date("Y-m-d H:i:s");
				$model->date = date("Y-m-d H:i:s");
				$model->data = serialize(array());
				$model->kode = $kode;
				$model->harga = $price * 20000;
				$model->harga_coret = ($price * 20000) + ((rand(0, 4)*5)/100 * $price * 20000);
				$model->berat = 500;
				$model->stock = 10;
				$model->status = 1;
				$model->image = $gambar_baru[0];
				$model->category_id = 6;
				$model->brand_id = 5;
				$model->save(false);

				foreach ($gambar_baru as $key => $value) {
					if ($key > 0) {
						$modelImage = new PrdProductImage;
						$modelImage->image = $value;
						$modelImage->product_id = $model->id;
						$modelImage->save(false);
					}
				}

				$ring[] = 'Size:J';
				$ring[] = 'Size:L';
				$ring[] = 'Size:N';
				$ring[] = 'Size:P';
				foreach ($ring as $key => $value) {
					$modelAttributes = new PrdProductAttributes;
					$modelAttributes->id_str = '';
					$modelAttributes->product_id = $model->id;
					$modelAttributes->stock = 1;
					$modelAttributes->price = $model->harga;
					$modelAttributes->attribute = $value;
					$modelAttributes->save(false);
					$modelAttributes->id_str = $modelAttributes->id;
					$modelAttributes->save(false);
				}
				unset($ring);

				$modelDesc = new PrdProductDescription;
				$modelDesc->product_id=$model->id;
				$modelDesc->language_id=2;
				$modelDesc->name=$title;
				$modelDesc->desc=$description;
				$modelDesc->save(false);
			}

			$this->redirect(array('update','id'=>$model->id));

		// }
		// $this->render('buat',array(
		// ));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model= new PrdProduct;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = new PrdProductDescription;
		}

		$modelAttributes = array();

		$modelImage = array();

		$modelColor = array();

		$modelCategory = array();

		if(isset($_POST['PrdProduct']))
		{
			$model->setAttributes($_POST['PrdProduct']);

			//validation Layanan Description
			unset($modelDesc);
			$valid=true;

			foreach ($_POST['PrdProductDescription'] as $j => $mod) {
	            if (isset($_POST['PrdProductDescription'][$j])) {
	                $modelDesc[$j]=new PrdProductDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			unset($modelAttributes);
			if (count($_POST['PrdProductAttributes']['attribute']) > 0) {
				foreach ($_POST['PrdProductAttributes']['attribute'] as $key => $value) {
					$modelAttributes[$key] = new PrdProductAttributes;
					if ($value != '') {
						$modelAttributes[$key]->product_id = $model->id;
						$modelAttributes[$key]->stock = $_POST['PrdProductAttributes']['stock'][$key];
						if ($_POST['PrdProductAttributes']['price'][$key] == '') {
							$modelAttributes[$key]->price = $model->harga;
						}else{
							$modelAttributes[$key]->price = $_POST['PrdProductAttributes']['price'][$key];
						}
						$modelAttributes[$key]->attribute = $value;
					}
					
				}
			}

			$model->date = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			$image = CUploadedFile::getInstance($model,'image');
			$model->image = substr(md5(time()),0,5).'-'.$image->name;

			$image2 = CUploadedFile::getInstance($model,'image2');
			if ($image2->name != '') {
				$model->image2 = substr(md5(time()),0,5).'-'.$image2->name;
			}

			$model->data = $_POST['PrdProduct']['data'];

			// $model->kode = $_POST['PrdProduct']['kode'];
			// print_r($model->kode);
			// var_dump($model->validate());
			// print_r($model->attributes);
			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$model->image);

					if ($image2->name != '') {
						$image2->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$model->image2);
					}

					$model->date_input = date("Y-m-d H:i:s");
					$model->date_update = date("Y-m-d H:i:s");
					// $model->insert_by = Yii::app()->user->name;
					// $model->last_update_by = Yii::app()->user->name;
					$model->data = serialize($model->data);
					$tag = PrdCategory::model()->getBreadcrump($model->category_id, $this->languageID);
					$dataTag = array();
					foreach ($tag as $key => $value) {
						$dataTag[] = $key;
					}
					// $model->tag = implode(', ', $dataTag);

					$model->save();

					if (count($_FILES['PrdProductImage']['name']) > 0) {
						foreach ($_FILES['PrdProductImage']['name'] as $key => $value) {
							$modelImage = new PrdProductImage;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$modelImage->image);
								$modelImage->product_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					if (count($_FILES['PrdProductColor']['name']['image']) > 0) {
						foreach ($_FILES['PrdProductColor']['name']['image'] as $key => $value) {
							$modelImage = new PrdProductColor;
							$image = CUploadedFile::getInstance($modelImage,'[image]'.$key.'');
							$imageColor = CUploadedFile::getInstance($modelImage,'[image_color]'.$key.'');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$modelImage->image_color = substr(md5(time()),0,5).'-'.$imageColor->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product_color/'.$modelImage->image);
								$imageColor->saveAs(Yii::getPathOfAlias('webroot').'/images/product_color/'.$modelImage->image_color);
								$modelImage->product_id = $model->id;
								$modelImage->label = $_POST['PrdProductColor']['label'][$key];
								$modelImage->save(false);
							}
							
						}
					}

					PrdProductDescription::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->product_id=$model->id;
						$value->save();
					}

					PrdProductAttributes::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdProductAttributes']['attribute']) > 0) {
						foreach ($_POST['PrdProductAttributes']['attribute'] as $key => $value) {
							$modelAttributes[$key] = new PrdProductAttributes;
							if ($value != '') {
								$modelAttributes[$key]->id_str = $_POST['PrdProductAttributes']['id_str'][$key];
								$modelAttributes[$key]->product_id = $model->id;
								if ($_POST['PrdProductAttributes']['kode'][$key] != '') {
									$modelAttributes[$key]->kode = $_POST['PrdProductAttributes']['kode'][$key];
								}else{
									$modelAttributes[$key]->kode = $model->kode.$value;
								}
								if ($_POST['PrdProductAttributes']['stock'][$key] == '') {
									$modelAttributes[$key]->stock = $model->berat;
								}else{
									$modelAttributes[$key]->stock = $_POST['PrdProductAttributes']['stock'][$key];
								}
								if ($_POST['PrdProductAttributes']['price'][$key] == '') {
									$modelAttributes[$key]->price = $model->harga;
								}else{
									$modelAttributes[$key]->price = $_POST['PrdProductAttributes']['price'][$key];
								}
								if ($_POST['PrdProductAttributes']['color'][$key] == '') {
									$modelAttributes[$key]->color = $model->harga;
								}else{
									$modelAttributes[$key]->color = $_POST['PrdProductAttributes']['color'][$key];
								}
								$modelAttributes[$key]->attribute = $value;
								$modelAttributes[$key]->save(false);
								$modelAttributes[$key]->id_str = $modelAttributes[$key]->id;
								$modelAttributes[$key]->save(false);
							}
							
						}
					}

					// data tag
					$dataTag = array();
					$dataBrand = Brand::model()->findByPk($model->brand_id);
					$dataTag[] = $dataBrand->description->title;
					$dataTag[] = 'brand='.$dataBrand->kode;

					PrdCategoryProduct::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdCategoryProduct']) > 0) {
						foreach ($_POST['PrdCategoryProduct'] as $key => $value) {
							$modelCategory[$key] = new PrdCategoryProduct;
							if ($value != '') {
								$modelCategory[$key]->product_id = $model->id;
								$modelCategory[$key]->category_id = $value;
								$modelCategory[$key]->save(false);
								// echo $value;exit;
								// $criteria = new CDbCriteria;
								// $criteria->with = array('parent');
								// $criteria->addCondition('t.type = "category"');
								// $criteria->addCondition('t.id = :id');
								// $criteria->params[':id'] = $value;
								// $criteria->order = 't.sort ASC';
								// $dataCategory = PrdCategory::model()->find($criteria);
								$tag = PrdCategory::model()->getBreadcrump($modelCategory[$key]->category_id, $this->languageID);
								// print_r($tag); exit;
								foreach ($tag as $k => $v) {
								$dataTag[] = 'category='.$k;
								$dataTag[] = 'category='.$v['category'];
								}

							}
							
						}
					}

					PrdGalleryHighlight::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if ($model->gallery_id != '') {
						$modelGalhigh = new PrdGalleryHighlight;
						$modelGalhigh->product_id = $model->id;
						$modelGalhigh->gallery_id = $model->gallery_id;
						$modelGalhigh->save(false);
					}

					$model->tag = implode(', ', $dataTag).',';
					$model->filter = implode('||', $dataTag).'||';
					$model->save(false);
					Log::createLog("PrdProduct Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
					echo $ce;
					exit;
				    $transaction->rollback();
				}
			}
			// print_r($model->kode);
			// exit;

		}else{
			// $model->data = array(
			// 	'packing'=>'Dust bag & Shoping Bag',
			// 	'return'=>'According to shop’s policy (contact customer service for info)',
			// 	'shipping'=>'By JNE regular or YES',
			// );
		}
		if ( ! is_array($model->data)) {
			$model->data = unserialize($model->data);
		}else{
			$model->data = ($model->data);
		}

		if ($model->date_input == '') {
			$model->date_input = date('Y-m-d H:i:s');
		}
		if (isset($_GET['copy']) && ! isset($_POST['PrdProduct'])) {
			$model=$this->loadModel($_GET['copy']);
			$model->image = '';
			$model->scenario = 'insert';
			$model->date_input = date('Y-m-d H:i:s');

			$modelDesc = array();
			foreach (Language::model()->getLanguage() as $key => $value) {
				$modelDesc[$value->code] = PrdProduct::model()->getDataDesc($model->id, $value->id);
				$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new PrdProductDescription : $modelDesc[$value->code];
				// echo CHtml::errorSummary($modelDesc[$value->code]);
			}
			$modelAttributes = array();
			$modelAttributes = PrdProductAttributes::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
			'modelAttributes'=>$modelAttributes,
			'modelImage'=>$modelImage,
			'modelColor'=>$modelColor,
			'modelCategory'=>$modelCategory,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		// print_r(unserialize($model->setting));
		// exit;
		$modelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value) {
			$modelDesc[$value->code] = PrdProduct::model()->getDataDesc($model->id, $value->id);
			$modelDesc[$value->code] = ($modelDesc[$value->code]==null) ? new PrdProductDescription : $modelDesc[$value->code];
			// echo CHtml::errorSummary($modelDesc[$value->code]);
		}
		$modelAttributes = array();
		$modelAttributes = PrdProductAttributes::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));

		$modelImage = array();
		$modelImage = PrdProductImage::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));

		$modelColor = array();
		$modelColor = PrdProductColor::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));

		$modelCategory = array();
		$modelCategory = PrdCategoryProduct::model()->findAll('product_id = :id ORDER BY id', array(':id'=>$model->id));

		$modelGalspot = array();
		$modelGalspot = PrdGalleryHighlight::model()->find('product_id = :id ORDER BY id', array(':id'=>$model->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		// print_r($_POST);
		// exit;
		if ($_GET['type']=='copy') {
			$model->scenario = 'insert';
		}
		if(isset($_POST['PrdProduct']))
		{
			if ($_GET['type']=='copy') {
				$model = new PrdProduct;
				$model->setAttributes($_POST['PrdProduct']);//setting semua nilai
			}else{
				$image = $model->image;//mengamankan nama file
				// $file = $model->file;//mengamankan nama file
				$model->setAttributes($_POST['PrdProduct']);//setting semua nilai
				$model->image = $image;//mengembalikan nama file
			}

			unset($modelDesc);
			$valid=true;
			foreach ($_POST['PrdProductDescription'] as $j => $mod) {
	            if (isset($_POST['PrdProductDescription'][$j])) {
	                $modelDesc[$j]=new PrdProductDescription; // if you had static model only
	                $modelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$modelDesc[$j]->language_id = $lang->id;
	                $valid=$modelDesc[$j]->validate() && $valid;
	            }
	        }

			$image = CUploadedFile::getInstance($model,'image');
			if ($image->name != '') {
				$model->image = substr(md5(time()),0,5).'-'.$image->name;
			}

			$image2 = CUploadedFile::getInstance($model,'image2');
			if ($image2->name != '') {
				$model->image2 = substr(md5(time()),0,5).'-'.$image2->name;
			}

			unset($modelAttributes);
			if (count($_POST['PrdProductAttributes']['attribute']) > 0) {
				foreach ($_POST['PrdProductAttributes']['attribute'] as $key => $value) {
					$modelAttributes[$key] = new PrdProductAttributes;
					if ($value != '') {
						$modelAttributes[$key]->product_id = $model->id;
						$modelAttributes[$key]->stock = $_POST['PrdProductAttributes']['stock'][$key];
						if ($_POST['PrdProductAttributes']['price'][$key] == '') {
							$modelAttributes[$key]->price = $model->harga;
						}else{
							$modelAttributes[$key]->price = $_POST['PrdProductAttributes']['price'][$key];
						}
						$modelAttributes[$key]->attribute = $value;
					}
					
				}
			}

			// $model->image = $session['upload_foto_edit'][1];

			$model->date = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			$model->data = $_POST['PrdProduct']['data'];

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					if ($image->name != '') {
						$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$model->image);
					}
					if ($image2->name != '') {
						$image2->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$model->image2);
					}

					if ($_GET['type']=='copy') {
						$model->date_input = date("Y-m-d H:i:s");
					}

					$model->date_update = date("Y-m-d H:i:s");
					// $model->last_update_by = Yii::app()->user->name;
					$model->data = serialize($model->data);
					$tag = PrdCategory::model()->getBreadcrump($model->category_id, $this->languageID);
					$dataTag = array();
					foreach ($tag as $key => $value) {
						$dataTag[] = $key;
					}
					// $model->tag = implode(', ', $dataTag);

					$model->save();

					// Update Image Tambahan
					PrdProductImage::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdProductImage2']) > 0) {
						foreach ($_POST['PrdProductImage2'] as $key => $value) {
							$modelImage = new PrdProductImage;
							if ($value != '') {
								$modelImage->product_id = $model->id;
								$modelImage->image = $value;
								$modelImage->save(false);
							}
							
						}
					}
					if (count($_FILES['PrdProductImage']['name']) > 0) {
						foreach ($_FILES['PrdProductImage']['name'] as $key => $value) {
							$modelImage = new PrdProductImage;
							$image = CUploadedFile::getInstance($modelImage,'['.$key.']image');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product/'.$modelImage->image);
								$modelImage->product_id = $model->id;
								$modelImage->save(false);
							}
							
						}
					}

					// Update Color
					PrdProductColor::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdProductColor2']['image']) > 0) {
						foreach ($_POST['PrdProductColor2']['image'] as $key => $value) {
							$modelImage = new PrdProductColor;
							if ($value != '') {
								$modelImage->product_id = $model->id;
								$modelImage->image = $value;
								$modelImage->image_color = $_POST['PrdProductColor2']['image_color'][$key];
								$modelImage->label = $_POST['PrdProductColor2']['label'][$key];
								$modelImage->save(false);
							}
							
						}
					}
					if (count($_FILES['PrdProductColor']['name']['image']) > 0) {
						foreach ($_FILES['PrdProductColor']['name']['image'] as $key => $value) {
							$modelImage = new PrdProductColor;
							$image = CUploadedFile::getInstance($modelImage,'[image]'.$key.'');
							$imageColor = CUploadedFile::getInstance($modelImage,'[image_color]'.$key.'');
							if ($image->name != '') {
								$modelImage->image = substr(md5(time()),0,5).'-'.$image->name;
								$modelImage->image_color = substr(md5(time()),0,5).'-'.$imageColor->name;
								$image->saveAs(Yii::getPathOfAlias('webroot').'/images/product_color/'.$modelImage->image);
								$imageColor->saveAs(Yii::getPathOfAlias('webroot').'/images/product_color/'.$modelImage->image_color);
								$modelImage->product_id = $model->id;
								$modelImage->label = $_POST['PrdProductColor']['label'][$key];
								$modelImage->save(false);
							}
							
						}
					}

					PrdProductDescription::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					foreach ($modelDesc as $key => $value) {
						$value->product_id=$model->id;
						$value->save();
					}

					PrdProductAttributes::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdProductAttributes']['attribute']) > 0) {
						foreach ($_POST['PrdProductAttributes']['attribute'] as $key => $value) {
							$modelAttributes[$key] = new PrdProductAttributes;
							if ($value != '') {
								$modelAttributes[$key]->id_str = $_POST['PrdProductAttributes']['id_str'][$key];
								$modelAttributes[$key]->product_id = $model->id;
								if ($_POST['PrdProductAttributes']['kode'][$key] != '') {
									$modelAttributes[$key]->kode = $_POST['PrdProductAttributes']['kode'][$key];
								}else{
									$modelAttributes[$key]->kode = $model->kode.$value;
								}
								if ($_POST['PrdProductAttributes']['stock'][$key] == '') {
									$modelAttributes[$key]->stock = $model->berat;
								}else{
									$modelAttributes[$key]->stock = $_POST['PrdProductAttributes']['stock'][$key];
								}
								if ($_POST['PrdProductAttributes']['price'][$key] == '') {
									$modelAttributes[$key]->price = $model->harga;
								}else{
									$modelAttributes[$key]->price = $_POST['PrdProductAttributes']['price'][$key];
								}
								if ($_POST['PrdProductAttributes']['color'][$key] == '') {
									$modelAttributes[$key]->color = $model->harga;
								}else{
									$modelAttributes[$key]->color = $_POST['PrdProductAttributes']['color'][$key];
								}
								$modelAttributes[$key]->attribute = $value;
								$modelAttributes[$key]->save(false);
								if ($modelAttributes[$key]->id_str == 0) {
									$modelAttributes[$key]->id_str = $modelAttributes[$key]->id;
									$modelAttributes[$key]->save(false);
								}
							}
							
						}
					}

					// data tag
					// $dataTag = array();
					// $dataBrand = Brand::model()->findByPk($model->brand_id);
					// $dataTag[] = $dataBrand->description->title;
					// $dataTag[] = 'brand='.$dataBrand->kode;

					PrdCategoryProduct::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if (count($_POST['PrdCategoryProduct']) > 0) {
						// print_r($_POST['PrdCategoryProduct']);exit;
						foreach ($_POST['PrdCategoryProduct'] as $key => $value) {
							$modelCategory[$key] = new PrdCategoryProduct;
							if ($value != '') {
								$modelCategory[$key]->product_id = $model->id;
								$modelCategory[$key]->category_id = $value;
								$modelCategory[$key]->save(false);
								// echo $value;exit;
								// $criteria = new CDbCriteria;
								// $criteria->with = array('parent');
								// $criteria->addCondition('t.type = "category"');
								// $criteria->addCondition('t.id = :id');
								// $criteria->params[':id'] = $value;
								// $criteria->order = 't.sort ASC';
								// $dataCategory = PrdCategory::model()->find($criteria);
								$tag = PrdCategory::model()->getBreadcrump($modelCategory[$key]->category_id, $this->languageID);
								// print_r($tag); exit;
								foreach ($tag as $k => $v) {
								$dataTag[] = 'category='.$k;
								$dataTag[] = 'category='.$v['category'];
								}

							}
							
						}
					}

					PrdGalleryHighlight::model()->deleteAll('product_id = :id', array(':id'=>$model->id));
					if ($model->gallery_id != '') {
						$modelGalhigh = new PrdGalleryHighlight;
						$modelGalhigh->product_id = $model->id;
						$modelGalhigh->gallery_id = $model->gallery_id;
						$modelGalhigh->gallery_id = $model->gallery_id;
						$modelGalhigh->save(false);
					}

					$model->tag = implode(', ', $dataTag).',';
					$model->filter = implode('||', $dataTag).'||';
					// print_r($model->filter);
					// exit;
					$model->save(false);
					Log::createLog("ProductController Update $model->id");
					if ($_GET['type']=='copy') {
						Yii::app()->user->setFlash('success','Data inserted');
					}else{
						Yii::app()->user->setFlash('success','Data Edited');
					}
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
					echo $ce;
					exit;
				    $transaction->rollback();
				}
			}
		}
		if ( ! is_array($model->data)) {
			$model->data = unserialize($model->data);
		}else{
			$model->data = ($model->data);
		}

		$this->render('update',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
			'modelAttributes'=>$modelAttributes,
			'modelImage'=>$modelImage,
			'modelColor'=>$modelColor,
			'modelCategory'=>$modelCategory,
			'modelGalspot'=>$modelGalspot,
		));
	}

	public function actionReview($id)
	{
		$model=$this->loadModel($id);

		$criteria = new CDbCriteria;
		$criteria->select = 'SUM(rating) as rating';
		$criteria->addCondition('product_id = :product_id');
		$criteria->params[':product_id'] = $id;
		// $criteria->order = 'date DESC';
		// $criteria->group = 'product_id';
		$sumRating = PrdProductReview::model()->find($criteria)->rating;

		$criteria = new CDbCriteria;
		$criteria->addCondition('product_id = :product_id');
		$criteria->params[':product_id'] = $id;
		$criteria->order = 'date DESC';
		$review = new CActiveDataProvider('PrdProductReview', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),
		));

		if ($review->getTotalItemCount() > 0) {
			$rating = round($sumRating/$review->getTotalItemCount());
		}else{
			$rating = 0;
		}
		$this->render('review',array(
			'model' => $model,
			'review' => $review,
			'rating' => $rating,
		));
	}

	public function actionSetReview($id, $type)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=PrdProductReview::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			$model->{$type} = ($model->{$type}-1)*-1;
			$model->save();
			echo json_decode($model->{$type});

		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionSetStatus($id, $type)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
			$model->{$type} = ($model->{$type}-1)*-1;
			$model->save();
			echo json_decode($model->{$type});

		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new PrdProduct('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PrdProduct'])){
			$model->kode = $_GET['PrdProduct']['kode'];
			$model->name = $_GET['PrdProduct']['name'];
			$model->category_id = $_GET['PrdProduct']['category_id'];
			// $model->setAttributes($_GET['PrdProduct'];);
		}

    	$categoryModel = new PrdCategory;
		$categoryModelDesc = array();
		foreach (Language::model()->getLanguage() as $key => $value){
			$categoryModelDesc[$value->code] = new PrdCategoryDescription;
		}

		if (isset($_POST['PrdCategoryDescription'])) {
			$categoryModel->attributes=$_POST['PrdCategory'];//setting semua nilai

			unset($categoryModelDesc);
			$valid=true;
			foreach ($_POST['PrdCategoryDescription'] as $j => $mod) {
	            if (isset($_POST['PrdCategoryDescription'][$j])) {
	                $categoryModelDesc[$j]=new PrdCategoryDescription;
	                $categoryModelDesc[$j]->attributes=$mod;
	                $lang = Language::model()->getName($j);
					$categoryModelDesc[$j]->language_id = $lang->id;
	                $valid=$categoryModelDesc[$j]->validate() && $valid;
	            }
	        }
            if (isset($_POST['ajax']) && $_POST['ajax']==='category-form') {
				echo(json_encode(array(json_decode(CActiveForm::validate($categoryModel)), json_decode(CActiveForm::validateTabular($categoryModelDesc)))));
				Yii::app()->end();
            }
			if($categoryModel->validate() AND $valid){
				$transaction=$categoryModel->dbConnection->beginTransaction();
				try
				{
					$categoryModel->type = 'category';
					$categoryModel->save();

					PrdCategoryDescription::model()->deleteAll('category_id = :id', array(':id'=>$categoryModel->id));
					foreach ($categoryModelDesc as $key => $value) {
						$value->category_id=$categoryModel->id;
						$value->save();
					}

					Log::createLog("Create Category $categoryModel->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}

		}

		$dataNestedCategory = PrdCategory::model()->getData(array(
			'limit'=>'',
			'addCondition'=>array(
				array(
					'criteria'=>'type = :type',
					'params'=>array(
						':type'=>'category',
					)
				)
			),
		), $this->languageID);

		$nestedCategory = PrdCategory::model()->nested($dataNestedCategory['data']);

		$json_result = file_get_contents('php://input');
		if ($json_result != '') {
			$result = json_decode($json_result, true);
			PrdCategory::model()->saveSortNested($result);
			Yii::app()->end();
		}

		$this->render('index',array(
			'model'=>$model,
			'categoryModel'=>$categoryModel,
			'categoryModelDesc'=>$categoryModelDesc,
			'nestedCategory'=>$nestedCategory,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=PrdProduct::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	
	public function actionCSV()
	{
		echo "done import csv to db";
		exit;
		set_time_limit(0);
		ini_set('memory_limit', '2056M');

		$names_excel = 'excel-luckystar.csv';
		// if ($_GET['file'] != '') {

			if (($handle = fopen(Yii::getPathOfAlias('webroot').'/images/csv/'.urldecode($names_excel), "r")) !== FALSE) {
				$row = 0;
				$dataCsv = array();
			    while (($data = fgetcsv($handle)) !== FALSE) {
			        $num = count($data);
			        for ($c=0; $c < $num; $c++) {
			        	$dataCsv[$row][$c] = $data[$c];
			        }
			        $row++;
			    }
			    fclose($handle);
			    unset($dataCsv[0]);
			}
			
			// preg_replace('/\s+/', ' ', $sentence)
			// echo "<pre>";
			// print_r($dataCsv);
			// echo "</pre>";
			// exit;

			foreach ($dataCsv as $key => $value) {
				if ($value[0] != '') {
					$dataCsv = new PrdExcel;
					// $inp_nopen = (int) filter_var(trim($value[0]), FILTER_SANITIZE_NUMBER_INT);
					// $dataCsv->nama_produk = $value[0];
					// $dataCsv->kategori = $value[1];
					// $dataCsv->file_gambar = $value[2];
					// $dataCsv->harga = $value[3];
					// $dataCsv->label_warna = $value[4];
					// $dataCsv->label_kemasan = $value[5];
					// $dataCsv->deskripsi = $value[6];
					// $dataCsv->status = $value[7];
					// $dataCsv->onsale = $value[8];
					// $dataCsv->trending = $value[9];
					$dataCsv->kategori = $value[0];
					$dataCsv->nama_produk = preg_replace('/\s+/', ' ', $value[1]);
					$dataCsv->kode = $value[2];
					$dataCsv->label_size = $value[3];

					$dataCsv->save(false);
				}
			}
			
			echo "Sukses input Data";
			// Log::createLog("Data import success - ". date("Y-m-d H:i:s"));
			// Yii::app()->user->setFlash('success_import','Data success has been imported');

			// $this->render('csv_show',array(
			// 	'model'=>$model,
			// 	'dataCsv'=>$dataCsv,
			// ));
		// }

	}

	public function actionProductCSV()
	{
		echo "Csv products done";
		exit;
		// $criteria = new CDbCriteria;
		// $criteria->addCondition('status = "1"');
		// $criteria->group = 'kategori';
		$data = PrdExcel::model()->findAll();

		// foreach ($data as $key => $value) {
		// 	$criteria = new CDbCriteria;
		// 	$criteria->with = array('description');
		// 	$criteria->addCondition('description.name = :names');
		// 	$criteria->params[':names'] = $value->kategori;
		// 	$criteria->addCondition('t.type = :type');
		// 	$criteria->params[':type'] = 'category';
		// 	$criteria->addCondition('description.language_id = :language_id');
		// 	$criteria->params[':language_id'] = 2;
		// 	$categorys = PrdCategory::model()->find($criteria);

		// 	if ( count($categorys) <= 0 ) {
		// 		$categorys = new PrdCategory;
		// 		$catDesc = new PrdCategoryDescription;
		// 	}else{
		// 		$catDesc = PrdCategoryDescription::model()->find('t.category_id = :ids', array(':ids'=> $categorys->id));
		// 	}

		// 	$categorys->type = 'category';
		// 	$categorys->save(false);

		// 	$catDesc->category_id = $categorys->id;
		// 	$catDesc->language_id = 2;
		// 	$catDesc->name = $value->kategori;
		// 	$catDesc->save(false);
		// }
		// echo "save categorys";
		// exit;

		// $product->tag = 'category=Granite Tile, category=12,';
		// $product->filter = 'category=Granite Tile||category=12||';

		foreach ($data as $key => $value) {
			$dataTag = array();

			$product = new PrdProduct;
			$product->category_id = $value->kategori;
			$product->image = '';
			$product->date_input = date("Y-m-d H:i:s");
			$product->date_update = date("Y-m-d H:i:s");
			
			// if ($value->harga == '') {
			$product->harga = 0;
			$product->harga_coret = 0;
			// }

			// $product->kode = 'ARS-'. mt_rand(10, 750);
			$product->kode = $value->kode;
			$product->data = serialize(array(
				// 'warna' => $value->label_warna,
				// 'kemasan' => $value->label_kemasan,
				 	'size' => $value->label_size,
			));
			$product->status = 1;
			$product->onsale = $value->onsale;
			$product->rekomendasi = $value->trending;
			$product->save(false);

			$criteria = new CDbCriteria;
			$criteria->with = array('description');
			$criteria->addCondition('description.name = :name');
			$criteria->params[':name'] = $value->kategori;
			$criteria->addCondition('t.type = :type');
			$criteria->params[':type'] = 'category';
			$criteria->order = 'sort ASC';
			$find_category = PrdCategory::model()->find($criteria);

			PrdCategoryProduct::model()->deleteAll('product_id = :id', array(':id'=>$product->id));
			$modelCategory = new PrdCategoryProduct;
			$modelCategory->category_id = $find_category->id;
			$modelCategory->product_id = $product->id;
			$modelCategory->save(false);

			$dataTag[] = 'category='.$find_category->id;
			$dataTag[] = 'category='.$find_category->description->name;

			$product->tag = implode(', ', $dataTag).',';
			$product->filter = implode('||', $dataTag).'||';
			$product->save(false);

			$productDesc = new PrdProductDescription;
			$productDesc->product_id = $product->id;
			$productDesc->language_id = 2;
			$productDesc->name = $value->nama_produk;
			$productDesc->desc = $value->deskripsi;
			$productDesc->save(false);
		}
		echo "dones"; exit;

	}

}