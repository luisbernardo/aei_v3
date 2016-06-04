<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadeCurricular */

$this->title = $model->ID_UNIDADE_CURRICULAR;
$this->params['breadcrumbs'][] = ['label' => 'Unidade Curriculars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidade-curricular-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_UNIDADE_CURRICULAR], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_UNIDADE_CURRICULAR], [
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
            'ID_UNIDADE_CURRICULAR',
            'ID_CURSO',
            'NOME',
            'ECTS',
            'ANO',
            'SIGLA',
            'ESTADO',
        ],
    ]) ?>

</div>
