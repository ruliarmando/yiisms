<?php

namespace app\controllers;

use Yii;
use app\components\SettingsHelper;

class SettingsController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionUpdateSpam($type)
    {
        if (Yii::$app->request->isPost) {
            if (SettingsHelper::updateSpamList($type, Yii::$app->request->post('update_spam_'.$type))) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }
    
    public function actionUpdateSettings($name)
    {
        if (Yii::$app->request->isPost) {
            if (SettingsHelper::changeSettings($name, Yii::$app->request->post('value'))) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }
}
