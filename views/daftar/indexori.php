<?php
use yii\helpers\Html;
?>
<?=

Html::beginForm([''],'post',['enctype'=>'multipart/form-data']);
?>



<table class="table table-bordered" table_name="pendidikan">
	<thead>
		<tr>
			<th>
			Jenjang Pendidikan
			</th>
			<th>
			Tahun Masuk
			</th>
			<th>
			Tahun Lulus
			</th>
			<th>
			Nama Sekolah/PT
			</th>
			<th>
			Nilai/IPK
			</th>
			<th>
			#
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<?= Html::input('jenjang[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('tahunmasuk[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('tahunlulus[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('namasekolah[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('nilai[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<span class="tambah">
					Tambah 
				</span>
				<span class="hapus">
					Hapus 
				</span>
			</td>
		</tr>
	</tbody>

</table>

<table class="table table-bordered" table_name="beasiswa">
	<thead>
		<tr>
			<th>
			Sumber
			</th>
			<th>
			Nominal
			</th>
			<th>
			Periode
			</th>
			<th>
			</th>

		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<?= Html::input('sumber[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('nominal[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('periode[]','','',['class'=>'form-control']) ?>
			</td>
				<td>
				<span class="tambah">
					Tambah 
				</span>
				<span class="hapus">
					Hapus 
				</span>
			</td>
		</tr>
	</tbody>

</table>

<table class="table table-bordered" table_name="fasilitas">
	<thead>
		<tr>
			<th>
			Barang
			</th>
			<th>
			Merek
			</th>
			<th>
			Series
			</th>
			<th>
			Tahun
			</th>
			<th>
			</th>

		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<?= Html::input('barang[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('merek[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('series[]','','',['class'=>'form-control']) ?>
			</td>
			<td>
				<?= Html::input('tahunpembuatan[]','','',['class'=>'form-control']) ?>
			</td>
				<td>
				<span class="tambah">
					Tambah 
				</span>
				<span class="hapus">
					Hapus 
				</span>
			</td>
		</tr>
	</tbody>

</table>
<div class="login-actions">
                
                                    
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                
            </div> <!-- .actions -->




<?= Html::endForm() ?>