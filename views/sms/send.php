<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

use kartik\widgets\DateTimePicker;
use kartik\widgets\TimePicker;

use yii\bootstrap\Alert;

use app\components\TokenInputWidget;
use app\components\TextCounterWidget;
use app\models\SendSmsForm;

/* @var $this yii\web\View */

$this->title = 'Kirim Pesan';
$this->params['breadcrumbs'][] = 'Kirim SMS';
$this->params['headerTitle'] = 'Kirim SMS';

$sendingOptionsName = Html::getInputName($model, 'sendingOptions');
$timeOptionsName = Html::getInputName($model, 'timeOptions');

$sendingOptionsJs = <<< SCRIPT
\$("[name='{$sendingOptionsName}']").change(function (evt) {
    var val = \$(this).val();
    
    if (val == "1") {
        \$("#number-group-single").show();
        \$("#number-group-pbk").hide();
        \$("#number-group-group").hide();
        \$("#sendsmsForm-number-single").removeAttr('disabled');
        \$("#sendsmsForm-number-pbk").attr('disabled', 'disabled');
        \$("#sendsmsForm-number-group").attr('disabled', 'disabled');
    } else if (val == "2") {
        \$("#number-group-single").hide();
        \$("#number-group-pbk").show();
        \$("#number-group-group").hide();
        \$("#sendsmsForm-number-single").attr('disabled', 'disabled');
        \$("#sendsmsForm-number-pbk").removeAttr('disabled');
        \$("#sendsmsForm-number-group").attr('disabled', 'disabled');
    } else {
        \$("#number-group-single").hide();
        \$("#number-group-pbk").hide();
        \$("#number-group-group").show();
        \$("#sendsmsForm-number-single").attr('disabled', 'disabled');
        \$("#sendsmsForm-number-pbk").attr('disabled', 'disabled');
        \$("#sendsmsForm-number-group").removeAttr('disabled');
    }
});
SCRIPT;
$timeOptionsJs = <<< SCRIPT
\$("[name='{$timeOptionsName}']").change(function (evt) {
    var val = \$(this).val();
    
    if (val == 0) {
        \$(".field-sendsmsform-sendingdatetime").hide();
        \$(".field-sendsmsform-sendingtime").hide();
        
    } else if (val == 10) {
        \$(".field-sendsmsform-sendingdatetime").show();
        \$(".field-sendsmsform-sendingtime").hide();
    } else {
        \$(".field-sendsmsform-sendingdatetime").hide();
        \$(".field-sendsmsform-sendingtime").show();
    }
});
SCRIPT;
$this->registerJs($sendingOptionsJs, View::POS_END, 'sending-options-js');
$this->registerJs($timeOptionsJs, View::POS_END, 'time-options-js');
?>

<div class="sms-form">
    
    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <?= Alert::widget([
        'options' => [
            'class' => 'alert-info'
        ],
        'body' => Yii::$app->session->getFlash('success')
    ]) ?>
    <?php endif; ?>
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'sendingOptions')->radioList($model->getSendingOptions(), [
        'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        'validateOnChange' => false
    ]) ?>
    
    <?php if ($model->sendingOptions == SendSmsForm::SEND_OPT_MULTI) $display = 'block'; else $display = 'none'; ?>
    <?= $form->field($model, 'number', ['options' => 
        ['style' => "display:{$display};", 'id' => 'number-group-pbk']])->widget(TokenInputWidget::className(), [
        'url' => Url::to(['contact-list']),
        'options' => ['id' => 'sendsmsForm-number-pbk', 'disabled' => 'disabled'],
        'pluginOptions' => [
            'theme' => 'facebook',
            'minChars' => 3,
            'hintText' => 'Ketikkan Nama Kontak',
            'noResultsText' => 'Tidak Ditemukan',
            'searchingText' => 'Mencari...',
            'preventDuplicates' => true
        ]
    ]) ?>
    
    <?php if ($model->sendingOptions == SendSmsForm::SEND_OPT_GROUP) $display = 'block'; else $display = 'none'; ?>
    <?= $form->field($model, 'number', ['options' => [
        'style' => "display:{$display};", 'id' => 'number-group-group']])->dropDownList(
        $model->getGroupOptions(),
        ['id' => 'sendsmsForm-number-group']
    ) ?>
    
    <?php if ($model->sendingOptions == SendSmsForm::SEND_OPT_SINGLE) $display = 'block'; else $display = 'none'; ?>
    <?= $form->field($model, 'number', ['options' => ['id' => 'number-group-single', 'style' => "display:{$display};"]])->textInput([
        'id' => 'sendsmsForm-number-single',
    ]) ?>
    
    <?= $form->field($model, 'timeOptions')->radioList($model->getTimeOptions(), [
        'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
        'validateOnChange' => false
    ]) ?>
    
    <?php if ($model->timeOptions == SendSmsForm::TIME_OPT_DATETIME) $display = 'block'; else $display = 'none' ?>
    <?= $form->field($model, 'sendingDateTime', ['options' => ['style' => "display:{$display};"]])->widget(DateTimePicker::classname(), [
        'removeButton' => false,
        'options' => [
            'placeholder' => 'Masukkan Tanggal dan Jam Pengiriman',
        ],
        'pluginOptions' => [
            'autoClose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ]
    ]) ?>
    
    <?php if ($model->timeOptions == SendSmsForm::TIME_OPT_DELAY) $display = 'block'; else $display = 'none' ?>
    <?= $form->field($model, 'sendingTime', ['options' => ['style' => "display:{$display};"]])->widget(TimePicker::className(), [
        'pluginOptions' => [
            'showMeridian' => false,
            'defaultTime' => '00:00',
        ]
    ]) ?>
    
    <?= $form->field($model, 'text')->widget(TextCounterWidget::className(), [
        'options' => ['rows' => 5, 'class' => 'form-control'],
        'pluginOptions' => [
            'maxCharacterSize' => 153,
            'originalStyle' => 'originalTextareaInfo',
            'warningStyle' => 'warningTextareaInfo',
            'warningNumber' => 40,
            'displayFormat' => '#left Karakter Tersisa'
        ]
    ]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
</div>