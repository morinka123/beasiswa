<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
<div class="span12">            
                
                <div class="widget ">
  
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">


    <p>
        <?= Html::a('Update', ['user/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Kembali', ['index'], ['class' =>'btn btn-danger btn-sm'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jurusan_id',
            'email:email',
            'password',
            'nama',
            'gender',
            'nim',
            'semester',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat_asal',
            'alamat_domisili',
            'no_hp',
            'agama_id',
            'nama_ayah',
            'pekerjaan_ayah',
            'penghasilan_ayah',
            'nama_ibu',
            'pekerjaan_ibu',
            'penghasilan_ibu',
            'nama_wali',
            'pekerjaan_wali',
            'penghasilan_wali',
            'jml_saudara',
            'bank_id',
            'no_rek',
        ],
    ]) ?>

</div>
</div>
</div>
</div>
