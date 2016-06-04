<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadeCurricularSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidade-curricular-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_UNIDADE_CURRICULAR') ?>

    <?= $form->field($model, 'ID_CURSO') ?>

    <?= $form->field($model, 'NOME') ?>

    <?= $form->field($model, 'ECTS') ?>

    <?= $form->field($model, 'ANO') ?>

    <?php // echo $form->field($model, 'SIGLA') ?>

    <?php // echo $form->field($model, 'ESTADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
