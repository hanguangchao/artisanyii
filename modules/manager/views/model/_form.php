<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RichModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rich-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'model_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_table_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
