<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Credencial */

$this->title = $model->IDCREDENCIAL;
$this->params['breadcrumbs'][] = ['label' => 'Credencials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="credencial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->IDCREDENCIAL], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->IDCREDENCIAL], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende eliminar esta credencial?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDCREDENCIAL',
            'USERNAME_ADMINISTRACAO',
            'PASSWORD_ADMINISTRACAO',
            'ESTADO',
        ],
    ]) ?>

</div>
