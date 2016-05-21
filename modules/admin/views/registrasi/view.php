<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Registrasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registrasi-view">
<div class="span12">            
                
                <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-check"></i>
                        <h3><?= Html::encode($this->title) ?></h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'status_beasiswa',
            'tahun',
            'ta',
            'semester',
            'status_pendaftaran',
            'user.no_rek',
            'user.bank.nama_bank',
        ],
    ]) ?>
    <div class="tabbable">
                        <ul class="nav nav-tabs">
                          <li><a href="#formcontrols" class="active" data-toggle="tab">Riwayat Pendidikan</a></li>
                          <li><a href="#formcontrols2"  data-toggle="tab">Fasilitas</a></li>
                        </ul>
                    
                        
                            <div class="tab-content">
                                <!-- /formcontrols-->
                                <div class="tab-pane active" id="formcontrols">
                                          
                          <table class="table">
                            <thead>
                                <tr><th>No</th><th>Riwayat Pendidikan</th><th>Tahun Masuk</th><th>Tahun Lulus</th><th>Nama Sekolah</th><th>Nilai</th></tr>                                                                
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($riwayatpendidikan as $row) {
                                    echo '<tr>';
                                    echo '<td>'.$no.'</td>';
                                    echo '<td>'.$row['pendidikan']['nama_jenjang'].'</td>';
                                    echo '<td>'.$row['thn_masuk'].'</td>';
                                    echo '<td>'.$row['thn_lulus'].'</td>';
                                    echo '<td>'.$row['nama_sekolah'].'</td>';
                                    echo '<td>'.$row['nilai'].'</td>';
                                    echo '</tr>';
                                }
                                ?>                                
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="formcontrols2">
                                          
                          <table class="table">
                            <thead>
                                <tr><th>No</th><th>Nama Barang</th><th>Merek</th><th>Series</th><th>Tahun</th></tr>                                                                
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($fasilitas as $row) {
                                    echo '<tr>';
                                    echo '<td>'.$no.'</td>';
                                    echo '<td>'.$row['nama_barang'].'</td>';
                                    echo '<td>'.$row['merek'].'</td>';
                                    echo '<td>'.$row['series'].'</td>';
                                    echo '<td>'.$row['tahun'].'</td>';
                                    echo '</tr>';
                                }
                                ?>                                
                            </tbody>
                          </table>
                        </div>

                        </div>
                        </div>


</div>
</div>
</div>
</div>

