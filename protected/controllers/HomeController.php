<?php

class HomeController extends Controller
{

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	// public function actionDummy()
	// {
	// 	// Dummy::createDummyProduct();
	// 	// echo '<META http-equiv="refresh" content="0;URL=http://localhost/dv-computers/home/dummy">';
		
	// 	$data = Data::model()->findAll('1 LIMIT '.$_GET['page'].', 30');
	// 	foreach ($data as $key => $value) {
	// 		// 106-large_default.jpg
	// 		$image_name = '';
	// 		if ($value->image != 'http://ufoelektronika.com/img/p/0.jpg') {
	// 			$url = $value->image;
	// 			$url = substr($url, 0, -4).'-large_default.jpg';
	// 			$image_name = Slug::create($value->id.'-'.$value->name).'.jpg';
	// 			$img = Yii::getPathOfAlias('webroot').'/images/product/'.$image_name;
	// 			@file_put_contents($img, file_get_contents($url));
	// 		}

	// 		$model = new PrdProduct;
	// 		$model->kode = $value->reference;
	// 		$model->image = $image_name;
	// 		$model->harga = $value->base_price;
	// 		$model->harga_coret = $value->base_price + ($value->base_price*20/100);
	// 		$model->stock = $value->qty;
	// 		$model->status = $value->status;
	// 		$model->save(false);

	// 		$modelDesc = new PrdProductDescription;
	// 		$modelDesc->product_id = $model->id;
	// 		$modelDesc->language_id = 2;
	// 		$modelDesc->name = $value->name;
	// 		$modelDesc->save(false);
	// 	}
	// 	echo '<a href="'.CHtml::normalizeUrl(array('dummy', 'page'=>$_GET['page']+30)).'">next</a>';

	// }

	public function actionCreatecategory()
	{
		for ($i=1; $i < 111; $i++) { 
			$model = new PrdCategoryProduct;
			$model->category_id = 12;
			$model->product_id = $i;
			$model->save(false);
		}
	}

	public function actionInput()
	{
		$data = Table61::model()->findAll();
		foreach ($data as $key => $value) {
			$model = new PrdProduct;
			$model->kode = $value->col_1;
			if ($value->col_7 != '') {
				copy(YiiBase::getPathOfAlias('webroot').'/images/precise/'.$value->col_7.'/COVER.jpg', YiiBase::getPathOfAlias('webroot').'/images/product/'.Slug::create($value->col_1).'-'.Slug::create($value->col_2).'-cover.jpg');
				$model->image = Slug::create($value->col_1).'-'.Slug::create($value->col_2).'-cover.jpg';
			}else{
				$model->image = '';
			}
			$model->harga = $value->col_6;
			$model->harga_coret = 0;
			$model->save(false);
			$dataDesc = new PrdProductDescription;
			$dataDesc->product_id = $model->id;
			$dataDesc->language_id = 2;
			$dataDesc->name = $value->col_2;
			$dataDesc->subtitle = $value->col_3;
			$dataDesc->desc = '<p>'.$value->col_4.'</p>';
			$dataDesc->save(false);
			$dataAttr = explode(',', $value->col_5);
			foreach ($dataAttr as $v) {
				$modelAttr = new PrdProductAttributes;
				$modelAttr->product_id = $model->id;
				$modelAttr->attribute = trim($v);
				$modelAttr->stock = 10;
				$modelAttr->price = $value->col_6;
				$modelAttr->save(false);
				$modelAttr->id_str = $modelAttr->id;
				$modelAttr->save(false);

			}
			if ($value->col_7 != '') {
				for ($i=1; $i < 7; $i++) { 
					$modelImage = new PrdProductImage;
					$modelImage->product_id = $model->id;
					copy(YiiBase::getPathOfAlias('webroot').'/images/precise/'.$value->col_7.'/'.$i.'.jpg', YiiBase::getPathOfAlias('webroot').'/images/product/'.Slug::create($value->col_1).'-'.Slug::create($value->col_2).'-photo'.$i.'.jpg');
					$modelImage->image = Slug::create($value->col_1).'-'.Slug::create($value->col_2).'-photo'.$i.'.jpg';
					$modelImage->save(false);
				}
			}



		}
	}

	public function actionIndex()
	{
		// $criteria2=new CDbCriteria;
		// $criteria2->with = array('description');
		// $criteria2->order = 'date DESC';
		// $criteria2->addCondition('status = "1"');
		// $criteria2->addCondition('description.language_id = :language_id');
		// $criteria2->params[':language_id'] = $this->languageID;

		// if ($_GET['category']) {
		// 	$criteria = new CDbCriteria;
		// 	$criteria->with = array('description');
		// 	$criteria->addCondition('t.id = :id');
		// 	$criteria->params[':id'] = $_GET['category'];
		// 	$criteria->addCondition('t.type = :type');
		// 	$criteria->params[':type'] = 'category';
		// 	$criteria->order = 'sort ASC';
		// 	$strCategory = PrdCategory::model()->find($criteria);

		// 	// $inArray = PrdProduct::getInArrayCategory($_GET['category']);
		// 	// $criteria2->addInCondition('t.category_id', $inArray);
		// 	$criteria2->addCondition('t.tag LIKE :category');
		// 	$criteria2->params[':category'] = '%category='.$_GET['category'].',%';
		// }else{
		// 	$criteria2->addCondition('t.tag LIKE :category');
		// 	$criteria2->params[':category'] = '%category=35,%';
		// }
		// $pageSize = 8;

		// $product = new CActiveDataProvider('PrdProduct', array(
		// 	'criteria'=>$criteria2,
		//     'pagination'=>array(
		//         'pageSize'=>$pageSize,
		//     ),
		// ));

		// $model = new ContactForm;
		// $model->scenario = 'insert';

		$this->layout='//layouts/column1';
		$this->render('index', array(
			// 'product'=>$product,
			// 'model'=>$model,
		));
	}

	public function actionDealer()
	{
		$this->pageTitle = 'Dealer Locator - '.$this->pageTitle;

		$this->layout='//layouts/column2';
		$criteria = new CDbCriteria;
		if ($_GET['kota'] != '') {
			$criteria->addCondition('kota = :kota');
			$criteria->params[':kota'] = $_GET['kota'];
		}
		if ($_GET['prov'] != '') {
			$criteria->addCondition('prov = :prov');
			$criteria->params[':prov'] = $_GET['prov'];
		}
		if ($_GET['loc'] == 'dealer-location') {
			$criteria->addCondition('type = :type');
			$criteria->params[':type'] = 'dealer';
		}elseif($_GET['loc'] == 'asp-location'){
			$criteria->addCondition('type = :type');
			$criteria->params[':type'] = 'asp';
		}
		$criteria->order = 'sort ASC';
		$dataAddress2 = array();
		// if ($_GET['kota'] != '') {
			$dataAddress2 = Address::model()->findAll($criteria);
			// foreach ($dataAddress as $key => $value) {
			// 	$dataAddress2[$value->kota][] = $value;
			// }
		// }

		$criteria2 = new CDbCriteria;
		if ($_GET['loc'] == 'dealer-location') {
			$criteria2->addCondition('type = :type');
			$criteria2->params[':type'] = 'dealer';
		}elseif($_GET['loc'] == 'asp-location'){
			$criteria2->addCondition('type = :type');
			$criteria2->params[':type'] = 'asp';
		}
		$criteria2->group = 'prov';
		$listProv = Address::model()->findAll($criteria2);

		$listKota = array();
		if ($_GET['prov'] != '') {
			$criteria = new CDbCriteria;
			if ($_GET['loc'] == 'dealer-location') {
				$criteria->addCondition('type = :type');
				$criteria->params[':type'] = 'dealer';
			}elseif($_GET['loc'] == 'asp-location'){
				$criteria->addCondition('type = :type');
				$criteria->params[':type'] = 'asp';
			}
			$criteria->addCondition('prov = :prov');
			$criteria->params[':prov'] = $_GET['prov'];
			$criteria->group = 'kota';
			$listKota = Address::model()->findAll($criteria);
		}


		$this->render('dealer', array(
			'dataAddress'=>$dataAddress2,
			'listKota'=>$listKota,
			'listProv'=>$listProv,
		));
	}

	public function actionCategory()
	{
		$this->layout='//layouts/column2';

		$this->render('category', array(
		));
	}

	public function actionProductDetail()
	{
		$this->layout='//layouts/column2';
		$this->pageTitle = 'Product Detail - '. $this->pageTitle;
		
		$this->render('//product/product_detail', array(	
		));
	}

	// public function actionProducHouseware()
	// {
	// 	$this->layout='//layouts/column2';
	// 	$this->pageTitle = 'Product Houseware - '. $this->pageTitle;
		
	// 	$this->render('//home/product_houseware', array(	
	// 	));
	// }

	public function actionPCart()
	{
		$this->layout='//layouts/column3';

		$this->render('carts', array(
		));
	}

	public function actionPCart2()
	{
		$this->layout='//layouts/column3';

		$this->render('carts2', array(
		));
	}

	public function actionPsuccesscart()
	{
		$this->layout='//layouts/column3';

		$this->render('success_cart', array(
		));
	}

	public function actionCaraBelanja()
	{
		$this->layout='//layouts/column2';

		$this->render('cara_belanja', array(
		));
	}

	public function actionInfoPengiriman()
	{
		$this->layout='//layouts/column3';

		$this->render('info_pengiriman', array(
		));
	}

	public function actionSyarat()
	{
		$this->layout='//layouts/column2';

		$this->render('syarat_ketentuan', array(
		));
	}

	public function actionFaq()
	{
		$this->layout='//layouts/column2';

		$criteria=new CDbCriteria;
		$criteria->with = array('description');
		$criteria->order = 't.id ASC';

		$criteria->addCondition('status = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;

		$pageSize = 100000;

		$dataFaq = new CActiveDataProvider('Faq', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>$pageSize,
		    ),
		));

		$this->render('faq', array(
			'dataFaq'=>$dataFaq,
		));
	}

	public function actionPmyaccount()
	{
		$this->layout='//layouts/column3';

		$this->render('mydashboard', array(
		));
	}

	public function actionPcontact()
	{
		$model = new ContactForm;
		$model->scenario = 'insert';
		
		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('home/career'));
	        }
	        

				$model->attributes=$_POST['ContactForm'];
				if($model->validate())
				{
			        $secret_key = "6Lc5ExQUAAAAAHgV4U_6krEDyf-ykhlx08mEgJek";
			        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
			        $response = json_decode($response);
			        if($response->success==false)
			        {
			          $model->addError('verifyCode','Pastikan anda sudah menyelesaikan captcha');
			        }else{
						// config email
						$messaged = $this->renderPartial('//mail/contact2',array(
							'model'=>$model,
						),TRUE);
						$config = array(
							'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
							'subject'=>'[UFO Elektronika] Contact from '.$model->email,
							'message'=>$messaged,
						);
						if ($this->setting['contact_cc']) {
							$config['cc'] = array($this->setting['contact_cc']);
						}
						if ($this->setting['contact_bcc']) {
							$config['bcc'] = array($this->setting['contact_bcc']);
						}
						// kirim email
						Common::mail($config);

						Yii::app()->user->setFlash('success','Trimakasih telah mengirimkan pesan kepada kami, kami akan segera membalas pesan anda');
						$this->refresh();
					}
				}


		}

		$this->layout='//layouts/column2';
		$this->pageTitle = 'Contact Us - '.$this->pageTitle;
		$this->render('pcontact', array(
			'model'	=>$model,
		));
	}

	public function actionPsaler()
	{
		
		$model = new ContactForm;
		$model->scenario = 'insert';
		
		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('home/career'));
	        }
	        

				$model->attributes=$_POST['ContactForm'];
				if($model->validate())
				{
			        $secret_key = "6Lfhyf8SAAAAABJ2p1sV8mV790VW7LAVOsy2qile";
			        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
			        $response = json_decode($response);
			        // print_r($response);
			        // exit;
			        if($response->success==false)
			        {
			          $model->addError('verifyCode','Pastikan anda sudah menyelesaikan captcha');
			        }else{
						// config email
						$messaged = $this->renderPartial('//mail/saler',array(
							'model'=>$model,
						),TRUE);
						$config = array(
							'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
							'subject'=>'Hi, Ada pendaftaran wholesaler '.$model->email,
							'message'=>$messaged,
						);
						if ($this->setting['contact_cc']) {
							$config['cc'] = array($this->setting['contact_cc']);
						}
						if ($this->setting['contact_bcc']) {
							$config['bcc'] = array($this->setting['contact_bcc']);
						}
						// kirim email
						Common::mail($config);

						Yii::app()->user->setFlash('success','Trimakasih telah mengirimkan pesan kepada kami, kami akan segera membalas pesan anda');
						$this->refresh();
					}

				}

		}
		$this->layout='//layouts/column1';
		$this->render('psaler', array(
			'model'	=>$model,
		));
	}

	public function actionSugest()
	{

		if ($_POST['q'] != '') {
			$str = '<p id="searchresults">';
	            $criteria=New CDbCriteria ; 
	            $criteria->addCondition('(name LIKE :q OR tag LIKE :q)');
	            $criteria->params[':q'] = '%'.$_POST['q'].'%';
	            $criteria->addCondition('language_id = :language_id');
	            $criteria->params[':language_id'] = $this->languageID;

	            $criteria->order = 'date_input DESC';
	            $criteria->limit = 5;
	            $list = ViewProduct::model()->findAll($criteria);
	            
				$str .= '<span class="category">Search: '.$_POST['q'].'</span>';
	            foreach($list as $value)
	            {
					$str .= '<a href="'.CHtml::normalizeUrl(array('/product/detail', 'id'=>$value->id)).'">
						<span class="searchheading">'.$value->name.'</span>
					</a>';
				}
			// }
			$str .= '<span class="seperator"><a href="'.CHtml::normalizeUrl(array('/product/index', 'q'=>$_POST['q'])).'" title="Sitemap">See other result for '.$_POST['q'].' &gt;</a></span>
			<br class="break">
			</p>
			';
			echo $str;
		}
	}

	public function actionError()
	{
		$this->layout = '//layouts/error';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{

				$criteria=new CDbCriteria;
				$criteria->with = array('description', 'category', 'categories');
				$criteria->order = 'date DESC';
				$criteria->addCondition('status = "1"');
				$criteria->addCondition('terlaris = "1"');
				$criteria->addCondition('description.language_id = :language_id');
				$criteria->params[':language_id'] = $this->languageID;
				$pageSize = 12;
				$criteria->group = 't.id';
				$product = new CActiveDataProvider('PrdProduct', array(
					'criteria'=>$criteria,
				    'pagination'=>array(
				        'pageSize'=>$pageSize,
				    ),
				));


				$criteria = new CDbCriteria;
				$criteria->with = array('description');
				$criteria->addCondition('t.parent_id = :parent_id');
				$criteria->params[':parent_id'] = 0;
				$criteria->addCondition('t.type = :type');
				$criteria->params[':type'] = 'category';
				$criteria->limit = 3;
				$criteria->order = 'sort ASC';
				$categories = PrdCategory::model()->findAll($criteria);

				$this->layout='//layouts/column2';

				$this->pageTitle = 'Error '.$error['code'].': '. $error['message'] .' - '.$this->pageTitle;
				$this->render('error', array(
					'error'=>$error,
					'product'=>$product,
					'categories'=>$categories,
				));
			}
		}

	}

	public function actionAbout()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('about', array(	
		));
	}

	public function actionProducthw()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('product_houseware', array(	
		));
	}

	public function actionProductDet()
	{
		$this->pageTitle = 'About Us - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('product_details', array(	
		));
	}

	public function actionMerk()
	{
		$this->pageTitle = 'Merk - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('merk', array(	
		));
	}

	public function actionProduk()
	{
		$this->pageTitle = 'Produk - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('produk', array(	
		));
	}

	public function actionProduk_detail()
	{
		$this->pageTitle = 'Produk_detail - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('produk_detail', array(	
		));
	}

	public function actionBlog_detail()
	{
		$this->pageTitle = 'Blog_detail - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('blog_detail', array(	
		));
	}

	public function actionHubungi()
	{
		$this->pageTitle = 'Hubungi - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('hubungi', array(	
		));
	}

	public function actionPromosi()
	{
		$this->pageTitle = 'Promosi - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$criteria=new CDbCriteria;
		$criteria->with = array('description');
		$criteria->order = 'sort ASC';
		$criteria->addCondition('active > 0');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$promotions = new CActiveDataProvider('Slide', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),
		));



		$this->render('promosi', array(
			'promotions'=>$promotions,
		));
	}

	public function actionPromoDetail()
	{
		$this->pageTitle = 'Promosi Detail - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('promo_detail', array(	
		));
	}

	public function actionWholesale()
	{
		$this->pageTitle = 'Wholeseler - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('wholesale', array(
		));
	}

	public function actionEvent()
	{
		$this->pageTitle = 'Events - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
					'subject'=>'[UFO Elektronika] Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->order = 'date_input DESC';
		$gallery = new CActiveDataProvider('Gallery', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>6,
		    ),
		));

		$this->render('event', array(
			'model'=>$model,
			'gallery'=>$gallery,
		));
	}

	public function actionEventdetail($id)
	{
		$this->pageTitle = 'Events - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('t.id = :id');
		$criteria->params[':id'] = $id;
		$criteria->order = 'date_input DESC';
		$detail = Gallery::model()->find($criteria);

		$this->render('eventdetail', array(
			'detail'=>$detail,
		));
	}

	public function actionHowto()
	{
		$this->pageTitle = 'How To Order - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('howto', array(	
		));
	}

	public function actionTips()
	{
		$this->pageTitle = 'Tips & Saran - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('tips', array(	
		));
	}
	public function actionTipsDetail()
	{
		$this->pageTitle = 'Tips & Saran - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$this->render('tips_detail', array(	
		));
	}

	public function actionBlogs()
	{
		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		if ($_GET['id']) {
			$criteria->addCondition('t.id = :id');
			$criteria->params[':id'] = $_GET['id'];
		}else{
			$criteria->order = 'date_input DESC';
		}
		if ($_GET['month']) {
			$criteria->addCondition('MONTH(date_input) = :month AND YEAR(date_input) = :year');
			$month = explode('-', $_GET['month']);
			$criteria->params[':month'] = $month[0];
			$criteria->params[':year'] = $month[1];
		}
		$dataBlog = Blog::model()->find($criteria);
		if($dataBlog===null)
			throw new CHttpException(404,'The requested page does not exist.');

		$criteria = new CDbCriteria;
		$criteria->addCondition('active = "1"');
		$criteria->order = 'date_input DESC';
		$criteria->group = 'MONTH(date_input), YEAR(date_input)';
		$dataDate = Blog::model()->findAll($criteria);

		$criteria = new CDbCriteria;
		$criteria->order = 'date_input DESC';
		$criteria->with = array('description');
		$criteria->addCondition('description.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;
		$criteria->addCondition('active = "1"');
		if ($_GET['month']) {
			$criteria->addCondition('MONTH(date_input) = :month AND YEAR(date_input) = :year');
			$month = explode('-', $_GET['month']);
			$criteria->params[':month'] = $month[0];
			$criteria->params[':year'] = $month[1];
		}else{
			$criteria->addCondition('t.id != :id');
			$criteria->params[':id'] = $dataBlog->id;
		}
		$dataBlogs = Blog::model()->findAll($criteria);

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('date_input > :date_input');
		$criteria->params[':date_input'] = $dataBlog->date_input;
		$criteria->order = 'date_input ASC';
		$nextId = Blog::model()->find($criteria);

		$criteria = new CDbCriteria;
		$criteria->with = array('description');
		$criteria->addCondition('active = "1"');
		$criteria->addCondition('date_input < :date_input');
		$criteria->params[':date_input'] = $dataBlog->date_input;
		$criteria->order = 'date_input DESC';
		$prevId = Blog::model()->find($criteria);

		$this->pageTitle = $dataBlog->description->title . ' - Berita & Artikel - '.$this->pageTitle;
		// $this->pageTitle = 'Berita & Artikel - '.$this->pageTitle;
		$this->layout='//layouts/column3';

		$this->render('seen_on', array(
			'dataBlog'=>$dataBlog,
			'dataDate'=>$dataDate,
			'dataBlogs'=>$dataBlogs,
			'nextId'=>$nextId,
			'prevId'=>$prevId,
		));
	}

	public function actionBlogDetail()
	{
		$this->pageTitle = 'Berita & Artikel - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('blog_detail', array(	
		));
	}

	public function actionProductlanding()
	{
		$this->pageTitle = 'Product - '. $this->pageTitle;

		$criteria=new CDbCriteria;
		$criteria->with = array('description', 'category', 'categories');
		$criteria->order = 'date DESC';
		$criteria->addCondition('status = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		// $criteria->addCondition('categoryView.language_id = :language_id');
		// $criteria->addCondition('categoryTitle.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;

		$criteria->addCondition('categories.category_id = :category');
		$criteria->params['category'] = 1;

		$pageSize = 12;

		$product = new CActiveDataProvider('PrdProduct', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>$pageSize,
		    ),
		));

		$model = new ContactForm;
		$model->scenario = 'insert';

		$this->layout='//layouts/column2';
		$this->render('landing_product', array(
			'product'=>$product,
			'model'=>$model,
		));
	}

	public function actionProductlanding_alfabet()
	{
		$this->layout='//layouts/column3';
		$this->pageTitle = 'Product - '. $this->pageTitle;

		$this->render('landing_product_alfabet', array(	
		));
	}
	
	public function actionProducts()
	{
		$this->pageTitle = 'Products - '. $this->pageTitle;

		$criteria=new CDbCriteria;
		$criteria->with = array('description', 'category', 'categories');
		$criteria->order = 'date DESC';
		$criteria->addCondition('status = "1"');
		$criteria->addCondition('description.language_id = :language_id');
		// $criteria->addCondition('categoryView.language_id = :language_id');
		// $criteria->addCondition('categoryTitle.language_id = :language_id');
		$criteria->params[':language_id'] = $this->languageID;

		$criteria->addCondition('categories.category_id = :category');
		$criteria->params['category'] = 1;

		$pageSize = 12;

		$product = new CActiveDataProvider('PrdProduct', array(
			'criteria'=>$criteria,
		    'pagination'=>array(
		        'pageSize'=>$pageSize,
		    ),
		));

		$model = new ContactForm;
		$model->scenario = 'insert';

		$this->layout='//layouts/column2';
		$this->render('product', array(
			'product'=>$product,
			'model'=>$model,
		));
	}

	public function actionListInquiry()
	{
		$this->pageTitle = 'Daftar Inquiry - '. $this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('inquiry', array(	
		));
	}

	public function actionDetailInquiry()
	{
		$this->pageTitle = 'Daftar Inquiry - '. $this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('detail_inquiry', array(	
		));
	}

	public function actionJadiagen()
	{
		$this->pageTitle = 'Jadi Agen - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
	        $secret_key = "6LfaqgkUAAAAAEGhdM7GVk6o-jNbidJ9t3xgc0wn";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $model->addError('verifyCode', 'Silahkan verifikasi captcha yang tersedia');
	        }

			$model->attributes=$_POST['ContactForm'];
			if(!$model->hasErrors() AND $model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>'Hi, '.$model->email.' Ingin Jadi Agen',
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Terima Kasih Atas Minat Anda Bergabung Bersama kami
Staff dari perabotplastik.com akan menghubungi anda untuk konfirmasi dan penjelasan berbagai langkah selanjutnya untuk secara resmi menjadi agen distribusi produk kami.
');
				$this->refresh();
			}


		}

		$this->render('jadi_agen', array(
			'model' => $model,
		));
	}

	public function actionKatalog()
	{
		$this->pageTitle = 'Katalog - '. $this->pageTitle;

		$this->layout='//layouts/column1';

		$dataPdf = Pdf::model()->findAll();

		$this->render('katalog', array(	
			'dataPdf'=>$dataPdf,
		));
	}

	public function actionLokasitoko()
	{
		$this->pageTitle = 'Lokasi Toko - '. $this->pageTitle;

		$this->layout='//layouts/column2';
		$criteria = new CDbCriteria;
		if ($_GET['kota'] != '') {
			$criteria->addCondition('kota = :kota');
			$criteria->params[':kota'] = $_GET['kota'];
		}
		if ($_GET['prov'] != '') {
			$criteria->addCondition('prov = :prov');
			$criteria->params[':prov'] = $_GET['prov'];
		}

		$dataAddress2 = array();
		// if ($_GET['kota'] != '') {
			$dataAddress = Address::model()->findAll($criteria);
			foreach ($dataAddress as $key => $value) {
				$dataAddress2[$value->kota][] = $value;
			}
		// }

		$criteria = new CDbCriteria;
		$criteria->group = 'kota';
		$listKota = Address::model()->findAll($criteria);

		$criteria2 = new CDbCriteria;
		$criteria2->group = 'prov';
		$listProv = Address::model()->findAll($criteria2);

		$listKota = array();
		if ($_GET['prov'] != '') {
			$criteria = new CDbCriteria;
			$criteria->addCondition('prov = :prov');
			$criteria->params[':prov'] = $_GET['prov'];
			$criteria->group = 'kota';
			$listKota = Address::model()->findAll($criteria);
		}

		$this->render('lokasi_toko', array(	
			'dataAddress'=>$dataAddress2,
			'listProv'=>$listProv,
			'listKota'=>$listKota,
		));
	}

	public function actionCarabeli()
	{
		$this->pageTitle = 'Cara Membeli - '. $this->pageTitle;

		$this->layout='//layouts/column1';

		$this->render('cara_beli', array(	
		));
	}

	public function actionContactus()
	{
		$this->pageTitle = 'Contact - '.$this->pageTitle;
		$this->layout='//layouts/column2';
		
		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('/home/contactus'));
	        }
	        
	        $secret_key = "6LfaqgkUAAAAAEGhdM7GVk6o-jNbidJ9t3xgc0wn";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $model->addError('verifyCode', 'Silahkan verifikasi captcha yang tersedia');
	        }

			$model->attributes=$_POST['ContactForm'];
			if(!$model->hasErrors() AND $model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>'Hi, Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for sending application career us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact', array(	
			'model'=>$model,
		));
	}

	public function actionCareer()
	{
		$this->pageTitle = 'Career - '.$this->pageTitle;
		$this->layout='//layouts/column2';

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			if (!isset($_POST['g-recaptcha-response'])) {
				$this->redirect(array('home/career'));
	        }
	        
	        $secret_key = "6LewK0EUAAAAAKBkAiXhXsR1ELPt7mQK5mcPRll2";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $this->redirect(array('home/career'));
	        }else{

				$model->attributes=$_POST['ContactForm'];
				if($model->validate())
				{
					// config email
					$messaged = $this->renderPartial('//mail/contact',array(
						'model'=>$model,
					),TRUE);
					$config = array(
						'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
						'subject'=>'Hi, Contact from '.$model->email,
						'message'=>$messaged,
					);
					if ($this->setting['contact_cc']) {
						$config['cc'] = array($this->setting['contact_cc']);
					}
					if ($this->setting['contact_bcc']) {
						$config['bcc'] = array($this->setting['contact_bcc']);
					}
					// kirim email
					Common::mail($config);

					Yii::app()->user->setFlash('success','Thank you for sending application career us. We will respond to you as soon as possible.');
					$this->refresh();
				}

			}

		}

		$this->render('career', array(
			'model'	=>$model,
		));
	}

	public function actionNews()
	{
		$this->pageTitle = 'News & Article - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('news', array(	
		));
	}

	public function actionNewsDetail()
	{
		$this->pageTitle = 'News & Article - '.$this->pageTitle;
		$this->layout='//layouts/column1';

		$this->render('news_detail', array(	
		));
	}

	public function actionTermsofuse()
	{
		$this->pageTitle = 'Terms of Use - '.$this->pageTitle;

		$this->render('termsofuse', array(	
		));
	}

	public function actionShippinginfo()
	{
		$this->render('shipinfo', array(	
		));
	}

	public function actionCartsuccess()
	{
		$this->render('cartsucess', array(	
		));
	}

	public function actionContact()
	{
		$this->layout='//layouts/column2';

		$this->pageTitle = 'Contact Us - '.$this->pageTitle;

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			$status = true;
	        $secret_key = "6LewK0EUAAAAAKBkAiXhXsR1ELPt7mQK5mcPRll2";
	        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	        $response = json_decode($response);
	        if($response->success==false)
	        {
	          $status = false;
	          $model->addError('verifyCode', 'Verify you are not robbot');
	        }

			if($status AND $model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email']),
					'subject'=>'['.Yii::app()->name.'] Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact', array(
			'model'=>$model,
		));
	}

	public function actionContact2()
	{
		$this->layout='//layouts/columnIframe';

		$this->pageTitle = 'Contact Us - '.$this->pageTitle;

		$model = new ContactForm;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact2',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email'], 'renndh2003@hotmail.com', 'dvcomputers.website@outlook.com'),
					'subject'=>'Hi, UFO Elektronika Contact from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact2', array(
			'model'=>$model,
		));
	}
	public function actionContact3()
	{
		$this->layout='//layouts/columnIframe';

		$this->pageTitle = 'Report Bugs & Error - '.$this->pageTitle;

		$model = new ContactForm2;
		$model->scenario = 'insert';

		if(isset($_POST['ContactForm2']))
		{
			$model->attributes=$_POST['ContactForm2'];

			if($model->validate())
			{
				// config email
				$messaged = $this->renderPartial('//mail/contact3',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email'], $this->setting['contact_email'], 'renndh2003@hotmail.com', 'dvcomputers.website@outlook.com'),
					'subject'=>'Report Bugs & Error from '.$model->email,
					'message'=>$messaged,
				);
				if ($this->setting['contact_cc']) {
					$config['cc'] = array($this->setting['contact_cc']);
				}
				if ($this->setting['contact_bcc']) {
					$config['bcc'] = array($this->setting['contact_bcc']);
				}
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contact us. We will respond to you as soon as possible.');
				$this->refresh();
			}

		}

		$this->render('contact3', array(
			'model'=>$model,
		));
	}
	public function actionSeen_on()
	{
		$this->layout='//layouts/column2';

		$this->pageTitle = 'As Seen On '.$this->pageTitle;

		$model = new ContactForm;
		$model->scenario = 'insert';

		$this->render('seen_on', array(
			'model'=>$model,
		));
	}

	public function actionPrd_landing()
	{
		$this->layout='//layouts/column2';
		$this->pageTitle = 'Product Landing '.$this->pageTitle;
		$this->render('prd_landing', array(
			'model'=>$model,
		));
	}
	public function actionMerchant_partner()
	{
		$this->layout='//layouts/column2';

		$this->pageTitle = 'Merchant Partner'.$this->pageTitle;
		$this->render('merchant_partner', array(
			'model'=>$model,
		));
	}
	public function actionStore_locator()
	{
		$this->layout='//layouts/column2';

		$this->pageTitle = 'Store Locator'.$this->pageTitle;
		$this->render('store_locator', array(
			'model'=>$model,
		));
	}
	
	public function actionPartner()
	{
		$this->layout='//layouts/column2';

		$this->pageTitle = 'Partner'.$this->pageTitle;
		$this->render('partner', array(
			'model'=>$model,
		));
	}

	public function actionHowtobuy()
	{
		$this->layout='//layouts/column2';

		$this->pageTitle = 'How To Buy'.$this->pageTitle;
		$this->render('howtobuy', array(
			'model'=>$model,
		));
	}

}


