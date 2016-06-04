<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entidade */

$this->title = 'Update Entidade: ' . $model->ID_ENTIDADE;
$this->params['breadcrumbs'][] = ['label' => 'Entidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ENTIDADE, 'url' => ['view', 'id' => $model->ID_ENTIDADE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entidade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
