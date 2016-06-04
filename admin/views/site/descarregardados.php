<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\UploadForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Download de Dados Estaticos';
$this->params['breadcrumbs'][] = $this->title;
?>

<center>
    <p class="control-label">Se não possui o ficheiro para preencher, faça o download aqui:</p>
    <a href="../web/ficheiros/EXCEL_BD.xlsx" style="color:black" download="BaseDados"><button class="btn">Download</button></a><br>
    <br>
    <p class="control-label">Se pertender manter os dados atuais, faça o download aqui:</p>
    <a href="../web/ficheiros/EXCEL_BD_DADOS.xlsx" download="EXCEL_BD_DADOS.xlsx"><button class="btn" style="color:black">Download</button></a>
</center>