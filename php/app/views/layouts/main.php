<?php


/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header id="header">
    <div class="container-fluid">
        <div class="header-wrapper">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/site/index"><img class="mango_png" src="/img/logo.png"></a>
                <a class="navbar-brand" href="/site/index">MANGO_OFFICE</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><p class="ls"><a href="#">8-800-5555-424</a></p></li>
                    <li><p class="ls">ЛС: <a href="#">MINSK</a></p></li>
                    <li><p class="ls">Баланс: <a href="#">7 061.99 rub</a></p></li>
                    <li><a href="#"><button class="replenish">Пополнить</button></a></li>
                    <li><a class="glyphicon glyphicon-comment" href="/site/login"></a></li>
                    <li><a href="#">Поддержка</a></li>
                    <li><a class="glyphicon glyphicon-book" href="/site/login"></a></li>
                    <li class="logout"><?php
                        echo Nav::widget([
                            'options' => ['class'],
                            'items' => [
                                Yii::$app->user->isGuest ? (
                                ['label' => 'Login', 'url' => ['/site/login']]
                                ) : (
                                    '<li>'
                                    . Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                        ['class' => ' logout']
                                    )
                                    . Html::endForm()
                                    . '</li>'
                                )
                            ],
                        ]);
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="main-menu-wrapper">
    <ul>
        <li>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Виртуальная АТС №1
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Обзорная панель</a></li>
                    <li><a href="#">Статистика и мониторинг</a></li>
                    <li><a href="#">История вызовов</a></li>
                    <li><a href="#">Запись разговоров</a></li>
                    <li><a href="#">Сообщение и факсы</a></li>
                    <li><a href="#">Заказ звонка</a></li>
                    <li><a href="#">Статический коллтрекинг</a></li>
                    <li><a href="#">Мультиканальный чат</a></li>
                    <li><a href="#">Адресная книга</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="" href="#">Контакт-центр</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="" href="#">Коллтрекинг</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="" href="#">Интеграции</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="" href="#">Аналитика</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a  class="" href="#">Речевая аналитика</a></li>
                    <li role="separator" class="divider"></li>
                    <li ><a class="" href="#">Wallboard</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="drop-site">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span></span>Главная
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a class="" href="#">Контакт-центр</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Коллтрекинг</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Интеграции</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class=""href="#">Аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a  class="" href="#">Речевая аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li ><a class="" href="#">Wallboard</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Обработка звонков
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a class="" href="#">Контакт-центр</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Коллтрекинг</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Интеграции</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class=""href="#">Аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a  class="" href="#">Речевая аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li ><a class="" href="#">Wallboard</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Сотрудники
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a class="" href="#">Контакт-центр</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Коллтрекинг</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Интеграции</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class=""href="#">Аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a  class=e" href="#">Речевая аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li ><a class="" href="#">Wallboard</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Общие настройки
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a class="" href="#">Контакт-центр</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Коллтрекинг</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Интеграции</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class=""href="#">Аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a  class="" href="#">Речевая аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li ><a class="" href="#">Wallboard</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Финансы
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a class="" href="#">Контакт-центр</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Коллтрекинг</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="" href="#">Интеграции</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class=""href="#">Аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a  class="" href="#">Речевая аналитика</a></li>
                        <li role="separator" class="divider"></li>
                        <li ><a class="" href="#">Wallboard</a></li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <div class="help-info">
        <span>Версия:</span>
        <a href="#">СВОБОДНЫЙ</a>
        <div class="tarif"></div>
        <span>Тариф на связь:</span>
        <a href="#">ПАКЕТ 2500</a>
    </div>
</div>
</div>
<div class="container">
    <div class="content">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


