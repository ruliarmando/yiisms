<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Rully Ramanda
 */
class TokenInputAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/token-input/token-input.css',
        'css/token-input/token-input-facebook.css',
    ];
    public $js = [
        'js/token-input/jquery.tokeninput.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
