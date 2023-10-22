<?php

use ijony\admin\widgets\Formatter;
use common\libs\Utils;
use yii\web\Response;

$params = array_merge(
    require __DIR__ . '/../../../common/config/params.php',
    require __DIR__ . '/../../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'binetc-admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'admin\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-admin',
        ],
        'response' => [
            'class' => Response::class,
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if (in_array($response->format, [Response::FORMAT_JSON, Response::FORMAT_XML, Response::FORMAT_JSONP])) {
                    if ($response->format == Response::FORMAT_XML) {
                        $response->format = Response::FORMAT_JSON;
                    }

                    $response->data = Utils::parseResponseData($response);
                }
            },
        ],
        'user' => [
            'identityClass' => 'admin\models\admin',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-admin', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'binetc-admin',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/jonneyless/yii2-admin-asset/views',
                ],
            ],
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'formatter' => [
            'class' => Formatter::class,
            'defaultTimeZone' => 'Asia/Shanghai',
            'dateFormat' => 'yyyy-MM-dd',
            'timeFormat' => 'HH:mm:ss',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'currencyCode' => 'cny',
        ],
    ],
    'params' => $params,
];
