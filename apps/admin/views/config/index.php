<?php

use ijony\admin\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '系统配置';
$this->params['breadcrumbs'][] = $this->title;
$this->params['buttons'] = [
    ['label' => '编辑', 'url' => ['update'], 'options' => ['class' => 'btn btn-success']],
];
?>

<div class="ibox">
    <div class="ibox-content">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'layoutFix' => true,
            'columns' => [
                'description',
                'value',
            ],
        ]); ?>

    </div>
</div>

