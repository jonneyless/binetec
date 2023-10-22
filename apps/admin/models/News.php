<?php

namespace admin\models;

use common\libs\Utils;
use ijony\admin\enums\StatusEnum;
use ijony\helpers\File;
use ijony\helpers\Image;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%news}}".
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
class News extends \common\models\News
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['status', 'default', 'value' => StatusEnum::STATUS_ACTIVE],
            ['status', 'in', 'range' => StatusEnum::getValues('status')],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if (!$this->slug) {
            $this->slug = Utils::genSlug($this->name);
        }

        $data = Image::recoverImg($this->content);
        $this->content = $data['content'];

        if ($this->preview && substr($this->preview, 0, 6) == BUFFER_FOLDER) {
            $oldImg = $this->preview;
            $newImg = Image::copyImg($this->preview);

            if ($newImg) {
                File::delFile($oldImg, true);
            }

            $this->preview = $newImg;
        }

        if ($insert && !$this->preview && $data['imgs']) {
            $this->preview = current($data['imgs']);
        }

        return parent::beforeSave($insert);
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
}
