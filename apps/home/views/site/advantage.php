<?php

/** @var yii\web\View $this */

use home\assets\PageAsset;

$this->title = '技术优势';

PageAsset::register($this)->init([
    'css' => [
        'css/about.css',
        'css/advantage.css',
    ],
    'js' => [
        'js/advantage.js',
    ],
]);
?>

<!-- 技术优势开始 -->
<div class="introduction-box advantage-box">
    <div class="introduction-top w_c">
        <h1>技术<span>优势</span></h1>
        <h2>TECHNICAL <span>ADVANTAGES</span></h2>
    </div>
    <div class="xian"></div>

    <ul class="w_c">
        <li>
            <div class="l">
                <img src="http://bimaich.nj.wh66.net/uploadfile/202112/75f55869c98f858.png" alt="">
            </div>
            <div class="r">
                <div>
                    <h1>晶格（混合）串并联</h1>
                    <h2>LATTICE (HYBRID) SERIES PARALLEL</h2>
                    <div class="xian"></div>
                    <div class="p-box">
                        <p>串并联同时进行</p>
                        <p>每颗电池既是串联节点，又是并联节点</p>
                        <p>电流场、温度场均匀</p>
                    </div>
                </div>
                <div class="note">
                    01                        </div>
            </div>
        </li>
        <li>
            <div class="l">
                <img src="http://bimaich.nj.wh66.net/uploadfile/202112/fd3dab52720fa87.png" alt="">
            </div>
            <div class="r">
                <div>
                    <h1>软连接设计</h1>
                    <h2>SOFT CONNECTION DESIGN</h2>
                    <div class="xian"></div>
                    <div class="p-box">
                        <p>柔性接触式连接</p>
                        <p>应力释放</p>
                        <p>抗震动性更强</p>
                    </div>
                </div>
                <div class="note">
                    02                        </div>
            </div>
        </li>
        <li>
            <div class="l">
                <img src="http://bimaich.nj.wh66.net/uploadfile/202112/bf683d22602a050.png" alt="">
            </div>
            <div class="r">
                <div>
                    <h1>插拔式组合</h1>
                    <h2>PLUG IN COMBINATION</h2>
                    <div class="xian"></div>
                    <div class="p-box">
                        <p>简化作业流程，生产效率高</p>
                        <p>易组装，易维护</p>
                        <p>圆柱电池梯次利用最佳解决方案</p>
                    </div>
                </div>
                <div class="note">
                    03                        </div>
            </div>
        </li>
        <li>
            <div class="l">
                <img src="http://bimaich.nj.wh66.net/uploadfile/202112/e53ea02245b2719.png" alt="">
            </div>
            <div class="r">
                <div>
                    <h1>梯次利用</h1>
                    <h2> ECHELON UTILIZATION</h2>
                    <div class="xian"></div>
                    <div class="p-box">
                        <p>模块配置灵活</p>
                        <p>梯次组合，适用场景广泛</p>
                        <p>回收残值＞20%</p>
                    </div>
                </div>
                <div class="note">
                    04                        </div>
            </div>
        </li>

    </ul>
</div>
<!-- 技术优势结束 -->