<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pbk */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Buku Telepon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = 'Buku Telepon'
?>
<div class="pbk-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'GroupID',
            'Name:ntext',
            'Number:ntext',
        ],
    ]) ?>

</div>
