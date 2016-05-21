<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StatusKegiatanPth */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="<?php echo $this->theme->baseUrl; ?>/js/jquery.maskedinput.min.js"></script> 
<script>jQuery(function($){
   $(".date").mask("99-99-9999",{placeholder:"dd-mm-yyyy"});
});
</script>

<?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
     
    <div class="control-group">                                         
        <label class="control-label" for="user">Nama Kegiatan</label>
            <div class="controls">
                                        
                <?= $form->field($model, 'nama_kegiatan')->textInput(['maxlength' => true])->label(false); ?>
            </div> <!-- /controls -->               
    </div> <!-- /control-group -->
    <div class="control-group">                                         
        <label class="control-label" for="user">Kelompok</label>
            <div class="controls">                                        
                <?= $form->field($model, 'kelompok')->textInput(['maxlength' => true])->label(false); ?>
            </div> <!-- /controls -->               
    </div> <!-- /control-group -->
     <div class="control-group">                                         
        <label class="control-label" for="user">Nama Penerima</label>
            <div class="controls">                                        
                <?= $form->field($model, 'nama_penerima')->textInput(['maxlength' => true])->label(false); ?>
            </div> <!-- /controls -->               
    </div> <!-- /control-group -->
    <div class="control-group">                                         
        <label class="control-label" for="user">Alamat</label>
            <div class="controls">                                        
                <?= $form->field($model, 'alamat')->textInput(['maxlength' => true])->label(false); ?>
            </div> <!-- /controls -->               
    </div> <!-- /control-group -->
    <div class="control-group">                                         
        <label class="control-label" for="user">Tanggal Penyaluran</label>
            <div class="controls">                         
                <?= $form->field($model, 'tgl_penyaluran')->textInput(['maxlength' => true,'class'=>'date'])->label(false); ?>
            </div> <!-- /controls -->               
    </div> <!-- /control-group -->
    <div class="control-group">                                         
        <label class="control-label" for="user">Tanggal Pengembalian Bukti Penyaluran</label>
            <div class="controls">                                        
                <?= $form->field($model, 'tgl_pengembalian')->textInput(['maxlength' => true,'class'=>'date'])->label(false); ?>
            </div> <!-- /controls -->               
    </div> <!-- /control-group -->
    <div class="control-group">                                         
        <label class="control-label" for="user">Status</label>
            <div class="controls">                                        
                <?= $form->field($model, 'status_penyaluran')->dropDownList([ 'sudah' => 'sudah', 'belum' => 'belum', ], ['prompt' => ''])->label(false); ?>
            </div> <!-- /controls -->               
    </div> <!-- /control-group -->
    <div class="form-actions">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>



