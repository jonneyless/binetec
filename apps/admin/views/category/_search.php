<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\models\search\Category */
/* @var $form ActiveForm */
?>

<div class="ibox-content m-b-sm border-bottom">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">

        <div class="col-sm-2">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>

        <div class="col-sm-1">
            <label>&nbsp;</label>
            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary form-control']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
</div>
