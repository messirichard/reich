<?php

class PromoController extends ControllerAdmin
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
			array('admin.filter.AuthFilter', 'params'=>array(
				'actionAllowOnLogin'=>array('edit'),
			)),
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
				'actions'=>array('admin','delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			): array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Promo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Promo']))
		{
			$model->attributes=$_POST['Promo'];


			if($model->validate()){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$model->save();
					if ($model->jml_voucher > 1) {
						for ($i=0; $i < $model->jml_voucher; $i++) { 
							$modelList = new PromoList;
							$modelList->promo_id = $model->id;
							$modelList->kode = strtoupper($model->kode.substr(sha1(rand()), 0, 10));
							$modelList->save(false);
						}						
					}else{
						$modelList = new PromoList;
						$modelList->promo_id = $model->id;
						$modelList->kode = strtoupper($model->kode);
						$modelList->save(false);
					}
					Log::createLog("Promo Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('index'));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
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

		$modelList = PromoList::model()->findAll('promo_id = :id', array(':id'=>$model->id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Promo']))
		{
			$model->attributes=$_POST['Promo'];

			if ($model->validate()) {

				$model->save();

				if ($model->jml_voucher != '') {
					if ($model->jml_voucher > 1) {
						for ($i=0; $i < $model->jml_voucher; $i++) { 
							$modelList = new PromoList;
							$modelList->promo_id = $model->id;
							$modelList->kode = strtoupper($model->kode.substr(sha1(rand()), 0, 10));
							$modelList->save(false);
						}						
					}
				}
				Yii::app()->user->setFlash('success',Tt::t('admin', 'Data Edited'));
				Log::createLog("Promo Update $model->id");
				$this->redirect(array('index'));
			}
		}
		$this->render('update',array(
			'model'=>$model,
			'modelList'=>$modelList,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// if(Yii::app()->request->isPostRequest)
		// {
			// we only allow deletion via POST request
			$data = $this->loadModel($id);
			Log::createLog("Promo Delete $data->id");
			$data->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			// if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		// }
		// else
		// 	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Promo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Promo']))
			$model->attributes=$_GET['Promo'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Promo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Promo']))
			$model->attributes=$_GET['Promo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Promo::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
