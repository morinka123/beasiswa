<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Biaya;
use app\models\Registrasi;
use app\models\JenisDokumenPerpanjangan;
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
	      				<h3>Pendaftar Perpanjangan</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li><a href="#formcontrols" class="active" data-toggle="tab">Riwayat IPK</a></li>
						  <li><a href="#formcontrols2"  data-toggle="tab">Riwayat Beasiswa Lain</a></li>
						  <li><a href="#formcontrols3" data-toggle="tab">Prestasi Akademik</a></li>
						  <li><a href="#formcontrols4" data-toggle="tab">Kegiatan Kemahasiswaan</a></li>
						  <li><a href="#formcontrols5" data-toggle="tab">Fasilitas</a></li>
						  <li><a href="#formcontrols6" data-toggle="tab">Biaya</a></li>
						  <li><a href="#formcontrols7" data-toggle="tab">Alasan Layak Menerima</a></li>
						  <li><a href="#formcontrols8" data-toggle="tab">Dokumen</a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<!-- /formcontrols-->
								<div class="tab-pane active" id="formcontrols">
								<div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_riwayatipk">Tambah</button>
								</div>
								
								 <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
										
										<table class="table table-bordered" id="table_riwayatipk">

											<thead>
												<tr>
													<th>
													IP 1
													</th>
													<th>
													IP 2
													</th>
													<th>
													IPK Saat ini
													</th>
													<th>
													Aksi
													</th>
												</tr>
											</thead>
											<tbody>
												<?php if($datariwayatIpk != null) :?>
												<?php
												foreach ($datariwayatIpk as $value) :
												?>
												<tr class="baris">
													<td>
														<?= $form->field($riwayatIpk, 'ip_1[]')->textInput(['value'=>$value->ip_1])->label(false) ?>
													</td>
													<td>
														<?= $form->field($riwayatIpk, 'ip_2[]')->textInput(['value'=>$value->ip_2])->label(false) ?>
													</td>
													<td>
														<?= $form->field($riwayatIpk, 'ipk_saat_ini[]')->textInput(['value'=>$value->ipk_saat_ini])->label(false) ?>
													</td>
													<td>
														<span class="delete icon-trash">
														Hapus 
														</span>
													</td>
												</tr>
												<?php endforeach;?>
												<?php else :?>
												<tr class="baris">
													<td>
														<?= $form->field($riwayatIpk, 'ip_1[]')->textInput()->label(false) ?>
													</td>
													<td>
														<?= $form->field($riwayatIpk, 'ip_2[]')->textInput()->label(false) ?>
													</td>
													<td>
														<?= $form->field($riwayatIpk, 'ipk_saat_ini[]')->textInput()->label(false) ?>
													</td>
													<td>
														<span class="delete icon-trash">
														Hapus 
														</span>
													</td>
												</tr>
												<?php endif ?>
											</tbody>
										</table>
									<div>
										<button type="submit" class="btn btn-primary" style="clear:both;margin-bottom:30px;">Save</button> 
									</div> <!-- /form-actions -->
								 <?php ActiveForm::end(); ?>
								</div>
								
								<!-- /formcontrols2 -->
								<div class="tab-pane" id="formcontrols2">
								<div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_riwayatbeasiswalain">Tambah</button>
								</div>
								<?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								 <table class="table table-bordered" id="table_riwayatbeasiswalain">
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
											<?php if($datariwayatBeasiswa != null) :?>
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
												<span class="delete icon-trash">
													Hapus 
												</span>
											</td>
											</tr>
										<?php endforeach;?>
										<?php else :?>
											<tr class="baris">
											<td>
												<?= $form->field($riwayatBeasiswa, 'sumber[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($riwayatBeasiswa, 'nominal[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($riwayatBeasiswa, 'periode[]')->textInput()->label(false) ?>
											</td>
											<td>
												<span class="delete icon-trash">
													Hapus 
												</span>
											</td>
											</tr>

										<?php endif ?>	
									</tbody>
								</table>
								<div>
									<button type="submit" class="btn btn-primary" style="clear:both;margin-bottom:30px;">Save</button> 
								</div> <!-- /form-actions -->
								 <?php ActiveForm::end(); ?>
								</div>

								<!-- /formcontrols3-->
								<div class="tab-pane " id="formcontrols3">
								<div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_prestasiakademik">Tambah</button>
								</div>
								<?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								 <table class="table table-bordered" id="table_prestasiakademik">
									<thead>
										<tr>
											<th>
											Juara
											</th>
											<th>
											Kompetisi
											</th>
											<th>
											Lingkup
											</th>
											<th>
											Tahun
											</th>
											<th>
											Aksi
											</th>
										</tr>
									</thead>
									<tbody>
											<?php if($dataprestasiAkademik != null) :?>
											<?php
												foreach ($dataprestasiAkademik as $value) :
											?>
											<tr class="baris">
											<td>
												<?= $form->field($prestasiAkademik, 'juara[]')->textInput(['value'=>$value->juara])->label(false) ?>
											</td>
											<td>
												<?= $form->field($prestasiAkademik, 'kompetisi[]')->textInput(['value'=>$value->kompetisi])->label(false) ?>
											</td>
											<td>
												<?= $form->field($prestasiAkademik, 'lingkup[]')->textInput(['value'=>$value->lingkup])->label(false) ?>
											</td>
											<td>
												<?= $form->field($prestasiAkademik, 'tahun[]')->textInput(['value'=>$value->tahun])->label(false) ?>
											</td>
											<td>
												<span class"delete icon-trash">
												Hapus 
												</span>
											</td>
											</tr>
										<?php endforeach;?>
										<?php else :?>
											<tr class="baris">
											<td>
												<?= $form->field($prestasiAkademik, 'juara[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($prestasiAkademik, 'kompetisi[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($prestasiAkademik, 'lingkup[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($prestasiAkademik, 'tahun[]')->textInput()->label(false) ?>
											</td>
											<td>
												<span class"delete icon-trash">
												Hapus 
												</span>
											</td>
											</tr>
										<?php endif ?>
									</tbody>
								</table>
								<div>
									<button type="submit" class="btn btn-primary" style="clear:both;margin-bottom:30px;">Save</button> 
								</div> <!-- /form-actions -->
								 <?php ActiveForm::end(); ?>
								</div>
								<!-- /formcontrols4-->
								<div class="tab-pane" id="formcontrols4">
								<div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_kegiatankemahasiswaan">Tambah</button>
								</div>
								<?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								 <table class="table table-bordered" id="table_kegiatankemahasiswaan">
									<thead>
										<tr>
											<th>
											Nama Organisasi
											</th>
											<th>
											Posisi
											</th>
											<th>
											Tahun
											</th>
											<th>
											Aksi
											</th>
										</tr>
									</thead>
									<tbody>
											<?php if($datakegiatanKemahasiswaan != null) :?>
											<?php
												foreach ($datakegiatanKemahasiswaan as $value) :
											?>
											<tr class="baris">
											<td>
												<?= $form->field($kegiatanKemahasiswaan, 'nama_organisasi[]')->textInput(['value'=>$value->nama_organisasi])->label(false) ?>
											</td>
											<td>
												<?= $form->field($kegiatanKemahasiswaan, 'posisi[]')->textInput(['value'=>$value->posisi])->label(false) ?>
											</td>
											<td>
												<?= $form->field($kegiatanKemahasiswaan, 'tahun[]')->textInput(['value'=>$value->tahun])->label(false) ?>
											</td>
											<td>
												<span class="delete icon-trash">
												Hapus 
												</span>
											</td>
											</tr>
										<?php endforeach;?>
										<?php else :?>
											<tr class="baris">
											<td>
												<?= $form->field($kegiatanKemahasiswaan, 'nama_organisasi[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($kegiatanKemahasiswaan, 'posisi[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($kegiatanKemahasiswaan, 'tahun[]')->textInput()->label(false) ?>
											</td>
											<td>
												<span class="delete icon-trash">
												Hapus 
												</span>
											</td>
											</tr>
										<?php endif ?>

									</tbody>
								</table>
								<div>
									<button type="submit" class="btn btn-primary" style="clear:both;margin-bottom:30px;">Save</button> 
								</div> <!-- /form-actions -->
								 <?php ActiveForm::end(); ?>
								</div>

								<!-- /formcontrols5 -->
								<div class="tab-pane" id="formcontrols5">
								<div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_fasilitasperpanjangan">Tambah</button>
								</div>
								 <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								<table class="table table-bordered" id="table_fasilitasperpanjangan">
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
											<?php if($dataFasilitas != null) :?>
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
												<span class="delete icon-trash">
												Hapus 
												</span>
											</td>
										</tr>
										<?php endforeach;?>
										<?php else :?>
											<tr class="baris">
											<td>
												<?= $form->field($fasilitas, 'nama_barang[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($fasilitas, 'merek[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($fasilitas, 'series[]')->textInput()->label(false) ?>
											</td>
											<td>
												<?= $form->field($fasilitas, 'tahun[]')->textInput()->label(false) ?>
											</td>
											<td>
												<span class="delete icon-trash">
												Hapus 
												</span>
											</td>
										</tr>

										<?php endif ?>
									</tbody>
								</table>
								<div>
									<button type="submit" class="btn btn-primary" style="clear:both;margin-bottom:30px;">Save</button> 
								</div> <!-- /form-actions -->
								 <?php ActiveForm::end(); ?>
								</div>

								<!-- /formcontrols6 -->
								<div class="tab-pane" id="formcontrols6">
								<div class="form-group" style="clear:both;margin-bottom:15px;" >
									<button class="btn btn-success add" href="" table_name="table_biayaperpanjangan">Tambah</button>
								</div>
								 <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>	
										<table class="table table-bordered" id="table_biayaperpanjangan">
											<thead>
												<tr>
													<th>
													Biaya Perbulan
													</th>
													<th>
													Total
													</th>
													<th>
													Aksi
													</th>
												</tr>
											</thead>
											<tbody>
												<?php if($dataBiaya != null) :?>
												<?php
												foreach ($dataBiaya as $value) :
												?>
												<tr class="baris">
													<td>
													<?php $listData=ArrayHelper::map(Biaya::find()->all(),'id','nama_biaya');?>
													<?= $form->field($biayaPerpanjangan, 'biaya_id[]')->dropDownList($listData)->label(false) ?>
													</td>
													<td>
														<?= $form->field($biayaPerpanjangan, 'total[]')->textInput(['value'=>$value->total])->label(false) ?>
													</td>
													<td>
														<span class="delete icon-trash">
														Hapus 
														</span>
													</td>
												</tr>
												<?php endforeach;?>
												<?php else :?>
													<tr class="baris">
													<td>
													<?php $listData=ArrayHelper::map(Biaya::find()->all(),'id','nama_biaya');?>
													<?= $form->field($biayaPerpanjangan, 'biaya_id[]')->dropDownList($listData)->label(false) ?>
													</td>
													<td>
														<?= $form->field($biayaPerpanjangan, 'total[]')->textInput()->label(false) ?>
													</td>
													<td>
														<span class="delete icon-trash">
														Hapus 
														</span>
													</td>
												</tr>
											<?php endif ?>
											</tbody>
										</table>
									<div>
										<button type="submit" class="btn btn-primary" style="clear:both;margin-bottom:30px;">Save</button> 
									</div> <!-- /form-actions -->
								 <?php ActiveForm::end(); ?>
								</div>

								<!-- /formcontrols7 -->
								<div class="tab-pane" id="formcontrols7">
							
								 <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>	
										<table class="table table-bordered" id="table_alasanlayakmenerima">
											<thead>
												<tr>
													<th>
													Alasan Layak Menerima
													</th>
							
													<th>
													Aksi
													</th>
												</tr>
											</thead>
											<tbody>
												<?php if($dataAlasan != null) :?>
												<?php
												foreach ($dataAlasan as $value) :
												?>
												<tr class="baris">
													
													<td>
														<?= $form->field($alasanLayakPerpanjangan, 'alasan[]')->textArea(['value'=>$value->alasan,'col'=>60,'row'=>5])->label(false) ?>
													</td>
													<td>
														<span class="delete icon-trash">
														Hapus 
														</span>
													</td>
												</tr>
												<?php endforeach;?>
												<?php else :?>
													<tr class="baris">
													
													<td>
														<?= $form->field($alasanLayakPerpanjangan, 'alasan[]')->textArea(['col'=>60,'row'=>5,'class'=>'form-control'])->label(false) ?>
													</td>
													<td>
														<span class="delete icon-trash">
														Hapus 
														</span>
													</td>
												</tr>
											<?php endif ?>
											</tbody>
										</table>
									<div>
										<button type="submit" class="btn btn-primary" style="clear:both;margin-bottom:30px;">Save</button> 
									</div> <!-- /form-actions -->
								 <?php ActiveForm::end(); ?>
								</div>

								<!-- /formcontrols8 -->
								<div class="tab-pane" id="formcontrols8">
								 <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data', 'class'=>'form-horizontal']]); ?>
								<table class="table table-bordered">								
									<?php 
									$no=1;
									foreach ($jenisDokumenPerpanjangan as $value) :
									?>
										<tr>
											<td>
											<?php 
											echo $no.'. '.$value['jenis_dokumen'];
											?>											
											</td>
											<td><?= $form->field($dokumenPerpanjangan, 'upload_file['.$value->id.']')->fileInput()->label(false) ?></td>
										</tr>									
									<?php 
									$no++;
									endforeach;
									?>
								</table>
								<div class="login-actions">                                                   
								<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
								</div> 
								 <?php ActiveForm::end(); ?>
								</div>
								
							</div>
						  
						  
						</div>
	
						
					</div> <!-- /widget-content -->
</div> <!-- /span8 -->