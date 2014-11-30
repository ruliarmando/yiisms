<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
    
    <?php if (!$update): ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
    <?php endif; ?>

    <?= $form->field($model, 'status')->radioList(User::getStatusOptions()) ?>

    <div class="form-group">
        <?= Html::submitButton($update ? 'Update' : 'Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
