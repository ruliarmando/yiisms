<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\components\SidebarWidget;
use app\assets\LteAsset;

/* @var $this \yii\web\View */
/* @var $content string */

LteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <title>Yii SMS - <?= Html::encode($this->title) ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body class="skin-blue">
        <?php $this->beginBody() ?>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Yii SMS
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?= Yii::$app->user->identity->username; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?= Url::to('@web/img/avatar5.png') ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?= Yii::$app->user->identity->username ?>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= Url::to(['site/logout']) ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= Url::to('@web/img/avatar5.png') ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?= Yii::$app->user->identity->username ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?= SidebarWidget::widget([
                        'items' => [
                            ['label' => 'Dashboard', 'url' => ['site/index'], 'icon' => 'fa fa-dashboard'],
                            ['label' => 'Kirim SMS', 'url' => ['sms/send'], 'icon' => 'fa fa-pencil'],
                            ['label' => 'SMS', 'url' => '#', 'options' => ['class' =>'treeview'], 'icon' => 'fa fa-envelope', 'submenu' => true,
                            'items' => [
                                ['label' => 'Kotak Masuk', 'url' => ['inbox/index'], 'icon' => 'fa fa-angle-double-right'],
                                ['label' => 'Kotak Keluar', 'url' => ['outbox/index'], 'icon' => 'fa fa-angle-double-right'],
                                ['label' => 'Pesan Terkirim', 'url' => ['sent-items/index'], 'icon' => 'fa fa-angle-double-right'],
                            ]],
                            ['label' => 'Buku Telepon', 'url' => ['pbk/index'], 'icon' => 'fa fa-book'],
                            ['label' => 'User', 'url' => ['user/index'], 'icon' => 'fa fa-users'],
                            ['label' => 'Setelan', 'url' => ['setting/index'], 'icon' => 'fa fa-gears']
                        ]
                    ]); ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo isset($this->params['headerTitle']) ? $this->params['headerTitle'] : 'Dashboard'; ?>
                    </h1>
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $content ?>
                        </div>
                    </div>
                    <?php if (isset($this->blocks['x_content'])) { echo $this->blocks['x_content']; } ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>