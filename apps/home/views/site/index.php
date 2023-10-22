<?php

/** @var yii\web\View $this */

use home\assets\PageAsset;
use home\models\News;
use ijony\helpers\Url;

$this->title = '首页';

PageAsset::register($this)->init([
    'css' => [
        'css/fullPage.css',
    ],
    'js' => [
        'js/fullPage.js',
    ],
]);
?>
    <div id="dowebok">
        <div class="section">
            <?php echo $this->render('/layouts/_header'); ?>

            <!-- 轮播图开始 -->
            <div class="h-swiper">
                <div class="swiper1">
                    <div class="swiper-container swiper1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide swiper_item1">
                                <video src="http://www.binetec.net/uploadfile/202202/9b9c27578ec99da.mp4" controls="controls" poster="http://www.binetec.net/uploadfile/202202/88ab6d6c173e119.jpg" width="100%"></video>
                            </div>


                            <div class="swiper-slide swiper_item1">
                                <a href=""><img src="http://bimaich.nj.wh66.net/uploadfile/202112/2bfc464bd00a3f.png" alt=""></a>
                            </div>
                        </div>
                        <!-- 如果需要分页器 -->
                        <div class="swiper-pagination pagination1"></div>
                    </div>
                </div>
            </div>
            <!-- 轮播图结束 -->
        </div>


        <div class="section">
            <div class="division">
                <img src="/images/division-img.png" alt="">
            </div>

            <!-- 关于我们开始 -->
            <div class="h-about-box">
                <div class="about-l">
                    <div class="t">
                        <p>ABOUT BINET </p></br>
                        <span>关于我们</span>
                    </div>

                    <div class="more">
                        <a href="<?= Url::to(['site/about']) ?>">了解更多</a>
                    </div>
                </div>
                <div class="about-r">
                    <div class="l">
                        <div class="title">
                            <h1>Binet（Suzhou）Energy Technology Co., Ltd.</h1>
                            <h2>苏州比耐新能源科技有限公司</h2>
                        </div>
                        <div class="jj">
                            比耐科技成立于2016年，专注于“动力电池”的生产制造、电源系统集成和商业模式创新应用 的高科技企业。独有的圆柱形“拔插式”软连接技术、全极耳大圆柱电芯技术和内圆外方的芯圆电池技术，从根本解决电源储能系统的安全问题，并最大有效的发挥电池全生命周期的价值，真正实现了电池回收、梯次利用的可行性。现在贵阳、郑州、苏州三地建设了电芯生产、系统集成、和运营服务三个基地...                    </div>
                        <div class="type">
                            <ul>
                                <li>
                                    <a href="<?= Url::to(['site/about']) ?>">
                                        <img src="/images/jianjie-icon.png" alt="">
                                        <p>公司简介</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= Url::to(['site/about']) ?>">
                                        <img src="/images/fazhan-icon.png" alt="">
                                        <p class="h-about-active">发展历程</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= Url::to(['site/about']) ?>">
                                        <img src="/images/rongyu-icon.png" alt="">
                                        <p>公司荣誉</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="r">
                        <img src="/images/h-about-img.png" alt="">
                    </div>
                </div>
            </div>
            <!-- 关于我们结束 -->
        </div>

        <div class="section">
            <div class="division">
                <img src="/images/division-img.png" alt="">
            </div>

            <!-- 产品中心开始 -->
            <div class="h-about-box">
                <div class="about-l">
                    <div class="t">
                        <p>PRODUCT CENTER </p></br>
                        <span>产品中心</span>
                    </div>

                    <div class="more">
                        <a href="<?= Url::to(['product/index']) ?>">了解更多</a>
                    </div>
                </div>
                <div class="about-r">
                    <div class="dh sfq">
                        <ul>
                            <li class="curr">
                                <a href="<?= Url::to(['product/index']) ?>"><img src="http://bimaich.nj.wh66.net/uploadfile/202112/d075c22bfd23174.png" alt=""></a>
                                <div class="layer">
                                    <p class="p1"><b class="col1">车船系统</b></p>
                                    <p class="p2"><b class="col2">车船系统</b></p>
                                </div>
                            </li>
                            <li class="curr">
                                <a href="<?= Url::to(['product/index']) ?>"><img src="http://bimaich.nj.wh66.net/uploadfile/202112/44dac75ecd41ebb.png" alt=""></a>
                                <div class="layer">
                                    <p class="p1"><b class="col1">储能系统</b></p>
                                    <p class="p2"><b class="col2">储能系统</b></p>
                                </div>
                            </li>
                            <li class="curr">
                                <a href="<?= Url::to(['product/index']) ?>4"><img src="http://bimaich.nj.wh66.net/uploadfile/202112/c4807afaa182656.png" alt=""></a>
                                <div class="layer">
                                    <p class="p1"><b class="col1">仓储系统</b></p>
                                    <p class="p2"><b class="col2">仓储系统</b></p>
                                </div>
                            </li>
                            <li class="curr">
                                <a href="<?= Url::to(['product/index']) ?>"><img src="http://bimaich.nj.wh66.net/uploadfile/202112/bf2c8ce734cc759.png" alt=""></a>
                                <div class="layer">
                                    <p class="p1"><b class="col1">其他系统</b></p>
                                    <p class="p2"><b class="col2">其他系统</b></p>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <!-- 产品中心结束 -->
        </div>

        <div class="section">
            <div class="division">
                <img src="/images/division-img.png" alt="">
            </div>

            <!-- 技术优势开始 -->
            <div class="h-about-box">
                <div class="about-l">
                    <div class="t">
                        <p>ADVANTAGE</p></br>
                        <span>技术优势</span>
                    </div>

                    <div class="more">
                        <a href="<?= Url::to(['site/advantage']) ?>">了解更多</a>
                    </div>
                </div>
                <div class="about-r jishu-bj">
                    <div class="one">
                        <a href="<?= Url::to(['site/advantage']) ?>">
                            <div class="wai">
                                <h1>梯次利用</h1>
                                <span> ECHELON UTILIZATION</span>
                            </div>
                            <div class="nei">
                                <h1>梯次利用</h1>
                                <div class="p-box">
                                    <p>模块配置灵活</p>
                                    <p>梯次组合，适用场景广泛</p>
                                    <p>回收残值＞20%</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="one">
                        <a href="<?= Url::to(['site/advantage']) ?>">
                            <div class="wai">
                                <h1>插拔式组合</h1>
                                <span>PLUG IN COMBINATION</span>
                            </div>
                            <div class="nei">
                                <h1>插拔式组合</h1>
                                <div class="p-box">
                                    <p>简化作业流程，生产效率高</p>
                                    <p>易组装，易维护</p>
                                    <p>圆柱电池梯次利用最佳解决方案</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="one">
                        <a href="<?= Url::to(['site/advantage']) ?>">
                            <div class="wai">
                                <h1>软连接设计</h1>
                                <span>SOFT CONNECTION DESIGN</span>
                            </div>
                            <div class="nei">
                                <h1>软连接设计</h1>
                                <div class="p-box">
                                    <p>柔性接触式连接</p>
                                    <p>应力释放</p>
                                    <p>抗震动性更强</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="one">
                        <a href="<?= Url::to(['site/advantage']) ?>">
                            <div class="wai">
                                <h1>晶格（混合）串并联</h1>
                                <span>LATTICE (HYBRID) SERIES PARALLEL</span>
                            </div>
                            <div class="nei">
                                <h1>晶格（混合）串并联</h1>
                                <div class="p-box">
                                    <p>串并联同时进行</p>
                                    <p>每颗电池既是串联节点，又是并联节点</p>
                                    <p>电流场、温度场均匀</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <!-- 技术优势结束 -->
        </div>

        <div class="section" id="nextS">
            <div class="division">
                <img src="/images/division-img.png" alt="">
            </div>

            <!-- 新闻中心开始 -->
            <div class="h-about-box">
                <div class="about-l">
                    <div class="t">
                        <p>NEWS CENTER </p></br>
                        <span>新闻中心</span>
                    </div>

                    <div class="more">
                        <a href="<?= Url::to(['news/index']) ?>">了解更多</a>
                    </div>
                </div>
                <div class="about-r h-news">
                    <ul>
                        <?php /** @var News[] $models */ ?>
                        <?php $models = News::find()->orderBy(['id' => SORT_DESC])->limit(4)->all(); ?>
                        <?php foreach($models as $index => $model){ ?>
                            <li>
                                <a href="<?= $model->getViewUrl() ?>">
                                    <h1><?= sprintf('%02d', $index + 1) ?></h1>
                                    <span><?= date('Y-m-d', $model->created_at) ?></span>
                                    <h2><?= $model->name ?></h2>
                                    <div class="h-news-imgbox">
                                        <img src="<?= $model->getPreview() ?>" style="height: 135px" alt="">
                                    </div>
                                    <p><?= $model->getSummary() ?></p>
                                    <div class="icon">
                                        <img src="/images/huijian.png" alt="">
                                        <img src="/images/lanjian.png" alt="">
                                    </div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- 新闻中心结束 -->
        </div>

        <div class="section footerss">
            <?php echo $this->render('/layouts/_footer'); ?>
        </div>
    </div>

<?php
$css = <<<CSS
.dh ul li:nth-of-type(1) a img {
    margin-top: 50px;
}

.h-about-box .about-r .l .jj {
    line-height: 30px;
    letter-spacing: 1px;
    color: #666666;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 6;
    overflow: hidden;
}

.swiper_item1 video {
    min-width: 100%;
    min-height: 90%;
}

.play-box {
    position: relative;
}

.play {
    position: absolute;
    top: 50%;
    left: 40%;
    width: auto !important;
    height: 300px;
    transform: translateX(-50%);
    transform: translateY(-50%);
}


@media (max-width: 768px) {
    .jishu-bj .one a h1 {
        font-size: 22px;
    }
    
    .jishu-bj .one a .nei .p-box {
        margin-top: 40px;
    }
    
    .jishu-bj .one a .nei .p-box p {
        font-size: 12px;
    }
    
    .h-news ul li a h1 {
        display: none;
    }
    
    .h-news ul li a span {
        margin-top: 0;
    }
    
    .jishu-bj {
        background-size: cover;
        background-position: center;
    }
    
    .dh ul {
        overflow: inherit;
    }
    .dh ul li {
        width: 100%;
        margin-bottom: 15px;
    }
    
    .dh ul li a img {
        width: 90%;
    }
    
    .dh ul li .layer {
        position: initial;
    }
}
CSS;

$js = <<<JS
$(function(){
    let client_width = document.documentElement.clientWidth;
    
    if(client_width > 1400) {
        $('head').append('<link rel="stylesheet" href="css/fullPage.css">')
        $('body').append('<script src="js/fullPage.js"><\/script>')
        
        //初始化
        $('#dowebok').fullpage({
                verticalCentered: false,
                resize: true,
                navigation: true,
                 anchors: ['section-1', 'section-2', 'section-3', 'section-4', 'lastScreen','footerl'],
        });
    }
    
    if(client_width > 768) {
        $('head').append('<script src="js/index-sfq.js"><\/script>')
    }
    
    // let video = $("#video").get(0).paused; //这一步很重要，加.get(0)是因为Jquery没有pause方法，加它是为了把Jquery转换成js
    // $('#video').click(function() {
    //     if(video){
    //         $("#video").trigger("play")
    //     }else{
    //         $("#video").trigger("pause")
    //     }
    // })
});
JS;

$this->registerCss($css);
$this->registerJs($js);

