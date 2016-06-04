<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_CURSO')->textInput() ?>

    <?= $form->field($model, 'FK_ID_ENTIDADE')->dropDownList(
            yii\helpers\ArrayHelper::map(\app\models\Entidade::find()->all(),
                    'ID_ENTIDADE','NOME'),['prompt'=>'Selecione a Entidade']) ?>

    <?= $form->field($model, 'NOME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SIGLA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GRAU')->textInput() ?>

    <?= $form->field($model, 'ECTS')->textInput() ?>

    <?= $form->field($model, 'DURACAO')->textInput() ?>

    <?= $form->field($model, 'REGIME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOCAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRICAO')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SAIDAS')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ESTADO')->dropDownList(['0'=>'Inativo','1'=>'Ativo'],['prompt'=>'Select Category']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
