<?php

namespace app\controllers;

class SmsController extends \app\controllers\BaseController
{
    public function actionSend()
    {
        return $this->render('send');
    }

}
