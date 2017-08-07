<?php

use yii\helpers\Html;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">

<?php
if( Yii::$app->getSession()->hasFlash('error') ) {
?>
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <i class="fa fa-warning"></i>

          <h3 class="box-title">Alerts</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <?php

            if( Yii::$app->getSession()->hasFlash('success') ) {
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-success', //这里是提示框的class
                ],
                'body' => Yii::$app->getSession()->getFlash('success'), //消息体
            ]);
        }
        if( Yii::$app->getSession()->hasFlash('error') ) {
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-danger',
                ],
                'body' => Yii::$app->getSession()->getFlash('error'),
            ]);
        }
        ?>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
<?php 
}
?>

    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <!-- <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div> -->
        <!-- /.box-header -->
        

        
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
       
      </div>
      <!-- /.box -->

    </div>
       
</div>
