<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Credencial */

$this->title = 'Atualizar Credencial: ' . $model->IDCREDENCIAL;
$this->params['breadcrumbs'][] = ['label' => 'Credencials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDCREDENCIAL, 'url' => ['view', 'id' => $model->IDCREDENCIAL]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="credencial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
