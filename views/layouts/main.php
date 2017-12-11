<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
use app\models\Categories;
use yii\widgets\ActiveForm;

AppAsset::register($this);

$categories = Categories::find()->orderBy(['created_at' => SORT_DESC])->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- ****** Top Header Area Start ****** -->
<div class="top_header_area">
    <div class="container">
        <div class="row">
            <div class="col-5 col-sm-6">
                <!--  Top Social bar start -->
                <div class="top_social_bar">
                    <?= Yii::$app->user->isGuest ? Html::a('Вход', ['/site/login']) : Html::a(Yii::$app->user->identity->name.' '.Yii::$app->user->identity->surname, ['/post/my-posts']).' '.Html::a('Выход', ['/site/logout'], ['data' => ['method' => 'post']]) ?>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                </div>
            </div>
            <!--  Login Register Area -->
            <div class="col-7 col-sm-6">
                <div class="signup-search-area d-flex align-items-center justify-content-end">
<!--                    <div class="login_register_area d-flex">-->
<!--                        <div class="login">-->
<!--                            <a href="123">Sing in</a>-->
<!--                        </div>-->
<!--                        <div class="register">-->
<!--                            <a href="123">Sing up</a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- Search Button Area -->
                    <div class="search_button">
                        <a class="searchBtn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <!-- Search Form -->
                    <div class="search-hidden-form">
                        <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ], 'method' => 'get', 'action' => ['/site/index']]); ?>
                            <input type="search" name="PostSearch[search]" id="search-anything" placeholder="Поиск новостей...">
                            <input type="submit" value="" class="d-none">
                            <span class="searchBtn"><i class="fa fa-times" aria-hidden="true"></i></span>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Top Header Area End ****** -->
<?= Alert::widget() ?>
<!-- ****** Header Area Start ****** -->
<header class="header_area">
    <div class="container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-12">
                <div class="logo_area text-center">
                    <a href="<?= Url::to(['/site/index']) ?>" class="yummy-logo">IT News</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                    <!-- Menu Area Start -->
                    <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                        <ul class="navbar-nav" id="yummy-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to(['/site/index']) ?>">Главная <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="yummyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                                <?php if($categories): ?>
                                    <div class="dropdown-menu" aria-labelledby="yummyDropdown">
                                        <?php foreach($categories as $category): ?>
                                            <a class="dropdown-item" href="<?= Url::to(['/site/index', 'PostSearch[category]' => $category->id]) ?>"><?= $category->title ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="dropdown-menu" aria-labelledby="yummyDropdown">
                                        <a class="dropdown-item" href="#">Нету категорий</a>
                                    </div>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to(['/site/about']) ?>">О нас</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= Url::to(['/site/contact']) ?>">Контакты</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ****** Header Area End ****** -->

<?= $content ?>

<!-- ****** Footer Menu Area Start ****** -->
<footer class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Copywrite Text -->
                <div class="copy_right_text text-center">
                    <p>Copyright @<?= date('Y') ?> All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
