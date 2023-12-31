<?php

use ijony\admin\enums\StatusEnum;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\models\search\Product */
/* @var $form ActiveForm */
?>

<div class="ibox-content m-b-sm border-bottom">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">

        <div class="col-sm-2">
            <?php echo $form->field($model, 'id')->textInput() ?>
        </div>

        <div class="col-sm-2">
            <?php echo $form->field($model, 'category')->textInput() ?>
        </div>

        <div class="col-sm-2">
            <?php echo $form->field($model, 'name')->textInput() ?>
        </div>

        <?php if ($model->status != StatusEnum::STATUS_DELETE) { ?>
            <div class="col-sm-2">
                <?php echo $form->field($model, 'status')->dropDownList($model::getStatusData(), ['prompt' => '请选择']) ?>
            </div>
        <?php } ?>

        <div class="col-sm-1">
            <label>&nbsp;</label>
            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary form-control']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
