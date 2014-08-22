<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<html xml:lang="<?php echo Yii::app()->language;?>" lang="<?php echo Yii::app()->language;?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo Yii::app()->language;?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
	<?php Yii::app()->bootstrap->register(); 
	$app = 1;
	?>
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
				
				array('label'=>'EMPLEADOS', 'icon'=>'user', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&$app==2, 'items'=>array(
                    array('label'=>'Administrar', 'url'=>array('/administrator/admin/personasgenerales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Nuevo', 'url'=>array('/administrator/admin/personasgenerales/create',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Retirados', 'url'=>array('/administrator/admin/personasgenerales/retirados',), 'visible'=>!Yii::app()->user->isGuest,),
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
                    array('label'=>'ESTADO EMPLEADOS'),
					array('label'=>'Administrar',  'url'=>array('/administrator/admin/estadosempleosplanta/search',), 'visible'=>!Yii::app()->user->isGuest,),
					'---',
                    array('label'=>'AUMENTO DE SUELDO'),
                    array('label'=>'Administrativos',  'url'=>array('/administrator/admin/empleosplanta/aumentoadmin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Docentes',  'url'=>array('/administrator/admin/empleosplanta/aumentodocen',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'OTRAS ACTUALIZACIONES'),
                    array('label'=>'Dias de Nominas',  'url'=>array('/administrator/admin/empleosplanta/diasnominas',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Actualizar Puntos',  'url'=>array('/administrator/admin/empleosplanta/aumentopuntos',), 'visible'=>!Yii::app()->user->isGuest,),
                    
                    
                )),
                
				array('label'=>'GESTIÓN NÓMINAS', 'icon'=>'list-alt', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(
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
            ),
        ),
	   array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(
             
             array('label'=>'INGRESAR AL SISTEMA', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
             array('label'=>''.strtoupper(Yii::app()->user->nombres).'', 'icon'=>'user', 'active'=>true, 
			 'visible'=>!Yii::app()->user->isGuest, 'url'=>'',
				'items'=>array(
				    array('label'=>'ADMINISTRADOR DE URUSARIO','visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Mis Datos',  'url'=>array('/administrator/admin/usuarios/admin'), 
					      'visible'=>!Yii::app()->user->isGuest),
				    array('label'=>'Salir', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                  ),
			  ),
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
 
                array('label'=>'SEGURIDAD', 'icon'=>'lock', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(
                    array('label'=>'Usuarios', 'url'=>array('/administrator/admin/usuarios/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Another action', 'url'=>'#'),
                    array('label'=>'Something else here', 'url'=>'#'),
                    '---',
                    array('label'=>'NAV HEADER'),
                    array('label'=>'Separated link', 'url'=>'#'),
                    array('label'=>'One more separated link', 'url'=>'#'),
                )),
				
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
				/*
				array('label'=>'OTRAS NOVEDADES', 'icon'=>'tags', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1, 'items'=>array(
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
				
			    array('label'=>'ACERCA', 'icon'=>'list', 'url'=>array('/site/page/', 'view'=>'about'), 'visible'=>!Yii::app()->user->isGuest&&Yii::app()->user->getState('module')==1),
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
