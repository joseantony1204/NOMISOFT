<?php

class CatedrasController extends Controller
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
                                 'search','admin','create','update', 'formcatedras', 'updategrid','import','importgrid',  
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
	
	public function actionSearch()
	{
		$Personasgenerales = new Personasgenerales('buscar');
		$Personasgenerales->unsetAttributes();
		
		if((isset($_GET['Personasgenerales'])))
		{			
					
			$PEGE_IDENTIFICACION = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEGE_IDENTIFICACION'];	$PEGE_PRIMERNOMBRE = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEGE_PRIMERNOMBRE'];
			$PEGE_SEGUNDONOMBRE = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEGE_SEGUNDONOMBRE']; 	$PEGE_PRIMERAPELLIDO = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEGE_PRIMERAPELLIDO'];
			$PEGE_SEGUNDOAPELLIDOS = $Personasgenerales->attributes=$_GET['Personasgenerales']['PEGE_SEGUNDOAPELLIDOS'];
			if(($PEGE_IDENTIFICACION!=NULL) OR ($PEGE_PRIMERNOMBRE!=NULL) OR ($PEGE_SEGUNDONOMBRE!=NULL) OR ($PEGE_PRIMERAPELLIDO!=NULL) OR ($PEGE_SEGUNDOAPELLIDOS!=NULL)){
			 $Personasgenerales->attributes=$_GET['Personasgenerales'];			
		    }else{	
			      $Personasgenerales->PEGE_ID = '0';		     
			     } 
		}else{
		     $Personasgenerales->PEGE_ID = 0;
			 }
		
		$this->render('search',array(
			   'Personasgenerales'=>$Personasgenerales,
		 ));	
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$Catedras = new Catedras;
		
		$criteria = new CDbCriteria;
	    $criteria->select = 't.*';
		$criteria->condition = ' t."PEAC_ESTADO" = 1';
		$criteria->order = 't."PEAC_ID" DESC';			
		$Periodosacademicos = Periodosacademicos::model()->find($criteria);
		$Periodoacademico = Periodosacademicos::model()->findByPk($Periodosacademicos->PEAC_ID);
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Catedras']))
		{
			$Catedras->attributes=$_POST['Catedras'];
			$Facultades = Facultades::model()->findByPk($Catedras->FACU_ID);
			$Catedras->CATE_CATEDRA = 'CATEDRA EN: '.$Facultades->FACU_NOMBRE;
			
	        $Catedras->CATE_FECHACAMBIO =  date('Y-m-d H:i:s');
			$Catedras->CATE_REGISTRADOPOR = Yii::app()->user->id;			 
			if($Catedras->save()){
			    $Catedras->defaultDescuentosMensuales($Catedras->CATE_ID);
				Yii::app()->user->setFlash('success','<strong>Catedra agregada correctamente :)</strong>');
		        $this->redirect(array('create','id'=>$Catedras->PEGE_ID));
			}else{
			      $msg = print_r($Catedras->getErrors(),1);
                   throw new CHttpException(400,'data not saving: '.$msg );
		         }
		}
        
		$Catedras->PEGE_ID = $id;
		$Personasgenerales = Personasgenerales::model()->findByPk($Catedras->PEGE_ID);
		$Categorias = Categorias::model()->findByPk($Personasgenerales->CATE_ID);
		$Catedras->CATE_VALORHORA = $Categorias->CATE_VALOR;			
		$Catedras->PEAC_ID = $Periodoacademico->PEAC_ID;
		$this->render('create',array(
			'Catedras'=>$Catedras,
			'Personasgenerales'=>$Personasgenerales,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$Catedras = new Catedras;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if((isset($_POST['Catedras'])) & (isset($_POST['yt0'])))
		{
			$Catedras->attributes=$_POST['Catedras'];			
			$this->redirect(array('updategrid','facultad'=>$Catedras->FACU_ID));
		}

		$this->render('update',array(
			'Catedras'=>$Catedras,
		));
	}
	
	public function actionImportgrid($facultad)
	{
		$Catedras = new Catedras;
		$Facultades = Facultades::model()->findByPk($facultad);		
		$rutarchivo = Yii::app()->user->getState('archivoruta');
		$archivo = Yii::app()->user->getState('archivoupload');
        $Catedras->FACU_ID = $facultad;
	    $Catedras->CATE_ARCHIVO = $archivo;
	    $Catedras->CATE_RUTA = $rutarchivo;
		$opcion = 1;
		if((isset($_POST['opcion1']))){
			$opcion = 2;
			$Catedras->attributes=$_POST['Catedras'];
			$Catedras->verificarDocenteEnDB($Catedras);
        	Yii::app()->user->setFlash('success','<strong>Docentes verificados correctamente :)</strong>');		
		}elseif((isset($_POST['opcion2']))){
			$opcion = 3;
			$Catedras->attributes=$_POST['Catedras'];
			$Catedras->verificarInsertDocenteEnDB($Catedras);
            Yii::app()->user->setFlash('success','<strong>Docentes agregados en Dase de Datos correctamente :)</strong>');			
		}elseif((isset($_POST['opcion3']))){
			$opcion = 4;
			$Catedras->insertUpdateCatedras($Catedras);
            Yii::app()->user->setFlash('success','<strong>Cargas academicas actualizadas correctamente en la Facultad :)</strong>');				
		}elseif((isset($_POST['opcion4']))){
			$Catedras->insertUpdateCatedras($Catedras);
            $ruta = $rutarchivo.'/'.$archivo;
			unlink($ruta);
			$this->redirect(array('import'));				
		}
		$this->render('importgrid',array(
									     'Catedras'=>$Catedras,
									     'Facultades'=>$Facultades,
									     'opcion'=>$opcion,
										)
					 );
	}
	
	public function actionImport()
	{
		$Catedras = new Catedras;
		

		if((isset($_POST['Catedras'])) & (isset($_POST['yt0'])))
		{
			$Catedras->attributes=$_POST['Catedras'];			
			
			$uploadedFile = CUploadedFile::getInstance($Catedras,'CATE_ARCHIVO');
			$realPath = realpath(Yii::app()->getBasePath()."/../temp/");
			$uploadedFile->saveAs("$realPath/{$uploadedFile}");			
			/**
			*guardamos el archivo y su ruta en variables temporales
			*para utilizarlos en la siguiente accion
			*/
			Yii::app()->user->setState('archivoruta', $realPath);			
			Yii::app()->user->setState('archivoupload', $uploadedFile);			
			
			$this->redirect(array('importgrid','facultad'=>$Catedras->FACU_ID));
		}else{
		     $this->render('import',array(
			                              'Catedras'=>$Catedras,
		                                 )
						  );
	       }
	}
	
	public function actionUpdategrid($facultad)
	{
		$Catedras = new Catedras;
		$Catedras->FACU_ID = $facultad;
		
		if((isset($_POST['yt0'])) or (isset($_POST['yt1'])))
		{
		
		 $numHorasAll = $_POST['numHoras'];
         if(count($numHorasAll)>0)
         {
            foreach($numHorasAll as $cateId=>$numHoras)
            {
				$Catedras=$this->loadModel($cateId);
                $Catedras->CATE_NUMHORAS = $numHoras;
                $Catedras->CATE_ARCHIVO = 'FALSE';
                $Catedras->save();
            }
         }
		 Yii::app()->user->setFlash('success','<strong>Numero de horas actualizadas correctamente :)</strong>');
		}
		
        
        $Catedras->loadCatedras($Catedras->FACU_ID);
		$this->render('updategrid',array(
			'Catedras'=>$Catedras,			
			'data'=>$data,			
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
		$dataProvider=new CActiveDataProvider('Catedras');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Catedras('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Catedras']))
			$model->attributes=$_GET['Catedras'];

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
		$model=Catedras::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='catedras-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}