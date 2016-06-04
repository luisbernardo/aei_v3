<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadeCurricular */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidade-curricular-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_UNIDADE_CURRICULAR')->textInput() ?>

    <?= $form->field($model, 'ID_CURSO')->dropDownList(
            yii\helpers\ArrayHelper::map(\app\models\Curso::find()->all(),
                    'ID_CURSO','NOME'),['prompt'=>'Selecione o Curso']) ?>

    <?= $form->field($model, 'NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ECTS')->textInput() ?>

    <?= $form->field($model, 'ANO')->textInput() ?>

    <?= $form->field($model, 'SIGLA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTADO')->dropDownList(['0'=>'Inativo','1'=>'Ativo'],['prompt'=>'Select Category']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
