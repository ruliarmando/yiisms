<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = 'Reset password';
?>

<div class="form-box" id="password-reset-box">
    <div class="header">Masukkan Password Baru</div>

    <?php $form = ActiveForm::begin([
        'id' => 'reset-password-form',
        'options' => [],
        'fieldConfig' => [
            'template' => "{input}{error}",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    
    <div class="body bg-gray">

        <?= $form->field($model, 'password', [
            'inputOptions' => [
                'placeholder' => $model->getAttributeLabel('password')
            ]
        ])->passwordInput() ?>
    
    </div>

    <div class="footer">
        
        <?= Html::submitButton('Save', ['class' => 'btn bg-olive btn-block', 'name' => 'reset-password-button']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>
</div>