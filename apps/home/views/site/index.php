<?php

/** @var yii\web\View $this */

use home\assets\PageAsset;

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
                                <!--<div class="play-box">-->
                                <!--    <video src="/images/video.mp4" poster="/images/shipin.jpg" controls="controls" width="100%"></video>-->
                                <!--<img src="/images/play.png" alt="" class="play" />-->
                                <!--</div>-->


                            </div>


                            <div class="swiper-slide swiper_item1">
                                <a href=""><img src="http://bimaich.nj.wh66.net/uploadfile/202112/2bfc464bd00a3f.png" alt=""></a>
                            </div>


                            <!--<div class="swiper-slide swiper_item1">-->
                            <!--    <a href=""><img src="/images/h-banner.png" alt=""></a>-->
                            <!--</div>-->

                            <!--<div class="swiper-slide swiper_item1">-->
                            <!--    <a href=""><img src="/images/h-banner.png" alt=""></a>-->
                            <!--</div>-->
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
                        <a href="/index.php?c=category&id=2">了解更多</a>
                    </div>
                </div>
                <div class="about-r">
                    <div class="l">
                        <div class="title">
                            <h1>Binet（Suzhou）Energy Technology Co., Ltd.</h1>
                            <h2>苏州比耐新能源科技有限公司</h2>
                        </div>
                        <div class="jj">
                            <!--<p>苏州比耐科技有限公司成立于2020年，系新能源锂电源系统运营服务商。前身为苏州安靠电源有限公司，现有苏州园区、苏州吴中、长沙、重庆、等多个生产基地，为国内外主流企业提供锂电源系统配套服务。公司拥有独立完善的研发团队，拥有技术专利500余项，其中插拔软连接晶格串并联技术已获国内外主要发达国家和地区授权，如美国、欧盟、以色列、澳大利亚、日本、韩国等，该技术已广泛应用新能源汽车、船、储能等领域，系圆柱电池电源系统集成最佳解决方案,经过多年的发展，先后..... </p>-->
                            比耐科技成立于2016年，专注于“动力电池”的生产制造、电源系统集成和商业模式创新应用 的高科技企业。独有的圆柱形“拔插式”软连接技术、全极耳大圆柱电芯技术和内圆外方的芯圆电池技术，从根本解决电源储能系统的安全问题，并最大有效的发挥电池全生命周期的价值，真正实现了电池回收、梯次利用的可行性。现在贵阳、郑州、苏州三地建设了电芯生产、系统集成、和运营服务三个基地...                    </div>
                        <div class="type">
                            <ul>
                                <li>
                                    <a href="/index.php?c=category&id=2">
                                        <img src="/images/jianjie-icon.png" alt="">
                                        <p>公司简介</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="/index.php?c=category&id=2">
                                        <img src="/images/fazhan-icon.png" alt="">
                                        <p class="h-about-active">发展历程</p>
                                    </a>
                                </li>

                                <li>
                                    <a href="/index.php?c=category&id=2">
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
                        <a href="/index.php?c=category&id=3">了解更多</a>
                    </div>
                </div>
                <div class="about-r">
                    <div class="dh sfq">
                        <ul>
                            <li class="curr">
                                <a href="http://www.binetec.net/index.php?c=category&id=12"><img src="http://bimaich.nj.wh66.net/uploadfile/202112/d075c22bfd23174.png" alt=""></a>
                                <div class="layer">
                                    <p class="p1"><b class="col1">车船系统</b></p>
                                    <p class="p2"><b class="col2">车船系统</b></p>
                                </div>
                            </li>
                            <li class="curr">
                                <a href="http://www.binetec.net/index.php?c=category&id=13"><img src="http://bimaich.nj.wh66.net/uploadfile/202112/44dac75ecd41ebb.png" alt=""></a>
                                <div class="layer">
                                    <p class="p1"><b class="col1">储能系统</b></p>
                                    <p class="p2"><b class="col2">储能系统</b></p>
                                </div>
                            </li>
                            <li class="curr">
                                <a href="http://www.binetec.net/index.php?c=category&id=14"><img src="http://bimaich.nj.wh66.net/uploadfile/202112/c4807afaa182656.png" alt=""></a>
                                <div class="layer">
                                    <p class="p1"><b class="col1">仓储系统</b></p>
                                    <p class="p2"><b class="col2">仓储系统</b></p>
                                </div>
                            </li>
                            <li class="curr">
                                <a href="http://www.binetec.net/index.php?c=category&id=15"><img src="http://bimaich.nj.wh66.net/uploadfile/202112/bf2c8ce734cc759.png" alt=""></a>
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
                        <a href="/index.php?c=category&id=4">了解更多</a>
                    </div>
                </div>
                <div class="about-r jishu-bj">
                    <div class="one">
                        <a href="/index.php?c=category&id=4">
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
                        <a href="/index.php?c=category&id=4">
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
                        <a href="/index.php?c=category&id=4">
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
                        <a href="/index.php?c=category&id=4">
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
                        <a href="/index.php?c=category&id=10">了解更多</a>
                    </div>
                </div>
                <div class="about-r h-news">
                    <ul>

                        <li>
                            <a href="http://www.binetec.net/index.php?c=show&id=45">
                                <h1>01</h1>
                                <span>2021-12-20</span>
                                <h2>总投资50亿元，带动就业1000余人 贵阳比耐新能源科技锂电池项目开工</h2>
                                <div class="h-news-imgbox">
                                    <img src="http://bimaich.nj.wh66.net/uploadfile/202112/8e1c8ab3e4b9707.jpeg" style="height: 135px" alt="">
                                </div>
                                <p>9月16日，比耐新能源科技10GWh锂电池及PACK生产线建设项目（以下简称“比耐锂电池项目”）开工仪式，在贵州双龙航空港经济区永乐产业园举行。经济区党工委常务副书记、管委会主任常文松宣布开工。开工仪式根据规划，比耐锂电池项目总投资50亿元，分3期实施建设，核心区规划用地面积约490亩，致力于打造智能制造与节能环保相融合的工业4.0绿色标杆“智造”基地。预计2022年10月项目总体建成投产后，年平</p>
                                <div class="icon">
                                    <img src="/images/huijian.png" alt="">
                                    <img src="/images/lanjian.png" alt="">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.binetec.net/index.php?c=show&id=46">
                                <h1>02</h1>
                                <span>2021-12-20</span>
                                <h2>比耐，一路有“锂”</h2>
                                <div class="h-news-imgbox">
                                    <img src="http://bimaich.nj.wh66.net/uploadfile/202112/310dfb28534e718.jpeg" style="height: 135px" alt="">
                                </div>
                                <p>韩国JJ MOTORS在今天与苏州比耐科技有限公司签订4亿人民币微卡微面35度电动力电池包商业合同，奠定了未来双方牢固的战略合作关系。韩国JJ MOTORS 公司是韩国仅次于现代，大宇的商用新能源车开发商。与韩国JJ MOTORS公司总经理朴永俊，江苏奇意投资有限公司董事长吴国庆一起去厦门安踏集团总部拜访安踏集团董事长丁世忠，安踏投资公司总经理苏吉生，一起探讨新能源行业未来发展方向。</p>
                                <div class="icon">
                                    <img src="/images/huijian.png" alt="">
                                    <img src="/images/lanjian.png" alt="">
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.binetec.net/index.php?c=show&id=47">
                                <h1>03</h1>
                                <span>2021-12-20</span>
                                <h2>共进、共赢</h2>
                                <div class="h-news-imgbox">
                                    <img src="http://bimaich.nj.wh66.net/uploadfile/202112/5a58f3ccb2a44.jpeg" style="height: 135px" alt="">
                                </div>
                                <p>深圳高斯宝（Gospower）电气技术有限公司是全球知名企业电源方案提供商和制造商，公司总裁阮世良是从华为公司出来创业的高精技术人才，高斯宝多年来为中兴、中国中车、富士康、海康威视、MikroTik、Ruckus Networks、Cambium Networks、等国内外知名企业提供有竞争力的电源技术解决方案。阮总十分认可比耐科技在贵阳投资的10GWh大圆柱电池生产基地，并表示会全力配合苏州比耐</p>
                                <div class="icon">
                                    <img src="/images/huijian.png" alt="">
                                    <img src="/images/lanjian.png" alt="">
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- 新闻中心结束 -->
        </div>

        <div class="section footerss">
            <!-- 底部开始 -->
            <!-- 底部开始 -->
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

