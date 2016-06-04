<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AtoProfissao */

$this->title = 'Update Ato Profissao: ' . $model->ID_ATO_PROFISSAO;
$this->params['breadcrumbs'][] = ['label' => 'Ato Profissaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ATO_PROFISSAO, 'url' => ['view', 'id' => $model->ID_ATO_PROFISSAO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ato-profissao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
