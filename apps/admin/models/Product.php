<?php

namespace admin\models;

use ijony\admin\enums\StatusEnum;
use ijony\helpers\File;
use ijony\helpers\Image;
use common\libs\Utils;
use Yii;

/**
 * This is the model class for table "{{%product}}".
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
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if (!$this->slug) {
            $this->slug = Utils::genSlug($this->name);
        }

        $data = Image::recoverImg($this->specification);
        $this->specification = $data['content'];

        if ($this->preview && substr($this->preview, 0, 6) == BUFFER_FOLDER) {
            $oldImg = $this->preview;
            $newImg = Image::copyImg($this->preview);

            if ($newImg) {
                File::delFile($oldImg, true);
            }

            $this->preview = $newImg;
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if (isset($changedAttributes['preview']) && $changedAttributes['preview']) {
            File::delFile($changedAttributes['preview'], true);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function afterDelete()
    {
        parent::afterDelete();

        File::delFile($this->preview, true);
    }

    /**
     * 分类下拉表单数据
     * @return array
     */
    public function getCategorySelectData()
    {
        return Category::find()->select('name')->where(['status' => StatusEnum::STATUS_ACTIVE])->indexBy('category_id')->column();
    }

    /**
     * 获取主图
     *
     * @param int $width
     * @param int $height
     *
     * @return mixed
     */
    public function getPreview($width = 0, $height = 0)
    {
        return Image::getImg($this->preview, $width, $height);
    }

    /**
     * 输出所属分类名称
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category ? $this->category->name : '';
    }
}
