<?php


namespace app\modules\admin\controllers;
use app\models\TahunAjaran;

class PthController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$ta = TahunAjaran::find()->all();
        return $this->render('index',['ta'=>$ta]);

    }

}
