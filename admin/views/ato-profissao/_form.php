<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtoProfissao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ato-profissao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ATO_PROFISSAO')->textInput() ?>

    <?= $form->field($model, 'FK_ID_PAI')->dropDownList(
            yii\helpers\ArrayHelper::map(\app\models\AtoProfissao::find()->where('NIVEL<=2'),
                    'ID_ATO_PROFISSAO','DESIGNACAO ATO'),['prompt'=>'Selecione o Ato']) ?>
    
    <?= $form->field($model, 'NUMERACAO_ATO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESIGNACAO')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'DESCRICAO')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ESTADO')->dropDownList(['0'=>'Inativo','1'=>'Ativo'],['prompt'=>'Select Category']) ?>
    
    <?= $form->field($model, 'SIGLA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
