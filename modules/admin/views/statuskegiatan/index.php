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
                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
 <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
 
</p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
             'header'=>'No',
            ],

            /*[
                'attribute'=>'user_id',
                'value'=>'user.nama',
            ],*/

            //'id',
            //'user_id',
            [
                'attribute'=>'user.nama',
                'header'=>'Nama User',
                'options' => ['style' => 'width:220px;'],
            ],
            //'user.nama',
            'nama_kegiatan:ntext',
            'kelompok',
            'nama_penerima',
            'alamat',
            'tgl_penyaluran',
            'tgl_pengembalian',
            'status_penyaluran',
            [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width:80px;'],
            'template'=>'{update} | {delete}',
                            'buttons'=>[
                        
                               'update' => function ($url, $model) {     
                                return Html::a('<span class="icon-pencil "></span>', $url, [
                                        'title' => Yii::t('yii', 'Update'),
                                ]);                                
            
                              },

                              'delete' => function ($url, $model) {     
                                return Html::a('<span class="icon-trash"></span>', $url, [
                                        'title' => Yii::t('yii', 'Delete'),
                                        'onclick'=>'return (confirm("Apakah data mau di hapus?")?true:false);',
                                        'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ]);                                
            
                              }



                          ]
            ],
            

            

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <div class="pull-right" style="margin-right:5px; margin-top:-205px;">
    <?= Html::a('Cetak', ['export-excel'], ['class'=>'btn btn-info']); ?>
    </div>

</div>
</div>
</div>
</div>
