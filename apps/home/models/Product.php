<?php

namespace home\models;

use ijony\helpers\Image;
use ijony\helpers\Url;
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
 *
 * @property Category $category
 */
class Product extends \common\models\Product
{

    /**
     * 商品分类信息
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * 获取主图
     *
     * @param int $width
     * @param int $height
     *
     * @return mixed
     */
    public function getPreview(int $width = 0, int $height = 0)
    {
        return Image::getImg($this->preview, $width, $height);
    }

    /**
     * @return string
     */
    public function getViewUrl()
    {
        return Url::to(['product/view', 'id' => $this->id]);
    }
}
