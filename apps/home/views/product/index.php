<?php

/** @var yii\web\View $this */

use home\assets\PageAsset;
use home\models\Category;

$this->title = '产品中心';

PageAsset::register($this)->init([
    'css' => [
        'css/about.css',
        'css/product.css',
    ],
    'js' => [
        'js/product.js',
    ],
]);
?>

<div class="product-box introduction-box">
    <div class="introduction-top w_c">
        <h1>产品<span>中心</span></h1>
        <h2>PRODUCT <span>CENTER</span></h2>
    </div>
    <div class="xian"></div>

    <?php $categories = Category::getCatogriesByParentId() ?>
    <div class="product w_c">
        <?php foreach($categories as $category){ ?>
            <div class="pro-list">
                <div class="one">
                    <div class="nav">
                        <h1><?= $category->name ?></h1>
                        <h2><?= $category->slug ?></h2>
                        <div class="xian"></div>
                        <img src="/images/next.png" alt="">
                    </div>
                </div>
                <div class="two">
                    <h1><?= $category->name ?></h1>
                    <h2><?= $category->slug ?></h2>
                    <div class="xian"></div>
                    <ul>
                        <?php foreach($category->products as $product){ ?>
                            <li>
                                <a href="<?= $product->getViewUrl() ?>"><?= $product->name ?></a>
                            </li>
                        <?php } ?>
                    </ul>

                    <div class="lt"></div>
                    <div class="rt"></div>
                    <div class="lb"></div>
                    <div class="rb"></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- 产品列表结束 -->