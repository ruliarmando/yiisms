<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pbk */

$this->title = 'Update Kontak: ' . ' ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Buku Telepon', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['headerTitle'] = 'Buku Telepon'
?>
<div class="pbk-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
