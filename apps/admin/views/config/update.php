<?php

/* @var $this yii\web\View */
/* @var $models admin\models\Config[] */

use ijony\admin\widgets\ActiveForm;
use yii\bootstrap4\Html;

$this->title = '更新系统配置';
$this->params['breadcrumbs'][] = ['label' => '系统配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = '更新';
?>

<div class="ibox">
    <div class="ibox-content">

        <?php ActiveForm::begin(); ?>

        <?php foreach($models as $model){ ?>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="<?= $model->key ?>"><?= $model->description ?></label>
                <div class="col-sm-10">
                    <div class="input-group"><input type="text" id="<?= $model->key ?>" class="form-control" name="Config[<?= $model->key ?>]" value="<?= $model->value ?>" maxlength="30"></div>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-sm-4 offset-sm-2">
                <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('重置', ['class' => 'btn btn-white']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>