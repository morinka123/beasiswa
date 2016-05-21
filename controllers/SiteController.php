<?php

namespace app\controllers;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;
use app\models\Registrasi;
use app\vendor\PHPMailer\PHPMailerAutoload;
use app\vendor\PHPMailer;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
    
        if (!\Yii::$app->user->isGuest) {
             $this->redirect(\Yii::$app->urlManager->createUrl("user/index"));
        } else
        $this->redirect(\Yii::$app->urlManager->createUrl("site/login"));
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $Session = Yii::$app->session;
            $Session->open();
        
            $registrasi = Registrasi::findOne(['user_id'=>Yii::$app->user->identity->id]);
            if (count ($registrasi) == 0 or count ($registrasi) == 1  ){
                $status_beasiswa = 0;
            }
            else{

                $status_beasiswa = 1;
            }
            $Session->set('status_beasiswa',$status_beasiswa);

            return $this->goBack();
        }
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }


    public function actionRegister()
    {
        $model = new User();
           
        if (Yii::$app->request->post()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            if ($_POST['User']['password'] == $_POST['User']['confirm_password']){

                $model->email=($_POST['User']['email']);
                $model->password=md5($_POST['User']['password']);
                $model->code_verifikasi=md5(uniqid(rand()));
               
            if($model->save()){

                \Yii::$app->mail->compose()
                     ->setFrom('morinkamorinka32@gmail.com')
                     ->setTo($model->email)
                     ->setSubject('Aktivasi Pendaftaran Beasiswa R-ZIS' )
                     ->setTextBody('http://localhost/beasiswa/web/site/verifikasi?code='.$model->code_verifikasi)
                     ->send();
              $this->redirect(\Yii::$app->urlManager->createUrl("site/login"));
            }

            }  
        }
        return $this->renderPartial('register',[
            'model' => $model,
        ]);

    }

    public function actionVerifikasi($code)
    {
        $sql = "update user set is_verif = 1 where code_verifikasi = '$code'"; 
        Yii::$app->db->createCommand($sql)->execute();
        //$this->redirect(\Yii::$app->urlManager->createUrl("site/login"));

        return $this->renderPartial('verifikasi');

    }

    public function actionInvalid()
    {    

        return $this->render('invalid');

    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
