<?php
use app\models\Registrasi;
?>
<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-check"></i>
	      				<h3>Status Penerima Tunjangan Hidup</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">

<table class="table table-bordered">
	<thead>
		<tr>
			<th>
			No
			</th>
			<th>
			Tahun Ajaran
			</th>
			<th>
			Semester
			</th>
			<th>
			Status
			</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1; 
		foreach ($ta as $x){
			$registrasi = Registrasi::findOne(['user_id'=>Yii::$app->user->identity->id,'ta'=>$x->ta,'semester'=>$x->semester]);
			if ($registrasi == null) {
				$status = 'Tidak Aktif';
			}else{
				$status = 'Aktif';
			}
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$x->ta."</td>";
			echo "<td>".$x->semester."</td>";
			echo "<td>".$status."</td>";
			echo "</tr>";
		$no++;
}
		?>
	</tbody>
</table>
</div>
</div>
</div>
