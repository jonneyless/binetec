<?php

namespace home\controllers;

use home\models\Product;
use ijony\admin\enums\StatusEnum;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Product controller
 */
class ProductController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @param int $id
     *
     * @return string
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionView(int $id)
    {
        $model = Product::findOne(['status' => StatusEnum::STATUS_ACTIVE, 'id' => $id]);
        if (!$model) {
            throw new BadRequestHttpException('产品不存在！');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
