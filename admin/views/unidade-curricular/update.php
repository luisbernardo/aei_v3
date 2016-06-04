<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadeCurricular */

$this->title = 'Update Unidade Curricular: ' . $model->ID_UNIDADE_CURRICULAR;
$this->params['breadcrumbs'][] = ['label' => 'Unidade Curriculars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_UNIDADE_CURRICULAR, 'url' => ['view', 'id' => $model->ID_UNIDADE_CURRICULAR]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unidade-curricular-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
