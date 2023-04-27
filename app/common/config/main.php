<?php

declare(strict_types=1);

use yii\caching\FileCache;
use yii\rbac\DbManager;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => [
        'cache' => [
            'class' => FileCache::class,
        ],
        'authManager' => [
            'class' => DbManager::class,
        ],
    ],
];
