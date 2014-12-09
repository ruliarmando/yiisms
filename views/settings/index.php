<?php
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
$this->title = 'Setelan Sistem';
$this->params['breadcrumbs'][] = $this->title;
$this->params['headerTitle'] = $this->title;

?>

<div class="nav-tabs-custom">
<?= Tabs::widget([
    'id' => 'settings-tabs',
    'items' => [
        [
            'label' => 'Spam List',
            'content' => $this->render('_spam'),
            'active' => true
        ],
        [
            'label' => 'Auto Reply Message',
            'content' => $this->render('_auto_reply'),
        ],
        [
            'label' => 'Message Scheduling',
            'content' => $this->render('_schedule'),
        ],
        [
            'label' => 'Balance Check',
            'content' => $this->render('_balance'),
        ],
    ]
]) ?>
</div>