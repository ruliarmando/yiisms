<?php

namespace app\components;

use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use app\assets\TokenInputAsset;

class TokenInputWidget extends InputWidget
{
	public $url;
    
    public $pluginOptions = [];
    
    public function init()
    {
        parent::init();
        
        TokenInputAsset::register($this->view);
        $id = $this->options['id'];
        $pluginOptions = empty($this->pluginOptions) ? '{}' : Json::encode($this->pluginOptions);
        
        $this->view->registerJs("\$(\"#{$id}\").tokenInput(\"{$this->url}\", {$pluginOptions});", View::POS_END, 'token-input');
    }
    
    public function run()
    {
        return Html::activeTextInput($this->model, $this->attribute, $this->options);
    }
}
