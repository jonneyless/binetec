<?php

/* @var $this yii\web\View */
/* @var $model admin\models\Config */

use ijony\admin\widgets\ActiveForm;
use yii\bootstrap4\Html;

$this->title = '新增系统配置';
$this->params['breadcrumbs'][] = ['label' => '系统配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = '新增';
?>

<div class="ibox">
    <div class="ibox-content">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-sm-4 offset-sm-2">
                <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('重置', ['class' => 'btn btn-white']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>