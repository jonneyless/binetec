<?php

use yii\helpers\Html;
use ijony\admin\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\models\Menu */
/* @var $form ijony\admin\widgets\ActiveForm */
?>

<div class="ibox">
    <div class="ibox-content">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'parent_id')->select() ?>
        <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'controller')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'params')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'auth_item')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'status')->switchery() ?>

        <div class="row">
            <div class="col-sm-4 offset-sm-2">
                <?= Html::resetButton('重置', ['class' => 'btn btn-white']) ?>
                <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
