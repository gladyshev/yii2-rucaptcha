<?php
$config = [
    'id' => 'yii2-rucaptcha-app',
    'basePath' => '@tests',
    'vendorPath' => '@vendor',
    'components' => [
        'rucaptcha' => [
            'class' => 'gladyshev\yii\rucaptcha\Rucaptcha',
            'apiKey' => getenv('__RUCAPTCHA_KEY__')
        ]
    ],
];

return $config;