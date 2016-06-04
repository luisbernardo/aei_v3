<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CredencialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="credencial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDCREDENCIAL') ?>

    <?= $form->field($model, 'USERNAME_ADMINISTRACAO') ?>

    <?= $form->field($model, 'PASSWORD_ADMINISTRACAO') ?>

    <?= $form->field($model, 'ESTADO') ?>
    
    <?= $form->field($model, 'AUTH_KEY') ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Recomeçar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
