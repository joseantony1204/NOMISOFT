<?php

class HorasextrasyrecargosController extends Controller
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
                                 'search','admin','create','update',  
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
		$model=new Horasextrasyrecargos;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Horasextrasyrecargos']))
		{
			$model->attributes=$_POST['Horasextrasyrecargos'];
	        $model->HOER_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->HOER_REGISTRADOPOR = Yii::app()->user->id;			 
			if($model->save())
				$this->redirect(array('admin','id'=>$model->HOER_ID));
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
		$Horasextrasyrecargos = $this->loadModel($id);
		$Empleosplanta = Empleosplanta::model()->findByPk($Horasextrasyrecargos->EMPL_ID);
        $Personasgenerales = Personasgenerales::model()->findByPk($Empleosplanta->PEGE_ID);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['Horasextrasyrecargos'])) && (isset($_POST['yt0'])))
		{
			$Horasextrasyrecargos->attributes=$_POST['Horasextrasyrecargos'];
			$Horasextrasyrecargos->HOER_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Horasextrasyrecargos->HOER_REGISTRADOPOR = Yii::app()->user->id;
			if($Horasextrasyrecargos->save()){
				Yii::app()->user->setFlash('success','<strong>Valores de horas extras actualizados correctamente :)</strong>');
				$this->redirect(array('update','id'=>$Horasextrasyrecargos->HOER_ID));
		    }else{
			     Yii::app()->user->setFlash('error','<strong>Oppss!. </strong> No se ha podido actualizar los valores de horas extas');
				 }
		}
        
		if(isset($_POST['yt1']))
		{  
		 $this->redirect(array('admin/mensualnominaliquidaciones/preview','id'=>$Personasgenerales->PEGE_ID, 'empleoPlanta'=>$Horasextrasyrecargos->EMPL_ID));
		}
		
		$this->render('update',array(
			'Horasextrasyrecargos'=>$Horasextrasyrecargos,
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
		$dataProvider=new CActiveDataProvider('Horasextrasyrecargos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($empleoPlanta)
	{
		$Horasextrasyrecargos = new Horasextrasyrecargos('search');
		$Horasextrasyrecargos->unsetAttributes();  // clear any default values
		if(isset($_GET['Horasextrasyrecargos'])){
			$Horasextrasyrecargos->attributes=$_GET['Horasextrasyrecargos'];
         }
		 
		$Horasextrasyrecargos->EMPL_ID = $empleoPlanta;
		$this->render('admin',array(
			'Horasextrasyrecargos'=>$Horasextrasyrecargos,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Horasextrasyrecargos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='horasextrasyrecargos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSearch()
	{
	
		$Horasextrasyrecargos = new Horasextrasyrecargos('buscar');
		$Horasextrasyrecargos->unsetAttributes();
		
		if((isset($_GET['Horasextrasyrecargos'])))
		{			    
			$PEGE_IDENTIFICACION = $Horasextrasyrecargos->attributes=$_GET['Horasextrasyrecargos']['PEGE_IDENTIFICACION'];	$PEGE_PRIMERNOMBRE = $Horasextrasyrecargos->attributes=$_GET['Horasextrasyrecargos']['PEGE_PRIMERNOMBRE'];
			$PEGE_SEGUNDONOMBRE = $Horasextrasyrecargos->attributes=$_GET['Horasextrasyrecargos']['PEGE_SEGUNDONOMBRE']; 	$PEGE_PRIMERAPELLIDO = $Horasextrasyrecargos->attributes=$_GET['Horasextrasyrecargos']['PEGE_PRIMERAPELLIDO'];
			$PEGE_SEGUNDOAPELLIDOS = $Horasextrasyrecargos->attributes=$_GET['Horasextrasyrecargos']['PEGE_SEGUNDOAPELLIDOS'];
			if(($PEGE_IDENTIFICACION!=NULL) OR ($PEGE_PRIMERNOMBRE!=NULL) OR ($PEGE_SEGUNDONOMBRE!=NULL) OR ($PEGE_PRIMERAPELLIDO!=NULL) OR ($PEGE_SEGUNDOAPELLIDOS!=NULL)){
			 $Horasextrasyrecargos->attributes=$_GET['Horasextrasyrecargos'];			
		    }else{	
			      $Horasextrasyrecargos->PEGE_ID = '0';		     
			     }  
		}else{	
			 $Horasextrasyrecargos->PEGE_ID = '0';		     
			 }
		
		$this->render('search',array(
								   'Horasextrasyrecargos'=>$Horasextrasyrecargos,
		                           )
		              );
	}
}