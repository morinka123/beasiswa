<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrasiPost */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registrasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Registrasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'status',
            'tahun',
            'ta',
            // 'semester',
            // 'status_pendaftaran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
