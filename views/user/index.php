<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jurusan;
use app\models\Fakultas;
use app\models\Agama;
use app\models\Bank;
use yii\helpers\Url;

?>
<script src="<?php echo $this->theme->baseUrl; ?>/js/jquery.maskMoney.min.js"></script> 
<script src="<?php echo $this->theme->baseUrl; ?>/js/jquery.maskedinput.min.js"></script> 
<script>jQuery(function($){
   $(".penghasilan").maskMoney({thousands:'.', decimal:',', allowZero:true});

   $(".date").mask("99-99-9999",{placeholder:"dd-mm-yyyy"});
});
   </script>


<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Profil</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li><a href="#formcontrols" class="active" data-toggle="tab">Informasi Pribadi</a></li>
						  <li><a href="#formcontrols2"  data-toggle="tab">Informasi Keluarga</a></li>
						  <li><a href="#formcontrols3" data-toggle="tab">Rekening Bank</a></li>
						</ul>
					
						
							<div class="tab-content">
								<!-- /formcontrols-->
								<div class="tab-pane active" id="formcontrols">
								 <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								
							
										
										<div class="control-group">											
											<label class="control-label" for="username">Email</label>
											<div class="controls">
											<?= $form->field($model, 'email')->textInput(['disabled'=>'disabled', 'class'=>'span3'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label">Nama Lengkap</label>
											<div class="controls">
											<?= $form->field($model, 'nama')->textInput(['class'=>'span3'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
						
                      
                                        
                                        <div class="control-group">											
											<label class="control-label">Jenis Kelamin</label>
		
                                            <div class="controls">
                                        
                                            <?= $form->field($model, 'gender')->radioList(['P'=>'Perempuan','L'=>'Laki-laki'])->label(false);?>
                        
                                          </div>	<!-- /controls -->			
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">NIM</label>
											<div class="controls">
												<?= $form->field($model, 'nim')->textInput(['maxlength' => 25,'class'=>'span2'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Fakultas</label>
											<div class="controls">
												<?php $listData=ArrayHelper::map(Fakultas::find()->all(),'id','nama');?>
												<?= $form->field($model, 'fakultas_id')->dropDownList(
												$listData,['prompt'=>'pilih fakultas',
												'onchange'=>'$.get( "'.Yii::$app->urlManager->createUrl('user/filterjurusan?id=').'"+$(this).val(), 
												function( data ) {$( "select#Jurusan" ).html( data );});'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
                                        
                                        <div class="control-group">											
											<label class="control-label">Jurusan</label>
											<div class="controls">
												<?php $listData=ArrayHelper::map(Jurusan::find()->all(),'id','nama');?>
												<?= $form->field($model, 'jurusan_id')->dropDownList(
												$listData,['id'=>'Jurusan'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										 
                                        <div class="control-group">											
											<label class="control-label">Semester</label>
											<div class="controls">
												<?= $form->field($model, 'semester')->textInput(['maxlength' => 2, 'class'=>'span1'])->label(false);?>

											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Tempat Lahir</label>
											<div class="controls">
												<?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Tanggal Lahir</label>
											<div class="controls">
												<?= $form->field($model, 'tanggal_lahir')->textInput(['maxlength' => true, 'class'=>'date'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Alamat Asal</label>
											<div class="controls">
												<?= $form->field($model, 'alamat_asal')->textInput(['maxlength' => true, 'class'=>'span3'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">Alamat Domisili</label>
											<div class="controls">
												<?= $form->field($model, 'alamat_domisili')->textInput(['maxlength' => true, 'class'=>'span3'
												])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label">No HP</label>
											<div class="controls">
												<?= $form->field($model, 'no_hp')->textInput(['maxlength' => 12, 'class'=>'span2'
												])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label">Agama</label>
											<div class="controls">
												<?php $listData=ArrayHelper::map(Agama::find()->all(),'id','nama');?>
												<?= $form->field($model, 'agama_id')->dropDownList(
												$listData,['prompt'=>'pilih agama','class'=>'span2'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

																				
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
										</div> <!-- /form-actions -->
										<span class="pull-right" style="margin-right:850px; margin-top:-64px;">
        								<?= Html::a('Cancel', ['user/index'], ['class' =>'btn btn-danger btn-sm']) ?>
    									</span>
    									

								 <?php ActiveForm::end(); ?>
								</div>
								
								<!-- /formcontrols2 -->
								<div class="tab-pane" id="formcontrols2">
								 <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal'],'action'=>['user/informasikeluarga']]); ?>
										
										<div class="control-group">											
											<label class="control-label">Nama Ayah</label>
											<div class="controls">
												<?= $form->field($model, 'nama_ayah')->textInput(['maxlength' => true, 'class'=>'span3'])->label(false);?>
												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label">Pekerjaan</label>
											<div class="controls">
												<?= $form->field($model, 'pekerjaan_ayah')->textInput(['maxlength' => true, 'class'=>'span3'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										

										<div class="control-group">											
											<label class="control-label">Penghasilan</label>
											<div class="controls">
												<?= $form->field($model, 'penghasilan_ayah')->textInput(['maxlength' => true,'class'=>'penghasilan'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
                                        <div class="control-group">											
											<label class="control-label">Nama Ibu</label>
											<div class="controls">
												<?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true, 'class'=>'span3'])->label(false);?>
												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label">Pekerjaan</label>
											<div class="controls">
												<?= $form->field($model, 'pekerjaan_ibu')->textInput(['maxlength' => true, 'class'=>'span3'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										

										<div class="control-group">											
											<label class="control-label">Penghasilan</label>
											<div class="controls">
												<?= $form->field($model, 'penghasilan_ibu')->textInput(['maxlength' => true, 'class'=>'penghasilan'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
										<div class="control-group">											
											<label class="control-label">Nama Wali</label>
											<div class="controls">
												<?= $form->field($model, 'nama_wali')->textInput(['maxlength' => true, 'class'=>'span3'])->label(false);?>
												
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label">Pekerjaan</label>
											<div class="controls">
												<?= $form->field($model, 'pekerjaan_wali')->textInput(['maxlength' => true, 'class'=>'span3'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										

										<div class="control-group">											
											<label class="control-label">Penghasilan</label>
											<div class="controls">
												<?= $form->field($model, 'penghasilan_wali')->textInput(['maxlength' => true, 'class'=>'penghasilan'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->


										<div class="control-group">											
											<label class="control-label">Jumlah Saudara</label>
											<div class="controls">
												<?= $form->field($model, 'jml_saudara')->textInput(['maxlength' => true, 'class'=>'span1'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
										</div> <!-- /form-actions -->
										<span class="pull-right" style="margin-right:850px; margin-top:-64px;">
        								<?= Html::a('Cancel', ['user/index'], ['class' =>'btn btn-danger btn-sm']) ?>
    									</span>

								 <?php ActiveForm::end(); ?>
								</div>

								<!-- /formcontrols3-->
								<div class="tab-pane " id="formcontrols3">
								 <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]); ?>
								
								
										
										<div class="control-group">											
											<label class="control-label">Bank</label>
											<div class="controls">
											<?php $listData=ArrayHelper::map(Bank::find()->all(),'id','nama_bank');?>
												<?= $form->field($model, 'bank_id')->dropDownList(
												$listData, ['prompt'=>'pilih bank', 'class'=>'span2'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label">Nomor Rekening</label>
											<div class="controls">
												<?= $form->field($model, 'no_rek')->textInput(['maxlength' => 10, 'class'=>'span2'])->label(false);?>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
				
											
										 <br />
										
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">Save</button> 
										</div> <!-- /form-actions -->
										<span class="pull-right" style="margin-right:850px; margin-top:-64px;">
        								<?= Html::a('Cancel', ['user/index'], ['class' =>'btn btn-danger btn-sm']) ?>
    									</span>
								
								 <?php ActiveForm::end(); ?>
								</div>
								
							</div>						  
						  
						</div>
	
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->