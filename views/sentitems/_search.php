<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SentitemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sentitems-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UpdatedInDB') ?>

    <?= $form->field($model, 'InsertIntoDB') ?>

    <?= $form->field($model, 'SendingDateTime') ?>

    <?= $form->field($model, 'DeliveryDateTime') ?>

    <?= $form->field($model, 'Text') ?>

    <?php // echo $form->field($model, 'DestinationNumber') ?>

    <?php // echo $form->field($model, 'Coding') ?>

    <?php // echo $form->field($model, 'UDH') ?>

    <?php // echo $form->field($model, 'SMSCNumber') ?>

    <?php // echo $form->field($model, 'Class') ?>

    <?php // echo $form->field($model, 'TextDecoded') ?>

    <?php // echo $form->field($model, 'ID') ?>

    <?php // echo $form->field($model, 'SenderID') ?>

    <?php // echo $form->field($model, 'SequencePosition') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'StatusError') ?>

    <?php // echo $form->field($model, 'TPMR') ?>

    <?php // echo $form->field($model, 'RelativeValidity') ?>

    <?php // echo $form->field($model, 'CreatorID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
