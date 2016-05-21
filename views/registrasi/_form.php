<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registrasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'status_beasiswa')->dropDownList([ 'B' => 'B', 'P' => 'P', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'ta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semester')->dropDownList([ 'gasal' => 'Gasal', 'genap' => 'Genap', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status_pendaftaran')->dropDownList([ 'Tidak Lolos' => 'Tidak Lolos', 'Lolos Tahap I' => 'Lolos Tahap I', 'Proses' => 'Proses', 'Diterima' => 'Diterima', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
