
<?php
include 'head.php';
include 'funcoes.php';
$info = $_POST['idcurso'];
?>

<body>

    <!-- Container -->
    <div id="container">

        <?php include 'header.php'; ?>

        <!-- Start Page Banner -->
        <div class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $info_curso = get_curso($info);
                        if (mysqli_num_rows($info_curso) > 0) {
                            while ($row = mysqli_fetch_array($info_curso)) {
                                echo '<h2>Cobertura de ' . $row['NOME'] . '</h2>';
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="index.php">Ínicio</a></li>
                            <li>Cobertura</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->


        <!-- Start Content -->
        <div id="content">
            <div class="container">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Cobertura Total do Curso</span></h4>
                            <br>
                            <div class="skill-shortcode">
                                <div class="skill">
                                    <div class="progress">
                                        
                                        <?php
                                        $cobert_curso = get_cobertura_curso($info);
                                        if (mysqli_num_rows($cobert_curso) > 0) {
                                            while ($row = mysqli_fetch_array($cobert_curso)) {
                                                if($row['AVALIACAO'] <= 25) {
                                                    $class = "red";
                                                } else if ($row['AVALIACAO'] <=50) {
                                                    $class = "yellow";
                                                } else if ($row['AVALIACAO'] <=75) {
                                                    $class = "orange";
                                                } else {
                                                    $class = "green";
                                                } 
                                                echo '<div class="progress-bar '.$class.'" role="progressbar" data-percentage="'.$row['AVALIACAO'];
                                            }
                                        }
                                        ?>">
                                            <span class="progress-bar-span"><?php
                                                $cobert_curso = get_cobertura_curso($info);
                                                if (mysqli_num_rows($cobert_curso) > 0) {
                                                    while ($row = mysqli_fetch_array($cobert_curso)) {
                                                        echo $row['AVALIACAO'];
                                                        echo " %";
                                                    }
                                                }
                                                ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Atos Section -->
                    <div class="hr5" style=" margin-top:45px; margin-bottom:40px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Cobertura por Atos</span></h4>

                            <script type="text/javascript">
                                $(function () {
                                    // Create the chart
                                    $('#conteudografico').highcharts({
                                        chart: {
                                            type: 'column'
                                        },
                                        title: {
                                            text: ''
                                        },
                                        subtitle: {
                                            text: 'Clique sobre as colunas para ver Ato.'
                                        },
                                        credits: {
                                            enabled: false
                                        },
                                        xAxis: {
                                            type: 'category',
                                        },
                                        yAxis: {
                                            min: 0,
                                            max: 100,
                                            title: {
                                                text: 'Percentagem Total de Cobertura'
                                            }

                                        },
                                        legend: {
                                            enabled: false
                                        },
                                        plotOptions: {
                                            series: {
                                                borderWidth: 0,
                                                dataLabels: {
                                                    enabled: true,
                                                    format: '{point.y:.1f}%',
                                                }
                                            }
                                        },
                                        tooltip: {
                                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                                        },
                                        series: [{
                                                name: 'Atos',
                                                colorByPoint: true,
                                                data: [
<?php
$cobato = get_cobertura_porato($info);
if (mysqli_num_rows($cobato) > 0) {
    while ($row = mysqli_fetch_array($cobato)) {
        $aval = $row['AVALIACAO'];
        $nomecurso = get_info_ato($row['ID_ATO_PROFISSAO']);
        while ($row2 = mysqli_fetch_array($nomecurso)) {
            $nome = $row2['DESIGNACAO'];
            if($aval <= 25) {
                echo '{name:"' . $nome . '",y:' . $aval . ', drilldown:"' . $nome . '",color:"#e74c3c"},';
            } else if ($aval <=50) {
                echo '{name:"' . $nome . '",y:' . $aval . ', drilldown:"' . $nome . '",color:"#f39c12"},';
            } else if ($aval <=75) {
                echo '{name:"' . $nome . '",y:' . $aval . ', drilldown:"' . $nome . '",color:"#f1c40f"},';
            } else {
                echo '{name:"' . $nome . '",y:' . $aval . ', drilldown:"' . $nome . '",color:"#2ecc71"},';
            }
        }
    }
}
?>


                                                ]
                                            }],
                                        drilldown: {
                                            series:
<?php
$atos1 = get_atos_nivel1();
if (mysqli_num_rows($atos1) > 0) {
    $dados = "[";
    while ($row = mysqli_fetch_array($atos1)) {
        $descato = $row['DESIGNACAO'];
        $sigla = $row['SIGLA'];
        $idAto = $row['ID_ATO_PROFISSAO'];
        $atosFilho = get_atos_filhos($idAto);
        $dados .= "{";
        $dados .= "name: '" . $sigla . "', ";
        $dados .= "id: '" . $descato . "', ";
        $cobatocurso = get_cobertura_curso_ato($info, $idAto);
        if(mysqli_num_rows($cobatocurso) > 0) {
            $aval = mysqli_fetch_array($cobatocurso)['AVALIACAO'];
        }
        if($aval <= 25) {
                $dados .= "color: '#e74c3c', ";
            } else if ($aval <=50) {
                $dados .= "color: '#f39c12', ";
            } else if ($aval <=75) {
                $dados .= "color: '#f1c40f', ";
            } else {
                $dados .= "color: '#27ae60', ";
            }
        
        $dados .= "data: [";
        if (mysqli_num_rows($atosFilho) > 0) {
            while ($row3 = mysqli_fetch_array($atosFilho)) {
                $idAtoFilho = $row3['ID_ATO_PROFISSAO'];
                $numeracao = $row3['NUMERACAO_ATO'];
                $descAtoFilho = $row3['DESIGNACAO'];
                $cobertura = get_cobertura_curso_ato($info, $idAtoFilho);
                $valor = mysqli_fetch_array($cobertura)['AVALIACAO'];
                $dados .= "[";
                $dados .= "'".$numeracao . " " . $descAtoFilho . "', ";
                $dados .= $valor;
                $dados .= "],";
            }
            $dados = substr($dados, 0, -1);
        }
        $dados .= "],";
        $dados = substr($dados, 0, -1);
        $dados .= "},";
    }
    $dados = substr($dados, 0, -1);
    $dados .= "]";
    echo $dados;
}
?>

                                        }
                                    });
                                });

                            </script>
                            <div id="conteudografico" style="max-width: 65%; height: 55%; margin: 0 auto;"></div>
                        </div>

                    </div>
                    <!-- .container -->
                </div>
                <!-- End Atos Section -->

            </div>
        </div>

        <!-- End content -->

        <?php include 'footer.php'; ?>

    </div>
    <!-- End Container -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>



    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>