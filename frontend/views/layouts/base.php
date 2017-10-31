<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top green luck',
        ],
    ]); ?>
    <?php echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right luck green'],
        'items' => [
            ['label' => Yii::t('frontend', 'Game'), 'url' => ['/game/index']],
            ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
            ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
            [
                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                'visible'=>!Yii::$app->user->isGuest,
                'items'=>[
                    [
                        'label' => Yii::t('frontend', 'Settings'),
                        'url' => ['/user/default/index']
                    ],
                    [
                        'label' => Yii::t('frontend', 'Backend'),
                        'url' => Yii::getAlias('@backendUrl'),
                        'visible'=>Yii::$app->user->can('manager')
                    ],
                    [
                        'label' => Yii::t('frontend', 'Logout'),
                        'url' => ['/user/sign-in/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ]
                ]
            ],
            [
                'label'=>Yii::t('frontend', 'Language'),
                'items'=>array_map(function ($code) {
                    return [
                        'label' => Yii::$app->params['availableLocales'][$code],
                        'url' => ['/site/set-locale', 'locale'=>$code],
                        'active' => Yii::$app->language === $code
                    ];
                }, array_keys(Yii::$app->params['availableLocales']))
            ]
        ]
    ]); ?>
    <?php NavBar::end(); ?>

    <?php echo $content ?>

</div>
<div class="info-us">
    <div class="info-social">

    </div>
    <div class="info-menu">
        <?= Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
                ['label' => Yii::t('frontend', 'Terms of Use'), 'url' => ['/site/term']],
                ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
                ['label' => Yii::t('frontend', 'Privacy Policy'), 'url' => ['/site/privacy']],
            ]
        ]); ?>

    </div>
    <div class="info-content">
        <h3>Chán là chơi</h3>
        Poki is a web platform with more than 30 million users from all over the world. On it you’ll find thousands of hand-selected online games that you can play on your mobile, tablet or desktop.We work closely with game developers to bring you the very latest free online games. For our younger fans we’ve created Poki Kids. It’s our mission to become the ultimate online playground where players and game developers come together to play and create. Let’s play!
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ChánLàChơi <?php echo date('Y') ?></p>
        <?= Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
                ['label' => Yii::t('frontend', 'About'), 'url' => ['/site/about']],
                ['label' => Yii::t('frontend', 'Blog'), 'url' => ['/blog/index']],
            ]
        ]); ?>
    </div>
</footer>
<?php $this->endContent() ?>