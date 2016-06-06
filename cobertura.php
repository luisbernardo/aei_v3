
<?php
include 'head.php';
include 'funcoes.php';
$info = $_POST['idcurso'];
echo $info;
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
                                        <div class="progress-bar" role="progressbar" data-percentage="
                                        <?php
                                        $cobert_curso = get_cobertura_curso($info);
                                        if (mysqli_num_rows($cobert_curso) > 0) {
                                            while ($row = mysqli_fetch_array($cobert_curso)) {
                                                echo $row['AVALIACAO'];
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
                                $(function() {
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
            echo '{name:"' . $nome . '",y:' . $aval . ', drilldown:"' . $nome . '",color:"#ff4d4d"},';
        }
    }
}
?>


                                                ]
                                            }],
                                        drilldown: {
                                            series: [{
                                                    name: 'ADER',
                                                    id: 'Análise de Domínio e Engenharia de Requisitos',
                                                    color: '#ff4d4d',
                                                    data: [
                                                        [
                                                            '1.1 Caracterização de domínios e levantamento de requisitos informacionais e informáticos',
                                                            50
                                                        ],
                                                        [
                                                            '1.2 Especificação de requisitos de informação na perspetiva do negócio',
                                                            50
                                                        ],
                                                        [
                                                            '1.3 Conceção de sistemas de informação',
                                                            50
                                                        ],
                                                        [
                                                            '1.4 Especificação de requisitos de soluções informáticas',
                                                            50
                                                        ]
                                                    ]
                                                }, {
                                                    name: 'CCSI',
                                                    id: 'Conceção e Construção de Soluções Informáticas',
                                                    color: '#ff4d4d',
                                                    data: [
                                                        [
                                                            '2.1 Análise e estimativa de esforço dos requisitos de soluções informáticas',
                                                            50
                                                        ],
                                                        [
                                                            '2.2 Conceção de soluções informáticas',
                                                            50
                                                        ],
                                                        [
                                                            '2.3 Construção e manutenção de soluções informáticas',
                                                            50
                                                        ],
                                                        [
                                                            '2.4 Configuração, integração e entrega de soluções informáticas',
                                                            50
                                                        ]
                                                    ]
                                                }, {
                                                    name: 'TVSI',
                                                    id: 'Teste e Validação de Soluções Informáticas',
                                                    color: '#ff4d4d',
                                                    data: [
                                                        [
                                                            '3.1 Planeamento de teste e validação de soluções informáticas',
                                                            50
                                                        ],
                                                        [
                                                            '3.2 Análise e conceção de testes de soluções informáticas',
                                                            50
                                                        ],
                                                        [
                                                            '3.3 Implementação e execução de testes de soluções informáticas',
                                                            50
                                                        ]
                                                    ]
                                                }, {
                                                    name: 'PEITI',
                                                    id: 'Planeamento e Exploração de Infra-Estruturas de Tecnologias de Informação',
                                                    color: '#ff4d4d',
                                                    data: [
                                                        [
                                                            '4.1 Análise e estimativa de esforço dos requisitos de infraestruturas de computação, comunicação e serviços',
                                                            50
                                                        ],
                                                        [
                                                            '4.2 Conceção de infraestruturas de computação, comunicações e serviços',
                                                            50
                                                        ],
                                                        [
                                                            '4.3 Configuração, integração e entrega de infraestruturas de computação, comunicações e serviços',
                                                            50
                                                        ],
                                                        [
                                                            '4.4 Gestão e manutenção de infraestruturas de computação, comunicações e serviços',
                                                            50
                                                        ]
                                                    ]
                                                }, {
                                                    name: 'GPSI',
                                                    id: 'Gestão de Projectos de Sistemas de Informação',
                                                    color: '#ff4d4d',
                                                    data: [
                                                        [
                                                            '5.1 Conceção de planos de gestão de projetos de sistemas de informação',
                                                            50
                                                        ],
                                                        [
                                                            '5.2 Gestão de recursos e stakeholders em projetos de sistemas de informação',
                                                            50
                                                        ],
                                                        [
                                                            '5.3 Gestão de risco em projetos de sistemas de informação',
                                                            50
                                                        ],
                                                        [
                                                            '5.4 Monitorização, controlo e reporte na evolução de projetos de sistemas de informação',
                                                            50
                                                        ],
                                                        [
                                                            '5.5 Encerramento de projetos de sistemas de informação',
                                                            50
                                                        ]
                                                    ]
                                                }, {
                                                    name: 'PASI',
                                                    id: 'Planeamento e Auditoria de Sistemas de Informação',
                                                    color: '#ff4d4d',
                                                    data: [
                                                        [
                                                            '6.1 Conceção de estratégias de sistemas de informação',
                                                            50
                                                        ],
                                                        [
                                                            '6.2 Implementação de planos de governação de sistemas de informação',
                                                            50
                                                        ]
                                                    ]
                                                }]
                                        }
                                    });
                                });

                            </script>
                            <div id="conteudografico" style="max-width: 65%; height: 55%; margin: 0 auto;"></div>
                        </div>

                    </div>
                    <div class="hr5" style=" margin-top:45px; margin-bottom:40px;"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Cobertura por Unidade Curricular</span></h4>



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