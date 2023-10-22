<?php

/* @var $this yii\web\View */
/* @var $model \home\models\Product */

use home\assets\PageAsset;
use ijony\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'] = [
    ['label' => '产品中心', 'url' => Url::to(['product/index'])],
    ['label' => $model->category->name, 'url' => Url::to(['product/index'])],
];

PageAsset::register($this)->init([
    'css' => [
        'css/product-detail.css',
    ],
    'js' => [
        'js/product-detail.js',
    ],
]);
?>

<!-- 详情开始 -->
<div class="detail-box">
    <div class="characteristic-box">
        <div class="characteristic w_c">
            <h1>优势<span>特点</span></h1>
        </div>
        <div class="xian"></div>
        <div class="characteristic2 w_c">
            <div class="l">
                <img src="<?= $model->getPreview() ?>" alt="">
            </div>
            <div class="r">
                <?php $features = explode(',', $model->features); ?>
                <?php foreach($features as $feature){ ?>
                <span><?= $feature ?></span>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="specifications-box">
        <div class="specifications">
            <div class="specifications w_c">
                <h1>规格<span>参数</span></h1>
            </div>
            <div class="xian"></div>

            <div class="table-box">
                <?= $model->specification ?>
            </div>

        </div>
    </div>
</div>
<!-- 详情结束 -->