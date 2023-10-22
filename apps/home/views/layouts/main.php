<?php

/** @var \yii\web\View $this */
/** @var string $content */

use home\assets\AppAsset;
use common\widgets\Alert;
use ijony\helpers\Url;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $this->render('_header'); ?>

<div class="banner"></div>

<!-- 面包屑开始 -->
<div class="crumbs-box">
    <div class="crumbs w_c">
        <div class="l">
            <?php $breadcrumbs = $this->params['breadcrumbs'] ?? []; ?>
            <?php $breadcrumbs[] = ['label' => $this->title] ?>
            <img src="/images/crumbs-icon.png" alt="">
            您的位置：
            <?= Breadcrumbs::widget([
                'links' => $breadcrumbs,
            ]) ?>
        </div>
        <div class="r">
            <?php if (isset($this->params['buttons'])) { ?>
            <ul>
                <?php foreach ($this->params['buttons'] as $button) { ?>
                    <li><?= Html::a($button['label'], $button['url'], $button['options']) ?></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
    </div>
</div>
<!-- 面包屑结束 -->

<?= $content ?>

<?php echo $this->render('_footer'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
