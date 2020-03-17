<?php

/* @var $this yii\web\View */

$this->registerCssFile('/basic/web/css/site.css');

?>
<div class="users">

</div>
<div class="content-wrapper">
    <div class="left-panel">
        <div class="numbers">
            <div class="our_numbers">
                <a class="numbers_our-numbers" href="#">Ваши номера</a>
                <p class="numbers_numbers-mango">
                    Номера MANGO OFFICE
                    <?php if ($phoneNumbersCount > 0) { ?>
                        (<?php print $phoneNumbersCount; ?>)
                    <?php } ?>
                </p>
                <?php foreach ($phoneNumbersData as $data) { ?>
                    <p><?php print $data['number'] ?></p>
                <?php } ?>
            </div>
            <div class="buy">
                <a class="buy-button" href="#">Купить</a>
                <div class="buy-wrapper"
                <?php foreach ($phoneNumbersData as $data) { ?>
                    <p>Схема
                        <a href="<?php print \yii\helpers\Url::toRoute(['schema/view', 'id' => $data['schema_id']]); ?>"><?php print $data['schema_name'] ?></a>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="numbers-buy">
        <div class="num-buy">
            <p class="numbers-buy_number_our_operator title">Номера других операторов</p>
            <a class="item" href="#">Звонок с сайта №37</a>
            <a class="item" href="#">123123123123123</a>
            <a class="item" href="#">Mysite.ru(12)</a>
        </div>
        <div class="connect">
            <a class="title" href="#">Подключить</a>
            <div class="con-wrapper">
                <p class="item">Схема <a href="#">Новая схема line15088</a></p>
                <p class="item">Схема <a href="#">По умолчанию</a></p>
                <p class="item">Схема <a href="#">По умолчанию</a></p>
            </div>
        </div>
    </div>
    <div class="widgets-wrapper">
        <div class="widgets-site">
            <p class="widgets-site_sites">Виджеты для сайта
                <?php if ($widgetCount > 0) { ?>
                    (<?php print $widgetCount; ?>)
                <?php } ?>
            </p>
            <?php foreach ($widget as $data) { ?>
                <a><?php print $data['fsbutton_name'] ?></a>
            <?php } ?>
        </div>
        <div class="add">
            <a href="#">Добавить</a>
            <a class="glyphicon glyphicon-home" href="#"></a>
            <a class="glyphicon glyphicon-home" href="#"></a>
            <a class="glyphicon glyphicon-home" href="#"></a>
        </div>
    </div>
</div>
<div class="left-panel">
    <div class="numbers">
        <div class="our_numbers">
            <a class="numbers_our-numbers" href="#">Ваш персонал</a>
            <p class="numbers_numbers-mango">
                Сотрудники
                <?php if ($staffCount > 0) { ?>
                    (<?php print $staffCount; ?>)
                <?php } ?>
            </p>
            <?php foreach ($staff as $user) { ?>
                <a href="<?php print \yii\helpers\Url::toRoute(['profile/view', 'id' => $user['point_member_id']]); ?>">
                    <p><?php print $user['name'] ?></p></a>
            <?php } ?>
        </div>
        <div class="buy">
            <p>внутренний номер</p>
            <div class="buy-wrapper">
                <?php foreach ($staff as $user) { ?>
                    <p><?php print $user['name'] ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="numbers-buy">
        <div class="num-buy">
            <p class="numbers-buy_number_our_operator title">
                Группы
                <?php if ($groupCount > 0) { ?>
                    (<?php print $groupCount; ?>)
                <?php } ?>
            </p>
            <?php foreach ($group as $data) { ?>
                <p><?php print $data['fsname'] ?>
                </p>
            <?php } ?>
        </div>
        <div class="connect">
            <a class="title" href="#">распределение звонков</a>
            <div class="con-wrapper">
                <p><?php echo \Yii::t('app', 'ЦОВ');; ?><p>
                <p><?php echo \Yii::t('app', 'WA'); ?><p>
                <p><?php echo \Yii::t('app', 'Новая группа1'); ?><p>
                <p><?php echo \Yii::t('app', 'ВАТС'); ?><p>
                <p><?php echo \Yii::t('app', 'ЧукГек'); ?><p>
            </div>
        </div>
    </div>
    <div class="numbers-buy">
        <div class="num-buy">
            <p class="numbers-buy_number_our_operator title">Интеграции
                <?php if ($integrationCount > 0) { ?>
                    (<?php print $integrationCount; ?>)
                <?php } ?>
            </p>
            <?php foreach ($integration as $user) { ?>
                <p><?php print $user['fsservice_name'] ?></p>
            <?php } ?>
        </div>
        <div class="connect">
            <a class="title" href="#">Подключить</a>
            <div class="service-wrapper">
                <p class="item">Услуга подключена</p>
                <p class="item">Услуга подключена</p>
                <p class="item">Услуга подключена</p>
                <p class="item">Услуга подключена</p>
                <p class="item">Услуга подключена</p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="footer-wrapper">
    <div class="call_processing">
        <h4>Обработка звонков</h4>
        <a href="#"><p>Номера подключенные к АТС</p></a>
        <a href="#"><p>Голосовое меню и распределение звонков</p></a>
        <a href="#"><p>Настройки ожидания ответа</p></a>
        <a href="#"><p>Переадресация по номеру клиента</p></a>
        <a href="#"><p>Черный и белый списки</p></a>
        <a href="#"><p>Сотрудники и группы</p></a>
    </div>
    <div class="instruments">
        <h4>Инструменты</h4>
        <a class="" href="#"><p>Статистика и мониторинг</p></p></a>
        <a href="#"><p>История вызовов</p></a>
        <a href="#"><p>Запись разговоров</p></a>
        <a href="#"><p>Сообщения и факсы</p></a>
        <a href="#"><p>Заказ звонка</p></a>
        <a href="#"><p>Статический коллтрекинг</p></a>
        <a href="#"><p>Мультиканальный чат</p></a>
        <a href="#"><p>Адресная книга</p></a>
    </div>
    <div class="ats_settings">
        <h4>Настройки АТС</h4>
        <a href="#"><p>Настройка SIP</p></a>
        <a href="#"><p>Аудиофайлы</p></a>
        <a href="#"><p>Безопасность и ограничения</p></a>
        <a href="#"><p>Конференц-связь</p></a>
        <a href="#"><p>Дополнительные настройки</p></a>
        <a href="#"><p>Управления услугами</p></a>
    </div>
</div>

