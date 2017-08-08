<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RichModel */

$this->title = 'Update Rich Model: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rich Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rich-model-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
