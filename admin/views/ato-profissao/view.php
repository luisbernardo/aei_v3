<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AtoProfissao */

$this->title = $model->ID_ATO_PROFISSAO;
$this->params['breadcrumbs'][] = ['label' => 'Ato Profissão', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ato-profissao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_ATO_PROFISSAO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_ATO_PROFISSAO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_ATO_PROFISSAO',
            'FK_ID_PAI',
            'NUMERACAO_ATO',
            'DESIGNACAO:ntext',
            'DESCRICAO:ntext',
            'ESTADO',
        ],
    ]) ?>

</div>
