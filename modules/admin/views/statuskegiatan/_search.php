<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StatusKegiatanPthSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-kegiatan-pth-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="control-group">                                        
            <div class="controls">
    <?= $form->field($model, 'user_id')->textInput(['class' => 'span2', 'placeholder'=>'nama'])->label(false); ?>
    </div>
    </div>
    <div class="pull-right" style="margin-right:785px; margin-top:-47px;">                                         
            <div class="controls">
    <?= $form->field($model, 'nama_kegiatan')->textInput(['class' => 'span2', 'placeholder'=>'nama kegiatan'])->label(false); ?>
    </div>
    </div>
    <div class="pull-right" style="margin-right:620px; margin-top:-47px;">                                         
            <div class="controls">
    <?= $form->field($model, 'kelompok')->textInput(['class' => 'span1', 'placeholder'=>'kelompok'])->label(false); ?>
    </div>
    </div>

    <div class="pull-right" style="margin-right:600px; margin-top:-47px;">                                         
            <div class="controls">
    <?= $form->field($model, 'nama_penerima')->textInput(['class' => 'span2', 'placeholder'=>'nama penerima'])->label(false); ?>
    </div>
    </div>

    <div class="pull-right" style="margin-right:410px; margin-top:-47px;">                                         
            <div class="controls">
    <?= $form->field($model, 'alamat')->textInput(['class' => 'span2', 'placeholder'=>'alamat penerima'])->label(false); ?>
    </div>
    </div>

    <div class="pull-right" style="margin-right:220px; margin-top:-47px;">                                         
            <div class="controls">
    <?= $form->field($model, 'status_penyaluran')->textInput(['class' => 'span2', 'placeholder'=>'status penyaluran'])->label(false); ?>
    </div>
    </div>

    <div class="pull-right" style="margin-right:140px; margin-top:-47px;">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
     
    </div>

    <?php ActiveForm::end(); ?>

</div>
