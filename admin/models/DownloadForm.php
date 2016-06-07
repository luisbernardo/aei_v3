<?php

namespace app\models;

use yii\base\Model;
use yii\BaseYii;

class DownloadForm extends Model
{
    public $cursos;
    public $isDownloaded;
    
    public function rules()
    {
        return [];
    }
    
    public function ligar_bd() {
        $link = mysqli_connect("localhost", "root", "", "ptsi");
        mysqli_query($link,"SET NAMES utf8");
        mysqli_set_charset($link, "uft8");
        return $link;
    }
    
    public function makeNewExcel($curso) {
        $sigla = \app\models\Curso::findOne(["ID_CURSO" => $curso])['SIGLA'];
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("PTSIE25");
        $objPHPExcel->getProperties()->setTitle($sigla."_Aval_Atos_UC.xlsx");
        $folha = $objPHPExcel->setActiveSheetIndex(0);
        $folha->setTitle("Cobertura_UC");
        $folha->mergeCells("A1:B2");
        $folha->setCellValue("A1","Atos de Profissão");
        $folha->setCellValue("A3","ID");
        $folha->setCellValue("B3","Designação");
        
        $styleNivel1 = array(
                        'font'  => array(
                        'bold'  => true,
                        'italic' => true,
                        'color' => array('rgb' => 'ff1a1a')
                        ));
        
        $styleNivel2 = array(
                        'font'  => array(
                        'italic'  => true,
                        'color' => array('rgb' => '3385ff')
                        ));
        
        $ucs = \app\models\UnidadeCurricular::findAll(["ID_CURSO" => $curso]);
        $activeCol = 2;
        foreach($ucs as $uc) {
            $activeRow = 2;
            for($activeRow; $activeRow < 4; $activeRow++) {
                if($activeRow == 2) {
                    $folha->setCellValueByColumnAndRow($activeCol, $activeRow, $uc['ID_UNIDADE_CURRICULAR']);
                } else if ($activeRow==3) {
                    $folha->setCellValueByColumnAndRow($activeCol, $activeRow, $uc['NOME']);
                }
            }
            $activeCol++;
        }
        $maxcol = $folha->getHighestColumn();
        $folha->mergeCells("C1:".$maxcol."1");
        $folha->setCellValue("C1",$curso);
        
        $atos = \app\models\AtoProfissao::find()->all();
        $activeRow = 4;
        $highestcolindex = \PHPExcel_Cell::columnIndexFromString($maxcol);
        
        $maiorcolunaindex = $highestcolindex;
        
        foreach($atos as $ato) {
            if($ato['ID_ATO_PROFISSAO']==0) {
                
            } else {
                $activeCol = 0;
                for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
                    $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
                    if($activeCol == 0) {
                        $folha->setCellValueByColumnAndRow($activeCol,$activeRow,$ato['ID_ATO_PROFISSAO']);
                    } else if($activeCol == 1) {
                        $folha->setCellValueByColumnAndRow($activeCol,$activeRow,$ato['DESIGNACAO']);
                    } else if($ato['NIVEL']==1) {
                        $celula = $folha->getCellByColumnAndRow($activeCol, $activeRow);
                        $coord = $celula->getCoordinate();
                        $folha->getStyle($coord)->applyFromArray($styleNivel1);
                    } else if($ato['NIVEL']==2) {
                        $celula = $folha->getCellByColumnAndRow($activeCol, $activeRow);
                        $coord = $celula->getCoordinate();
                        $folha->getStyle($coord)->applyFromArray($styleNivel2);                        
                    } else {
                        $folha->setCellValueByColumnAndRow($activeCol, $activeRow, "0");
                    }
                }
                $activeRow++;
            }
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 5, "=COUNTIF(".$coluna."6:".$coluna."10,\">0\")*100/5");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 11, "=COUNTIF(".$coluna."12:".$coluna."15,\">0\")*100/4");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 16, "=COUNTIF(".$coluna."17:".$coluna."20,\">0\")*100/4");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 21, "=COUNTIF(".$coluna."22:".$coluna."25,\">0\")*100/4");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 27, "=COUNTIF(".$coluna."28:".$coluna."29,\">0\")*100/2");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 30, "=COUNTIF(".$coluna."31:".$coluna."35,\">0\")*100/5");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 36, "=COUNTIF(".$coluna."37:".$coluna."40,\">0\")*100/4");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 41, "=COUNTIF(".$coluna."42:".$coluna."44,\">0\")*100/3");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 46, "=COUNTIF(".$coluna."47:".$coluna."48,\">0\")*100/2");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 49, "=COUNTIF(".$coluna."50:".$coluna."52,\">0\")*100/3");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 53, "=COUNTIF(".$coluna."54:".$coluna."56,\">0\")*100/3");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 58, "=COUNTIF(".$coluna."59:".$coluna."61,\">0\")*100/3");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 62, "=COUNTIF(".$coluna."63:".$coluna."66,\">0\")*100/4");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 67, "=COUNTIF(".$coluna."68:".$coluna."70,\">0\")*100/3");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 71, "=COUNTIF(".$coluna."72:".$coluna."74,\">0\")*100/3");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 76, "=COUNTIF(".$coluna."77:".$coluna."78,\">0\")*100/2");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 79, "=COUNTIF(".$coluna."80:".$coluna."81,\">0\")*100/2");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 82, "=COUNTIF(".$coluna."83:".$coluna."86,\">0\")*100/4");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 87, "=COUNTIF(".$coluna."88:".$coluna."91,\">0\")*100/4");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 92, "=COUNTIF(".$coluna."93:".$coluna."94,\">0\")*100/2");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 96, "=COUNTIF(".$coluna."97:".$coluna."100,\">0\")*100/4");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 101, "=COUNTIF(".$coluna."102:".$coluna."104,\">0\")*100/3");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 4, "=SUM(".$coluna."5,".$coluna."11,".$coluna."16,".$coluna."21)*100/400");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 4, "=SUM(".$coluna."5,".$coluna."11,".$coluna."16,".$coluna."21)*100/400");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 26, "=SUM(".$coluna."27,".$coluna."30,".$coluna."36,".$coluna."41)*100/400");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 45, "=SUM(".$coluna."46,".$coluna."49,".$coluna."53)*100/300");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 57, "=SUM(".$coluna."58,".$coluna."62,".$coluna."67,".$coluna."71)*100/400");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 75, "=SUM(".$coluna."76,".$coluna."79,".$coluna."82,".$coluna."86,".$coluna."92)*100/500");
        }
        
        $activeCol=2;
        for($activeCol; $activeCol < $highestcolindex; $activeCol++) {
            $coluna = \PHPExcel_Cell::stringFromColumnIndex($activeCol);
            $folha->setCellValueByColumnAndRow($activeCol, 95, "=SUM(".$coluna."96,".$coluna."101)*100/200");
        }
        
        $maiorcoluna = \PHPExcel_Cell::stringFromColumnIndex($maiorcolunaindex);
        $objWorksheet = $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $folha = $objPHPExcel->getActiveSheet();
        
        $folha->setCellValueByColumnAndRow(0,1,"SOMA");
        $folha->setCellValueByColumnAndRow(1,1,"%GRUPO");
        $folha->setCellValueByColumnAndRow(2,1,"TOTAL COBERTURA");
        $folha->setCellValueByColumnAndRow(3,1,$curso);
        
        $folha->setCellValueByColumnAndRow(1,2,"=SUM(B3,B9,B14,B19)*100/400");
        $folha->setCellValueByColumnAndRow(1,3,"=COUNTIF(A4:A8,\">=\"&1)*100/5");
        $folha->setCellValueByColumnAndRow(1,9,"=COUNTIF(A10:A13,\">=\"&1)*100/4");
        $folha->setCellValueByColumnAndRow(1,14,"=COUNTIF(A15:A18,\">=\"&1)*100/4");
        $folha->setCellValueByColumnAndRow(1,19,"=COUNTIF(A20:A23,\">=\"&1)*100/4");
        
        $folha->setCellValueByColumnAndRow(1,24,"=SUM(B25,B28,B34,B39)*100/400");
        $folha->setCellValueByColumnAndRow(1,25,"=COUNTIF(A26:A27,\">=\"&1)*100/2");
        $folha->setCellValueByColumnAndRow(1,28,"=COUNTIF(A29:A33,\">=\"&1)*100/5");
        $folha->setCellValueByColumnAndRow(1,34,"=COUNTIF(A35:A38,\">=\"&1)*100/4");
        $folha->setCellValueByColumnAndRow(1,39,"=COUNTIF(A40:A42,\">=\"&1)*100/3");
        
        $folha->setCellValueByColumnAndRow(1,43,"=SUM(B44,B47,B51)*100/300");
        $folha->setCellValueByColumnAndRow(1,44,"=COUNTIF(A45:A46,\">=\"&1)*100/2");
        $folha->setCellValueByColumnAndRow(1,47,"=COUNTIF(A48:A50,\">=\"&1)*100/3");
        $folha->setCellValueByColumnAndRow(1,51,"=COUNTIF(A52:A54,\">=\"&1)*100/3");
        
        $folha->setCellValueByColumnAndRow(1,55,"=SUM(B56,B60,B65,B69)*100/400");
        $folha->setCellValueByColumnAndRow(1,56,"=COUNTIF(A57:A59,\">=\"&1)*100/3");
        $folha->setCellValueByColumnAndRow(1,60,"=COUNTIF(A61:A64,\">=\"&1)*100/4");
        $folha->setCellValueByColumnAndRow(1,65,"=COUNTIF(A66:A68,\">=\"&1)*100/3");
        $folha->setCellValueByColumnAndRow(1,69,"=COUNTIF(A70:A72,\">=\"&1)*100/3");
        
        $folha->setCellValueByColumnAndRow(1,73,"=SUM(B74,B77,B80,B85,B90)*100/500");
        $folha->setCellValueByColumnAndRow(1,74,"=COUNTIF(A75:A76,\">=\"&1)*100/2");
        $folha->setCellValueByColumnAndRow(1,77,"=COUNTIF(A78:A79,\">=\"&1)*100/2");
        $folha->setCellValueByColumnAndRow(1,80,"=COUNTIF(A81:A84,\">=\"&1)*100/4");
        $folha->setCellValueByColumnAndRow(1,85,"=COUNTIF(A86:A89,\">=\"&1)*100/4");
        $folha->setCellValueByColumnAndRow(1,90,"=COUNTIF(A91:A92,\">=\"&1)*100/2");
        
        $folha->setCellValueByColumnAndRow(1,93,"=SUM(B94,B99)*100/200");
        $folha->setCellValueByColumnAndRow(1,94,"=COUNTIF(A95:A98,\">=\"&1)*100/4");
        $folha->setCellValueByColumnAndRow(1,99,"=COUNTIF(A100:A102,\">=\"&1)*100/3");
        
        $linhas = array(4,5,6,7,8,10,11,12,13,15,16,17,18,20,21,22,23,26,27,
                        29,30,31,32,33,35,36,37,38,40,41,42,45,46,
                        48,49,50,52,53,54,57,58,59,61,62,63,64,66,
                        67,68,70,71,72,75,76,78,79,81,82,83,84,86,
                        87,88,89,91,92,95,96,97,98,100,101,102);
        
        foreach($linhas as $linha) {
            $folha->setCellValueByColumnAndRow(0,$linha,"=COUNTIF(Cobertura_UC!C".$linha.":".$maiorcoluna."".$linha.",\">=\"&1)");
        }
        
        $folha->setCellValueByColumnAndRow(2,2,"=SUM(B2,B24,B43,B55,B73,B93)/600*100");
          
        $objPHPExcel->getSheet(0)->getProtection()->setSheet(true);
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C4:".$maiorcoluna."10")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C12:".$maiorcoluna."15")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C17:".$maiorcoluna."20")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C22:".$maiorcoluna."25")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C28:".$maiorcoluna."29")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C31:".$maiorcoluna."35")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C37:".$maiorcoluna."40")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C42:".$maiorcoluna."44")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C47:".$maiorcoluna."48")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C50:".$maiorcoluna."52")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C54:".$maiorcoluna."56")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C59:".$maiorcoluna."61")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C63:".$maiorcoluna."66")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C68:".$maiorcoluna."70")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C72:".$maiorcoluna."74")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C77:".$maiorcoluna."78")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C80:".$maiorcoluna."81")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C83:".$maiorcoluna."86")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C88:".$maiorcoluna."91")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C93:".$maiorcoluna."94")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("C94:".$maiorcoluna."97")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
        
        $objPHPExcel->getSheet(0)
            ->getStyle("A99:".$maiorcoluna."101")
            ->getProtection()->setLocked(
                \PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
            );
               
        $objPHPExcel->getSecurity()->setLockWindows(true);
        $objPHPExcel->getSecurity()->setLockStructure(true);
        $objPHPExcel->getSheet(1)->getProtection()->setSheet(true);
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(BaseYii::getAlias("@webroot") . '/ficheirosCobertura/'.$sigla."_Aval_Atos_UC.xlsx");
    }
    

    public function download() {
        $zip = new \ZipArchive();
        $zipname = "Cobertura Cursos.zip";
        $zip->open($zipname, \ZIPARCHIVE::CREATE | \ZIPARCHIVE::OVERWRITE);
        foreach($this->cursos as $curso) {
            $sigla = \app\models\Curso::findOne(["ID_CURSO" => $curso])['SIGLA'];
            $fullpath = BaseYii::getAlias("@webroot") . '/ficheirosCobertura/'.$sigla."_Aval_Atos_UC.xlsx";
            if(file_exists($fullpath)) {
                $zip->addFromString(basename($fullpath),  file_get_contents($fullpath));
            } else {
                $this->makeNewExcel($curso);
                $zip->addFromString(basename($fullpath),  file_get_contents($fullpath));
            }
        }
        $zip->close();
        header("Content-type:application/xlsx");
        header('Content-Disposition: attachment; filename="'.$zipname.'"'); 
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);
    }
}