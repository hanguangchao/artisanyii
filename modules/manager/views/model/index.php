<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RichModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rich Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rich-model-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Create Rich Model', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'model_name',
                'model_table_name',
                'model_content',
                'created_at',
                // 'updated_at',
                // 'created_by',
                // 'updated_by',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
