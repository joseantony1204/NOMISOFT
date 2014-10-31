<?php

class NovedadesmensualesController extends Controller
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
                                 ''.$array[6].'','admin','create','update', 'updateDias', 'getCargo', 'loadDescuentos',  
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
	public function actionLoadDescuentos($empleoPlanta)
	{
		$Novedadesmensuales = new Novedadesmensuales;
		$data = $Novedadesmensuales->obtenerNovedadesMensuales($empleoPlanta);
		
		$this->render('create',array(
			'data'=>$data,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id,$catedraId=NULL)
	{
		$Personasgenerales = Personasgenerales::model()->findByPk($id);
		$Catedras = new Catedras;		
		
		/*OBTENIENDO EMPLEOS DE PLANTA DE LA PERSONA*/
        $sort = new CSort();
		$sort->attributes = array(
			'defaultOrder'=>'t.CATE_ID ASC',		
			
		);		
		$criteria = new CDbCriteria;
        $criteria->select = 't.*, p."PEGE_ID", p."PEGE_PRIMERNOMBRE", p."PEGE_PRIMERAPELLIDO"';
	    $criteria->join = 'INNER JOIN "TBL_CATPERSONASGENERALES" "p" ON p."PEGE_ID" = t."PEGE_ID" AND t."PEGE_ID" ='.$Personasgenerales->PEGE_ID;
		$criteria->order = 't."CATE_ID" DESC';
		
		$Catedras =  new CActiveDataProvider($Catedras, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 5,),
		));
		
		$Novedadesmensuales = new Novedadesmensuales;
		if($catedraId!=NULL){
		 $data = $Novedadesmensuales->obtenerNovedadesMensuales($catedraId);
		}else{
			 $idCatedra = Catedras::model()->find($criteria);
		     $Catedra = Catedras::model()->findByPk($idCatedra->CATE_ID);
			 $data = $Novedadesmensuales->obtenerNovedadesMensuales($Catedra->CATE_ID);
			 $catedraId = $idCatedra->CATE_ID;
			 }
		
		if((isset($_POST['descMensual'])) && (isset($_POST['yt0'])))
		{
			
			foreach ($_POST['descMensual'] as $concepto=>$valor ){
			  
			  $criteria = new CDbCriteria;
		      $criteria->condition = ' "NOME_ID" = '.$concepto;
			  $Novedadmensual = Novedadesmensuales::model()->find($criteria);
		      $Novedadesmensuales = Novedadesmensuales::model()->findByPk($Novedadmensual->NOME_ID);
			
			  if(!is_numeric($valor)){ $valor = 0; }
			  
			  $Novedadesmensuales->NOME_VALOR = $valor;
			  
			  $Novedadesmensuales->NOME_FECHACAMBIO =  date('Y-m-d H:i:s');
			  $Novedadesmensuales->NOME_REGISTRADOPOR = Yii::app()->user->id;
			  $Novedadesmensuales->save();			  			  		 
			 }
			Yii::app()->user->setFlash('success','<strong>Valores de descuentos mensuales actualizados correctamente :)</strong>');
		    $data = $Novedadesmensuales->obtenerNovedadesMensuales($Novedadesmensuales->CATE_ID);
			$this->redirect(array('create','id'=>$Personasgenerales->PEGE_ID, 'catedraId'=>$Novedadesmensuales->CATE_ID));
		}
        
		if(isset($_POST['yt1']))
		{  
		 $this->redirect(array('admin/mensualnominaliquidaciones/preview','id'=>$Personasgenerales->PEGE_ID, 'catedraId'=>$catedraId));
		}
		
		$this->render('create',array(
			'data'=>$data,
			'Personasgenerales'=>$Personasgenerales,
			'Catedras'=>$Catedras,
			'catedraId'=>$catedraId,
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

		if(isset($_POST['Novedadesmensuales']))
		{
			$model->attributes=$_POST['Novedadesmensuales'];
			$model->NOME_FECHACAMBIO =  date('Y-m-d H:i:s');
			$model->NOME_REGISTRADOPOR = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin','id'=>$model->NOME_ID));
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
		$dataProvider=new CActiveDataProvider('Novedadesmensuales');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	
		$Novedadesmensuales = new Novedadesmensuales('buscar');
		$Novedadesmensuales->unsetAttributes();
		
		if((isset($_GET['Novedadesmensuales'])))
		{			    
			$PEGE_IDENTIFICACION = $Novedadesmensuales->attributes=$_GET['Novedadesmensuales']['PEGE_IDENTIFICACION'];	$PEGE_PRIMERNOMBRE = $Novedadesmensuales->attributes=$_GET['Novedadesmensuales']['PEGE_PRIMERNOMBRE'];
			$PEGE_SEGUNDONOMBRE = $Novedadesmensuales->attributes=$_GET['Novedadesmensuales']['PEGE_SEGUNDONOMBRE']; 	$PEGE_PRIMERAPELLIDO = $Novedadesmensuales->attributes=$_GET['Novedadesmensuales']['PEGE_PRIMERAPELLIDO'];
			$PEGE_SEGUNDOAPELLIDOS = $Novedadesmensuales->attributes=$_GET['Novedadesmensuales']['PEGE_SEGUNDOAPELLIDOS'];
			if(($PEGE_IDENTIFICACION!=NULL) OR ($PEGE_PRIMERNOMBRE!=NULL) OR ($PEGE_SEGUNDONOMBRE!=NULL) OR ($PEGE_PRIMERAPELLIDO!=NULL) OR ($PEGE_SEGUNDOAPELLIDOS!=NULL)){
			 $Novedadesmensuales->attributes=$_GET['Novedadesmensuales'];			
		    }else{	
			      $Novedadesmensuales->PEGE_ID = '0';		     
			     }  
		}else{	
			 $Novedadesmensuales->PEGE_ID = '0';		     
			 }
		
		$this->render('admin',array(
								   'Novedadesmensuales'=>$Novedadesmensuales,
		                           )
		              );
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Novedadesmensuales::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='novedadesmensuales-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionUpdateDias()
	{
		 //Yii::import('ext.editable.EditableSaver'); //or you can add import 'ext.editable.*' to config
		 $phpEditablePath = Yii::getPathOfAlias('ext.x-editable');
		 include($phpEditablePath . DIRECTORY_SEPARATOR . 'EditableSaver.php');
         $es = new EditableSaver('Empleosplanta'); // 'User' is classname of model to be updated
		 try {
              $es->update();
             } catch(CException $e) {
                                     echo CJSON::encode(array('success' => false, 'msg' => $e->getMessage()));
                                     return;
                                    }
         echo CJSON::encode(array('success' => true));
	}
}