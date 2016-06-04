<?php

namespace app\controllers;

include 'php\PHPExcel\Classes\PHPExcel.php';

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadForm;
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
        return $this->render('descarregarcobertura');
    }
    
    public function ligar_bd()
    {
        $link = mysqli_connect("localhost", "root", "", "ptsi");
        return $link;
    }
    
    public function actionCobertura() {
        $model = new UploadForm();        
        if (Yii::$app->request->isPost) {
            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');
            $model->isUploaded = true;
            $file = $model;
            if ($model->upload()) {
                $ficheiro = Yii::getAlias("@webroot");
                $objPHPExcel = \PHPExcel_IOFactory::load($ficheiro);
                foreach($objPHPExcel->getWorksheetIterator() as $worksheet) {
                    $worksheetTitle = $worksheet->getTitle();
                    $highestrow = $worksheet->getHighestRow();
                    $highestcol = $worksheet->getHighestColumn();
                    $highestcolindex = \PHPExcel_Cell::columnIndexFromString($highestcol);
                    $nrColumns = ord($highestcol) - 64;
                    for ($row = 0; $row <= $highestrow; ++ $row) {
                        for ($col = 0; $col < $highestcolindex; ++ $col) {
                            $cell = $worksheet->getCellByColumnAndRow($col, $row);
                            $val = $cell->getValue();
                            $dataType = \PHPExcel_Cell_DataType::dataTypeForValue($val);
                        }
                    }
                }
            }
            return $this->render('cobertura', ['model' => $model]);
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
                $ficheiro = Yii::getAlias("@webroot") . "/ficheiros/EXCEL_BD_DADOS." . $file->excelFile->getExtension();
                $objPHPExcel = \PHPExcel_IOFactory::load($ficheiro);
                $count = 1;
                $query = "DELETE FROM `unidade_curricular`; DELETE FROM `curso`; DELETE FROM `entidade`;";
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
                        $highestcolindex = 12;
                    } else if($count == 3) {
                        $highestcolindex = 7;
                    } else {
                        $highestcolindex = 7;
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
                                $query .= "'" . mysql_real_escape_string($val) . "', ";
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
            $ligacao = $this->ligar_bd();
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

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
