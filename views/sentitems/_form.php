<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sentitems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sentitems-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UpdatedInDB')->textInput() ?>

    <?= $form->field($model, 'InsertIntoDB')->textInput() ?>

    <?= $form->field($model, 'SendingDateTime')->textInput() ?>

    <?= $form->field($model, 'DeliveryDateTime')->textInput() ?>

    <?= $form->field($model, 'Text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'DestinationNumber')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'Coding')->dropDownList([ 'Default_No_Compression' => 'Default No Compression', 'Unicode_No_Compression' => 'Unicode No Compression', '8bit' => '8bit', 'Default_Compression' => 'Default Compression', 'Unicode_Compression' => 'Unicode Compression', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'UDH')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SMSCNumber')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'Class')->textInput() ?>

    <?= $form->field($model, 'TextDecoded')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ID')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'SenderID')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'SequencePosition')->textInput() ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'SendingOK' => 'SendingOK', 'SendingOKNoReport' => 'SendingOKNoReport', 'SendingError' => 'SendingError', 'DeliveryOK' => 'DeliveryOK', 'DeliveryFailed' => 'DeliveryFailed', 'DeliveryPending' => 'DeliveryPending', 'DeliveryUnknown' => 'DeliveryUnknown', 'Error' => 'Error', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'StatusError')->textInput() ?>

    <?= $form->field($model, 'TPMR')->textInput() ?>

    <?= $form->field($model, 'RelativeValidity')->textInput() ?>

    <?= $form->field($model, 'CreatorID')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
