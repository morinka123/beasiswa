<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Registrasi;
use app\models\RegistrasiSearch;
use app\models\RiwayatPendidikanBaru;
use app\models\Fasilitas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistrasiController implements the CRUD actions for Registrasi model.
 */
class RegistrasiController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Registrasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Registrasi::find()->where(['status_pendaftaran'=>'Lolos Tahap I']),
        ]);

        $searchModel = new RegistrasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Registrasi model.
     * @param integer $id
     * @return mixed
     */

    public function actionExportExcel()
    {
        $searchModel = new RegistrasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $OpenTBS = new \hscstudio\export\OpenTBS;
        $template = Yii::getAlias('@app/modules/admin/views/registrasi').'/_export.xlsx';
        $OpenTBS->LoadTemplate($template);
        //$OpenTBS->VarRef['modelName']="Registrasi";
        $data = [];
        $no = 1;
        foreach($dataProvider->getModels() as $registrasi){
            $data[] = [

                    'no'=>$no++,
                    'user_id'=>$registrasi['user']['nama'],
                    'status_beasiswa'=>$registrasi->status_beasiswa,
                    'tahun'=>$registrasi->tahun,
                    'ta'=>$registrasi->ta,
                    'semester'=>$registrasi->semester,
                    'status_pendaftaran'=>$registrasi->status_pendaftaran,
            ];
        }

        $OpenTBS->MergeBlock('data', $data);
        $OpenTBS->Show(OPENTBS_DOWNLOAD, '_export.xlsx');
        exit;
    }
    public function actionView($id)
    {

        $riwayatpendidikan = RiwayatPendidikanBaru::find()->where(['registrasi_id'=>$id])->all();
        $fasilitas = Fasilitas::find()->where(['registrasi_id'=>$id])->all();
     
        //var_dump($riwayatpendidikan);exit;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'riwayatpendidikan'=>$riwayatpendidikan,
            'fasilitas'=>$fasilitas


        ]);
    }

    /**
     * Creates a new Registrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Registrasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Registrasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Registrasi model.
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
     * Finds the Registrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Registrasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Registrasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
