<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InformasiWawancara */

$this->title = 'Create Informasi Wawancara';
$this->params['breadcrumbs'][] = ['label' => 'Informasi Wawancaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informasi-wawancara-create">
<div class="span12">            
                
                <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-bullhorn"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
</div>

