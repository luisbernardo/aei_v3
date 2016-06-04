<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CredencialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visualizar credenciais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="credencial-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar Credencial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IDCREDENCIAL',
            'USERNAME_ADMINISTRACAO',
            'PASSWORD_ADMINISTRACAO',
            'ESTADO',            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
