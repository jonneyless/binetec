<?php

namespace admin\controllers;

use admin\models\News;
use admin\models\search\News as NewsSearch;
use ijony\admin\enums\StatusEnum;
use ijony\helpers\File;
use ijony\helpers\Folder;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * 新闻管理类
 *
 * @property $news
 *
 * @auth_key    news
 * @auth_name   新闻管理
 */
class NewsController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $this->getRules('news'),
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
     * 新闻列表
     *
     * @auth_key    *
     * @auth_parent news
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch([
            'status' => [StatusEnum::STATUS_INACTIVE, StatusEnum::STATUS_ACTIVE],
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 新闻详情
     *
     * @auth_key    news_view
     * @auth_name   新闻详情
     * @auth_parent news
     *
     * @param $id
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * 添加新闻
     *
     * @auth_key    news_create
     * @auth_name   添加新闻
     * @auth_parent news
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();
        $model->status = StatusEnum::STATUS_ACTIVE;

        if ($model->load(Yii::$app->request->post())) {
            $preview = UploadedFile::getInstance($model, 'preview');
            if ($preview) {
                $model->preview = File::newFile($preview->getExtension());
            }

            if ($model->save()) {
                if ($preview) {
                    $preview->saveAs(Folder::getStatic($model->preview));
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * 编辑新闻
     *
     * @auth_key    news_update
     * @auth_name   编辑新闻
     * @auth_parent news
     *
     * @param $id
     *
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $preview = UploadedFile::getInstance($model, 'preview');
            if ($preview) {
                $model->preview = File::newFile($preview->getExtension());
            }

            if ($model->save()) {
                if ($preview) {
                    $preview->saveAs(Folder::getStatic($model->preview));
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 移除新闻
     *
     * @auth_key    news_remove
     * @auth_name   移除新闻
     * @auth_parent news
     *
     * @param $id
     *
     * @return \yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionRemove($id)
    {
        $model = $this->findModel($id);

        $model->status = StatusEnum::STATUS_DELETE;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * 新闻回收站
     *
     * @auth_key    news_recycle
     * @auth_name   新闻回收站
     * @auth_parent news
     *
     * @return string
     */
    public function actionRecycle()
    {
        $searchModel = new NewsSearch([
            'status' => StatusEnum::STATUS_DELETE,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams(), $this->store_id);

        return $this->render('recycle', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 恢复新闻
     *
     * @auth_key    news_recycle
     * @auth_name   新闻回收站
     * @auth_parent news
     *
     * @param $id
     *
     * @return \yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionRestore($id)
    {
        $model = $this->findModel($id);

        $model->status = StatusEnum::STATUS_ACTIVE;
        $model->save();

        return $this->redirect(['recycle']);
    }

    /**
     * 删除新闻
     *
     * @auth_key    news_delete
     * @auth_name   删除新闻
     * @auth_parent news
     *
     * @param $id
     *
     * @return string
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * 获取新闻对象
     *
     * @param $id
     *
     * @return \admin\models\News
     * @throws \yii\web\NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
