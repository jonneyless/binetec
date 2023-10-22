<?php

/* @var $this yii\web\View */
/* @var $model \home\models\News */

use home\assets\PageAsset;
use ijony\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'] = [
    ['label' => '新闻中心', 'url' => Url::to(['product/index'])],
];

PageAsset::register($this)->init([
    'css' => [
        'css/product-detail.css',
        'css/news-details.css',
    ],
    'js' => [
        'js/product-detail.js',
        'js/news-details.js',
    ],
]);
?>

<!-- 详情开始 -->
<div class="detail-box">
    <div class="characteristic-box">
        <div class="characteristic w_c">
            <h1>新闻<span>详情</span></h1>
        </div>
        <div class="xian"></div>

        <div class="news-details w_c">
            <h1><?= $model->name ?></h1>
            <h2>发布日期：<?= date("Y.m.d", $model->created_at) ?></h2>
            <div><?= $model->content ?></div>
        </div>
    </div>


</div>
<!-- 详情结束 -->