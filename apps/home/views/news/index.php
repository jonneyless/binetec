<?php

use home\assets\PageAsset;
use home\models\News;

/** @var yii\web\View $this */
/** @var News[] $models */
/** @var yii\data\Pagination $pager */

$this->title = '新闻资讯';

PageAsset::register($this)->init([
    'css' => [
        'css/about.css',
        'css/news.css',
    ],
    'js' => [
        'js/news.js',
    ],
]);
?>

<!-- 新闻列表开始 -->
<div class="introduction-box news-box">
    <div class="introduction-top w_c">
        <h1>新闻<span>资讯</span></h1>
        <h2>NEWS<span>INFORMATION</span></h2>
    </div>
    <div class="xian"></div>

    <ul class="w_c">
        <?php foreach($models as $model){ ?>
            <li>
                <a href="<?= $model->getViewUrl() ?>">
                    <div class="l">
                        <img src="<?= $model->getPreview(500) ?>" style="width: 550px;" alt="">
                    </div>
                    <div class="c">
                        <div class="date">
                            <p><?= date('d', $model->created_at) ?></p>
                            <span><?= date('Y.m', $model->created_at) ?></span>
                        </div>

                    </div>
                    <div class="r">
                        <h1><?= $model->name ?></h1>
                        <p><?= $model->getSummary() ?></p>
                        <div class="more"><span>查看详情</span></div>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="page_box">
    </div>

</div>
<!-- 新闻列表结束 -->