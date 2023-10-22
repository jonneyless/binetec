<?php

namespace admin\models\search;

use ijony\admin\enums\StatusEnum;
use Yii;
use yii\base\Model;
use admin\models\News as NewsModel;
use yii\data\ActiveDataProvider;

/**
 * 新闻搜索模型
 *
 * {@inheritdoc}
 *
 * @property $id
 * @property $name
 * @property $status
 */
class News extends Model
{

    public $id;
    public $category;
    public $name;
    public $status;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category', 'name', 'status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => '分类',
            'name' => '名称',
            'status' => '状态',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     *
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $query = NewsModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }

    /**
     * @return array
     */
    public static function getStatusData()
    {
        return [
            StatusEnum::STATUS_INACTIVE => '禁用',
            StatusEnum::STATUS_ACTIVE => '激活',
        ];
    }
}
