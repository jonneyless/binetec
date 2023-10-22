<?php

namespace home\models;

use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property string $key 配置Key
 * @property string $value 配置值
 * @property string $description 描述
 */
class Config extends \common\models\Config
{

    private static $configs;

    /**
     * @param $key
     * @return mixed|string
     */
    public static function getConfig($key)
    {
        if (self::$configs === null) {
            self::$configs = Config::find()->select(['value'])->indexBy('key')->column();
        }

        return self::$configs[$key] ?? '';
    }
}
