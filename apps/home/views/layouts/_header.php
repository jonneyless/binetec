<div class="header-box">
    <?php

    use ijony\helpers\Url;

    $menus = [
        ['label' => '网站首页', 'url' => ['/site/index'], 'active' => $this->context->id == 'site' && $this->context->action->id == 'index'],
        ['label' => '关于我们', 'url' => ['/site/about'], 'active' => $this->context->id == 'site' && $this->context->action->id == 'about'],
        ['label' => '产品中心', 'url' => ['/product'], 'active' => $this->context->id == 'product'],
        ['label' => '技术优势', 'url' => ['/site/advantage'], 'active' => $this->context->id == 'site' && $this->context->action->id == 'advantage'],
        ['label' => '人才招聘', 'url' => ['/site/recruit'], 'active' => $this->context->id == 'site' && $this->context->action->id == 'recruit'],
        ['label' => '新闻资讯', 'url' => ['/news/index'], 'active' => $this->context->id == 'news'],
        ['label' => '联系我们', 'url' => ['/site/contact'], 'active' => $this->context->id == 'site' && $this->context->action->id == 'contact'],
    ];
    ?>
    <div class="header w_c">
        <div class="logo">
            <img src="/images/logo.png" alt="">
        </div>
        <div class="h-nav">
            <ul>
                <?php foreach($menus as $menu){ ?>
                    <li><a href="<?= Url::to($menu['url']) ?>" class="<?= !$menu['active'] ?: 'h-active' ?>"><?= $menu['label'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="h-r">
            <div class="language">
                <div class="chinese"> <img src="/images/icon_CN.png" alt="">中文</div>
                <div class="yuyan">
                    <p><a href="http://en.binetec.net">英文</a></p>
                    <p><a href="http://www.binetec.net">中文</a></p>
                </div>
            </div>
            <div class="btn"><img src="/images/icon-down.png" alt=""></div>

        </div>
    </div>

    <div class="m_header">
        <div class="sp_header">
            <div class="sp_logo"><a href="#"><img src="/images/logo.png" alt=""></a></div>
            <div class="sp_nav"> <span></span> <span></span> <span></span> </div>
        </div>
        <div class="sjj_nav">
            <div class="sjj_logo" style="margin-bottom: 50px">
                <a href="#"><img src="/images/logo.png" alt=""></a>
            </div>

            <ul>
                <?php foreach($menus as $menu){ ?>
                    <li><a href="<?= Url::to($menu['url']) ?>" class="<?= !$menu['active'] ?: 'h-active' ?>"><?= $menu['label'] ?></a></li>
                <?php } ?>
            </ul>
        </div>

    </div>
</div>