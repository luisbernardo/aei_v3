<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\UploadForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Upload de Dados Estaticos';
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
    <?php 
    if($model->isUploaded) {
        echo "<h3 style='color:green'> O seu ficheiro foi enviado com sucesso </h3>";
    }
    $form = ActiveForm::begin([
        'id' => 'excel-form',
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']]);?>
<br>
    <?= $form->field($model, 'excelFile')->fileInput()->label("Selecione o ficheiro que contém os dados estáticos!") ?>
    
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-10">
            <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 
                                              'name' => 'enviar-ficheiro',
                                              'data-confirm' => 'Tem a certeza que quer enviar este ficheiro? Todos os dados atuais serão eliminados!']) ?>
        </div>
    </div>

<?php ActiveForm::end() ?>
</center>