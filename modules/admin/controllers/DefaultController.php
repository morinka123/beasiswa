<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\AdmLoginForm;

class DefaultController extends Controller {

    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        } else {
            return $this->render('index');
        }
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AdmLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['index']);
        }
        return $this->renderPartial('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->redirect(['login']);
    }

}
