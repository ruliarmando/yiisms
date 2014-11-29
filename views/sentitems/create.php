<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sentitems */

$this->title = 'Create Sentitems';
$this->params['breadcrumbs'][] = ['label' => 'Sentitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sentitems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
