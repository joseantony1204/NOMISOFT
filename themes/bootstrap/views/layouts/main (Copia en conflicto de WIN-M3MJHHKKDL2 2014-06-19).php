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
	'fixed'=>'top',	
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
	    array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
 
                array('label'=>'GESTIÓN DE EMPLEADOS', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
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
				
				array('label'=>'GENERALIDADES', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'Action', 'url'=>'#'),
                    array('label'=>'Another action', 'url'=>'#'),                    
					
					'---',
                    array('label'=>'DESCUENTOS'),
                    array('label'=>'Mensuales', 'url'=>array('/administrator/admin/descuentosmensuales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Semestral', 'url'=>array('/administrator/admin/descuentosprestaciones/admin','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/administrator/admin/descuentosprestaciones/admin','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/administrator/admin/descuentosprestaciones/admin','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
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
				
				array('label'=>'NOVEDADES', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(                   
                    array('label'=>'Historial de cargos', 'url'=>array('/administrator/admin/empleosplanta/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Horas Extras y Recargos', 'url'=>array('/administrator/admin/horasextrasyrecargos/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Factores Salariales', 'url'=>array('/administrator/admin/factoressalariales/search',), 'visible'=>!Yii::app()->user->isGuest,),
					'---',
					array('label'=>'DESCUENTOS'),
                    array('label'=>'Mensuales', 'url'=>array('/administrator/admin/novedadesmensuales/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Semestral', 'url'=>array('/administrator/admin/novedadesprestaciones/primasemestral','id'=>1), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Navidad', 'url'=>array('/administrator/admin/novedadesprestaciones/primanavidad','id'=>2), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Prima Vacaciones',  'url'=>array('/administrator/admin/novedadesprestaciones/primavacaciones','id'=>3), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Vacaciones',  'url'=>array('/administrator/admin/novedadesprestaciones/vacaciones','id'=>4), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retroactivos',  'url'=>array('/administrator/admin/novedadesprestaciones/retroactivo','id'=>5), 'visible'=>!Yii::app()->user->isGuest,),
					array('label'=>'Retefuente',  'url'=>array('/administrator/admin/descuentosretefuente/search',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'NAV HEADER'),
                    array('label'=>'Separated link', 'url'=>'#'),
                    array('label'=>'One more separated link', 'url'=>'#'),
                )),
                
				array('label'=>'GESTIÓN DE NÓMINAS', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'Mensual',  'url'=>array('/administrator/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Semestral',  'url'=>array('/administrator/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Navidad',  'url'=>array('/administrator/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Prima Vacaciones',  'url'=>array('/administrator/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Vacaciones',  'url'=>array('/administrator/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Recreacion',  'url'=>array('/administrator/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    array('label'=>'Retroactivos',  'url'=>array('/administrator/admin/mensualnomina/admin',), 'visible'=>!Yii::app()->user->isGuest,),
                    '---',
                    array('label'=>'NAV HEADER'),
                    array('label'=>'Separated link', 'url'=>'#'),
                    array('label'=>'One more separated link', 'url'=>'#'),
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
					array('label'=>'Mis Datos',  'url'=>array('/usuario/userperfil/usuarioperfilusuario/admin'), 
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
 
                array('label'=>'SEGURIDAD DEL SISTEMA', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                    array('label'=>'Action', 'url'=>'#'),
                    array('label'=>'Another action', 'url'=>'#'),
                    array('label'=>'Something else here', 'url'=>'#'),
                    '---',
                    array('label'=>'NAV HEADER'),
                    array('label'=>'Separated link', 'url'=>'#'),
                    array('label'=>'One more separated link', 'url'=>'#'),
                )),
				
			    array('label'=>'CONFIGURACIONES', 'url'=>array('#',), 'visible'=>!Yii::app()->user->isGuest),
			    array('label'=>'ACERCA DE...', 'icon'=>'wrench', 'url'=>array('/site/page/', 'view'=>'about'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
	   array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(
             
             array('label'=>'Copyright © '.date("Y").' - UNIVERSIDAD DE LA GUAJIRA - Todos Los Derechos Reservados', 'url'=>''),
             
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
