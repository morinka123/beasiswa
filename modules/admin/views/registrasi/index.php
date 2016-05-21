<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrasiPost */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-create">
<div class="span12">            
                
                <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                    
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
             'header'=>'No'
            ],
            /*[
                'attribute'=>'user_id',
                'value'=>'user.nama',
            ],*/

            [
                'attribute'=>'user.nama',
                'header'=>'Nama User',
                'options' => ['style' => 'width:220px;'],
            ],
            //'id',
            //'user_id',
            'status_beasiswa',
            'tahun',
            //'ta',
            // 'semester',
            'status_pendaftaran',
            [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width:80px;'],
            'template'=>'{view} | {update} | {delete}',
                            'buttons'=>[
                              'view' => function ($url, $model) {     
                                return Html::a('<span class="icon-eye-open"></span>', $url, [
                                        'title' => Yii::t('yii', 'View'),
                                ]);                                
            
                              },
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
        ],
    ]); ?>
 <div class="pull-right" style="margin-right:5px; margin-top:-160px;">
<?= Html::a('Cetak', ['export-excel'], ['class'=>'btn btn-info']); ?>
</div>
</div>
</div>
</div>
</div>

