<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Rully Ramanda
 */
class TextCounterAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/text-area-counter/jquery.textareaCounter.plugin.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
