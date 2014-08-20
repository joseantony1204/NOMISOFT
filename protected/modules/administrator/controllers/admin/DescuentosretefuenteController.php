<?php

class DescuentosretefuenteController extends Controller
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
	public function actionCreate($id)
	{
		$Personasgenerales = Personasgenerales::model()->findByPk($id);
		$Descuentosretefuente = new Descuentosretefuente;
	
		$data = $Descuentosretefuente->obtenerDescuentosRetefuente($Personasgenerales->PEGE_ID);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['descRetefuente'])) && (isset($_POST['yt0'])))
		{
			
			foreach ($_POST['descRetefuente'] as $concepto=>$valor ){
			  
			  $criteria = new CDbCriteria;
		      $criteria->condition = ' "DERE_ID" = '.$concepto;
			  $Descuentoretefuente = Descuentosretefuente::model()->find($criteria);
		      $Descuentosretefuente = Descuentosretefuente::model()->findByPk($Descuentoretefuente->DERE_ID);
			
			  if(!is_numeric($valor)){ $valor = 0; }
			  
			  $Descuentosretefuente->DERE_VALOR = $valor;
			  
			  $Descuentosretefuente->DERE_FECHACAMBIO =  date('Y-m-d H:i:s');
			  $Descuentosretefuente->DERE_REGISTRADOPOR = Yii::app()->user->id;
			  $Descuentosretefuente->save();			  			  		 
			 }
			
		    $data = $Descuentosretefuente->obtenerDescuentosRetefuente($Descuentosretefuente->PEGE_ID);
			$this->redirect(array('create','id'=>$Personasgenerales->PEGE_ID,));
		}
		
		if(isset($_POST['yt1']))
		{  
		 $this->redirect(array('admin/mensualnominaliquidaciones/preview','id'=>$Personasgenerales->PEGE_ID, 'empleoPlanta'=>$empleoPlanta));
		}

		$this->render('create',array(
			'Descuentosretefuente'=>$Descuentosretefuente,
			'data'=>$data,
			'Personasgenerales'=>$Personasgenerales,
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

		if(isset($_POST['Descuentosretefuente']))
		{
			$model->attributes=$_POST['Descuentosretefuente'];
			$model->DERE_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->DERE_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->DERE_ID));
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
		$dataProvider=new CActiveDataProvider('Descuentosretefuente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Descuentosretefuente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Descuentosretefuente']))
			$model->attributes=$_GET['Descuentosretefuente'];

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
		$model=Descuentosretefuente::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='descuentosretefuente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSearch()
	{
	
		$Descuentosretefuente = new Descuentosretefuente('buscar');
		$Descuentosretefuente->unsetAttributes();
		
		if((isset($_GET['Descuentosretefuente'])))
		{			    
			$PEGE_IDENTIFICACION = $Descuentosretefuente->attributes=$_GET['Descuentosretefuente']['PEGE_IDENTIFICACION'];	$PEGE_PRIMERNOMBRE = $Descuentosretefuente->attributes=$_GET['Descuentosretefuente']['PEGE_PRIMERNOMBRE'];
			$PEGE_SEGUNDONOMBRE = $Descuentosretefuente->attributes=$_GET['Descuentosretefuente']['PEGE_SEGUNDONOMBRE']; 	$PEGE_PRIMERAPELLIDO = $Descuentosretefuente->attributes=$_GET['Descuentosretefuente']['PEGE_PRIMERAPELLIDO'];
			$PEGE_SEGUNDOAPELLIDOS = $Descuentosretefuente->attributes=$_GET['Descuentosretefuente']['PEGE_SEGUNDOAPELLIDOS'];
			if(($PEGE_IDENTIFICACION!=NULL) OR ($PEGE_PRIMERNOMBRE!=NULL) OR ($PEGE_SEGUNDONOMBRE!=NULL) OR ($PEGE_PRIMERAPELLIDO!=NULL) OR ($PEGE_SEGUNDOAPELLIDOS!=NULL)){
			 $Descuentosretefuente->attributes=$_GET['Descuentosretefuente'];			
		    }else{	
			      $Descuentosretefuente->PEGE_ID = '0';		     
			     }  
		}else{	
			 $Descuentosretefuente->PEGE_ID = '0';		     
			 }
		
		$this->render('search',array(
								   'Descuentosretefuente'=>$Descuentosretefuente,
		                           )
		              );
	}
}