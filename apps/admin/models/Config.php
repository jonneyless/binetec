<?php

namespace admin\models;

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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'value', 'description'], 'required'],
            [['key', 'value', 'description'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'key' => '配置Key',
            'value' => '配置值',
            'description' => '描述',
        ];
    }
}
