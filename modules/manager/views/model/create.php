<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RichModel */

$this->title = 'Create Rich Model';
$this->params['breadcrumbs'][] = ['label' => 'Rich Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rich-model-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
