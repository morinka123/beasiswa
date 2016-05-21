<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\StatusKegiatanPth;
use app\models\StatusKegiatanPthSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StatuskegiatanController implements the CRUD actions for StatusKegiatanPth model.
 */
class StatuskegiatanController extends Controller
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
     * Lists all StatusKegiatanPth models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $dataProvider = new ActiveDataProvider([
            'query' => StatusKegiatanPth::find(),
        ]);

        $searchModel = new StatusKegiatanPthSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionExportExcel()
    {
        $searchModel = new StatusKegiatanPthSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $OpenTBS = new \hscstudio\export\OpenTBS;
        $template = Yii::getAlias('@app/modules/admin/views/statuskegiatan').'/_export.xlsx';
        $OpenTBS->LoadTemplate($template);
        //$OpenTBS->VarRef['modelName']="Registrasi";
        $data = [];
        $no = 1;
        foreach($dataProvider->getModels() as $statuskegiatanpth){
            $data[] = [

                    'no'=>$no++,
                    'user_id'=>$statuskegiatanpth->user_id,
                    'nama_kegiatan'=>$statuskegiatanpth->nama_kegiatan,
                    'kelompok'=>$statuskegiatanpth->kelompok,
                    'nama_penerima'=>$statuskegiatanpth->nama_penerima,
                    'alamat'=>$statuskegiatanpth->alamat,
                    'tgl_penyaluran'=>$statuskegiatanpth->tgl_penyaluran,
                    'tgl_pengembalian'=>$statuskegiatanpth->tgl_pengembalian,
                    'status_penyaluran'=>$statuskegiatanpth->status_penyaluran,
            ];
        }

        $OpenTBS->MergeBlock('data', $data);
        $OpenTBS->Show(OPENTBS_DOWNLOAD, '_export.xlsx');
        exit;
    }

    /**
     * Displays a single StatusKegiatanPth model.
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
     * Creates a new StatusKegiatanPth model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StatusKegiatanPth();
        $model->user_id=Yii::$app->user->identity->id;
        $model->status_penyaluran='belum';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StatusKegiatanPth model.
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
     * Deletes an existing StatusKegiatanPth model.
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
     * Finds the StatusKegiatanPth model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StatusKegiatanPth the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StatusKegiatanPth::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
