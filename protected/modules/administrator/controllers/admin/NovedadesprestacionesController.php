<?php

class NovedadesprestacionesController extends Controller
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
	public function actionCreate($personaGeneral,$id)
	{
		$Personasgenerales = Personasgenerales::model()->findByPk($personaGeneral);
		$Novedadesprestaciones = new Novedadesprestaciones;
	
		$data = $Novedadesprestaciones->getNovedadesprestaciones($Personasgenerales->PEGE_ID,$id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['descPrestaciones'])) && (isset($_POST['yt0'])))
		{
			
			foreach ($_POST['descPrestaciones'] as $concepto=>$valor ){
			  
			  $criteria = new CDbCriteria;
		      $criteria->condition = ' "NOPR_ID" = '.$concepto;
			  $Novedadprestacion = Novedadesprestaciones::model()->find($criteria);
		      $Novedadesprestaciones = Novedadesprestaciones::model()->findByPk($Novedadprestacion->NOPR_ID);
			
			  if(!is_numeric($valor)){ $valor = 0; }
			  
			  $Novedadesprestaciones->NOPR_VALOR = $valor;
			  
			  $Novedadesprestaciones->NOPR_FECHACAMBIO =  date('Y-m-d H:i:s');
			  $Novedadesprestaciones->NOPR_REGISTRADOPOR = Yii::app()->user->id;
			  $Novedadesprestaciones->save();			  			  		 
			 }
			Yii::app()->user->setFlash('success','<strong>Valores en descuentos de prestaciones actualizados correctamente :)</strong>');
		    $data = $Novedadesprestaciones->getNovedadesprestaciones($Novedadesprestaciones->PEGE_ID,$id);
			$this->redirect(array('create','personaGeneral'=>$Personasgenerales->PEGE_ID,'id'=>$id));
		}
		
		$url = '';
		if($id==1){ 
		 $url = 'semestralnominaliquidaciones';
		}elseif($id==2){ 
		  $url = 'navidadnominaliquidaciones'; 
		}elseif($id==3){ 
		  $url = 'primavacacionesnominaliquidaciones'; 
		}elseif($id==4){ 
		  $url = 'vacacionesnominaliquidaciones'; 
		}elseif($id==5){ 
		  $url = 'retroactivosnominaliquidaciones'; 
		}
		 
		if(isset($_POST['yt1']))
		{  
		 $this->redirect(array('admin/'.$url.'/preview','personaGeneral'=>$Personasgenerales->PEGE_ID, 'id'=>$id));
		}

		$this->render('create',array(
			'Novedadesprestaciones'=>$Novedadesprestaciones,
			'data'=>$data,
			'Personasgenerales'=>$Personasgenerales,
			'id'=>$id,
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

		if(isset($_POST['Novedadesprestaciones']))
		{
			$model->attributes=$_POST['Novedadesprestaciones'];
			$model->NOPR_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->NOPR_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->NOPR_ID));
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
		$dataProvider=new CActiveDataProvider('Novedadesprestaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Novedadesprestaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Novedadesprestaciones']))
			$model->attributes=$_GET['Novedadesprestaciones'];

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
		$model=Novedadesprestaciones::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='novedadesprestaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSearch($id)
	{
	
		$Novedadesprestaciones = new Novedadesprestaciones('buscar');
		$Novedadesprestaciones->unsetAttributes();
		
		if((isset($_GET['Novedadesprestaciones'])))
		{			    
			$PEGE_IDENTIFICACION = $Novedadesprestaciones->attributes=$_GET['Novedadesprestaciones']['PEGE_IDENTIFICACION'];	$PEGE_PRIMERNOMBRE = $Novedadesprestaciones->attributes=$_GET['Novedadesprestaciones']['PEGE_PRIMERNOMBRE'];
			$PEGE_SEGUNDONOMBRE = $Novedadesprestaciones->attributes=$_GET['Novedadesprestaciones']['PEGE_SEGUNDONOMBRE']; 	$PEGE_PRIMERAPELLIDO = $Novedadesprestaciones->attributes=$_GET['Novedadesprestaciones']['PEGE_PRIMERAPELLIDO'];
			$PEGE_SEGUNDOAPELLIDOS = $Novedadesprestaciones->attributes=$_GET['Novedadesprestaciones']['PEGE_SEGUNDOAPELLIDOS'];
			if(($PEGE_IDENTIFICACION!=NULL) OR ($PEGE_PRIMERNOMBRE!=NULL) OR ($PEGE_SEGUNDONOMBRE!=NULL) OR ($PEGE_PRIMERAPELLIDO!=NULL) OR ($PEGE_SEGUNDOAPELLIDOS!=NULL)){
			 $Novedadesprestaciones->attributes=$_GET['Novedadesprestaciones'];			
		    }else{	
			      $Novedadesprestaciones->PEGE_ID = '0';		     
			     }  
		}else{	
			 $Novedadesprestaciones->PEGE_ID = '0';		     
			 }
		
		$this->render('search',array(
								   'Novedadesprestaciones'=>$Novedadesprestaciones,
								   'id'=>$id,
		                           )
		              );
	}
}