<?php

class PersonasgeneralesController extends Controller
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
				'actions'=>array(''.$array[0].'',''.$array[1].'',''.$array[2].'',''.$array[3].'',''.$array[4].'','view',
                                 'delete','admin','create','update','dptos','municipios','creates','retirados','crearretiro',
                                 'insertretiro', 'cumpleanios',								 
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
	public function actionView()
	{
		//$this->render('viewnombres',array(
		$this->render('viewnomina',array(
		//$this->render('view',array(
		//$this->render('viewimport',array(
			//'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$Personasgenerales = new Personasgenerales;
		$Empleosplanta = new Empleosplanta;
		$Estadosempleosplanta = new Estadosempleosplanta;
		$Factoressalariales = new Factoressalariales;
		$Horasextrasyrecargos = new Horasextrasyrecargos;
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['Personasgenerales'])) && (isset($_POST['Empleosplanta'])))
		{
			$Personasgenerales->attributes=$_POST['Personasgenerales'];
			$Empleosplanta->attributes=$_POST['Empleosplanta'];
			$Estadosempleosplanta->attributes=$_POST['Estadosempleosplanta'];
			$Factoressalariales->attributes=$_POST['Factoressalariales'];
			$Horasextrasyrecargos->attributes=$_POST['Horasextrasyrecargos'];
			
	        $Personasgenerales->PEGE_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Personasgenerales->PEGE_REGISTRADOPOR = Yii::app()->user->id;			 
			
			/*SUBIR IMAGEN DE PERFIL*/
			$uploadedFile = CUploadedFile::getInstance($Personasgenerales,'PEGE_FOTO');
			$basePath = 'PERSONASGENERALES/'.$Personasgenerales->PEGE_IDENTIFICACION.'/HDV/IMG/';    
		    $path = Yii::app()->basePath.'/../uploads/'.$basePath;	
	        $this->verificarRuta($path);			
			$ruta = 'PERSONASGENERALES/'.$Personasgenerales->PEGE_IDENTIFICACION.'/HDV/IMG';
		    $realPath = realpath(Yii::app()->getBasePath()."/../uploads/".$ruta);		 
			$nameFile = 'arch_'.date("YmdHis").'_'.$uploadedFile;			
			$Personasgenerales->PEGE_FOTO ='/uploads/'.$ruta.'/'.$nameFile;
    		/* FIN DE SUBIR IMAGEN DE PERFIL*/
			if($Personasgenerales->PEGE_FECHANACIMIENTO=="0000-00-00"){$Personasgenerales->PEGE_FECHANACIMIENTO="1900-01-01";}
			if($Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD=="0000-00-00"){$Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD="1900-01-01";}
			
			if($Personasgenerales->save()){
				//$uploadedFile->saveAs("$realPath/{$nameFile}");
				
				/*ASIGNADO FACTORES DE RETEFUENTE POR DEFECTO*/
				$Personasgenerales->defaultFactoresRetefuente($Personasgenerales->PEGE_ID);				
				/*ASIGNADO DESCUENTOS PARA PRESTACIONES POR DEFECTO*/
				$Personasgenerales->defaultDescuentosPrestaciones($Personasgenerales->PEGE_ID);
				
				/*ASIGNADO NOVEDADES POR DEFECTO PARA LAS PRIMAS, VACACIONES, CESANTIAS Y RETROACTIVO*/
				$Personasgenerales->defaultNovedadesPrimaSemestral($Personasgenerales);
				$Personasgenerales->defaultNovedadesPrimaNavidad($Personasgenerales);
				$Personasgenerales->defaultNovedadesPrimaVacaciones($Personasgenerales);
				$Personasgenerales->defaultNovedadesVacaciones($Personasgenerales);
				$Personasgenerales->defaultNovedadesCesantias($Personasgenerales);
				$Personasgenerales->defaultNovedadesRetroactivo($Personasgenerales);
				
				$Empleosplanta->PEGE_ID	= $Personasgenerales->PEGE_ID;			
                $Empleosplanta->EMPL_FECHACAMBIO =  $Personasgenerales->PEGE_FECHACAMBIO;
			    $Empleosplanta->EMPL_REGISTRADOPOR = $Personasgenerales->PEGE_REGISTRADOPOR;
					
				if($Empleosplanta->save()){
				    
                    /*ASIGNADO DESCUENTOS MENSUALES POR DEFECTO*/					
					$Empleosplanta->defaultDescuentosMensuales($Empleosplanta->EMPL_ID);		
					
				    /*AGREGANDO EL ESTADO DEL CARGO*/
					$Estadosempleosplanta->EMPL_ID = $Empleosplanta->EMPL_ID;
				    $Estadosempleosplanta->ESEP_FECHAREGISTRO = date("Y-m-d");				    
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
					
					$this->redirect(array('admin','id'=>$Personasgenerales->PEGE_ID));				
				}				
		    }  
         }
		$this->render('create',array(
			'Personasgenerales'=>$Personasgenerales,
			'Empleosplanta'=>$Empleosplanta,
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
		$Personasgenerales = $this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $Personasgenerales->PEGE_EMAIL = trim($Personasgenerales->PEGE_EMAIL);
		if(isset($_POST['Personasgenerales']))
		{
			$Personasgenerales->attributes=$_POST['Personasgenerales'];
			$Personasgenerales->PEGE_EMAIL = trim($Personasgenerales->PEGE_EMAIL);
			$Personasgenerales->PEGE_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Personasgenerales->PEGE_REGISTRADOPOR = Yii::app()->user->id;
			if($Personasgenerales->PEGE_FECHANACIMIENTO=="0000-00-00"){$Personasgenerales->PEGE_FECHANACIMIENTO="1900-01-01";}
			if($Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD=="0000-00-00"){$Personasgenerales->PEGE_FECHAEXPEDIDENTIDAD="1900-01-01";}
			if($Personasgenerales->save())
				$this->redirect(array('admin',));
		}

		$this->render('update',array(
			'Personasgenerales'=>$Personasgenerales,
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
		$dataProvider=new CActiveDataProvider('Personasgenerales');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Personasgenerales('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personasgenerales'])){
			$model->attributes=$_GET['Personasgenerales'];
        }
		
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionRetirados()
	{
		$model=new Personasgenerales('retirados');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Personasgenerales'])){
			$model->attributes=$_GET['Personasgenerales'];
        }
		
		$this->render('retirados',array(
			'model'=>$model,
		));
	}
	
	public function actionCrearretiro()
	{
		$Personasgenerales = new Personasgenerales('buscar');
		$Personasgenerales->unsetAttributes();
		
		$Personasgenerales->unsetAttributes();  // clear any default values
		if((isset($_GET['Personasgenerales'])))
		{			    
			$PEG_IDENTIFICACION = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEG_IDENTIFICACION'];	$PEG_PRIMERNOMBRE = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEG_PRIMERNOMBRE'];
			$PEG_SEGUNDONOMBRE = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEG_SEGUNDONOMBRE']; 	$PEG_PRIMERAPELLIDO = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEG_PRIMERAPELLIDO'];
			$PEG_SEGUNDOAPELLIDOS = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEG_SEGUNDOAPELLIDOS'];
			if(($PEG_IDENTIFICACION!=NULL) OR ($PEG_PRIMERNOMBRE!=NULL) OR ($PEG_SEGUNDONOMBRE!=NULL) OR ($PEG_PRIMERAPELLIDO!=NULL) OR ($PEG_SEGUNDOAPELLIDOS!=NULL)){
			 $Personasgenerales->attributes=$_GET['Personasgenerales'];			
		    }else{	
			      $Personasgenerales->PEG_ID = '0';		     
			     }  
		}else{	
			 $Personasgenerales->PEG_ID = '0';		     
			 }
		
		$this->render('crearretiro',array(
			'Personasgenerales'=>$Personasgenerales,
		));
	}
	
	public function actionInsertretiro($empleoPlanta)
	{
		$Empleosplanta = Empleosplanta::model()->findByPk($empleoPlanta);
		$Estadosempleosplanta = new Estadosempleosplanta;
		
		if(isset($_POST['Estadosempleosplanta'])){
			$Estadosempleosplanta->attributes=$_POST['Estadosempleosplanta'];			
			$Estadosempleosplanta->ESEP_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Estadosempleosplanta->ESEP_REGISTRADOPOR = Yii::app()->user->id;
			
			if($Estadosempleosplanta->save()){
				$this->redirect(array('retirados',));
            }
	   }
		$Estadosempleosplanta->EMPL_ID = $empleoPlanta;
		$this->render('insertretiro',array(
			'Empleosplanta'=>$Empleosplanta,
			'Estadosempleosplanta'=>$Estadosempleosplanta,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Personasgenerales::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='personasgenerales-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function verificarRuta($url)
	{
        if( !is_dir( $url ) ) {
            mkdir( $url, 0700, true );
            chmod ( $url , 0777 );
            //throw new CHttpException(500, "{$this->path} does not exists.");
        } else if( !is_writable( $url ) ) {
            chmod( $url, 0777 );
            //throw new CHttpException(500, "{$this->path} is not writable.");
        }
     }
	
	public function actionDptos()
     {   
		$filtro = $_POST['Personasgenerales']['PAIS_ID'];
		
		$criteria = new CDbCriteria();
        $criteria->condition = '"PAIS_ID" = :id_uno';
        $criteria->params = array(':id_uno' => (int) $filtro);
        $criteria->order = '"DEPA_NOMBRE" ASC';
				
		$lista = Departamentos::model()->findAll($criteria);				 
		$list = CHtml::listData($lista,'DEPA_ID','DEPA_NOMBRE');            
        echo CHtml::tag('option', array('value' => ''), 'Seleccione departamento', true);
        foreach ($list as $valor => $descripcion){
         echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );                
       }
     }
	 
	 public function actionMunicipios()
        {   
		$filtro = $_POST['Personasgenerales']['DEPA_ID'];
		
		$criteria = new CDbCriteria();
        $criteria->condition = '"DEPA_ID" = :id_uno';
        $criteria->params = array(':id_uno' => (int) $filtro);
        $criteria->order = '"MUNI_NOMBRE" ASC';
				
		$lista = Municipios::model()->findAll($criteria);				 
		$list = CHtml::listData($lista,'MUNI_ID','MUNI_NOMBRE');            
        echo CHtml::tag('option', array('value' => ''), 'Seleccione municipio', true);
        foreach ($list as $valor => $descripcion){
         echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true );                
       }
     }
	 
	 public function actionCumpleanios()
     {   
	  echo $Personasgenerales = Personasgenerales::model()->findAll();	
	  	  
	  foreach($Personasgenerales as $persona){
	  echo $persona->PEGE_ID.'<br>';
	   $Cumpleanios = new Cumpleanios;
	   $Cumpleanios->PEGE_ID = $persona->PEGE_ID;
	   $Cumpleanios->CUMP_FECHANOTIFIACION = '2014-08-21';
	   $Cumpleanios->save();
	  }  
     }	
}