<?php

namespace app\models;

use yii\base\Model;
use yii\BaseYii;
use yii\web\UploadedFile;


class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $excelFile;
    public $isUploaded;

    public function rules()
    {
        return [
            [['excelFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx, xls'],
        ];
    }
    
    public function upload()
    {
        $fileName = "EXCEL_BD_DADOS." . $this->excelFile->extension;
        if($this->excelFile->saveAs(BaseYii::getAlias("@webroot") . '/ficheiros/'.$fileName)) {
            return true;
        } else {
            return false;
        }
    }
}
