<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pbk */

$this->title = 'Update Pbk: ' . ' ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Pbks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pbk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
