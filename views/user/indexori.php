<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jurusan_id',
            'email:email',
            'password',
            'nama',
            // 'gender',
            // 'nim',
            // 'semester',
            // 'tempat_lahir',
            // 'tanggal_lahir',
            // 'alamat_asal',
            // 'alamat_domisili',
            // 'no_hp',
            // 'agama_id',
            // 'status_kawin',
            // 'nama_ayah',
            // 'pekerjaan_ayah',
            // 'penghasilan_ayah',
            // 'nama_ibu',
            // 'pekerjaan_ibu',
            // 'penghasilan_ibu',
            // 'nama_wali',
            // 'pekerjaan_wali',
            // 'penghasilan_wali',
            // 'jml_saudara',
            // 'bank_id',
            // 'no_rek',
            // 'profile_photo',
       

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
