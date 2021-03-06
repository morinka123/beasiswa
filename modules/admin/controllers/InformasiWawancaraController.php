<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\InformasiWawancara;
use app\models\Registrasi;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\vendor\PHPMailer\PHPMailerAutoload;
use app\vendor\PHPMailer;

/**
 * InformasiWawancaraController implements the CRUD actions for InformasiWawancara model.
 */
class InformasiWawancaraController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all InformasiWawancara models.
     * @return mixed
     */
    public function actionIndex()
    {
        $sql = "select * from 
            registrasi 
            inner join user on user.id=registrasi.user_id
            where status_pendaftaran like '%Lolos%' and user.level = 'mhs'";
        $registrasi = Registrasi::findBySql($sql)->all();             
        //var_dump($registrasi);exit;
        return $this->render('index', [
            'registrasi'=>$registrasi
        ]);
    }

    public function actionSendemail()
    {
        error_reporting(0);
        set_time_limit(0);
        $sql = "select * from 
            registrasi 
            inner join user on user.id=registrasi.user_id
            where status_pendaftaran like '%Lolos%' and user.level = 'mhs'";
        $model = Registrasi::findBySql($sql)->all();             
        foreach ($model as $value) {
            \Yii::$app->mail->compose()
                     ->setFrom('morinkamorinka32@gmail.com')
                     ->setTo($value['user']['email'])
                     ->setSubject('Pengumuman Wawancara' )
                     ->setTextBody($this->renderPartial('textBody', ['nama'=>$value['user']['nama']]))
                     ->send();
        }   
        return $this->redirect(['index']);
    }

    /**
     * Displays a single InformasiWawancara model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new InformasiWawancara model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InformasiWawancara();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InformasiWawancara model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InformasiWawancara model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InformasiWawancara model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InformasiWawancara the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InformasiWawancara::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
