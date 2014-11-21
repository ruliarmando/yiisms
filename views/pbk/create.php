<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pbk */

$this->title = 'Tambah Kontak';
$this->params['breadcrumbs'][] = ['label' => 'Buku Telepon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Buku Telepon'
?>
<div class="pbk-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
