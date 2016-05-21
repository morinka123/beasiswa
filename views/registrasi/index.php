<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-index">
<div class="span12">            
                
                <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
             'header'=>'No'
            ],

            //'id',
            //'user_id',
            'user.nama',
            'status_beasiswa',
            //'tahun',
            'ta',
            // 'semester',
            'status_pendaftaran',

        ],
    ]); ?>

</div>
</div>
</div>
</div>

