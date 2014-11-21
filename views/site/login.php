<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'YiiSMS - Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-box" id="login-box">
    <div class="header">Sign In</div>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => [],
        'fieldConfig' => [
            'template' => "{input}{error}",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    
    <div class="body bg-gray">

        <?= $form->field($model, 'username', [
            'inputOptions' => [
                'placeholder' => $model->getAttributeLabel('username')
            ]
        ]) ?>

        <?= $form->field($model, 'password', [
            'inputOptions' => [
                'placeholder' => $model->getAttributeLabel('password')
            ]
        ])->passwordInput() ?>

        <?= $form->field($model, 'rememberMe', [
            'template' => "{input}{error}",
        ])->checkbox() ?>
    
    </div>

    <div class="footer">
        
        <?= Html::submitButton('Login', ['class' => 'btn bg-olive btn-block', 'name' => 'login-button']) ?>
        
        <p><a href="<?= Url::to(['site/forgot']) ?>">I forgot my password</a></p>
        
    </div>

    <?php ActiveForm::end(); ?>
</div>
