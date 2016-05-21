<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrasiPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registrasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="control-group">                                        
            <div class="controls">
    <?= $form->field($model, 'user_id')->textInput(['class' => 'span2', 'placeholder'=>'nama'])->label(false); ?>
    </div>
    </div>

    <div class="pull-right" style="margin-right:885px; margin-top:-47px;">                                        
            <div class="controls">
    <?= $form->field($model, 'status_beasiswa')->textInput(['class' => 'span1', 'placeholder'=>'beasiswa'])->label(false); ?>
    </div>
    </div>

    <div class="pull-right" style="margin-right:803px; margin-top:-47px;">                                        
            <div class="controls">
    <?= $form->field($model, 'ta')->textInput(['class' => 'span1', 'placeholder'=>'ta'])->label(false); ?>
    </div>
    </div>

    <div class="pull-right" style="margin-right:620px; margin-top:-47px;">                                        
            <div class="controls">
    <?= $form->field($model, 'status_pendaftaran')->textInput(['class' => 'span2', 'placeholder'=>'status pendaftaran'])->label(false); ?>
    </div>
    </div>
   


    <?php // echo $form->field($model, 'semester') ?>

    <?php // echo $form->field($model, 'status_pendaftaran') ?>

    <div class="pull-right" style="margin-right:540px; margin-top:-47px;">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
