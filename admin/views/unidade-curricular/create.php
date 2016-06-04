<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UnidadeCurricular */

$this->title = 'Create Unidade Curricular';
$this->params['breadcrumbs'][] = ['label' => 'Unidade Curriculars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidade-curricular-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
