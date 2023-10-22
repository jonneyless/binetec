<?php

namespace home\controllers;

use home\models\News;
use ijony\admin\enums\StatusEnum;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * News controller
 */
class NewsController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->where(['status' => StatusEnum::STATUS_ACTIVE]),
        ]);

        $models = $dataProvider->getModels();
        $pager = $dataProvider->getPagination();

        return $this->render('index', [
            'models' => $models,
            'pager' => $pager,
        ]);
    }

    /**
     * @param int $id
     *
     * @return string
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionView(int $id)
    {
        $model = News::findOne(['status' => StatusEnum::STATUS_ACTIVE, 'id' => $id]);
        if (!$model) {
            throw new BadRequestHttpException('新闻不存在！');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
