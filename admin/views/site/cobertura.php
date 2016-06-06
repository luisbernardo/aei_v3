<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\UploadForm2 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Upload de cobertura de atos';
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
    <?php 
    if($model->isUploaded) {
        echo "<h3 style='color:green'> O seu ficheiro foi enviado com sucesso </h3>";
    }
    $form = ActiveForm::begin([
        'id' => 'cobertura-form',
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data']]);?>
<br>
    <?= $form->field($model, 'uploadedFiles[]')->fileInput(['multiple' => true])->label("Selecione os ficheiros que pretende carregar!")?>
    
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-10">
            <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 
                                              'name' => 'enviar-ficheiro',
                                              'data-confirm' => 'Tem a certeza que quer enviar estes ficheiros? Todos os dados atuais serão eliminados!']) ?>
        </div>
    </div>

<?php ActiveForm::end() ?>
</center>