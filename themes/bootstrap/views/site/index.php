<?php 
if(!Yii::app()->user->isGuest){
 $nombreUsuario = Yii::app()->user->nombres;
 $nombreUsuario = ucwords(strtolower($nombreUsuario));
 $Usuario = Usuarios::model()->findByPk(Yii::app()->user->id);
 $criteria = new CDbCriteria;
 $criteria->condition = '"USUA_ID" = '.$Usuario->USUA_ID;
 $Usuarioperfilusuario = Usuarioperfilusuario::model()->find($criteria);
 $Usuarioperfilusuario = Usuarioperfilusuario::model()->findByPk($Usuarioperfilusuario->USPU_ID);
 if($Usuarioperfilusuario->USPE_ID==1){
?>

<h2><?php echo CHtml::encode(Yii::app()->name).' - UNIVERSIDAD DE LA GUAJIRA '; ?> </h2>

<table width="70%" border="0">
  <tr>
  <td height="28" align="left">
  <fieldset>
  
  <table width="100%" border="0">
  <tr>
    <td height="28" align="left" colspan="5">
    <fieldset>
      <table width="100%" border="0" align="center">
        <tr>
          <td width="60" align="left">
          <?php $imageUrl = Yii::app()->request->baseUrl . '/images/user.png'; echo $image = CHtml::image($imageUrl); ?></td>
         <td width="750" align="left"><h4>Hola, <strong><?php echo ($nombreUsuario); ?></strong>, Bienvenido (a)</h4> </td>
        </tr>
      </table>
    </fieldset>
    </td>
  </tr> 
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  
   <tr>
    <td align="center">
	<?php
	 $descripcionModulo = '/administrator';
	 $urlImage = 'planta';
	 $nombreModulo = 'MODULO FUNCIONARIOS DE PLANTA - ADMINISTRATIVOS Y DOCENTES';
	 $imageUrl = Yii::app()->request->baseUrl . '/images/mod_'.$urlImage.'.png';
	 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir al '.$nombreModulo, 'target'=>'_blank',);
     $image = CHtml::image($imageUrl);
     echo CHtml::link($image, array($descripcionModulo,),$htmlOptions );
	?>
	</td>
	
	<td>&nbsp;</td>
	
	<td align="center">
	<?php
	 $descripcionModulo = '/ocasionales';
	 $urlImage = 'ocasionales';
	 $nombreModulo = 'MODULO DOCENTES - OCASIONALES';
	 $imageUrl = Yii::app()->request->baseUrl . '/images/mod_'.$urlImage.'.png';
	 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir al '.$nombreModulo, 'target'=>'_blank',);
     $image = CHtml::image($imageUrl);
     echo CHtml::link($image, array($descripcionModulo,),$htmlOptions );
	?>
	</td>
	
	<td>&nbsp;</td>
	
	<td align="center">
	<?php
	 $descripcionModulo = '/catedraticos';
	 $urlImage = 'catedraticos';
	 $nombreModulo = 'MODULO DOCENTES  - CATEDRATICOS';
	 $imageUrl = Yii::app()->request->baseUrl . '/images/mod_'.$urlImage.'.png';
	 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir al '.$nombreModulo, 'target'=>'_blank',);
     $image = CHtml::image($imageUrl);
     echo CHtml::link($image, array($descripcionModulo,),$htmlOptions );
	?>
	</td>	
  </tr>  

  <tr>
    <td>&nbsp;</td>
  </tr>
  
  </table>
  
  <tr>
    <td><hr/></td>
  </tr>

 </fieldset>
  </td>
  </tr>  
</table>



<?php
 }else{
?>      
     <h2><?php echo CHtml::encode(Yii::app()->name).' - UNIVERSIDAD DE LA GUAJIRA '; ?> </h2>
	 <table width="70%" border="0">
	  <tr>
	  <td height="28" align="left">
	  <fieldset>
	  
	  <table width="100%" border="0">
	  <tr>
		<td height="28" align="left" colspan="5">
		<fieldset>
		  <table width="100%" border="0" align="center">
			<tr>
			  <td width="60" align="left">
			  <?php $imageUrl = Yii::app()->request->baseUrl . '/images/user.png'; echo $image = CHtml::image($imageUrl); ?></td>
			 <td width="750" align="left"><h4>Hola, <strong><?php echo ($nombreUsuario); ?></strong>, Bienvenido (a)</h4> </td>
			</tr>
		  </table>
		</fieldset>
		</td>
	  </tr> 
	    
	  <tr>
		<td colspan="5">&nbsp;</td>
	  </tr>
      
	   <tr>
		<td width="20" align="center">
		<?php
		 $descripcionModulo = '/administrator';
		 $urlImage = 'planta';
		 $nombreModulo = 'MODULO FUNCIONARIOS DE PLANTA - ADMINISTRATIVOS Y DOCENTES';
		 $imageUrl = Yii::app()->request->baseUrl . '/images/mod_'.$urlImage.'.png';
		 $htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Ir al '.$nombreModulo, 'target'=>'_blank',);
		 $image = CHtml::image($imageUrl);
		 echo CHtml::link($image, array($descripcionModulo,),$htmlOptions );
		?>
		</td>		
		<td width="20">&nbsp;</td>			
		<td width="20">&nbsp;</td>			
		<td width="20">&nbsp;</td>			
		<td width="20">&nbsp;</td>				
	  </tr> 		
        
	  <tr>
		<td colspan="5">&nbsp;</td>
	  </tr>
	  
	  </table>
	  
	  <tr>
		<td><hr/></td>
	  </tr>

	 </fieldset>
	  </td>
	  </tr>  
	</table>
<?php
	  }
}else{
?>

<div align="right">
<h1>BIENVENIDO A</h1>
<h2><?php echo CHtml::encode(Yii::app()->name); ?> </h2>
<br/>
<h4>Para iniciar sesión haz clic en el vinculo que esta en la parte superior derecha de tu pantalla</h4>
<h3></h3>
</div>

<?php
}
?>
