<?php

use ijony\admin\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '回收站';
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['buttons'] = [
    ['label' => '管理', 'url' => ['index'], 'options' => ['class' => 'btn btn-info']],
];
?>

<div class="ibox">
    <div class="ibox-content">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layoutFix' => true,
        'columns' => [
            'id:integer:#',
            'name',

            [
                'class' => 'ijony\admin\grid\ActionColumn',
                'headerOptions' => [
                    'class' => 'text-right',
                ],
                'template' => '{restore} {delete}',
            ]
        ],
    ]); ?>

    </div>
</div>
