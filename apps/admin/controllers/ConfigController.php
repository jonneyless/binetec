<?php

namespace admin\controllers;

use admin\models\Config;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * 配置管理类
 *
 * @property $config
 *
 * @auth_key    config
 * @auth_name   配置管理
 */
class ConfigController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $this->getRules('config'),
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 配置列表
     *
     * @auth_key    *
     * @auth_parent config
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Config::find(),
            'pagination' => [
                'pageSize' => 999,
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 添加配置
     *
     * @auth_key    *
     * @auth_parent config
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Config();

        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * 更新配置
     *
     * @auth_key    *
     * @auth_parent config
     *
     * @return string|\yii\web\Response
     */
    public function actionUpdate()
    {
        $models = Config::find()->indexBy('key')->all();

        if (Yii::$app->request->getIsPost()) {
            $configs = Yii::$app->request->post('Config', []);
            foreach ($configs as $key => $value) {
                if (!isset($models[$key])) {
                    continue;
                }

                if ($models[$key]->value != $value) {
                    $models[$key]->value = $value;
                    $models[$key]->save();
                }
            }

            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'models' => $models,
        ]);
    }
}
