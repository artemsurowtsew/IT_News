<?php
return yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/web.php',
    [
        'id' => 'app-tests',
        'basePath' => dirname(__DIR__),
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=localhost;dbname=test_2',
            ],
            'mailer' => [
                'useFileTransport' => true,
            ],
            'request' => [
                'cookieValidationKey' => 'test',
                'enableCsrfValidation' => false,
            ],
        ],
    ]
);
