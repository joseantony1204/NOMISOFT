<?php

class DescuentosmensualesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
	  if(!Yii::app()->user->getIsGuest())
      {
		$Usuario = Usuarios::model()->findByPk(Yii::app()->user->id);
		$curpage = Yii::app()->getController()->id;
		$controllers = explode('/',$curpage);
		
		$modulos = Yii::app()->user->modulosUsuarios;
		$views = Yii::app()->user->viewsAccesoUsuario($this->module->id,$controllers[0],$controllers[1]);
		foreach($views as $data){
		 $array[] = $data['USVI_URL'];
		}
        return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'',''.$array[5].'',
                                 'download','admin','create','update','reset','delete',
                                 ),
				'users'=>array($Usuario->USUA_USUARIO),
			),			
			array('deny',  // deny all users
				'users'=>array('*'),
			),	
		);
	  }else{ return array( array('deny','users'=>array('*'),),);}
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
	
	public function actionReset($id)
	{
		$Descuentosmensuales = Descuentosmensuales::model()->findByPk($id);
		$reset = $Descuentosmensuales->resetDescuentomensual();	
		if($reset==TRUE){
	     Yii::app()->user->setFlash('success','La deduccion: <strong>'.$Descuentosmensuales->DEME_NOMBRE.'</strong> ha sido reestablcida a cero (0) correctamente :)');
	    }else{
	          Yii::app()->user->setFlash('error','<strong>Oppss!. </strong>Ocurrio algun problema, no se ha podido reestablcer: <strong>'.$Descuentosmensuales->DEME_NOMBRE.'</strong> ');  
		     }		
		$this->redirect(array('admin',));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$Descuentosmensuales = new Descuentosmensuales;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Descuentosmensuales']))
		{
			$Descuentosmensuales->attributes=$_POST['Descuentosmensuales'];
	        $Descuentosmensuales->DEME_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Descuentosmensuales->DEME_REGISTRADOPOR = Yii::app()->user->id;			 
			if($Descuentosmensuales->save()){
				$Descuentosmensuales->defaultDescuentosMensuales($Descuentosmensuales->DEME_ID);
				$this->redirect(array('admin',));
			}
		}

		$this->render('create',array(
			'model'=>$Descuentosmensuales,
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
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Descuentosmensuales']))
		{
			$model->attributes=$_POST['Descuentosmensuales'];
			$model->DEME_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->DEME_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->DEME_ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Descuentosmensuales');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Descuentosmensuales('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Descuentosmensuales']))
			$model->attributes=$_GET['Descuentosmensuales'];

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
		$model=Descuentosmensuales::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='descuentosmensuales-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionDownload($id)
	{
	 $Descuentosmensuales = new Descuentosmensuales;
	 $Descuentosmensuales->getAfiliados($id);	 
	 $this->render('download',array(
			'Descuentosmensuales'=>$Descuentosmensuales,
		));
	}
}