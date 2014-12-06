<?php

namespace app\controllers;

use Yii;
use yii\web\BadRequestHttpException;

use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;


class SiteController extends BaseController
{
    public $layout = 'auth';
    
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
        $this->layout = 'lte'; // set the correct layout
        
        $connection = Yii::$app->db;
        
        $command = $connection->createCommand('SELECT COUNT(*) FROM sentitems');
        $sentitems_count = $command->queryScalar();
        
        $command = $connection->createCommand('SELECT COUNT(*) FROM inbox');
        $inbox_count = $command->queryScalar();
        
        $command = $connection->createCommand('SELECT COUNT(*) FROM pbk');
        $pbk_count = $command->queryScalar();
        
        $command = $connection->createCommand('SELECT COUNT(*) FROM pbk_groups');
        $pbk_groups_count = $command->queryScalar();
        
        return $this->render('index', [
            'sentitems_count' => $sentitems_count,
            'inbox_count' => $inbox_count,
            'pbk_count' => $pbk_count,
            'pbk_groups_count' => $pbk_groups_count,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }
    
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
