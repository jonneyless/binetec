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

<div class="bottom-box footer" id="footer">
    <div class="bottom w_c">
        <div class="l">
            <div class="b-logo-box"><img src="/images/b-logo.png" alt=""></div>
            <div class="contact-icon">
                <img src="/images/wx.png" alt="">
                <img src="/images/weubo.png" alt="">
                <img src="/images/tuite.png" alt="">
            </div>
        </div>
        <div class="c">
            <dl>
                <dt>联系方式</dt>
                <dd>地址：江苏省苏州市相城区南天成路高清传媒大厦</dd>
                <dd>电话：0512-69220109</dd>
                <dd>邮箱：yao.lu@binetgroup.com</dd>
            </dl>
        </div>
        <div class="c2">
            <dl>
                <dt>网站导航</dt>
                <dd><a href="">网站首页</a></dd>
                <dd><a href="">关于我们</a></dd>
                <dd><a href="">产品中心</a></dd>
                <dd><a href="">技术优势</a></dd>
                <dd><a href="">人才招聘</a></dd>
                <dd><a href="">新闻中心</a></dd>
                <dd><a href="">联系我们</a></dd>
            </dl>
        </div>
        <div class="r">
            <img src="/images/code.png" style="width: 130px; height: 130px" alt="">
            <p>扫码关注</p>
        </div>
    </div>

    <div class="beian-box">
        <div class="beian w_c">
            <p>COPYRIGHT◎苏州比耐新能源科技有限公司 版权所有  <a href="https://beian.miit.gov.cn/" target="_blank">苏ICP备2021047365号-1</a></p>
            <p>技术支持：万禾科技</p>
        </div>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
