<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id 分类 ID
 * @property int $parent_id 父级分类
 * @property string $name 名称
 * @property string|null $slug 识别字串
 * @property int $child 是否有子级
 * @property string $parent_arr 父级链
 * @property string|null $child_arr 子级群
 * @property int $sort 排序
 * @property int $status 状态
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'child', 'sort', 'status'], 'integer'],
            [['name'], 'required'],
            [['child_arr'], 'string'],
            [['name'], 'string', 'max' => 60],
            [['slug', 'parent_arr'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '分类 ID',
            'parent_id' => '父级分类',
            'name' => '名称',
            'slug' => '识别字串',
            'child' => '是否有子级',
            'parent_arr' => '父级链',
            'child_arr' => '子级群',
            'sort' => '排序',
            'status' => '状态',
        ];
    }
}
