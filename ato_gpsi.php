<?php
include 'head.php';
include 'funcoes.php';
$ato = get_info_ato($_POST['idato']);

if (mysql_num_rows($ato) > 0) {
    $row = mysql_fetch_array($ato)
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
                            <h2><?php echo $row['DESIGNACAO']; ?></h2>
                            <p></p>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumbs">
                                <li><a href="index.php">Ínicio</a></li>
                                <li><a href="atos.php">Atos</a></li>
                                <li><?php echo $row['SIGLA']; ?></li>
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
                                <h4 class="classic-title"><span>Descrição</span></h4>

                                <!-- Some Text -->
                                <p> <?php echo $row['DESCRICAO']; ?> </p>    
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="hr1" style="margin-bottom:50px;"></div>

                        <!-- Start Grupos de Atos Content -->
                        <div class="container">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12">

                                        <h4 class="classic-title"><span>Grupos de Atos</span></h4>

                                        <!-- Accordion -->
                                        <?php
                                        $designacao_ato_filho = get_info_ato_filho($row['ID_ATO_PROFISSAO']);
                                        if (mysql_num_rows($designacao_ato_filho) > 0) {
                                            $contador = 1;
                                            while ($row2 = mysql_fetch_array($designacao_ato_filho)) {
                                                echo '<div class = "panel-group" id = "accordion">';
                                                echo '<div class="panel panel-default">';
                                                echo '<div class = "panel-heading">';
                                                echo '<h4 class = "panel-title">';
                                                echo '<a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse-' . $contador . '">';
                                                echo '<i class = "fa fa-angle-up control-icon"></i>';
                                                echo $row2['DESIGNACAO'];
                                                echo '</a>';
                                                echo '</h4>';
                                                echo '</div>';
                                                echo '<div id = "collapse-' . $contador . '" class = "panel-collapse collapse in">';
                                                $atos_filho = get_atos_filho($row2['NUMERACAO_ATO']);
                                                while ($row3 = mysql_fetch_array($atos_filho)) {
                                                    echo '<div class = "panel-body">> ' . $row3['DESIGNACAO'] . '</div>';
                                                }
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                                $contador += 1;
                                            }
                                        }
                                        ?>
                                        <!-- End Accordion 1 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Grupos de Atos Content -->                    

                        <!-- Divider -->
                        <div class="hr1" style="margin-bottom:50px;"></div>

                        <!-- Start Cobertura Content -->
                        <div class="row">

                            <div class="col-md-12">

                                <!-- Classic Heading -->
                                <h4 class="classic-title"><span>Coberturas</span></h4>

                                <div class="skill-shortcode">
                                    <?php
                                    $maior_cobertura = get_maior_cobertura($row['ID_ATO_PROFISSAO']);
                                    if (mysql_num_rows($maior_cobertura) > 0) {
                                        while ($row2 = mysql_fetch_array($maior_cobertura)) {
                                            $nome_curso = get_curso($row2['ID_CURSO']);
                                            $row3 = mysql_fetch_array($nome_curso);
                                            echo '<div class = "skill">';
                                            echo '<p>' . $row3['NOME'] . '<p>';
                                            echo '<div class = "progress">';
                                            echo '<div class = "progress-bar" role = "progressbar" data-percentage = ' . $row2['AVALIACAO'] . '>';
                                            echo "<span class = 'progress-bar-span'>" . $row2['AVALIACAO'] . "%</span>";
                                            echo '<span class = "sr-only">80% Complete</span>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo ' </div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <?php
} else {
    // redirecionar para a pagina dos atos
}
?>