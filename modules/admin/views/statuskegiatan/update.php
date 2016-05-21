<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatusKegiatanPth */

$this->title = 'Update Status Kegiatan Pth: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Status Kegiatan Pths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="status-kegiatan-pth-update">
<div class="span12">            
                
                <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

     <span class="pull-right" style="margin-right:830px; margin-top:-64px;">
        <?= Html::a('Kembali', ['index'], ['class' =>'btn btn-danger btn-sm']) ?>
    </span>

</div>
</div>
</div>
</div>

