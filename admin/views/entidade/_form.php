<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Entidade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entidade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ENTIDADE')->textInput() ?>

    <?= $form->field($model, 'NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WEBSITE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTADO')->dropDownList(['0'=>'Inativo','1'=>'Ativo'],['prompt'=>'Select Category']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
