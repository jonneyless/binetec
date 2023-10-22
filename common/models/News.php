<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id 新闻 ID
 * @property string $name 名称
 * @property string|null $slug 识别字串
 * @property string $preview 主图
 * @property string|null $content 内容
 * @property int $created_at 发布时间
 * @property int $updated_at 更新时间
 * @property int $status 状态
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['slug', 'preview'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '新闻 ID',
            'name' => '名称',
            'slug' => '识别字串',
            'preview' => '主图',
            'content' => '内容',
            'created_at' => '发布时间',
            'updated_at' => '更新时间',
            'status' => '状态',
        ];
    }
}
