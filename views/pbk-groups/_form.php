<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PbkGroups */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pbk-groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
