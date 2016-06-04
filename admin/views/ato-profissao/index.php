<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AtoProfissaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ato Profissaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ato-profissao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ato Profissao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ATO_PROFISSAO',
            'FK_ID_PAI',
            'NUMERACAO_ATO',
            'DESIGNACAO:ntext',
            'DESCRICAO:ntext',
            // 'ESTADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
