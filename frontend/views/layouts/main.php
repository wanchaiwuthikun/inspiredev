<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Inspiredev',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-material-teal navbar-fixed-top',


                ],
            ]);
            $menuItems = [
            ['label' => ' <span class = "mdi-av-videocam " > </span>', 'url' => ['/site/lesson']],
            ['label' => ' <span class = "mdi-av-my-library-books "> </span>', 'url' => ['/site/articles']],
            ['label' => ' <span class = "mdi-communication-forum ">  </span>', 'url' => ['/site/forum']],
            ['label' => ' <span class = "mdi-communication-call ">  </span>', 'url' => ['/site/contact']],
            ];

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'encodeLabels' => false,
                'items' => $menuItems,

            ]);



            $menuItems = [];
            if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => '<form class="navbar-form navbar-right"><input type="text" class="form-control col-lg-8" placeholder="Search" ></form>'];
                //$menuItems[] = ['label' =>'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];

            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $menuItems,


            ]);

            echo' <form class="navbar-form navbar-right">
                         <input type="text" class="form-control col-lg-8" placeholder="Search">
                  </form> ';

            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; inspiredev <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
