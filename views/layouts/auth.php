<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\LteAsset;

/* @var $this \yii\web\View */
/* @var $content string */

LteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <title><?= Html::encode($this->title) ?></title>
        <?= Html::csrfMetaTags() ?>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php $this->head() ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <?php $this->beginBody() ?>
        
        <?= $content ?>
        
        <?php $this->endBody() ?>      
    </body>
</html>
<?php $this->endPage() ?>