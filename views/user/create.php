<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    
    <?= Html::encode($this->title) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    
 
</div>
