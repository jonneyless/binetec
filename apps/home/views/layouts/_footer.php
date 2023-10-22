<?php

use home\models\Config;
use ijony\helpers\Url;

?>

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
                <dd>地址：<?= Config::getConfig('company_name_cn') ?></dd>
                <dd>电话：<?= Config::getConfig('company_telephone') ?></dd>
                <dd>邮箱：<?= Config::getConfig('company_email') ?></dd>
            </dl>
        </div>
        <div class="c2">
            <dl>
                <dt>网站导航</dt>
                <dd><a href="<?= Url::to(['site/index']) ?>">网站首页</a></dd>
                <dd><a href="<?= Url::to(['site/about']) ?>">关于我们</a></dd>
                <dd><a href="<?= Url::to(['product/index']) ?>">产品中心</a></dd>
                <dd><a href="<?= Url::to(['site/advantage']) ?>">技术优势</a></dd>
                <dd><a href="<?= Url::to(['site/recruit']) ?>">人才招聘</a></dd>
                <dd><a href="<?= Url::to(['news/index']) ?>">新闻中心</a></dd>
                <dd><a href="<?= Url::to(['site/contact']) ?>">联系我们</a></dd>
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