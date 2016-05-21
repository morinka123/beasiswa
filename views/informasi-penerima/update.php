<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InformasiPenerima */

$this->title = 'Update Informasi Penerima: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Informasi Penerimas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="informasi-penerima-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
