<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=($this->class2name($this->modelClass));
$id = $this->tableSchema->primaryKey;
$controlador = $this->class2id($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

?>

<table width="70%" border="1" align="left" class="" style="white-space-collapse:collapse">
  <tr>
    <td><table width="820" border="0" align="center">
      <tr>
        <td width="60" align="left"><img src="/APP_FONDO/images/user.png" alt="" /></td>
        <td width="498" align="left"><strong style="border-bottom-style:groove">VISUALIZACIÒN DE REGISTROS [ <?php echo strtoupper($this->class2name($this->modelClass)); ?> : Detalles ] </strong></td>
        <td width="80" align="center"><?php 
		 echo "<?php\n";
		 echo"
         
		 \$imageUrl = Yii::app()->request->baseUrl . '/images/regresar.png';
         \$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Regresar');
         \$image = CHtml::image(\$imageUrl);
         echo CHtml::link(\$image, array('$controlador/admin',),\$htmlOptions ); \n?>         
		 ";
		 ?></td>
        <td width="80" align="center"><?php 
		 echo "<?php\n";
		 echo"
         
		 \$imageUrl = Yii::app()->request->baseUrl . '/images/refrescar.png';
         \$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         \$image = CHtml::image(\$imageUrl);
         echo CHtml::link(\$image, array('$controlador/view','id'=>\$model->$id),\$htmlOptions ); \n?>         
		 ";
		 ?></td>
        <td width="80" align="center"><?php 
		 echo "<?php\n";
		 echo"
         
		 \$imageUrl = Yii::app()->request->baseUrl . '/images/edit.png';
         \$htmlOptions = array('class' => 'thumbnail','rel' => 'tooltip','data-title' => 'Creaciòn de registros');
         \$image = CHtml::image(\$imageUrl);
         echo CHtml::link(\$image, array('$controlador/update','id'=>\$model->$id),\$htmlOptions ); \n?>         
		 ";
		 ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>    
    
    </td>
  </tr>
</table>
