<?php

namespace home\models;

use ijony\admin\enums\StatusEnum;
use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property string $id 分类 ID
 * @property string $parent_id 父级分类
 * @property string $name 名称
 * @property string $slug 识别字串
 * @property int $child 是否有子级
 * @property string $parent_arr 父级链
 * @property string $child_arr 子级群
 * @property string $sort 排序
 * @property int $status 状态
 *
 * @property Product[] $products
 */
class Category extends \common\models\Category
{

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * @param int $parent_id
     *
     * @return \home\models\Category[]|\yii\db\ActiveRecord[]
     */
    public static function getCatogriesByParentId($parent_id = 0)
    {
        return self::find()->where(['parent_id' => $parent_id])->where(['status' => StatusEnum::STATUS_ACTIVE])->all();
    }
}
