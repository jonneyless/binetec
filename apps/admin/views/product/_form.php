<?php

use yii\helpers\Html;
use ijony\admin\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\models\Product */
/* @var $form ijony\admin\widgets\ActiveForm */
?>

<div class="ibox">
    <div class="ibox-content">

        <?php $form = ActiveForm::begin([
            'options' => [
                'enctype' => 'multipart/form-data',
            ]
        ]); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'category_id')->select(['class' => 'admin\\models\\Category']) ?>
        <?= $form->field($model, 'preview')->image() ?>
        <?= $form->field($model, 'features')->tags() ?>
        <?= $form->field($model, 'specification')->editor() ?>
        <?= $form->field($model, 'status')->switchery() ?>

        <div class="row">
            <div class="col-sm-4 offset-sm-2">
                <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('重置', ['class' => 'btn btn-white']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>