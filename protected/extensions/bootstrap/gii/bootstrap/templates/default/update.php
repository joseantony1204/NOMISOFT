<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=($this->class2name($this->modelClass));
$controlador = $this->class2id($this->modelClass);
$id = $this->tableSchema->primaryKey;
echo "Yii::app()->homeUrl = array('/administrator/');\n";
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin/$controlador/admin'),
	'Actualizar',
);\n";

?>
?>

<table width="70%" border="0" align="left" class="">
  <tr>
   <td>
	<table width="100%" border="0" align="center">
     <tr>
      <td>
       <fieldset>
        <table width="100%" border="0" align="center">
            <tr>
             <td width="6%" align="center">
					  <?php 
					 echo "<?php "; echo"			 
					 \$imageUrl = Yii::app()->request->baseUrl . '/images/user.png';
					  echo \$image = CHtml::image(\$imageUrl); 
					  ?>         
					 "; ?>              
             </td>
             <td width="63%"><strong><span><em>ADMINISTRACION DE <?php echo strtoupper($this->class2name($this->modelClass)); ?>  [ Actualizar ] </em></span></strong></td>
			 <td width="13%" align="center">
					 <?php 
					 echo "<?php\n";
					 echo"
					 
					 \$imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
					 \$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
					 \$image = CHtml::image(\$imageUrl);
					 echo CHtml::link(\$image, array('admin/$controlador/admin',),\$htmlOptions ); \n?>         
					 ";
					 ?>
             </td>
             <td width="13%" align="center">
					 <?php 
					 echo "<?php\n";
					 echo"
					 
					 \$imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
					 \$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Refrescar Pagina');
					 \$image = CHtml::image(\$imageUrl);
					 echo CHtml::link(\$image, array('admin/$controlador/update','id'=>\$model->$id),\$htmlOptions ); \n?>        
					 ";
					 ?>
             </td>
           </tr>
        </table>
       </fieldset>
      </td>
     </tr>
    </table></td>
  </tr>
  
  
  
  <tr>
    <td><p><?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?></p></td>
  </tr>
</table>