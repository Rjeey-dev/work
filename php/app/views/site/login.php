<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerCssFile('/css/login.css');
$this->registerCssFile('/assets/e7976eb/css/bootstrap.css');

?>

<div class="forms">
    <div class="login-form">
        <div class="left-form">
            <div class="logo">
                <a  href="#"> <img class="mango_png" src="/img/logo.png"></a>
                <a  class="mango" href="#">MANGO OFFICE</a>
            </div>
            <p class="text">Добро пожаловать в личный кабинет
                Mango Office.Если вы здесь впервые,
                <a class="create-password" href="#">создате пароль.</a>
            </p>
        </div>
        <div class="right-form">
            <div class="right-form-wrapper">
                <p>Вход в личный кабинет</p>
                <div class="input-login">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'username', ['enableLabel' => false])->textInput(array('placeholder' => 'ЛС,e-mail,телефон или SIP ID', 'class'=>'form-control text-center')); ?>
    <?= $form->field($model, 'password', ['enableLabel' => false])->textInput(array('placeholder' => 'Пароль', 'class'=>'form-control text-center')); ?>
                    <div class="submit-button">
                        <button type="submit" class="button">ВХОД</button>
                        <a href="#" class="pass">Забыли пароль?</a>
                    </div>
    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

