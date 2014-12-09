<?php
use yii\helpers\Html;
use app\components\SettingsHelper;
use yii\helpers\Url;
use yii\web\View;

?>
<?= Html::checkbox('auto_reply_enabled', SettingsHelper::enabled('auto_reply'), ['id' => 'auto_reply_enabled']) ?> <strong>Auto Reply</strong>

<hr />