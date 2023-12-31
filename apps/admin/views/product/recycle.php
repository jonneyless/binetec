<?php

use ijony\admin\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\search\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '回收站';
$this->params['breadcrumbs'][] = ['label' => '产品管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['buttons'] = [
    ['label' => '管理', 'url' => ['index'], 'options' => ['class' => 'btn btn-info']],
];
?>

<div class="ibox">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="ibox-content">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layoutFix' => true,
        'columns' => [
            'id:integer:#',
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category ? $data->category->name : '';
                },
            ],
            'name',

            [
                'class' => 'ijony\admin\grid\ActionColumn',
                'headerOptions' => [
                    'class' => 'text-right',
                ],
                'template' => '{restore} {delete}',
            ],
        ],
    ]); ?>

    </div>
</div>
