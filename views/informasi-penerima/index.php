<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InformasiPenerimaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Informasi Penerima';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informasi-penerima-index">
<div class="span12">            
                
                <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-bullhorn"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
              'header'=>'No'
            ],

            //'id',
            //'user_id',
            'nama',
            'nim',
            'fakultas',
            'kategori',
        ],
    ]); ?>

</div>
</div>
</div>
</div>
