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
                                    <label><input type="checkbox" name="grau[]" value="1">Licenciatura</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="grau[]" value="2">Mestrado Integrado</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="grau[]" value="3">Mestrado</label>
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

            </div>
            <!-- End Tab Panels -->
        </div>

        <!-- Results Section -->
        <div class="content">
            <div class="container">
                <div class="col-md-12">

                    <!-- Classic Heading -->
                    <h4 class="classic-title"><span>Resultados da Pesquisa</span></h4>
                    <div class="row">
                        <div class="col-md-12" style="padding-bottom: 30px">
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
                                if ($designacao_curso) {
                                    if (mysqli_num_rows($designacao_curso) > 0) {
                                        while ($row = mysqli_fetch_array($designacao_curso)) {
                                            echo '<form id="f' . $row['ID_CURSO'] . '" action="curso.php" method="post">';
                                            echo '<a href="javascript:;" onclick="document.getElementById(\'f' . $row['ID_CURSO'] . '\').submit();">';
                                            echo '<div class = "col-md-12 service-box service-icon-left-more">';
                                            echo '<div class = "service-icon">';
                                            echo '<i class = "fa fa-institution icon-medium"></i>';
                                            echo '</div>';
                                            echo '<div class = "service-content">';
                                            echo '<h4>' . $row['NOME'] . '</h4>';
                                            $nome_univ = get_universidade($row['FK_ID_ENTIDADE']);
                                            while ($row2 = mysqli_fetch_array($nome_univ)) {
                                                echo $row2['NOME'];
                                            }
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</a>';
                                            echo '<input type="hidden" name="idcurso" value="' . $row['ID_CURSO'] . '">';
                                            echo '</form>';
                                        }
                                    } else {
                                        echo 'Não existem resultados para a pesquisa efetuada!';
                                    }
                                } else {
                                    echo 'Não existem resultados para a pesquisa efetuada!';
                                }
                            } else {
                                
                            }
                            ?>
                            <!-- End Service Icon 2 -->
                        </div>
                    </div>
                </div>
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