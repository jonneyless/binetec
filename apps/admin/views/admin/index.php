<?php

use ijony\admin\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员管理';
$this->params['breadcrumbs'][] = $this->title;
$this->params['buttons'] = [
    ['label' => '新增', 'url' => ['create'], 'options' => ['class' => 'btn btn-success']],
    ['label' => '回收站', 'url' => ['recycle'], 'options' => ['class' => 'btn btn-default']],
];
?>

<div class="ibox">
    <div class="ibox-content">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layoutFix' => true,
        'columns' => [
            [
                'attribute' => 'id',
                'header' => '#',
            ],
            [
                'attribute' => 'role_id',
                'value' => function($data){
                    return $data->getRoleName();
                },
            ],
            'username',
            'status:label',

            [
                'class' => 'ijony\admin\grid\ActionColumn',
                'headerOptions' => [
                    'class' => 'text-right',
                ],
                'template' => '{view} {update} {remove}',
            ],
        ],
    ]); ?>

    </div>
</div>
