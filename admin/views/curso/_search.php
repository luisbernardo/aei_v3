<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_CURSO') ?>

    <?= $form->field($model, 'FK_ID_ENTIDADE') ?>

    <?= $form->field($model, 'NOME') ?>

    <?= $form->field($model, 'SIGLA') ?>

    <?= $form->field($model, 'GRAU') ?>

    <?php // echo $form->field($model, 'ECTS') ?>

    <?php // echo $form->field($model, 'DURACAO') ?>

    <?php // echo $form->field($model, 'REGIME') ?>

    <?php // echo $form->field($model, 'LOCAL') ?>

    <?php // echo $form->field($model, 'DESCRICAO') ?>

    <?php // echo $form->field($model, 'SAIDAS') ?>

    <?php // echo $form->field($model, 'ESTADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
