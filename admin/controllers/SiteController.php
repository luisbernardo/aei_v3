<?php

namespace app\controllers;

include 'php\PHPExcel\Classes\PHPExcel.php';

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\UploadForm;
use app\models\UploadForm2;
use app\models\DownloadForm;
use php\PHPExcel\Classes\PHPExcel;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionDescarregardados()
    {
        return $this->render('descarregardados');
    }
    
    public function actionDescarregarcobertura()
    {
        $model = new DownloadForm();
        if(Yii::$app->request->isPost) {
            $dados = Yii::$app->request->post();
            $cursos = $dados['DownloadForm']['cursos'];
            $model->cursos = $cursos; 
            $model->download();
        } else {
            return $this->render('descarregarcobertura',['model' => $model]);
        }
    }
    
    public function ligar_bd()
    {
        $link = mysqli_connect("localhost", "root", "", "ptsi");
        mysqli_query($link,"SET NAMES utf8");
        mysqli_set_charset($link, "uft8");
        return $link;
    }
    
    public function actionCobertura() 
    {
        $model = new UploadForm2();        
        if (Yii::$app->request->isPost) {
            $model->uploadedFiles = UploadedFile::getInstances($model, 'uploadedFiles');
            $model->isUploaded = true;
            if ($model->upload()) {
                foreach($model->uploadedFiles as $file) {
                    $ficheiro = Yii::getAlias("@webroot") . "/ficheiros/" . $file->baseName . "." . $file->getExtension();
                    $objPHPExcel = \PHPExcel_IOFactory::load($ficheiro);
                    $contador = 0;
                    $query = "";
                    foreach($objPHPExcel->getWorksheetIterator() as $worksheet) {
                        $worksheetTitle = $worksheet->getTitle();
                        $highestrow = $worksheet->getHighestRow();
                        $highestcol = $worksheet->getHighestColumn();
                        $highestcolindex = \PHPExcel_Cell::columnIndexFromString($highestcol);
                        $nrColumns = ord($highestcol) - 64;
                        if($contador==0) {
                            $idcurso = $worksheet->getCell("C1")->getValue();
                            $query .= "DELETE FROM cobertura_uc WHERE ID_CURSO = ";
                            $query .= $idcurso."; ";
                            $query .= "INSERT INTO `cobertura_uc` (ID_CURSO, ID_UC, ID_ATO_PROFISSAO, AVALIACAO, DATA_AVALIACAO, ESTADO) VALUES (";
                            for($col = 2; $col <= $highestcolindex; ++ $col) {
                                $idUc = $worksheet->getCellByColumnAndRow($col, 2)->getValue();
                                for($row = 4; $row <= 104; ++ $row) {
                                    $cell = $worksheet->getCellByColumnAndRow($col, $row);
                                    $val = $cell->getCalculatedValue();
                                    $dataType = \PHPExcel_Cell_DataType::dataTypeForValue($val);
                                    if($dataType == "null") {
                                        
                                    } else {
                                        $query .= $idcurso . ", " . $idUc . ", ". ($row - 3) .", ". round($val) .", '" . date('Y/m/d H:i:s') . "', 1),(";
                                    }
                                }
                            }
                            $query = substr($query, 0, -3);
                            $query .= "); ";
                        } else {
                            $idcurso = $worksheet->getCell("D1")->getValue();
                            $query .= "DELETE FROM cobertura_curso WHERE ID_CURSO = ";
                            $query .= $idcurso."; ";
                            $query .= "INSERT INTO `cobertura_curso` (ID_CURSO, ID_ATO_PROFISSAO, AVALIACAO, DATA_AVALIACAO, ESTADO) VALUES (";
                            $coberturaTotal = $worksheet->getCell("C2")->getCalculatedValue();
                            $ato = 0;
                            $query .= $idcurso . ", ".$ato.", ". round($coberturaTotal) .", '". date('Y/m/d H:i:s') ."', 1), (";
                            $col = 1;
                            $ato++;
                            for($row = 2; $row <= 102; ++ $row) {
                                $cell = $worksheet->getCellByColumnAndRow($col, $row);
                                $val = $cell->getCalculatedValue();
                                $dataType = \PHPExcel_Cell_DataType::dataTypeForValue($val);
                                if($dataType == "null") {

                                } else {
                                    $query .= $idcurso . ", ". $ato . ", ". round($val) .", '" . date('Y/m/d H:i:s') . "', 1),(";
                                }
                                $ato++;
                            }
                            $query = substr($query, 0, -3);
                            $query .= "); ";
                        }
                        $contador++;
                    }
                    $query .= " INSERT INTO `AUDIT_TRAIL` (`DATA_ALTERACAO`, `DESC_ALTERACAO`) VALUES ('" . date('Y/m/d H:i:s') . "', 'Nova introducao dados cobertura');";
                }
                $ligacao = $this->ligar_bd();
                if(mysqli_multi_query($ligacao, $query)) {
                    return $this->render('cobertura', ['model' => $model]);
                } else {
                    echo mysqli_error($ligacao) ."<br>";
                }
            }
        } else {
            return $this->render('cobertura', ['model' => $model]);
        }
    }
    
    
    public function actionDadosestaticos() 
    {
        $model = new UploadForm();        
        if (Yii::$app->request->isPost) {
            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');
            $model->isUploaded = true;
            $file = $model;
            if ($model->upload()) {
                $ligacao = $this->ligar_bd();
                $ficheiro = Yii::getAlias("@webroot") . "/ficheiros/EXCEL_BD_DADOS." . $file->excelFile->getExtension();
                $objPHPExcel = \PHPExcel_IOFactory::load($ficheiro);
                $count = 1;
                $query = "DELETE FROM `unidade_curricular`; DELETE FROM `curso`; DELETE FROM `entidade`; DELETE FROM `ato_profissao`;";
                foreach($objPHPExcel->getWorksheetIterator() as $worksheet) {
                    $worksheetTitle = $worksheet->getTitle();
                    $highestrow = $worksheet->getHighestRow();
                    $query .= "INSERT INTO `" . strtoupper($worksheetTitle) . "` VALUES (";
                    $highestcol = $worksheet->getHighestColumn();
                    $highestcolindex = \PHPExcel_Cell::columnIndexFromString($highestcol);
                    $nrColumns = ord($highestcol) - 64;
                    if($count == 1) {
                        $highestcolindex = 4;
                    } else if($count == 2) {
                        $highestcolindex = 14;
                    } else if($count == 3) {
                        $highestcolindex = 7;
                    } else {
                        $highestcolindex = 8;
                    }
                    for ($row = 2; $row <= $highestrow; ++ $row) {
                        $isNullRow = false;
                        for ($col = 0; $col < $highestcolindex; ++ $col) {
                            $cell = $worksheet->getCellByColumnAndRow($col, $row);
                            $val = $cell->getValue();
                            $dataType = \PHPExcel_Cell_DataType::dataTypeForValue($val);
                            if($dataType == "null") {
                                $isNullRow = true;                               
                            } else {
                                $query .= "'" . mysqli_real_escape_string($ligacao, $val) . "', ";
                            }
                        }
                        if($isNullRow) {
                            
                        } else {
                            $query = substr($query, 0, -2);
                            $query .= "),(";
                        }
                    }
                    $query = substr($query, 0, -3);
                    $query .= ");";
                    $count += 1;
                }
            }
            if(mysqli_multi_query($ligacao, $query)) {
                $query2 = "INSERT INTO `AUDIT_TRAIL` (`DATA_ALTERACAO`, `DESC_ALTERACAO`) VALUES ('". time() ."', 'Nova introducao dados');";
                if(mysqli_query($ligacao, $query2)) {

                } else {
                    echo mysqli_error($ligacao) ."<br>";
                }
            } else {
                echo mysqli_error($ligacao) ."<br>";
            }
            mysqli_close($ligacao);
             return $this->render('dadosestaticos', ['model' => $model]);
        } else {
            return $this->render('dadosestaticos', ['model' => $model]);
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect("../../index.php");
    }
}
