<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Outbox */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outbox-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UpdatedInDB')->textInput() ?>

    <?= $form->field($model, 'InsertIntoDB')->textInput() ?>

    <?= $form->field($model, 'SendingDateTime')->textInput() ?>

    <?= $form->field($model, 'SendBefore')->textInput() ?>

    <?= $form->field($model, 'SendAfter')->textInput() ?>

    <?= $form->field($model, 'Text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'DestinationNumber')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'TextDecoded')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SenderID')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'SendingTimeOut')->textInput() ?>

    <?= $form->field($model, 'CreatorID')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
