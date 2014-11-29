<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sentitems */

$this->title = 'Update Sentitems: ' . ' ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Sentitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'SequencePosition' => $model->SequencePosition]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sentitems-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
