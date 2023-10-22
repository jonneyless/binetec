<?php

/** @var yii\web\View $this */

use home\assets\PageAsset;

$this->title = '关于我们';
$this->params['buttons'] = [
    ['label' => '公司简介', 'url' => '#gsjj', 'options' => ['class' => 'toGsjj']],
    ['label' => '发展历程', 'url' => '#fzlc', 'options' => ['class' => 'toFzlc']],
];

PageAsset::register($this)->init([
    'css' => [
        'css/about.css',
    ],
    'js' => [
        'js/about.js',
    ],
]);
?>

<!-- 公司简介开始 -->
<div id="gsjj" class="introduction-box">
    <div class="introduction-top w_c">
        <h1>公司<span>简介</span></h1>
        <h2>COMPANY <span>PROFILE</span></h2>
    </div>
    <div class="xian"></div>

    <div class="introduction w_c">
        <div class="l">
            <img src="/images/jianjie1.png" alt="">
        </div>
        <div class="r">
            <h1>苏州比耐新能源科技有限公司</h1>
            <h2>Binet（Suzhou）Energy Technology Co., Ltd.</h2>
            <div class="p-box">
                <!--<p>苏州比耐信息科技有限公司成立于2020年，系新能源锂电源系统运营服务商。前身为苏州安靠电源有限公司，现有苏州园区、苏州吴中、长沙、重庆、等多个生产基地，为国内外主流企业提供锂电源系统配套服务。公司拥有独立完善的研发团队，拥有技术专利500余项，其中插拔软连接晶格串并联技术已获国内外主要发达国家和地区授权，如美国、欧盟、以色列、澳大利亚、日本、韩国等，该技术已广泛应用新能源汽车、船、储能等领域，系圆柱电池电源系统集成最佳解决方案。-->
                <!--</p>-->
                <!--<p>经过多年的发展，先后荣获“国家高新技术企业”“江苏省双创人才企业”“江苏省民营科技企业”“江苏省新能源汽车锂电源系统工程技术研究中心”“姑苏区创新领军人才企业”“苏州市工业园区科技领军人才企业”“苏州市新能源汽车锂电源系统工程技术研究中心”“苏州市人民政府认定企业技术中心”等荣誉称号，已成为新能源汽车行业不可或缺的中坚力量。公司秉承绿色环保理念，致力于推动新能源产业的蓬勃发展，为保护环境绿化城市不断努力。</p>-->
                <p>比耐科技成立于2016年，专注于“动力电池”的生产制造、电源系统集成和商业模式创新应用 的高科技企业。独有的圆柱形“拔插式”软连接技术、全极耳大圆柱电芯技术和内圆外方的芯圆电池技术，从根本解决电源储能系统的安全问题，并最大有效的发挥电池全生命周期的价值，真正实现了电池回收、梯次利用的可行性。</p><p>现在贵阳、郑州、苏州三地建设了电芯生产、系统集成、和运营服务三个基地。公司拥有独立完善的研发团队，基于深厚的技术积累和强大的研发平台，围绕核心电芯、电源系统，到应用级开发，构建低碳新能源生态链，聚焦充换电售储电商业模式， 通过“电电混动”商用车，以补电、网格配送、充电相结合的多方式能源补给方法，跨车型平台解决新能源车续航焦虑，为充换电站提供了全新的创新型商业模式。</p>                </div>

            <div class="advantage">
                <ul>
                    <li>优秀团队</li>
                    <!--<li>300+专利</li>-->
                    <li>解决方案</li>
                    <li>中坚力量</li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- 公司简介结束 -->


<!-- 发展历程开始 -->
<div id="fzlc" class="history-box">
    <div class="history-top">
        <h1>发展历程</h1>
        <h2>DEVELOPMENT HISTORY</h2>
    </div>

    <div class="xian"></div>

    <div class="history w_c">
        <div class="swiper-container gallery-thumbs11">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <P><span>2016</span></P>
                </div>
                <div class="swiper-slide">
                    <P><span>2017</span></P>
                </div>
                <div class="swiper-slide">
                    <P><span>2018</span></P>
                </div>
                <div class="swiper-slide">
                    <P><span>2019-2020</span></P>
                </div>
                <div class="swiper-slide">
                    <P><span>2021</span></P>
                </div>
                <!--<div class="swiper-slide">-->
                <!--    <P><span>2011-2013</span></P>-->
                <!--</div>-->
                <!--<div class="swiper-slide">-->
                <!--    <P><span>2014-2016</span></P>-->
                <!--</div>-->
                <!--<div class="swiper-slide">-->
                <!--    <P><span>2017-2019</span></P>-->
                <!--</div>-->
                <!--<div class="swiper-slide">-->
                <!--    <P><span>2020-present</span></P>-->
                <!--</div>-->
            </div>
        </div>

        <div class="swiper-container gallery-top11">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="g-con-course-lf">
                        <h2>2016</h2>
                        <div>
                            <p>上海比耐成立  新能源物流配送车项目启动<br></p>
                        </div>
                    </div>
                    <div class="g-con-course-rt">
                        <P style="background-image: url(http://bimaich.nj.wh66.net/uploadfile/202112/ffb14b6c839152.png);"></P>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="g-con-course-lf">
                        <h2>2017</h2>
                        <div>
                            <p>应用于储能市场</p>
                        </div>
                    </div>
                    <div class="g-con-course-rt">
                        <P style="background-image: url(http://bimaich.nj.wh66.net/uploadfile/202112/99556af94d2e93b.png);"></P>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="g-con-course-lf">
                        <h2>2018</h2>
                        <div>
                            <p>大批量应用于新能源乘用车、轻型面包车</p>
                        </div>
                    </div>
                    <div class="g-con-course-rt">
                        <P style="background-image: url(http://bimaich.nj.wh66.net/uploadfile/202112/947bfee45b66fed.png);"></P>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="g-con-course-lf">
                        <h2>2019-2020</h2>
                        <div>
                            <p>比耐芯圆电芯</p><p>小批试产</p>
                        </div>
                    </div>
                    <div class="g-con-course-rt">
                        <P style="background-image: url(http://bimaich.nj.wh66.net/uploadfile/202112/18339c66e8775ee.png);"></P>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="g-con-course-lf">
                        <h2>2021</h2>
                        <div>
                            <p>郑州比耐成立，建立PACK生产基地</p><p>贵阳比耐成立，10GWH大圆柱电芯生产基地奠基</p><p>苏州比耐成立，启动品牌、销售运营中心</p>
                        </div>
                    </div>
                    <div class="g-con-course-rt">
                        <P style="background-image: url(http://bimaich.nj.wh66.net/uploadfile/202112/8972bfdac32412b.png);"></P>
                    </div>
                </div>

            </div>
        </div>



    </div>

</div>
<!-- 发展历程结束 -->

<!-- 荣誉资质开始 -->
<!--<div id="ryzz" class="introduction-box">
 <div class="introduction-top w_c">
        <h1>荣誉<span>资质</span></h1>
        <h2>HONORARY <span>QUALIFICATION</span></h2>
    </div>
   <div class="xian"></div>
    <div class="zizhi-box w_c">
       <div class="zz-box">
          <img src="/images/zz.jpg" style="width: 100%" alt="" />
        </div>
        <div class="zizhi-b">
            <ul>
                <li>
                    <div>
                        <span class="animateNum" data-animatetarget="20"></span><span style="">+</span>
                    </div>

                    <p>发明专利</p>
                </li>
                <li>
                    <div>
                        <span class="animateNum" data-animatetarget="300"></span><span style="">+</span>
                    </div>
                    <p>新型专利</p>
                </li>
             <li>
                    <div>
                        <span class="animateNum" data-animatetarget="60"></span><span style="">+</span>
                    </div>
                    <p>行业荣誉</p>
                </li>
                <li>
                    <div>
                        <span class="animateNum" data-animatetarget="100"></span><span style="">+</span>
                    </div>
                    <p>行业领先技术</p>
                </li>
            </ul>
        </div>
    </div>
</div>-->
<!-- 荣誉资质结束 -->