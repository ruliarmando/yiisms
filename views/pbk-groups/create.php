<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PbkGroups */

$this->title = 'Tambah Group';
$this->params['breadcrumbs'][] = ['label' => 'Buku Telepon', 'url' => ['pbk/index']];
$this->params['breadcrumbs'][] = ['label' => 'Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Groups';
?>
<div class="pbk-groups-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
