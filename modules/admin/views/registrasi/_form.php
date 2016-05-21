<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>

<div class="control-group">                                         
        <label class="control-label" for="user">User Id</label>
            <div class="controls">
    <?= $form->field($model, 'user_id')->textInput(['disabled'=>'disabled'])->label(false); ?>
    </div>
</div>
<div class="control-group">                                         
        <label class="control-label" for="user">Status Beasiswa</label>
            <div class="controls">
    <?= $form->field($model, 'status_beasiswa')->dropDownList([ 'B' => 'B', 'P' => 'P', ], ['prompt' => '','disabled'=>'disabled'])->label(false); ?>
</div>
</div>

<div class="control-group">                                         
        <label class="control-label" for="user">Tahun</label>
            <div class="controls">    
    <?= $form->field($model, 'tahun')->textInput(['disabled'=>'disabled'])->label(false); ?>
    </div>
    </div>

    <div class="control-group">                                         
        <label class="control-label" for="user">Semester</label>
            <div class="controls">    

    <?= $form->field($model, 'semester')->dropDownList([ 'gasal' => 'Gasal', 'genap' => 'Genap', ], ['prompt' => '','disabled'=>'disabled'])->label(false); ?>
    </div>
    </div>

     <div class="control-group">                                         
        <label class="control-label" for="user">Status Pendaftaran</label>
            <div class="controls">   

    <?= $form->field($model, 'status_pendaftaran')->dropDownList([ 'Tidak Lolos' => 'Tidak Lolos', 'Lolos Tahap I' => 'Lolos Tahap I', 'Proses' => 'Proses', 'Diterima' => 'Diterima', ], ['prompt' => ''])->label(false); ?>
    </div>
    </div>
    <div class="form-actions">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


