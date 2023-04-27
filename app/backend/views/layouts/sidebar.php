<?php

use hail812\adminlte\widgets\Menu;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light"><?= Yii::$app->params['siteName'];?></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <?php
            // todo Сделать роли.
            echo Menu::widget([
                'items' => [
                    [
                        'label' => 'Главная страница',
                        'url'=>['/'],
                        'icon' => 'tachometer-alt',
                    ],
                    [
                        'label' => 'Заказы',
                        'url' => ['order/index'],
                        'icon' => 'tachometer-alt',
                        'visible' => Yii::$app->user->can('order/index')
                    ],
                    [
                        'label' => 'Типы заказа',
                        'url' => ['order-type/index'],
                        'icon' => 'tachometer-alt',
                        'visible' => Yii::$app->user->can('order-type/index')
                    ],
                    [
                        'label' => 'Клиент',
                        'url' => ['client/index'],
                        'icon' => 'tachometer-alt',
                        'visible' => Yii::$app->user->can('client/index')
                    ],
                    [
                        'label' => 'Пользователи',
                        'url' => ['user/index'],
                        'icon' => 'tachometer-alt',
                        'visible' => Yii::$app->user->can('user/index')
                    ],
                    ['label' => 'Админка', 'header' => true, 'visible' => Yii::$app->user->can('Developer')],
                    [
                        'label' => 'gii',
                        'url' => ['/gii'],
                        'icon' => 'tachometer-alt',
                        'visible' => Yii::$app->user->can('Developer')
                    ],
                    ['label' => 'Профиль', 'header' => true],
                    [
                        'label' => 'Login',
                        'url' => ['site/login'],
                        'icon' => 'sign-in-alt',
                        'visible' => Yii::$app->user->isGuest
                    ],
                    [
                        'label' => 'Logout',
                        'url' => ['site/logout'],
                        'icon' => 'sign-in-alt',
                        'visible' => !Yii::$app->user->isGuest
                    ],
                ],
                    // todo вывести данные пользователя

                ]);
            ?>
        </nav>
    </div>
</aside>