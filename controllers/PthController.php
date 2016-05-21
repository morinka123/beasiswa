<?php


namespace app\controllers;
use Yii;
use app\models\TahunAjaran;
use app\models\Registrasi;

class PthController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$ta = TahunAjaran::find()->all();
    	$registrasi = Registrasi::find()->where(['user_id'=>Yii::$app->user->identity->id])->one(); 
    	if($registrasi->status_pendaftaran == 'Proses') 
    	{
    		return $this->redirect(['site/invalid']);
    	}

        return $this->render('index',['ta'=>$ta]);
    }

}
