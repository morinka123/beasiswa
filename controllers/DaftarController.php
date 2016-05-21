<?php

namespace app\controllers;
use Yii;
use app\models\Registrasi;
use app\models\RiwayatBeasiswaLain;
use app\models\RiwayatPendidikanBaru;
use app\models\Fasilitas;
use app\models\DokumenBaru;
use app\models\RiwayatIpkPerpanjangan;
use app\models\PrestasiAkademikPerpanjangan;
use app\models\KegiatanKemahasiswaanPerpanjangan;
use app\models\BiayaPerpanjangan;
use app\models\JenisDokumen;
use app\models\AlasanLayakPerpanjangan;
use app\models\DokumenPerpanjangan;
use app\models\JenisDokumenPerpanjangan;
use app\models\TahunAjaran;
use yii\web\UploadedFile;
use app\models\StatusPendaftaran;



class DaftarController extends \yii\web\Controller
{   

    public function actionIndex()
    {
    	
        return $this->render('index');
    }

    public function actionBaru()
    {
    	$riwayatPendidikan = new RiwayatPendidikanBaru();
    	$riwayatBeasiswa = new RiwayatBeasiswaLain();
    	$fasilitas 	= new Fasilitas();
    	$dokumenBaru = new DokumenBaru();


        $jenisDokumen = jenisDokumen::find()->all();
        
        $registrasi = Registrasi::findOne(['user_id'=>Yii::$app->user->identity->id]);
        if ($registrasi == NULL){
                $ta = TahunAjaran::findOne(['active'=>'Y']);
                $inputregistrasi = new Registrasi();
                $inputregistrasi->status_beasiswa='B';
                $inputregistrasi->tahun=date('Y');
                $inputregistrasi->ta=$ta->ta;
                $inputregistrasi->semester=$ta->semester;


                $inputregistrasi->user_id=Yii::$app->user->identity->id;
                $inputregistrasi->save(false);
                $registrasi_id = $inputregistrasi->id;  
            } else {
                $registrasi_id = $registrasi->id;
            }
          
        //var_dump($registrasi_id);exit;

        $datariwayatPendidikan=RiwayatPendidikanBaru::find()->where(['registrasi_id'=>$registrasi_id])->all(); 
        
    	//Riwayat Pendidikan
    	if ($riwayatPendidikan->load(Yii::$app->request->post())) {
    		
    	
    	RiwayatPendidikanBaru::deleteAll(['registrasi_id'=>$registrasi_id]);
    	$count_pendidikan = count($riwayatPendidikan->pendidikan_id);
        //echo'<pre>';
        //var_dump(count($riwayatPendidikan->attributes['pendidikan_id']));
        //exit();
    	   for ($i=0;$i<count($riwayatPendidikan->attributes['pendidikan_id']);$i++){
    			//input data riwayat pnddkan
    // 			$inputpendidikan = new RiwayatPendidikanBaru();
    // 			$inputpendidikan->registrasi_id=$registrasi_id;
    // 			$inputpendidikan->pendidikan_id=$riwayatPendidikan->attributes['pendidikan_id'][$i];
    // 			$inputpendidikan->thn_masuk=$riwayatPendidikan->attributes['thn_masuk'][$i];
    // 			$inputpendidikan->thn_lulus=$riwayatPendidikan->attributes['thn_lulus'][$i];
    // 			$inputpendidikan->nama_sekolah=$riwayatPendidikan->attributes['nama_sekolah'][$i];
    // 			$inputpendidikan->nilai=$riwayatPendidikan->attributes['nilai'][$i];
				// $inputpendidikan->save();
                $registrasi_id=$registrasi_id;
                $pendidikan_id=$riwayatPendidikan->attributes['pendidikan_id'][$i];
                $thn_masuk=$riwayatPendidikan->attributes['thn_masuk'][$i];
                $thn_lulus=$riwayatPendidikan->attributes['thn_lulus'][$i];
                $nama_sekolah=$riwayatPendidikan->attributes['nama_sekolah'][$i];
                $nilai=$riwayatPendidikan->attributes['nilai'][$i];
                $sql = "INSERT INTO riwayat_pendidikan_baru (registrasi_id, pendidikan_id, thn_masuk, thn_lulus, nama_sekolah, nilai) VALUES ('$registrasi_id', '$pendidikan_id', '$thn_masuk', '$thn_lulus', '$nama_sekolah', '$nilai')";
                Yii::$app->db->createCommand($sql)->execute();
    		}
        

            // foreach ($riwayatPendidikan as $value) {
            //      $inputpendidikan = new RiwayatPendidikanBaru();
            //      $inputpendidikan->registrasi_id=$registrasi_id;
            //      $inputpendidikan->pendidikan_id=$value->pendidikan_id;
            //      $inputpendidikan->thn_masuk=$value->thn_masuk;
            //      $inputpendidikan->thn_lulus=$value->thn_lulus;
            //      $inputpendidikan->nama_sekolah=$value->nama_sekolah;
            //      $inputpendidikan->nilai=$value->nilai;
            //      $inputpendidikan->save(false);
            // }
           
           //cek status pendaftaran/registrasi
            $cekstatus = Registrasi::findOne(['user_id'=>Yii::$app->user->identity->id]);

            if ($cekstatus == null)
            {
                    $newstatus= new Registrasi();
                    $newstatus->user_id=Yii::$app->user->identity->id;
                    $newstatus->status_pendaftaran='Proses';
                    $newstatus->save(false);
            }
            //$this->redirect(\Yii::$app->urlManager->createUrl("daftar/baru"));
        } 

        $datariwayatBeasiswa=RiwayatBeasiswaLain::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //riwayatBeasiswa
        if ($riwayatBeasiswa->load(Yii::$app->request->post())) {
        
        
        RiwayatBeasiswaLain::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_beasiswa = count($_POST['RiwayatBeasiswaLain']['sumber']);
        for ($i=0;$i<$count_beasiswa;$i++)
            {
                //input data riwayat beasiswa lain
                $inputbeasiswa = new RiwayatBeasiswaLain();
                $inputbeasiswa->registrasi_id=$registrasi_id;
                $inputbeasiswa->sumber=$_POST['RiwayatBeasiswaLain']['sumber'][$i];
                $inputbeasiswa->nominal=$_POST['RiwayatBeasiswaLain']['nominal'][$i];
                $inputbeasiswa->periode=$_POST['RiwayatBeasiswaLain']['periode'][$i];
                $inputbeasiswa->save(false);
            }
        }
        
        $dataFasilitas=Fasilitas::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //Fasilitas 
        if ($fasilitas->load(Yii::$app->request->post())) {
        
        
        Fasilitas::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_fasilitas = count($_POST['Fasilitas']['nama_barang']);
        for ($i=0;$i<$count_fasilitas;$i++)
            {
                //input data fasilitas baru
                $inputfasilitas = new Fasilitas();
                $inputfasilitas->registrasi_id=$registrasi_id;
                $inputfasilitas->nama_barang=$_POST['Fasilitas']['nama_barang'][$i];
                $inputfasilitas->merek=$_POST['Fasilitas']['merek'][$i];
                $inputfasilitas->series=$_POST['Fasilitas']['series'][$i];
                $inputfasilitas->tahun=$_POST['Fasilitas']['tahun'][$i];
                $inputfasilitas->save(false);
            }
        }

       
        if ($dokumenBaru->load(Yii::$app->request->post())) {
        
        
        DokumenBaru::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_dokumen = count($_POST['DokumenBaru']['upload_file']);        
        for ($i=1;$i<=$count_dokumen;$i++)
            {
                //input data fasilitas baru
                $inputdokumen = new DokumenBaru();
                $inputdokumen->registrasi_id=$registrasi_id;
                // $inputdokumen->dokumen_id=$_POST['DokumenBaru']['dokumen_id'][$i];
                // $inputdokumen->nama_dokumen=$_POST['DokumenBaru']['nama_dokumen'][$i];                
                $image = UploadedFile::getInstanceByName("DokumenBaru[upload_file][$i]");

                $nama_file = $registrasi_id.'-'.$i.'.jpg';             
                $inputdokumen->upload_file= $nama_file;
                if($image != NULL){
                        $image->saveAs(dirname(__FILE__).'/../'.'uploads_baru/' . $nama_file); 
                        $inputdokumen->save(false);
                }
                
            }

            $this->redirect(\Yii::$app->urlManager->createUrl("daftar/baru"));

        }
        
    	return $this->render('baru', [
	            'riwayatPendidikan' => $riwayatPendidikan,
	            'riwayatBeasiswa' => $riwayatBeasiswa,
	            'fasilitas' => $fasilitas,
                'dokumenBaru' => $dokumenBaru,
                'datariwayatPendidikan' => $datariwayatPendidikan,
                'datariwayatBeasiswa' => $datariwayatBeasiswa,
                'dataFasilitas'=>$dataFasilitas,
                'jenisDokumen'=> $jenisDokumen,  
        ]);
    }


    public function actionPerpanjangan()
    {
        $riwayatIpk = new RiwayatIpkPerpanjangan();
        $riwayatBeasiswa = new RiwayatBeasiswaLain();
        $prestasiAkademik = new PrestasiAkademikPerpanjangan();
        $kegiatanKemahasiswaan = new KegiatanKemahasiswaanPerpanjangan();
        $fasilitas = new Fasilitas();
        $biayaPerpanjangan = new BiayaPerpanjangan();
        $dokumenPerpanjangan = new DokumenPerpanjangan();
        $alasanLayakPerpanjangan = new AlasanLayakPerpanjangan();

        $jenisDokumenPerpanjangan = JenisDokumenPerpanjangan::find()->all();
        $registrasi = Registrasi::findOne(['user_id'=>Yii::$app->user->identity->id]);
        if ($registrasi == NULL){
                $ta = TahunAjaran::findOne(['active'=>'Y']);
                $inputregistrasi = new Registrasi();
                $inputregistrasi->status_beasiswa='P';
                $inputregistrasi->tahun=date('Y');
                $inputregistrasi->ta=$ta->ta;
                $inputregistrasi->semester=$ta->semester;


                $inputregistrasi->user_id=Yii::$app->user->identity->id;
                $inputregistrasi->save(false);
                $registrasi_id = $inputregistrasi->id;  
            } else {
                    $registrasi_id = $registrasi->id;
            }

          
        //db yang nilainya akan ditampilkan pada view
        $datariwayatIpk=RiwayatIpkPerpanjangan::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //Riwayat IPK
        if ($riwayatIpk->load(Yii::$app->request->post())) {
            
        
        RiwayatIpkPerpanjangan::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_ipk = count($_POST['RiwayatIpkPerpanjangan']['ip_2']);
        for ($i=0;$i<$count_ipk;$i++)
            {
                //input data riwayat IPK perpanjangan
                $inputipk = new RiwayatIpkPerpanjangan();
                $inputipk->registrasi_id=$registrasi_id;
                $inputipk->ip_1=$_POST['RiwayatIpkPerpanjangan']['ip_1'][$i];
                $inputipk->ip_2=$_POST['RiwayatIpkPerpanjangan']['ip_2'][$i];
                $inputipk->ipk_saat_ini=$_POST['RiwayatIpkPerpanjangan']['ipk_saat_ini'][$i];
                $inputipk->save(false);
            }

        }

        $datariwayatBeasiswa=RiwayatBeasiswaLain::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //Riwayat Beasiswa Lain
        if ($riwayatBeasiswa->load(Yii::$app->request->post())) {
        
        RiwayatBeasiswaLain::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_beasiswa = count($_POST['RiwayatBeasiswaLain']['sumber']);
        for ($i=0;$i<$count_beasiswa;$i++)
            {
                //input data riwayat beasiswa lain
                $inputbeasiswa = new RiwayatBeasiswaLain();
                $inputbeasiswa->registrasi_id=$registrasi_id;
                $inputbeasiswa->sumber=$_POST['RiwayatBeasiswaLain']['sumber'][$i];
                $inputbeasiswa->nominal=$_POST['RiwayatBeasiswaLain']['nominal'][$i];
                $inputbeasiswa->periode=$_POST['RiwayatBeasiswaLain']['periode'][$i];
                $inputbeasiswa->save(false);
            }
        } 
        

        $dataprestasiAkademik=PrestasiAkademikPerpanjangan::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //Prestasi Akademik
        if ($prestasiAkademik->load(Yii::$app->request->post())) {
            
        
        PrestasiAkademikPerpanjangan::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_prestasi = count($_POST['PrestasiAkademikPerpanjangan']['juara']);
        for ($i=0;$i<$count_prestasi;$i++)
            {
                //input prestasi akademik
                $inputprestasi = new PrestasiAkademikPerpanjangan();
                $inputprestasi->registrasi_id=$registrasi_id;
                $inputprestasi->juara=$_POST['PrestasiAkademikPerpanjangan']['juara'][$i];
                $inputprestasi->kompetisi=$_POST['PrestasiAkademikPerpanjangan']['kompetisi'][$i];
                $inputprestasi->lingkup=$_POST['PrestasiAkademikPerpanjangan']['lingkup'][$i];
                $inputprestasi->tahun=$_POST['PrestasiAkademikPerpanjangan']['tahun'][$i];
                $inputprestasi->save(false);
            }
        } 

        $datakegiatanKemahasiswaan=KegiatanKemahasiswaanPerpanjangan::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //Kegiatan Kemahasiswaan
        if ($kegiatanKemahasiswaan->load(Yii::$app->request->post())) {
           
        KegiatanKemahasiswaanPerpanjangan::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_kegiatan = count($_POST['KegiatanKemahasiswaanPerpanjangan']['nama_organisasi']);
        for ($i=0;$i<$count_kegiatan;$i++)
            {
                //input kegiatan kemahasiswaan
                $inputkegiatan = new KegiatanKemahasiswaanPerpanjangan();
                $inputkegiatan->registrasi_id=$registrasi_id;
                $inputkegiatan->nama_organisasi=$_POST['KegiatanKemahasiswaanPerpanjangan']['nama_organisasi'][$i];
                $inputkegiatan->posisi=$_POST['KegiatanKemahasiswaanPerpanjangan']['posisi'][$i];
                $inputkegiatan->tahun=$_POST['KegiatanKemahasiswaanPerpanjangan']['tahun'][$i];
                $inputkegiatan->save(false);
            }
        } 

        $dataFasilitas=Fasilitas::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //fasilitas
        if ($fasilitas->load(Yii::$app->request->post())) {
            
        Fasilitas::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_fasilitas = count($_POST['Fasilitas']['nama_barang']);
        for ($i=0;$i<$count_fasilitas;$i++)
            {
                //input data fasilitas baru
                $inputfasilitas = new Fasilitas();
                $inputfasilitas->registrasi_id=$registrasi_id;
                $inputfasilitas->nama_barang=$_POST['Fasilitas']['nama_barang'][$i];
                $inputfasilitas->merek=$_POST['Fasilitas']['merek'][$i];
                $inputfasilitas->series=$_POST['Fasilitas']['series'][$i];
                $inputfasilitas->tahun=$_POST['Fasilitas']['tahun'][$i];
                $inputfasilitas->save(false);
            }
        } 

         $dataBiaya=BiayaPerpanjangan::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //Biaya Perpanjangan
         if ($biayaPerpanjangan->load(Yii::$app->request->post())) {
        
        BiayaPerpanjangan::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_biaya = count($biayaPerpanjangan->biaya_id);
        for ($i=0;$i<$count_biaya;$i++){
                //input data biaya perpanjangan
                $inputbiaya = new BiayaPerpanjangan();
                $inputbiaya->registrasi_id=$registrasi_id;
                $inputbiaya->biaya_id=$_POST['BiayaPerpanjangan']['biaya_id'][$i];
                $inputbiaya->total=$_POST['BiayaPerpanjangan']['total'][$i];
                $inputbiaya->save(false);
            }
        }

        $dataAlasan=AlasanLayakPerpanjangan::find()->where(['registrasi_id'=>$registrasi_id])->all();
        //Biaya Perpanjangan
         if ($alasanLayakPerpanjangan->load(Yii::$app->request->post())) {
        
        AlasanLayakPerpanjangan::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_alasan = count($alasanLayakPerpanjangan->alasan);
        for ($i=0;$i<$count_alasan;$i++){
                //input data biaya perpanjangan
                $inputalasan = new AlasanLayakPerpanjangan();
                $inputalasan->registrasi_id=$registrasi_id;
                $inputalasan->alasan=$_POST['AlasanLayakPerpanjangan']['alasan'][$i];
                $inputalasan->save(false);
            }
        }

        if ($dokumenPerpanjangan->load(Yii::$app->request->post())) {
        
        
        DokumenPerpanjangan::deleteAll(['registrasi_id'=>$registrasi_id]);
        $count_dokumen = count($_POST['DokumenPerpanjangan']['upload_file']);        
        for ($i=1;$i<=$count_dokumen;$i++)
            {
                //input data fasilitas baru
                $inputdokumen = new DokumenPerpanjangan();
                $inputdokumen->registrasi_id=$registrasi_id;
                // $inputdokumen->dokumen_id=$_POST['DokumenBaru']['dokumen_id'][$i];
                // $inputdokumen->nama_dokumen=$_POST['DokumenBaru']['nama_dokumen'][$i];                
                $image = UploadedFile::getInstanceByName("DokumenPerpanjangan[upload_file][$i]");

                $nama_file = $registrasi_id.'-'.$i.'.jpg';             
                $inputdokumen->upload_file= $nama_file;
                if($image != NULL){
                        $image->saveAs(dirname(__FILE__).'/../'.'uploads_perpanjangan/' . $nama_file); 
                        $inputdokumen->save(false);
                }
                
            }

            $this->redirect(\Yii::$app->urlManager->createUrl("daftar/perpanjangan"));

        }

        
        return $this->render('perpanjangan', [
                    'riwayatIpk' => $riwayatIpk,
                    'riwayatBeasiswa' => $riwayatBeasiswa,
                    'prestasiAkademik' => $prestasiAkademik,
                    'kegiatanKemahasiswaan' => $kegiatanKemahasiswaan,
                    'fasilitas' => $fasilitas,
                    'biayaPerpanjangan' => $biayaPerpanjangan,
                    'dokumenPerpanjangan' => $dokumenPerpanjangan,                    
                    'datariwayatIpk' => $datariwayatIpk,
                    'datariwayatBeasiswa' => $datariwayatBeasiswa,
                    'dataprestasiAkademik' => $dataprestasiAkademik,
                    'datakegiatanKemahasiswaan' => $datakegiatanKemahasiswaan,
                    'dataFasilitas' => $dataFasilitas,
                    'dataBiaya' => $dataBiaya,
                    'jenisDokumenPerpanjangan' => $jenisDokumenPerpanjangan,
                    'alasanLayakPerpanjangan' => $alasanLayakPerpanjangan,
                    'dataAlasan' => $dataAlasan,   
            ]);
    }
}


