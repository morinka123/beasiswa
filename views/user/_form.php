<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jurusan_id')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'P' => 'P', 'L' => 'L', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semester')->textInput() ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'alamat_asal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_domisili')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agama_id')->textInput() ?>

    <?= $form->field($model, 'status_kawin')->dropDownList([ 'Belum' => 'Belum', 'Sudah' => 'Sudah', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penghasilan_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penghasilan_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_wali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_wali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penghasilan_wali')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jml_saudara')->textInput() ?>

    <?= $form->field($model, 'bank_id')->textInput() ?>

    <?= $form->field($model, 'no_rek')->textInput(['maxlength' => true]) ?>


    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
