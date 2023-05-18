<?php
    $this->pageTitle=Yii::app()->name . ' - Post';
    $this->breadcrumbs=array(
        'post',
    );
?>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'post-form',
    'enableAjaxValidation' => false,
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title'); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content'); ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Salvar'); ?>
    </div>

<?php $this->endWidget(); ?>