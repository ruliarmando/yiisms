<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\helpers\Json;
use app\models\SendSmsForm;
use app\models\Pbk;
use app\models\Inbox;

use yii\helpers\Html;
use app\components\FooInputWidget;
use app\components\SidebarWidget;

class SmsController extends BaseController
{
    public function actionSend()
    {
        $model = new SendSmsForm();
        $model->sendingOptions = SendSmsForm::SEND_OPT_SINGLE;
        $model->timeOptions = SendSmsForm::TIME_OPT_NOW;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->send();
            Yii::$app->session->setFlash('success', 'SMS Telah Dikirim');
            return $this->refresh();
        } else {
            return $this->render('send', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionContactList($q = null)
    {
        $out = [];
        
        if (!is_null($q)) {
            $query = new Query;
            $query->select('ID as id, Name As name')
                ->from('pbk')
                ->where('Name LIKE "%'.$q.'%"');
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out = array_values($data);
        }
        
        echo Json::encode($out);
    }
    
    public function actionNotification()
    {
        $new_msg = Inbox::find()->unread()->asArray()->all();
        
        $result = [];
        
        $result['count'] = count($new_msg);
        $result['items'] = $new_msg;
        
        echo Json::encode($result);
    }
}
