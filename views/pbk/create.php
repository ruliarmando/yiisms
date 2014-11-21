<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pbk */

$this->title = 'Create Pbk';
$this->params['breadcrumbs'][] = ['label' => 'Pbks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pbk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
