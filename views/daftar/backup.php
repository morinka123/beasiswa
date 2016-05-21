<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pendidikan;
use app\models\Registrasi;
use app\models\JenisDokumen;
?>
<script>
  $(function(){    
    $(".add").click(function(e){
      table_name = $(this).attr("table_name");
      var rowLength = $('#'+table_name+' tbody tr.baris').length+1;
      var clonedRow = $('#'+table_name+' tbody tr.baris:last').clone().html();
      $('#'+table_name+' tr.baris:last').after("<tr class='baris'>"+clonedRow+"</tr>");
      $('#'+table_name+' tr.baris:last input').val('');
      $('#'+table_name+' tr.baris:last').attr('no_urut', rowLength);
    });

    $("table").on('click', '.delete', function(){
    	table_name = $(this).closest("table");
    	var rowLength = table_name.find("tbody tr.baris").length;
    	if(rowLength>1)
    	{
    		$(this).parent().parent().remove(); 		
    	}
    });
  })
</script>
<div class="span12"> 

	      			
	      			<div class="widget-header">
	      				<i class="icon-pencil"></i>
	      				<h3>Pendaftar Baru</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li><a href="#formcontrols" class="active" data-toggle="tab">Riwayat Pendidikan</a></li>
						  <li><a href="#formcontrols2"  data-toggle="tab">Riwayat Beasiswa Lain</a></li>
						  <li><a href="#formcontrols3" data-toggle="tab">Fasilitas</a></li>
						  <li><a href="#formcontrols4" data-toggle="tab">Dokumen</a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<!-- /formcontrols-->
								<div class="tab-pane active" id="formcontrols">
								 <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								
								
										<div class="col-md-12">
										<table class="table table-bordered" id="table_pendidikan">

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
													Nama Sekolah/Universitas
													</th>
													<th>
													Nilai/IPK
													</th>
													<th>
													Aksi
													</th>
												</tr>
											</thead>
											<tbody>
												<tr class="baris">
													<td>
														<?php $listData=ArrayHelper::map(Pendidikan::find()->all(),'id','nama_jenjang');?>
														<?= $form->field($riwayatPendidikan, 'pendidikan_id[]')->dropDownList($listData)->label(false) ?>
													</td>
													<td>
														<?= $form->field($riwayatPendidikan, 'thn_masuk[]')->textInput(['size'=>5])->label(false) ?>
													</td>
													<td>
														<?= $form->field($riwayatPendidikan, 'thn_lulus[]')->textInput(['size'=>5])->label(false) ?>
													</td>
													<td>
														<?= $form->field($riwayatPendidikan, 'nama_sekolah[]')->textInput(['size'=>5])->label(false) ?>
													</td>
													<td>
														<?= $form->field($riwayatPendidikan, 'nilai[]')->textInput()->label(false) ?>
													</td>
													<td>
														<span class="delete">
														Hapus 
														</span>
													</td>
												</tr>
											</tbody>
										</table>
										</div>
										
									<div class="login-actions">                                                   
									<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
									</div> <!-- .actions -->
								 <?php ActiveForm::end(); ?>
								 <div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_pendidikan">tambah</button>
									</div>

								</div>
								
								<!-- /formcontrols2 -->
								<div class="tab-pane" id="formcontrols2">
								<?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								<div class="col-md-12">
								 <table class="table table-bordered" id="table_riwayat_beasiswa">
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
											Aksi
											</th>
										</tr>
									</thead>
									<tbody>
											<?php
											foreach ($datariwayatBeasiswa as $value) :
											?>
											<tr class="baris">
											<td>
												<?= $form->field($riwayatBeasiswa, 'sumber[]')->textInput(['value'=>$value->sumber])->label(false) ?>
											</td>
											<td>
												<?= $form->field($riwayatBeasiswa, 'nominal[]')->textInput(['value'=>$value->nominal])->label(false) ?>
											</td>
											<td>
												<?= $form->field($riwayatBeasiswa, 'periode[]')->textInput(['value'=>$value->periode])->label(false) ?>
											</td>
											<td>
												
												<span class="delete">
												Hapus 
												</span>
											</td>
											</tr>
										<?php endforeach;?>
									</tbody>
								</table>
								</div>
								<div class="login-actions">                                                   
								<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
								</div> <!-- .actions -->
								 <?php ActiveForm::end(); ?>
								 <div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_riwayat_beasiswa">tambah</button>
									</div>
							

								<!-- /formcontrols3-->
								<div class="tab-pane" id="formcontrols3">
								<?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								<div class="col-md-12">
								<table class="table table-bordered" id="table_fasilitasbaru">
									<thead>
										<tr>
											<th>
											Nama Barang
											</th>
											<th>
											Merek
											</th>
											<th>
											Series
											</th>
											<th>
											Tahun Pembuatan
											</th>
											<th>
											Aksi
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($dataFasilitas as $value) :
										?>
										<tr class="baris">

											<td>
												<?= $form->field($fasilitas, 'nama_barang[]')->textInput(['value'=>$value->nama_barang])->label(false) ?>
											</td>
											<td>
												<?= $form->field($fasilitas, 'merek[]')->textInput(['value'=>$value->merek])->label(false) ?>
											</td>
											<td>
												<?= $form->field($fasilitas, 'series[]')->textInput(['value'=>$value->series])->label(false) ?>
											</td>
											<td>
												<?= $form->field($fasilitas, 'tahun[]')->textInput(['value'=>$value->tahun])->label(false) ?>
											</td>
											<td>
												<span class="delete">
												Hapus 
												</span>
											</td>
										</tr>
										<?php endforeach;?>
									</tbody>
								</table>
								</div>
								<div class="login-actions">                                                   
								<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
								</div> <!-- .actions -->
								
								<?php ActiveForm::end(); ?>
								<div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_fasilitasbaru">tambah</button>
									</div>
								</div>
								</div>
								
								<!-- /formcontrols4-->
								
							</div>
						  
						  
						</div>

					</div> <!-- /widget-content -->
 		
		    </div> <!-- /span8 -->
				    