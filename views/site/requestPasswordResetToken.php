<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\PasswordResetRequestForm */

$this->title = 'Request password reset';
?>

<div class="form-box" id="password-reset-box">
    <div class="header">Reset Password</div>

    <?php $form = ActiveForm::begin([
        'id' => 'request-password-reset-form',
        'options' => [],
        'fieldConfig' => [
            'template' => "{input}{error}",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    
    <div class="body bg-gray">

        <?= $form->field($model, 'email', [
            'inputOptions' => [
                'placeholder' => $model->getAttributeLabel('email')
            ]
        ]) ?>
    
    </div>

    <div class="footer">
        
        <?= Html::submitButton('Submit', ['class' => 'btn bg-olive btn-block', 'name' => 'reset-password-button']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>
</div>
