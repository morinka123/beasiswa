<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StatusKegiatanPth */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Status Kegiatan Pths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-kegiatan-pth-view">
<div class="span12">            
                
                <div class="widget ">
  
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'user_id',
            'nama_kegiatan:ntext',
            'kelompok',
            'nama_penerima',
            'alamat',
            'tgl_penyaluran',
            'tgl_pengembalian',
            'status_penyaluran',
        ],
    ]) ?>

</div>
</div>
</div>
</div>

