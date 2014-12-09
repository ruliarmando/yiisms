<?php
use yii\helpers\Html;
use app\components\SettingsHelper;
use yii\helpers\Url;
use yii\web\View;

?>
<?= Html::checkbox('scheduling_enabled', SettingsHelper::enabled('scheduling'), ['id' => 'scheduling_enabled']) ?> <strong>Message Scheduling</strong>

<hr />