<?php

class NovedadesretroactivopuntosController extends Controller
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
                                 ''.$array[6].'','admin','create','update', 'checkpass', 'mesesretroactivospuntos',
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Novedadesretroactivopuntos;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Novedadesretroactivopuntos']))
		{
			$model->attributes=$_POST['Novedadesretroactivopuntos'];
	        $model->NORP_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->NORP_REGISTRADOPOR = Yii::app()->user->id;			 
			if($model->save())
				$this->redirect(array('admin','id'=>$model->NORP_ID));
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
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Novedadesretroactivopuntos']))
		{
			$model->attributes=$_POST['Novedadesretroactivopuntos'];
			$model->NORP_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->NORP_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->NORP_ID));
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
		$dataProvider=new CActiveDataProvider('Novedadesretroactivopuntos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
    
	public function actionCheckpass()
	{
	 if(isset($_POST['info']))
	 {
		$pass = $_POST['info'];
		$Usuario = Usuarios::model()->findByPk(Yii::app()->user->id);
			
		if($Usuario==NULL){
		echo 'false';		
		}else{
		      if(!$Usuario->validatePassword($pass)){
			   echo 'false';	
		      }else{
			        echo 'true';
		           }
		      }
	 }else{
		   echo "";
	      }
	}
	
	public function actionMesesretroactivospuntos()
	{
	 $Novedadesretroactivopuntos = new Novedadesretroactivopuntos;
	 $Cform = new Cform;
	 
	 if(isset($_POST['Cform'])){
	  $Cform->attributes=$_POST['Cform'];
	  $Cform->NOVE_TIPOCARGO = $_POST["Cform_NOVE_TIPOCARGO"];
	  $Cform->NOVE_TIPONOMINA = $_POST["Cform_NOVE_TIPONOMINA"];
	  $Cform->NOVE_UNIDADES = $Cform->attributes=$_POST['Cform']["NOVE_UNIDADES"];
	  $Novedadesretroactivopuntos->setUnidadesNomina($Cform);
	 }
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$Novedadesretroactivopuntos = new Novedadesretroactivopuntos;
		$Cform = new Cform;
		
	    if((isset($_POST['yt2'])) && (isset($_POST['numMesesRetroactivos']))){
         Yii::app()->user->setFlash('success','<strong> Meses de retroactivo de putos actualizadas correctamente :)</strong>');
		 foreach($_POST['numMesesRetroactivos'] as $mesesrp=>$mesrp)
		 {	
		  $Novedadesretroactivopuntos = Novedadesretroactivopuntos::model()->findByPk($mesesrp);			
		  $Novedadesretroactivopuntos->NORP_MESES = $mesrp;
		  $Novedadesretroactivopuntos->save();
		 }     				 
		}
		
		$Novedadesretroactivopuntos->previewdiasretroactivospuntos($Cform);
		$this->render('admin',array(
			'Novedadesretroactivopuntos'=>$Novedadesretroactivopuntos,
			'Cform'=>$Cform,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Novedadesretroactivopuntos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='novedadesretroactivopuntos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}