<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id 产品 ID
 * @property int $category_id 分类 ID
 * @property string $name 名称
 * @property string|null $slug 识别字串
 * @property string $preview 主图
 * @property string|null $features 特点
 * @property string|null $specification 规格
 * @property int $status 状态
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['specification'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['slug', 'preview', 'features'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '产品 ID',
            'category_id' => '分类 ID',
            'name' => '名称',
            'slug' => '识别字串',
            'preview' => '主图',
            'features' => '特点',
            'specification' => '规格',
            'status' => '状态',
        ];
    }
}
