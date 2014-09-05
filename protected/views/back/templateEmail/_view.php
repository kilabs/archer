<?php
/* @var $this TemplateEmailController */
/* @var $data TemplateEmail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proses')); ?>:</b>
	<?php echo CHtml::encode($data->proses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indonesia')); ?>:</b>
	<?php echo CHtml::encode($data->indonesia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('english')); ?>:</b>
	<?php echo CHtml::encode($data->english); ?>
	<br />


</div>