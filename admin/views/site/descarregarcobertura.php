<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\DownloadForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Download de cobertura de atos';
$this->params['breadcrumbs'][] = $this->title;

function ligar_bd()
{
    $link = mysqli_connect("localhost", "jvarajao_aei_u", "aeiptsi2016", "jvarajao_aei");
    mysqli_query($link,"SET NAMES utf8");
    mysqli_set_charset($link, "uft8");
    return $link;
}
?>

<?php
    if($model->isDownloaded) {
        echo "<h4 style='color:green'> O seu ficheiro foi transferido com sucesso </h4>";
    }
    $form = ActiveForm::begin([ 'id' => 'download-cobertura',
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']]);?>
    <br>
    
    <?= $form->field($model, 'cursos')->checkboxList(yii\helpers\ArrayHelper::map(\app\models\Curso::find()->all(),
                    'ID_CURSO','NOME')); ?>

<center>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-10">
            <?= Html::submitButton('Download', ['class' => 'btn btn-primary', 
                                              'name' => 'download-ficheiro']) ?>
        </div>
    </div>
</center>
    
<?php ActiveForm::end() ?>

