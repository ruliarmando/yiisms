<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Tambah User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Users'
?>
<div class="user-create">

    <?= $this->render('_form', [
        'model' => $model,
        'update' => false,
    ]) ?>

</div>
