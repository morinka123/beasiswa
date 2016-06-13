<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\StatusTransferPth;
use app\models\Jurusan;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

    public function behaviors() {
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $model = $this->findModel(Yii::$app->user->getId());
        $model->tanggal_lahir = date('d-m-Y', strtotime($model->tanggal_lahir));
        if ($model->load(Yii::$app->request->post())) {
            $model->tanggal_lahir = date('Y-m-d', strtotime($_POST['User']['tanggal_lahir']));
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('index', [
                        'model' => $model,
            ]);
        }
    }

    public function actionFilterjurusan($id) {

        $countPosts = Jurusan::find()
                ->where(['fakultas_id' => $id])
                ->count();

        $posts = Jurusan::find()
                ->where(['fakultas_id' => $id])
                ->orderBy('id DESC')
                ->all();

        if ($countPosts > 0) {
            foreach ($posts as $post) {
                echo "<option value='" . $post->id . "'>" . $post->nama . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }

    public function actionInformasipribadi() {
        $model = $this->findModel(Yii::$app->user->getId());
        if ($model->load(Yii::$app->request->post())) {
            $model->email = $_POST['User']['email'];
            $model->nama = $_POST['User']['nama'];
            $model->gender = $_POST['User']['gender'];
            $model->jurusan_id = $_POST['User']['jurusan_id'];
            $model->fakultas_id = $_POST['User']['fakultas_id'];
            $model->semester = $_POST['User']['semester'];
            $model->tempat_lahir = $_POST['User']['tempat_lahir'];
            $model->alamat_asal = $_POST['User']['alamat_asal'];
            $model->alamat_domisili = $_POST['User']['alamat_domisili'];
            $model->no_hp = $_POST['User']['no_hp'];
            $model->agama_id = $_POST['User']['agama_id'];
            //$model->status_kawin=$_POST['User']['status_kawin'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('index', [
                        'model' => $model,
            ]);
        }
    }

    public function actionInformasikeluarga() {
        //echo Yii::$app->user->getId();
        // exit();
        $model = $this->findModel(Yii::$app->user->getId());

        if ($model->load(Yii::$app->request->post())) {
            $model->nama_ayah = $_POST['User']['nama_ayah'];
            $model->pekerjaan_ayah = $_POST['User']['pekerjaan_ayah'];
            $model->penghasilan_ayah = $_POST['User']['penghasilan_ayah'];
            $model->nama_ibu = $_POST['User']['nama_ibu'];
            $model->pekerjaan_ibu = $_POST['User']['pekerjaan_ibu'];
            $model->penghasilan_ibu = $_POST['User']['penghasilan_ibu'];
            $model->nama_wali = $_POST['User']['nama_wali'];
            $model->pekerjaan_wali = $_POST['User']['pekerjaan_wali'];
            $model->penghasilan_wali = $_POST['User']['penghasilan_wali'];
            $model->jml_saudara = $_POST['User']['jml_saudara'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('index', [
                        'model' => $model,
            ]);
        }
    }

    public function actionRekeningBank() {
        $model = $this->findModel(Yii::$app->user->getId());
        if ($model->load(Yii::$app->request->post())) {
            $model->bank_id = $_POST['User']['bank_id'];
            $model->no_rek = $_POST['User']['no_rek'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('index', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
