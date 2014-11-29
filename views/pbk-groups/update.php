<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PbkGroups */

$this->title = 'Update Group: ' . ' ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Buku Telepon', 'url' => ['pbk/index']];
$this->params['breadcrumbs'][] = ['label' => 'Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['headerTitle'] = 'Groups';
?>
<div class="pbk-groups-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
