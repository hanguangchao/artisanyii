<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- form start -->
<?php $form = ActiveForm::begin(); ?>
<!-- <form role="form"> -->
<div class="box-body">
    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>
    

<!-- /.box-body -->

</div>
<!-- /.box-body -->

<div class="box-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
 <!-- </form> -->
 <?php ActiveForm::end(); ?>
