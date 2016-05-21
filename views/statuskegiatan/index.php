<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kegiatan Penerima Tunjangan Hidup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-kegiatan-pth-index">
<div class="span12">            
                
                <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
             'header'=>'No'
            ],

          

            //'id',
            //'user_id',
            'user.nama',
            'nama_kegiatan:ntext',
            'kelompok',
            'nama_penerima',
            'alamat',
            'tgl_penyaluran',
            'tgl_pengembalian',
            'status_penyaluran',

               [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width:30px;'],
            'template'=>'{update}',
                            'buttons'=>[
                             
                               'update' => function ($url, $model) {     
                                return Html::a('<span class="icon-pencil "></span>', $url, [
                                        'title' => Yii::t('yii', 'Update'),
                                ]);                                
            
                              },

                              



                          ]
            ],

            //['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
</div>
</div>
</div>

