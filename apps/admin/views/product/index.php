<?php

use ijony\admin\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel admin\models\search\Product */
/* @var $data admin\models\Product */

$this->title = '产品管理';
$this->params['breadcrumbs'][] = $this->title;
$this->params['buttons'] = [
    ['label' => '新增', 'url' => ['create'], 'options' => ['class' => 'btn btn-success']],
    ['label' => '回收站', 'url' => ['recycle'], 'options' => ['class' => 'btn btn-default']],
];
?>

<div class="ibox">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'attribute' => 'preview',
                'value' => function ($data) {
                    return $data->getPreview(200, 200);
                },
                'format' => ['image', ['style' => 'max-width: 200px; max-height: 50px;']],
            ],
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category ? $data->category->name : '';
                },
            ],
            'name',
            'status:label',

            [
                'class' => 'ijony\admin\grid\ActionColumn',
                'headerOptions' => [
                    'class' => 'text-right',
                ],
            ],
        ],
    ]); ?>

    </div>
</div>

