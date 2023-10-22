<?php

namespace home\models;

use common\libs\Utils;
use ijony\admin\enums\StatusEnum;
use ijony\helpers\Image;
use ijony\helpers\Url;
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
class News extends \common\models\News
{

    /**
     * @return News[]|\yii\db\ActiveRecord[]
     */
    public static function getAll()
    {
        return self::find()->where(['status' => StatusEnum::STATUS_ACTIVE])->all();
    }

    /**
     * @return string
     */
    public function getViewUrl()
    {
        return Url::to(['news/view', 'id' => $this->id]);
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

    public function getSummary()
    {
        $content = strip_tags($this->content);

        return Utils::substr($content, 0, 150);
    }
}
