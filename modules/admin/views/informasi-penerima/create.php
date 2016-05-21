<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InformasiPenerima */

$this->title = 'Create Informasi Penerima';
$this->params['breadcrumbs'][] = ['label' => 'Informasi Penerimas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informasi-penerima-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
