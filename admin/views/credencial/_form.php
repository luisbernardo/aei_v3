<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Credencial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="credencial-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'USERNAME_ADMINISTRACAO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PASSWORD_ADMINISTRACAO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTADO')->dropDownList(['0'=>'Inativo','1'=>'Ativo'],['prompt'=>'Select Category']) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
