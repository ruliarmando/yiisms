<?php

namespace app\controllers;

use Yii;
use app\models\LoginForm;

class SiteController extends BaseController
{
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
        $connection = Yii::$app->db;
        
        $command = $connection->createCommand('SELECT COUNT(*) FROM outbox');
        $outbox_count = $command->queryScalar();
        
        $command = $connection->createCommand('SELECT COUNT(*) FROM inbox');
        $inbox_count = $command->queryScalar();
        
        $command = $connection->createCommand('SELECT COUNT(*) FROM pbk');
        $pbk_count = $command->queryScalar();
        
        $command = $connection->createCommand('SELECT COUNT(*) FROM pbk_groups');
        $pbk_groups_count = $command->queryScalar();
        
        return $this->render('index', [
            'outbox_count' => $outbox_count,
            'inbox_count' => $inbox_count,
            'pbk_count' => $pbk_count,
            'pbk_groups_count' => $pbk_groups_count,
        ]);
    }

    public function actionLogin()
    {
        $this->layout = 'auth'; // set the correct layout
        
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

        return $this->goHome();
    }
}
