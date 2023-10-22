<?php

use ijony\admin\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model admin\models\Admin */
/* @var $form ijony\admin\widgets\ActiveForm  */
?>

<div class="ibox">
    <div class="ibox-content">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->hint($model->getIsNewRecord() ? false : '不修改密码请留空') ?>
        <?= $form->field($model, 'role_id')->dropDownList($model->getRoleSelectData(), ['prompt' => '请选择']) ?>
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
