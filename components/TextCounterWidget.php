<?php

namespace app\components;

use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use app\assets\TextCounterAsset;

class TextCounterWidget extends InputWidget
{
    public $pluginOptions = [];
    
    public function init()
    {
        parent::init();
        
        TextCounterAsset::register($this->view);
        $id = $this->options['id'];
        $pluginOptions = empty($this->pluginOptions) ? '{}' : Json::encode($this->pluginOptions);
        
        $this->view->registerCss("
            .originalTextareaInfo {
				font-size: 12px;
				color: #000000;
				font-family: Tahoma, sans-serif;
				text-align: right;
			}
			
			.warningTextareaInfo {
				font-size: 12px;
				color: #FF0000;
				font-family: Tahoma, sans-serif;
				text-align: right;
			}");
        $this->view->registerJs("\$(\"#{$id}\").textareaCount({$pluginOptions});", View::POS_END, 'text-area-count');
    }
    
    public function run()
    {
        return Html::activeTextArea($this->model, $this->attribute, $this->options);
    }
}