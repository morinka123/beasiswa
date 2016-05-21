<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StatusKegiatanPth */

$this->title = 'Create Status Kegiatan Pth';
$this->params['breadcrumbs'][] = ['label' => 'Status Kegiatan Pths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-kegiatan-pth-create">
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
