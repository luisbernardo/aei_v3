<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadeCurricularSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidade Curriculars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidade-curricular-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Unidade Curricular', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_UNIDADE_CURRICULAR',
            'ID_CURSO',
            'NOME',
            'ECTS',
            'ANO',
            // 'SIGLA',
            // 'ESTADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
