<?php

namespace app\models;

use yii\base\Model;
use yii\BaseYii;
use yii\web\UploadedFile;


class UploadForm2 extends Model
{
    /**
     * @var UploadedFile
     */
    public $uploadedFiles;
    public $isUploaded;

    public function rules()
    {
        return [
            [['excelFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx, xls'],
        ];
    }
    
    public function upload()
    {
        $allOk = true;
        foreach($this->uploadedFiles as $file) {
            $fileName = $file->baseName . "." . $file->extension;
            if(!$file->saveAs(BaseYii::getAlias("@webroot") . '/ficheiros/'.$fileName)) {
                $allOk = false;
            }
        }
        if($allOk) {
            return true;
        } else {
            return false;
        }
    }
}