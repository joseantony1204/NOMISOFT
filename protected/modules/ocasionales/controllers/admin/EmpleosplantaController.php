<?php

class EmpleosplantaController extends Controller
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
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'','delete',
                                 'search','admin','create','update','aumentoadmin','aumentodocen','diasnominas', 'aumentopuntos',
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
	public function actionCreate($personaGeneral)
	{
		$Personasgenerales = Personasgenerales::model()->findByPk($personaGeneral);
		$Empleosplanta = new Empleosplanta;
		$Estadosempleosplanta = new Estadosempleosplanta;
		$Factoressalariales = new Factoressalariales;
		$Horasextrasyrecargos = new Horasextrasyrecargos;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empleosplanta']))
		{
			$Empleosplanta->attributes=$_POST['Empleosplanta'];
			$Estadosempleosplanta->attributes=$_POST['Estadosempleosplanta'];
			$Factoressalariales->attributes=$_POST['Factoressalariales'];
			$Horasextrasyrecargos->attributes=$_POST['Horasextrasyrecargos'];
			
			$Empleosplanta->PEGE_ID	= $personaGeneral; 
            $Empleosplanta->EMPL_DIASAPAGAR =  30-(date("j", strtotime($Empleosplanta->EMPL_FECHAINGRESO)))+1;			
	        $Empleosplanta->EMPL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Empleosplanta->EMPL_REGISTRADOPOR = Yii::app()->user->id;			 
			if($Empleosplanta->save()){
				    
					/*ASIGNADO DESCUENTOS MENSUALES POR DEFECTO*/					
					$Empleosplanta->defaultDescuentosMensuales($Empleosplanta->EMPL_ID);		
					
					/*ACTUALIZANDO DIAS DE TRABAJO DE ESTE CARGO  Y/O DEL CARGO ANTERIOR */
					$Empleosplanta->setWorkDays($Empleosplanta);
					
					
				    /*AGREGANDO EL ESTADO DEL CARGO*/
					$Estadosempleosplanta->EMPL_ID = $Empleosplanta->EMPL_ID;
				    $Estadosempleosplanta->ESEP_FECHAREGISTRO = $Empleosplanta->EMPL_FECHAINGRESO;				    
					$Estadosempleosplanta->ESEP_FECHACAMBIO =  $Personasgenerales->PEGE_FECHACAMBIO;
			        $Estadosempleosplanta->ESEP_REGISTRADOPOR = $Personasgenerales->PEGE_REGISTRADOPOR;
					$Estadosempleosplanta->save();
					
					/*AGREGANDO LOS FACTORES SALARIALES*/
					$Factoressalariales->EMPL_ID = $Empleosplanta->EMPL_ID;					
					$Factoressalariales->FASA_FECHACAMBIO =  $Personasgenerales->PEGE_FECHACAMBIO;
			        $Factoressalariales->FASA_REGISTRADOPOR = $Personasgenerales->PEGE_REGISTRADOPOR;
					$Factoressalariales->save();
					
					/*AGREGANDO LAS INFORMACION DE HORAS EXTRAS*/
					$Horasextrasyrecargos->EMPL_ID = $Empleosplanta->EMPL_ID;					
					$Horasextrasyrecargos->HOER_FECHACAMBIO =  $Personasgenerales->PEGE_FECHACAMBIO;
			        $Horasextrasyrecargos->HOER_REGISTRADOPOR = $Personasgenerales->PEGE_REGISTRADOPOR;
					$Horasextrasyrecargos->save();
				
				$this->redirect(array('admin','personaGeneral'=>$Empleosplanta->PEGE_ID));
		    }
		}
		
        $Empleosplanta->PEGE_ID = $personaGeneral;
		$this->render('create',array(
			'Empleosplanta'=>$Empleosplanta,
			'Personasgenerales'=>$Personasgenerales,
			'Estadosempleosplanta'=>$Estadosempleosplanta,
			'Factoressalariales'=>$Factoressalariales,
			'Horasextrasyrecargos'=>$Horasextrasyrecargos,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$Empleosplanta = $this->loadModel($id);
		$Personasgenerales = Personasgenerales::model()->findByPk($Empleosplanta->PEGE_ID);
		
		$criteria = new CDbCriteria;
		$criteria->condition = ' "EMPL_ID" = '.$Empleosplanta->EMPL_ID;
		$criteria->order = '"ESEP_FECHAREGISTRO" DESC ';
		
		$Estadoempleoplanta = Estadosempleosplanta::model()->find($criteria);
		$Estadosempleosplanta = Estadosempleosplanta::model()->findByPk($Estadoempleoplanta->ESEP_ID);
		
		$criteria = new CDbCriteria;
		$criteria->condition = ' "EMPL_ID" = '.$Empleosplanta->EMPL_ID;
		$Factorsalarial = Factoressalariales::model()->find($criteria);
		$Factoressalariales = Factoressalariales::model()->findByPk($Factorsalarial->FASA_ID);
		
		$criteria = new CDbCriteria;
		$criteria->condition = ' "EMPL_ID" = '.$Empleosplanta->EMPL_ID;
		$Horaextrayrecargo = Horasextrasyrecargos::model()->find($criteria);
		$Horasextrasyrecargos = Horasextrasyrecargos::model()->findByPk($Horaextrayrecargo->HOER_ID);		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Empleosplanta']))
		{
			$Empleosplanta->attributes=$_POST['Empleosplanta'];
			$Estadosempleosplanta->attributes=$_POST['Estadosempleosplanta'];
			$Factoressalariales->attributes=$_POST['Factoressalariales'];
			$Horasextrasyrecargos->attributes=$_POST['Horasextrasyrecargos'];
			
			$Empleosplanta->EMPL_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Empleosplanta->EMPL_REGISTRADOPOR = Yii::app()->user->id;
			if($Empleosplanta->save()){	
					
				    /*AGREGANDO EL ESTADO DEL CARGO*/
					$Estadosempleosplanta->EMPL_ID = $Empleosplanta->EMPL_ID;
				    //$Estadosempleosplanta->ESEP_FECHAREGISTRO = date("Y-m-d");				    
					$Estadosempleosplanta->ESEP_FECHACAMBIO =  date('Y-m-d H:i:s');
			        $Estadosempleosplanta->ESEP_REGISTRADOPOR = Yii::app()->user->id;
					$Estadosempleosplanta->save();
					
					/*AGREGANDO LOS FACTORES SALARIALES*/
					$Factoressalariales->EMPL_ID = $Empleosplanta->EMPL_ID;					
					$Factoressalariales->FASA_FECHACAMBIO =  date('Y-m-d H:i:s');
			        $Factoressalariales->FASA_REGISTRADOPOR = Yii::app()->user->id;
					$Factoressalariales->save();
					
					/*AGREGANDO LAS INFORMACION DE HORAS EXTRAS*/
					$Horasextrasyrecargos->EMPL_ID = $Empleosplanta->EMPL_ID;					
					$Horasextrasyrecargos->HOER_FECHACAMBIO =  date('Y-m-d H:i:s');
			        $Horasextrasyrecargos->HOER_REGISTRADOPOR = Yii::app()->user->id;
					$Horasextrasyrecargos->save();
				
				$this->redirect(array('admin','personaGeneral'=>$Empleosplanta->PEGE_ID));
		    }
		}

		$this->render('update',array(
			'Empleosplanta'=>$Empleosplanta,
			'Personasgenerales'=>$Personasgenerales,
			'Estadosempleosplanta'=>$Estadosempleosplanta,
			'Factoressalariales'=>$Factoressalariales,
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
		$dataProvider=new CActiveDataProvider('Empleosplanta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($personaGeneral)
	{
		$Personasgenerales = Personasgenerales::model()->findByPk($personaGeneral);
		$Empleosplanta = new Empleosplanta('busqueda');
		$Empleosplanta->unsetAttributes();  // clear any default values
		if(isset($_GET['Empleosplanta'])){
			$Empleosplanta->attributes=$_GET['Empleosplanta'];
        }
		
		$Empleosplanta->PEGE_ID = $personaGeneral;
		$this->render('admin',array(
			'Empleosplanta'=>$Empleosplanta,
			'Personasgenerales'=>$Personasgenerales,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Empleosplanta::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='empleosplanta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAumentoadmin()
	{
		$Empleosplanta = new Empleosplanta;
		$Cform = new Cform;
		$Cform->AUAD_PORCENTAJE = 0;
		
		if((isset($_POST['yt0'])) && (isset($_POST['Cform']))){
         $Cform->attributes=$_POST['Cform'];
		 $Cform->AUAD_PORCENTAJE = $Cform->attributes=$_POST['Cform']["AUAD_PORCENTAJE"];		 
	    }
		
		if((isset($_POST['yt1'])) & (isset($_POST['Cform']))){
        $Cform->attributes=$_POST['Cform'];
		$Cform->AUAD_PORCENTAJE = $Cform->attributes=$_POST['Cform']["AUAD_PORCENTAJE"];
		 if(($Cform->AUAD_PORCENTAJE!='') && ($Cform->AUAD_PORCENTAJE!=0)){
		  $Empleosplanta->setAumentoAdmin($Cform);
		  Yii::app()->user->setFlash('success','<strong> Porcentaje de aumento salarial para empleados administrativos actualizado correctamente :)</strong>');
		  $this->refresh();
		 }else{
			   $Cform->AUAD_PORCENTAJE = 0;		       
			   Yii::app()->user->setFlash('error','<strong>Oppss!. </strong> Debe ingresar un porcentaje mayor que cero (0) para usar esta funcionalidad');  
			  }    
	    }		
		
		$Empleosplanta->previewAumentoAdmin($Cform);
		$this->render('aumentoadmin',array(
								   'Empleosplanta'=>$Empleosplanta,
								   'Cform'=>$Cform,
		                           )
		              );
	}
	
	public function actionAumentodocen()
	{
		$Empleosplanta = new Empleosplanta;
		$Cform = new Cform;
		$Cform->AUAD_PORCENTAJE = 0;
		$sw = NULL;
		if((isset($_POST['yt0'])) && (isset($_POST['Cform']))){
         $Cform->attributes=$_POST['Cform'];
		 $Cform->AUAD_PORCENTAJE = $Cform->attributes=$_POST['Cform']["AUAD_PORCENTAJE"];		 
	     $sw = 1;
		}
		
		if((isset($_POST['yt1'])) & (isset($_POST['Cform']))){
        $Cform->attributes=$_POST['Cform'];
		$Cform->AUAD_PORCENTAJE = $Cform->attributes=$_POST['Cform']["AUAD_PORCENTAJE"];
		 if(($Cform->AUAD_PORCENTAJE!='') && ($Cform->AUAD_PORCENTAJE!=0)){
		  $Empleosplanta->setAumentoDocen($Cform);
		  Yii::app()->user->setFlash('success','<strong> Porcentaje de aumento salarial para docentes actualizado correctamente :)</strong>');
		  $this->refresh();
		 }else{
			   $Cform->AUAD_PORCENTAJE = 0;		       
			   Yii::app()->user->setFlash('error','<strong>Oppss!. </strong> Debe ingresar un porcentaje mayor que cero (0) para usar esta funcionalidad');  
			  }    
	    }	
		$Empleosplanta->previewAumentoDocen($Cform,$sw);
		$this->render('aumentodocen',array(
								   'Empleosplanta'=>$Empleosplanta,
								   'Cform'=>$Cform,
		                           )
		              );
	}
	
	public function actionDiasnominas()
	{
		$Empleosplanta = new Empleosplanta;
		$Cform = new Cform;
		
		if((isset($_POST['yt0'])) & (isset($_POST['Cform']))){
         $Cform->attributes=$_POST['Cform'];
		 if(($Empleosplanta->setUnidadesNomina($Cform))=='true'){		 
		  Yii::app()->user->setFlash('success','<strong> Unidades actualizadas correctamente :)</strong>');
		 }else{
		       Yii::app()->user->setFlash('error','<strong>Oppss!. </strong> Ha ocurrido algun error al tratar de usar esta funcionalidad! :(');
			  }
		}
		
		$this->render('diasnominas',array(
								   'Empleosplanta'=>$Empleosplanta,
								   'Cform'=>$Cform,
		                           )
		              );
	}
	
	public function actionAumentopuntos()
	{
		$Empleosplanta = new Empleosplanta;
		$Cform = new Cform;
		$Parametrosglobales = new Parametrosglobales; 	 
        $valorestablecidos = $Parametrosglobales->getParametrosglobales(date("Y"));		
		$valorPunto = $valorestablecidos[1][3];
		
		$Cform->NOVE_UNIDADES = 0;
		
		if((isset($_POST['yt0'])) && (isset($_POST['Cform']))){
         $Cform->attributes=$_POST['Cform'];
		 $Cform->NOVE_UNIDADES = $Cform->attributes=$_POST['Cform']["NOVE_UNIDADES"];		 
	     $sw = 1;
		}
		
		if((isset($_POST['yt1'])) & (isset($_POST['Cform']))){
        $Cform->attributes=$_POST['Cform'];
		$Cform->NOVE_UNIDADES = $Cform->attributes=$_POST['Cform']["NOVE_UNIDADES"];
		 if(($Cform->NOVE_UNIDADES!='') && ($Cform->NOVE_UNIDADES!=0)){
		  $Empleosplanta->setAumentoPuntos($Cform,$valorPunto);
		  Yii::app()->user->setFlash('success','<strong> Porcentaje de aumento salarial para docentes actualizado correctamente :)</strong>');
		  $this->refresh();
		 }else{
			   $Cform->NOVE_UNIDADES = 0;		       
			   Yii::app()->user->setFlash('error','<strong>Oppss!. </strong> Debe ingresar un porcentaje mayor que cero (0) para usar esta funcionalidad');  
			  }    
	    }	
		$Empleosplanta->previewAumentoPuntos($Cform,$valorPunto);
		
		$this->render('aumentopuntos',array(
								   'Empleosplanta'=>$Empleosplanta,
								   'Cform'=>$Cform,
		                           )
		              );
	}
	
	
	
	public function actionSearch()
	{
	
		$Empleosplanta = new Empleosplanta('buscar');
		$Empleosplanta->unsetAttributes();
		
		if((isset($_GET['Empleosplanta'])))
		{			    
			$PEGE_IDENTIFICACION = $Empleosplanta->attributes=$_GET['Empleosplanta']['PEGE_IDENTIFICACION'];	$PEGE_PRIMERNOMBRE = $Empleosplanta->attributes=$_GET['Empleosplanta']['PEGE_PRIMERNOMBRE'];
			$PEGE_SEGUNDONOMBRE = $Empleosplanta->attributes=$_GET['Empleosplanta']['PEGE_SEGUNDONOMBRE']; 	$PEGE_PRIMERAPELLIDO = $Empleosplanta->attributes=$_GET['Empleosplanta']['PEGE_PRIMERAPELLIDO'];
			$PEGE_SEGUNDOAPELLIDOS = $Empleosplanta->attributes=$_GET['Empleosplanta']['PEGE_SEGUNDOAPELLIDOS'];
			if(($PEGE_IDENTIFICACION!=NULL) OR ($PEGE_PRIMERNOMBRE!=NULL) OR ($PEGE_SEGUNDONOMBRE!=NULL) OR ($PEGE_PRIMERAPELLIDO!=NULL) OR ($PEGE_SEGUNDOAPELLIDOS!=NULL)){
			 $Empleosplanta->attributes=$_GET['Empleosplanta'];			
		    }else{	
			      $Empleosplanta->PEGE_ID = '0';		     
			     }  
		}else{	
			 $Empleosplanta->PEGE_ID = '0';		     
			 }
		
		$this->render('search',array(
								   'Empleosplanta'=>$Empleosplanta,
		                           )
		              );
	}
}