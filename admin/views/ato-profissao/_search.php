<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtoProfissaoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ato-profissao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_ATO_PROFISSAO') ?>

    <?= $form->field($model, 'FK_ID_PAI') ?>

    <?= $form->field($model, 'NUMERACAO_ATO') ?>

    <?= $form->field($model, 'DESIGNACAO') ?>

    <?= $form->field($model, 'DESCRICAO') ?>
    
    <?= $form->field($model, 'SIGLA')?>

    <?php // echo $form->field($model, 'ESTADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
