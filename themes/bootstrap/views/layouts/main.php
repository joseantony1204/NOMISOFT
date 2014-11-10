<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xml:lang="<?php echo Yii::app()->language;?>" lang="<?php echo Yii::app()->language;?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'type'=>'inverse',
    //'brand'=>CHtml::image(Yii::app()->getBaseUrl().'/images/logo.png'),
	'fixed'=>'top',	
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
	    array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                /**
				*inicio menu @empleados para el modulo planta 
				*/
                array('label'=>'EMPLEADOS', 'icon'=>'user', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(
                    array('label'=>'Administrar', 'url'=>array('/administrator/admin/personasgenerales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Nuevo', 'url'=>array('/administrator/admin/personasgenerales/create',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Retirados', 'url'=>array('/administrator/admin/personasgenerales/retirados',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Cumpleaños', 'url'=>array('/administrator/admin/cumpleanios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
					
                    array('label'=>'AFILIACIONES'),
                    array('label'=>'Salud', 'url'=>array('/administrator/admin/salud/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Pension', 'url'=>array('/administrator/admin/pension/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Sindicato', 'url'=>array('/administrator/admin/sindicatos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Cesantias',  'url'=>array('/administrator/admin/cesantias/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					'---',
                    array('label'=>'UBICACION'),
                    array('label'=>'Municipios', 'url'=>array('/administrator/admin/municipios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Departamentos', 'url'=>array('/administrator/admin/departamentos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Paises',  'url'=>array('/administrator/admin/paises/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					'---',
                    array('label'=>'OTROS'),
                    array('label'=>'Sexos', 'url'=>array('/administrator/admin/sexos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Grupos Sanguineos', 'url'=>array('/administrator/admin/grupossanguineos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Estados Civiles',  'url'=>array('/administrator/admin/estadosciviles/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                )),
				/**
				*fin menu @empleados para el modulo planta 
				*/
				
				/**
				*inicio menu @empleados para el modulo ocasionales 
				*/
				 array('label'=>'DOCENTES', 'icon'=>'user', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2, 'items'=>array(
                    array('label'=>'Administrar', 'url'=>array('/ocasionales/admin/personasgenerales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Nuevo', 'url'=>array('/ocasionales/admin/personasgenerales/create',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Retirados', 'url'=>array('/ocasionales/admin/personasgenerales/retirados',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Cumpleaños', 'url'=>array('/ocasionales/admin/cumpleanios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
					
                    array('label'=>'AFILIACIONES'),
                    array('label'=>'Salud', 'url'=>array('/ocasionales/admin/salud/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Pension', 'url'=>array('/ocasionales/admin/pension/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Sindicato', 'url'=>array('/ocasionales/admin/sindicatos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Cesantias',  'url'=>array('/ocasionales/admin/cesantias/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					'---',
                    array('label'=>'UBICACION'),
                    array('label'=>'Municipios', 'url'=>array('/ocasionales/admin/municipios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Departamentos', 'url'=>array('/ocasionales/admin/departamentos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Paises',  'url'=>array('/ocasionales/admin/paises/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					'---',
                    array('label'=>'OTROS'),
                    array('label'=>'Sexos', 'url'=>array('/ocasionales/admin/sexos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Grupos Sanguineos', 'url'=>array('/ocasionales/admin/grupossanguineos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Estados Civiles',  'url'=>array('/ocasionales/admin/estadosciviles/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                )),
				/**
				*fin menu @empleados para el modulo ocasionales 
				*/
				
				/**
				*inicio menu @empleados para el modulo catedraticos 
				*/
				                
				array('label'=>'DOCENTES', 'icon'=>'user', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3, 'items'=>array(
                    array('label'=>'Administrar', 'url'=>array('/catedraticos/admin/personasgenerales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Nuevo', 'url'=>array('/catedraticos/admin/personasgenerales/create',), 'visible'=>!Yii::app()->user->isGuest,),
                    //array('label'=>'Retirados', 'url'=>array('/catedraticos/admin/personasgenerales/retirados',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Cumpleaños', 'url'=>array('/catedraticos/admin/cumpleanios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
					
                    array('label'=>'AFILIACIONES'),
                    array('label'=>'Salud', 'url'=>array('/catedraticos/admin/salud/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Pension', 'url'=>array('/catedraticos/admin/pension/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Sindicato', 'url'=>array('/catedraticos/admin/sindicatos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					//array('label'=>'Cesantias',  'url'=>array('/catedraticos/admin/cesantias/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					/*
					'---',
                    array('label'=>'UBICACION'),
                    array('label'=>'Municipios', 'url'=>array('/administrator/admin/municipios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Departamentos', 'url'=>array('/administrator/admin/departamentos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Paises',  'url'=>array('/administrator/admin/paises/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					'---',
                    array('label'=>'OTROS'),
                    array('label'=>'Sexos', 'url'=>array('/administrator/admin/sexos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Grupos Sanguineos', 'url'=>array('/administrator/admin/grupossanguineos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Estados Civiles',  'url'=>array('/administrator/admin/estadosciviles/admin',), 'visible'=>!Yii::app()->user->isGuest,),*/
                )),
				/**
				*fin menu @empleados para el modulo catedraticos 
				*/
			
			    /**********************************************************************************/
			
				/**
				*inicio menu @generalidades para el modulo planta 
				*/
				 array('label'=>'GENERALIDADES', 'icon'=>'th', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(
                    array('label'=>'DESCUENTOS'),
                    array('label'=>'Mensuales', 'url'=>array('/administrator/admin/descuentosmensuales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Semestral', 'url'=>array('/administrator/admin/descuentosprestaciones/admin','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/administrator/admin/descuentosprestaciones/admin','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/administrator/admin/descuentosprestaciones/admin','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Vacaciones',  'url'=>array('/administrator/admin/descuentosprestaciones/admin','id'=>4), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retroactivos',  'url'=>array('/administrator/admin/descuentosprestaciones/admin','id'=>5), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retefuente',  'url'=>array('/administrator/admin/factoresretefuente/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					'---',
                    array('label'=>'OTROS'),
                    array('label'=>'Unidades', 'url'=>array('/administrator/admin/unidades/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Niveles', 'url'=>array('/administrator/admin/niveles/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Grados', 'url'=>array('/administrator/admin/grados/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Estados Cargos',  'url'=>array('/administrator/admin/estadosempleos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					
                )),
				/**
				*fin menu @generalidades para el modulo planta 
				*/
				
				/**
				*inicio menu @generalidades para el modulo ocasionales 
				*/
				array('label'=>'GENERALIDADES', 'icon'=>'th', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2, 'items'=>array(
                    array('label'=>'DESCUENTOS'),
                    array('label'=>'Mensuales', 'url'=>array('/ocasionales/admin/descuentosmensuales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    /*array('label'=>'Prima Semestral', 'url'=>array('/ocasionales/admin/descuentosprestaciones/admin','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/ocasionales/admin/descuentosprestaciones/admin','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/ocasionales/admin/descuentosprestaciones/admin','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Vacaciones',  'url'=>array('/ocasionales/admin/descuentosprestaciones/admin','id'=>4), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retroactivos',  'url'=>array('/ocasionales/admin/descuentosprestaciones/admin','id'=>5), 'visible'=>!Yii::app()->user->isGuest,),*/
					array('label'=>'Retefuente',  'url'=>array('/ocasionales/admin/factoresretefuente/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					'---',
                    array('label'=>'OTROS'),
                    array('label'=>'Unidades', 'url'=>array('/ocasionales/admin/unidades/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Niveles', 'url'=>array('/ocasionales/admin/niveles/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Grados', 'url'=>array('/ocasionales/admin/grados/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Estados Cargos',  'url'=>array('/ocasionales/admin/estadosempleos/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					
					
                )),
				/**
				*fin menu @generalidades para el modulo ocasionales 
				*/
				
				/**
				*inicio menu @generalidades para el modulo catedraticos 
				*/
				array('label'=>'GENERALES', 'icon'=>'th', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3, 'items'=>array(
                    array('label'=>'DESCUENTOS'),
                    array('label'=>'Mensuales', 'url'=>array('/catedraticos/admin/descuentosmensuales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Categorias', 'url'=>array('/catedraticos/admin/categorias/admin',), 'visible'=>!Yii::app()->user->isGuest,),					
                    array('label'=>'Facultades', 'url'=>array('/catedraticos/admin/facultades/admin',), 'visible'=>!Yii::app()->user->isGuest,),					
                    array('label'=>'Periodos Academicos', 'url'=>array('/catedraticos/admin/periodosacademicos/admin',), 'visible'=>!Yii::app()->user->isGuest,),					
                )),
				/**
				*fin menu @generalidades para el modulo catedraticos 
				*/				
			
			    /**********************************************************************************/
			
				/**
				*inicio menu @novedades para el modulo planta 
				*/
				array('label'=>'NOVEDADES', 'icon'=>'tags', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(                   
                    array('label'=>'Historial de cargos', 'url'=>array('/administrator/admin/empleosplanta/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Horas Extras y Recargos', 'url'=>array('/administrator/admin/horasextrasyrecargos/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Factores Salariales', 'url'=>array('/administrator/admin/factoressalariales/search',), 'visible'=>!Yii::app()->user->isGuest,),
					'---',
					array('label'=>'DESCUENTOS'),
                    array('label'=>'Mensuales', 'url'=>array('/administrator/admin/novedadesmensuales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Retroactivos',  'url'=>array('/administrator/admin/novedadesprestaciones/search','id'=>5), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Semestral', 'url'=>array('/administrator/admin/novedadesprestaciones/search','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/administrator/admin/novedadesprestaciones/search','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/administrator/admin/novedadesprestaciones/search','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Vacaciones',  'url'=>array('/administrator/admin/novedadesprestaciones/search','id'=>4), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retefuente',  'url'=>array('/administrator/admin/descuentosretefuente/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'AUMENTO DE SUELDO'),
                    array('label'=>'Administrativos',  'url'=>array('/administrator/admin/empleosplanta/aumentoadmin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Docentes',  'url'=>array('/administrator/admin/empleosplanta/aumentodocen',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'OTRAS ACTUALIZACIONES'),
                    array('label'=>'Dias de Nominas',  'url'=>array('/administrator/admin/empleosplanta/diasnominas',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Actualizar Puntos',  'url'=>array('/administrator/admin/empleosplanta/aumentopuntos',), 'visible'=>!Yii::app()->user->isGuest,),
                    
                    
                )),
				/**
				*fin menu @novedades para el modulo planta 
				*/
				
				/**
				*inicio menu @novedades para el modulo ocasionales 
				*/
				array('label'=>'NOVEDADES', 'icon'=>'tags', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2, 'items'=>array(                   
                    array('label'=>'Historial de cargos', 'url'=>array('/ocasionales/admin/empleosplanta/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    //array('label'=>'Horas Extras y Recargos', 'url'=>array('/ocasionales/admin/horasextrasyrecargos/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Factores Salariales', 'url'=>array('/ocasionales/admin/factoressalariales/search',), 'visible'=>!Yii::app()->user->isGuest,),
					'---',
					array('label'=>'DESCUENTOS'),
                    array('label'=>'Mensuales', 'url'=>array('/ocasionales/admin/novedadesmensuales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    /*array('label'=>'Retroactivos',  'url'=>array('/ocasionales/admin/novedadesprestaciones/search','id'=>5), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Semestral', 'url'=>array('/ocasionales/admin/novedadesprestaciones/search','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/ocasionales/admin/novedadesprestaciones/search','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/ocasionales/admin/novedadesprestaciones/search','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Vacaciones',  'url'=>array('/ocasionales/admin/novedadesprestaciones/search','id'=>4), 'visible'=>!Yii::app()->user->isGuest,),*/
					array('label'=>'Retefuente',  'url'=>array('/ocasionales/admin/descuentosretefuente/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'ESTADO EMPLEADOS'),
					array('label'=>'Administrar',  'url'=>array('/ocasionales/admin/estadosempleosplanta/search',), 'visible'=>!Yii::app()->user->isGuest,),
					'---',
                    /*array('label'=>'AUMENTO DE SUELDO'),
                    array('label'=>'Administrativos',  'url'=>array('/ocasionales/admin/empleosplanta/aumentoadmin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Docentes',  'url'=>array('/ocasionales/admin/empleosplanta/aumentodocen',), 'visible'=>!Yii::app()->user->isGuest,),*/
                    '---',
                    array('label'=>'OTRAS ACTUALIZACIONES'),
                    array('label'=>'Dias de Nominas',  'url'=>array('/ocasionales/admin/empleosplanta/diasnominas',), 'visible'=>!Yii::app()->user->isGuest,),
                    //array('label'=>'Actualizar Puntos',  'url'=>array('/ocasionales/admin/empleosplanta/aumentopuntos',), 'visible'=>!Yii::app()->user->isGuest,),
                    
                    
                )),
				/**
				*fin menu @novedades para el modulo ocasionales 
				*/
				
				/**
				*inicio menu @novedades para el modulo catedraticos 
				*/
				array('label'=>'NOVEDADES', 'icon'=>'tags', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3, 'items'=>array(                   
                    array('label'=>'DESCUENTOS'),
                    array('label'=>'Mensuales', 'url'=>array('/catedraticos/admin/novedadesmensuales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'CATEDRAS'),
					array('label'=>'Agregar',  'url'=>array('/catedraticos/admin/catedras/search',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Actualizar por Facultad',  'url'=>array('/catedraticos/admin/catedras/update',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Importar desde Excel',  'url'=>array('/catedraticos/admin/catedras/import',), 'visible'=>!Yii::app()->user->isGuest,),
					
                    
                )),
				/**
				*fin menu @novedades para el modulo catedraticos 
				*/				
				
                /**********************************************************************************/
			
				/**
				*inicio menu @nomina para el modulo planta 
				*/
				array('label'=>'NÓMINAS', 'icon'=>'list-alt', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(
                    array('label'=>'Mensual',  'url'=>array('/administrator/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Retroactivos',  'url'=>array('/administrator/admin/retroactivosnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Semestral',  'url'=>array('/administrator/admin/semestralnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Vacaciones',  'url'=>array('/administrator/admin/primavacacionesnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad',  'url'=>array('/administrator/admin/navidadnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),                    
                    array('label'=>'Vacaciones',  'url'=>array('/administrator/admin/vacacionesnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Recreacion',  'url'=>array('/administrator/admin/recreacionnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),                    
                    array('label'=>'Cesantias',  'url'=>array('/administrator/admin/cesantiasnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),                    
					'---',
                    array('label'=>'OTRAS NÓMINAS'),
					array('label'=>'Mensual Posterior',  'url'=>array('/administrator/admin/mensualnomina/postcreate',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Liquidaciones',  'url'=>array('/administrator/admin/liquidaciones/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                )),
				/**
				*fin menu @nomina para el modulo planta 
				*/
				
				/**
				*inicio menu @nomina para el modulo ocasionales trimetropin
				*/
				array('label'=>'NÓMINAS', 'icon'=>'list-alt', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2, 'items'=>array(
                    array('label'=>'Mensual',  'url'=>array('/ocasionales/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                   /* array('label'=>'Retroactivos',  'url'=>array('/ocasionales/admin/retroactivosnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Semestral',  'url'=>array('/ocasionales/admin/semestralnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Vacaciones',  'url'=>array('/ocasionales/admin/primavacacionesnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad',  'url'=>array('/ocasionales/admin/navidadnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),                    
                    array('label'=>'Vacaciones',  'url'=>array('/ocasionales/admin/vacacionesnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Recreacion',  'url'=>array('/ocasionales/admin/recreacionnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),                    
                    array('label'=>'Cesantias',  'url'=>array('/ocasionales/admin/cesantiasnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),*/                    
					'---',
                    array('label'=>'OTRAS NÓMINAS'),
					array('label'=>'Mensual Posterior',  'url'=>array('/ocasionales/admin/mensualnomina/postcreate',), 'visible'=>!Yii::app()->user->isGuest,),
					//array('label'=>'Liquidaciones',  'url'=>array('/ocasionales/admin/liquidaciones/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                )),
				/**
				*fin menu @nomina para el modulo ocasionales 
				*/
				
				/**
				*inicio menu @nomina para el modulo catedraticos 
				*/
				array('label'=>'NÓMINAS', 'icon'=>'list-alt', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3, 'items'=>array(
                    array('label'=>'Mensual',  'url'=>array('/catedraticos/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                )),
				/**
				*fin menu @nomina para el modulo catedraticos 
				*/
				
				
				
            ),
        ),
	   array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(
            
			array('label'=>'INGRESAR AL SISTEMA', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			
			 array('label'=>''.strtoupper(Yii::app()->user->nombres).'', 'icon'=>'user', 'active'=>true, 
				 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')=='', 'url'=>'',
					'items'=>array(
						
						array('label'=>'Salir', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==''),
					  ),
				  ),
			 
			 /**********************************************************************************/
			     
				/**
				*inicio menu @session para el modulo planta 
				*/
				
				 array('label'=>''.strtoupper(Yii::app()->user->nombres).'', 'icon'=>'user', 'active'=>true, 
				 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'url'=>'',
					'items'=>array(
						array('label'=>'ADMINISTRADOR DE URUSARIO','visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1),
						array('label'=>'Mis Datos',  'url'=>array('/administrator/admin/usuarios/admin'), 
							  'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Salir', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1),
					  ),
				  ),
				 
			    
				/**
				*fin menu @session para el modulo planta 
				*/
				
				/**
				*inicio menu @session para el modulo ocasionales 
				*/
				 
				 array('label'=>''.strtoupper(Yii::app()->user->nombres).'', 'icon'=>'user', 'active'=>true, 
				 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2, 'url'=>'',
					'items'=>array(
						array('label'=>'ADMINISTRADOR DE URUSARIO','visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2),
						array('label'=>'Mis Datos',  'url'=>array('/ocasionales/admin/usuarios/admin'), 
							  'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Salir', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2),
					  ),
				  ),
		
				/**
				*fin menu @session para el modulo ocasionales 
				*/
				
				/**
				*inicio menu @session para el modulo catedraticos 
				*/
				
				 array('label'=>''.strtoupper(Yii::app()->user->nombres).'', 'icon'=>'user', 'active'=>true, 
				 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3, 'url'=>'',
				 
					'items'=>array(
						array('label'=>'ADMINISTRADOR DE URUSARIO','visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3),
						array('label'=>'Mis Datos',  'url'=>array('/catedraticos/admin/usuarios/admin'), 
							  'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Salir', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3),
					  ),
				  ),
				/**
				*fin menu @session para el modulo catedraticos 
				*/
				
             
		  
		), 
	  ), 
  ),     
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    
 <div class="info"  style="text-align:left">   
 <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	   )
    ); ?>
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	   )
    ); ?>
     <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	   )
    );  ?>
	
	<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	   )
    );  ?>     
</div>
        <div id="contents">
         <?php echo $content."<br><br><br>"; ?>			
        </div><!-- content -->   		
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'type'=>'inverse', 
	'fixed'=>'bottom',
    'brand'=>'',	
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
	    array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array( 
                
				
				/**********************************************************************************/
			
				/**
				*inicio menu @seguridad para el modulo planta 
				*/
				array('label'=>'SEGURIDAD', 'icon'=>'lock', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(
                    array('label'=>'Usuarios', 'url'=>array('/administrator/admin/usuarios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                )),
				/**
				*fin menu @seguridad para el modulo planta 
				*/
				
				/**
				*inicio menu @seguridad para el modulo ocasionales 
				*/
				array('label'=>'SEGURIDAD', 'icon'=>'lock', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2, 'items'=>array(
                    array('label'=>'Usuarios', 'url'=>array('/ocasionales/admin/usuarios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                )),
				/**
				*fin menu @seguridad para el modulo ocasionales 
				*/
				
				/**
				*inicio menu @seguridad para el modulo catedraticos 
				*/
				/*array('label'=>'SEGURIDAD', 'icon'=>'lock', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3, 'items'=>array(
                    array('label'=>'Usuarios', 'url'=>array('/catedraticos/admin/usuarios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                )),*/
				/**
				*fin menu @seguridad para el modulo catedraticos 
				*/
						
				
				/**********************************************************************************/
			
				/**
				*inicio menu @configuraciones para el modulo planta 
				*/
				array('label'=>'CONFIGURACIONES', 'icon'=>'wrench', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(
                    array('label'=>'LIQUIDACION NOMINA'),
					array('label'=>'Parametros',  'url'=>array('/administrator/admin/parametrosglobales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'NOTIFICACIONES E-MAIL'),
					array('label'=>'Mensual', 'url'=>array('/administrator/admin/email/admin','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Semestral', 'url'=>array('/administrator/admin/email/admin','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/administrator/admin/email/admin','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/administrator/admin/email/admin','id'=>4), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Vacaciones',  'url'=>array('/administrator/admin/email/admin','id'=>5), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retroactivos',  'url'=>array('/administrator/admin/email/admin','id'=>6), 'visible'=>!Yii::app()->user->isGuest,),
					
                )),
				/**
				*fin menu @configuraciones para el modulo planta 
				*/
				
				/**
				*inicio menu @configuraciones para el modulo ocasionales 
				*/
				array('label'=>'CONFIGURACIONES', 'icon'=>'wrench', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==2, 'items'=>array(
                    array('label'=>'LIQUIDACION NOMINA'),
					array('label'=>'Parametros',  'url'=>array('/ocasionales/admin/parametrosglobales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'NOTIFICACIONES E-MAIL'),
					array('label'=>'Mensual', 'url'=>array('/ocasionales/admin/email/admin','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
                    /*array('label'=>'Prima Semestral', 'url'=>array('/ocasionales/admin/email/admin','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/ocasionales/admin/email/admin','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/ocasionales/admin/email/admin','id'=>4), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Vacaciones',  'url'=>array('/ocasionales/admin/email/admin','id'=>5), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retroactivos',  'url'=>array('/ocasionales/admin/email/admin','id'=>6), 'visible'=>!Yii::app()->user->isGuest,),*/
					
                )),
				/**
				*fin menu @configuraciones para el modulo ocasionales 
				*/
				
				/**
				*inicio menu @configuraciones para el modulo catedraticos 
				*//*
				array('label'=>'CONFIGURACIONES', 'icon'=>'wrench', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==3, 'items'=>array(
                    array('label'=>'LIQUIDACION NOMINA'),
					array('label'=>'Parametros',  'url'=>array('/administrator/admin/parametrosglobales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'NOTIFICACIONES E-MAIL'),
					array('label'=>'Mensual', 'url'=>array('/administrator/admin/email/admin','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Semestral', 'url'=>array('/administrator/admin/email/admin','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/administrator/admin/email/admin','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/administrator/admin/email/admin','id'=>4), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Vacaciones',  'url'=>array('/administrator/admin/email/admin','id'=>5), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retroactivos',  'url'=>array('/administrator/admin/email/admin','id'=>6), 'visible'=>!Yii::app()->user->isGuest,),
					
                )),*/
				/**
				*fin menu @configuraciones para el modulo catedraticos 
				*/
			    array('label'=>'ACERCA', 'icon'=>'list', 'url'=>array('/site/page/', 'view'=>'about'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
	   array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(
             
             array('label'=>'Copyright © '.date("Y").' - UNIVERSIDAD DE LA GUAJIRA - All Rights Reserved', 'url'=>''),
             
		  ),
	  ), 
  ),     
)); ?>

</div><!-- page -->
<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".info").animate({opacity: 1.0}, 20000).slideUp("slow");',
   CClientScript::POS_READY
);
?>
</body>
</html>
