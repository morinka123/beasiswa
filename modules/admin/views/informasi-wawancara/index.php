<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Informasi Wawancaras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informasi-wawancara-index">
<div class="span12">            
                
                <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-bullhorn"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">

    <p>
        <?= Html::a('Send Email', ['sendemail'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table">
        <thead><tr><th>No</th><th>Nama</th><th>Status</th></tr></thead>
        <tbody>
            <?php
            $no=1;
            foreach ($registrasi as $row) {
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$row['user']['nama'].'</td>';
                echo '<td>'.$row['status_pendaftaran'].'</td>';                
                echo '</tr>';
                $no++;
            }
            ?>
        </tbody>
    </table>    

</div>
</div>
</div>
</div>

