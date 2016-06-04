<?php
include 'head.php';
include 'funcoes.php';
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
                        <h2>Pesquisa</h2>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="index.php">Ínicio</a></li>
                            <li>Cursos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->



        <!-- Start Content -->
        <div id="content">
            <div class="container">

                <!-- Page Content -->
                <div class="col-md-12 page-content">

                    <div class="tabs-section">

                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-1" data-toggle="tab"></i>Pesquisa Avançada</a></li>
                            <li><a href="#tab-2" data-toggle="tab"></i>Pesquisa por Ato(s)</a></li>
                        </ul>

                        <!-- Tab panels -->
                        <div class="tab-content">
                            <!-- Tab Content 1 -->
                            <div class="tab-pane fade in active" id="tab-1">

                                <form id="form1" action="cursos.php" method="post">
                                    <div class="row" style="padding-bottom: 1%">
                                        <div class="col-md-12">
                                            <!-- Classic Heading -->
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <h5 class="classic-title" style="margin-bottom: 0px;" >Localização</h5>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Aveiro">Aveiro</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Braga">Braga</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Bragança">Bragança</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Castelo Branco">Castelo Branco</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Coimbra">Coimbra</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Évora">Évora</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Guarda">Guarda</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Leiria">Leiria</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Lisboa">Lisboa</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Portalegre">Portalegre</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Santarém">Santarém</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Viana do Castelo">Viana do Castelo</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Vila Real">Vila Real</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Viseu">Viseu</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Açores">Açores</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="cidade[]" value="Madeira">Madeira</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 1%">
                                        <div class="col-md-6 col-sm-6">
                                            <h5 class="classic-title" style="margin-bottom: 0px;">Ciclo de estudos</h5>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="grau[]" value="Licenciatura">Licenciatura</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="grau[]" value="Mestrado Integrado">Mestrado Integrado</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="grau[]" value="Mestrado">Mestrado</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <h5 class="classic-title" style="margin-bottom: 0px;">Regime</h5>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="regime[]" value="Normal">Normal</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="regime[]" value="Pós-Laboral">Pós-Laboral</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit" class="btn-system btn-large"  style="margin-bottom: 5%">Pesquisar</button>                      
                                </form>

                            </div>
                            <!-- Tab Content 2 -->
                            <div class="tab-pane fade" id="tab-2">

                                <form id="form2" action="cursos.php" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Classic Heading -->

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- Classic Heading -->
                                                    <div class="row">

                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="grupoato">Análise de Domínio e Engenharia de Requisitos</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="grupoato">Conceção e Construção de Soluções Informáticas</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="grupoato">Teste e Validação de Soluções Informáticas</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="grupoato">Planeamento e Exploração de Infra-Estruturas de Tecnologias de Informação</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="grupoato">Gestão de Projectos de Sistemas de Informação</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="grupoato">Planeamento e Auditoria de Sistemas de Informação</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="grupoato">Investigação, Ensino e Normalização</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" name="grupoato">Manutenção e Gestão de Ativos</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit" class="btn-system btn-large">Pesquisar</button>
                                </form>
                            </div>
                        </div>
                        <!-- End Tab Panels -->
                    </div>
                   <div class="hr1" style="margin-bottom:50px;"></div>
                    <div class="col-md-12">

                        <!-- Classic Heading -->
                        <h4 class="classic-title"><span>Resultados da Pesquisa</span></h4>
                        <div class="row">
                            <!-- Start Service Icon 2 -->
                            <?php
                            if (isset($_POST['cidade']) || isset($_POST['grau']) || isset($_POST['regime'])) {
                                $cidade = array();
                                $grau = array();
                                $regime = array();
                                if (isset($_POST['cidade'])) {
                                    $cidade = $_POST['cidade'];
                                }
                                if (isset($_POST['grau'])) {
                                    $grau = $_POST['grau'];
                                }
                                if (isset($_POST['regime'])) {
                                    $regime = $_POST['regime'];
                                }
                                $designacao_curso = get_curso_pesquisa($cidade, $grau, $regime);
                                if (mysql_num_rows($designacao_curso) > 0) {
                                    while ($row = mysql_fetch_array($designacao_curso)) {
                                        echo '<div class = "col-md-12 service-box service-icon-left-more">';
                                        echo '<div class = "service-icon">';
                                        echo '<form id="form3" action="curso.php" method="post">';
                                        echo '<a href="javascript:;" onclick="document.getElementById("form3").submit();">';
                                        echo '<i class = "fa fa-institution icon-medium"></i>';
                                        echo '</div>';
                                        echo '<div class = "service-content">';
                                        echo '<h4>' . $row['NOME'] . '</h4>';
                                        $nome_univ = get_universidade($row['FK_ID_ENTIDADE']);
                                        while ($row2 = mysql_fetch_array($nome_univ)) {
                                            echo $row2['NOME'];
                                        }
                                        echo '</div>';
                                        echo '</a>';
                                        echo '</div>';
                                        echo '<input type="hidden" name="idcurso" value="'.$row['ID_CURSO'].'">';
                                        echo '</form>';
                                    }
                                }
                            } else {
                                
                            }
                            ?>
                            <!-- End Service Icon 2 -->
                        </div>
                    </div>
                </div>
                <!-- End Page Content -->
            </div>
        </div>
    </div>
    <!-- End Content -->

    <?php include 'footer.php'; ?>

</div>
<!-- End Container -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>


<script type="text/javascript" src="js/script.js"></script>

</body>

</html>