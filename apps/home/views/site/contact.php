<?php

/** @var yii\web\View $this */

use home\assets\PageAsset;
use home\models\Config;

$this->title = '联系我们';

PageAsset::register($this)->init([
    'css' => [
        'css/product-detail.css',
        'css/contact.css',
    ],
    'js' => [
        'js/product-detail.js',
        'js/contact.js',
        'js/lang.js',
        'js/cms.js',
    ],
]);
?>

<!-- 联系我们开始 -->
<div class="detail-box">
    <div class="characteristic-box">
        <div class="characteristic w_c">
            <h1>联系<span>方式</span></h1>
        </div>
        <div class="xian"></div>
    </div>

    <div class="contact-box w_c">
        <div class="l">
            <h1><?= Config::getConfig('company_name_cn') ?></h1>
            <h2><?= Config::getConfig('company_name_en') ?></h2>
            <div class="adress-box">
                <ul>
                    <li>
                        <img src="/images/daohang-icon.png" alt="">
                        <p>地址：<?= Config::getConfig('company_address') ?></p>
                    </li>
                    <li>
                        <img src="/images/tel-icon.png" alt="">
                        <p>电话：<?= Config::getConfig('company_telephone') ?></p>
                    </li>
                    <li>
                        <img src="/images/email-icon.png" alt="">
                        <p>邮箱：<?= Config::getConfig('company_email') ?></p>
                    </li>
                    <li>
                        <img src="/images/diqiu-icon.png" alt="">
                        <p>网址：<?= Config::getConfig('company_website') ?></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="r">
            <div id="map"></div>
        </div>
    </div>

    <div class="characteristic-box">
        <div class="characteristic w_c">
            <h1>发送<span>邮件</span></h1>
        </div>
        <div class="xian"></div>
    </div>

    <div class="message w_c">
        <form action="/index.php?s=form&c=zxly&m=post&is_show_msg=1" method="post" name="myform" id="myform">
            <input type="text" placeholder="您的姓名" name="data[xingming]">
            <input type="text" placeholder="联系方式" name="data[dianhua]">
            <input type="text" placeholder="您的邮箱" name="data[youxiang]">
            <input type="text" placeholder="公司名称" name="data[gongsi]">
            <textarea id="" cols="30" rows="10" placeholder="如您有其他需求，请在此处留下您的问题" name="data[liuyanxinxi]"></textarea>
            <button type="button" onclick="dr_ajax_submit('/index.php?s=form&c=zxly&m=post', 'myform', '2000', 'http://www.binetec.net/index.php?c=category&id=11')">发送信息</button>
        </form>
    </div>
</div>
<!-- 联系我们结束 -->