<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AtoProfissao */

$this->title = 'Create Ato Profissao';
$this->params['breadcrumbs'][] = ['label' => 'Ato Profissaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ato-profissao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
