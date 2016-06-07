<?php
include 'head.php';
include 'funcoes.php';

if(isset($_POST['idato'])) {
    $info = get_info_ato($_POST['idato']);
    $assoc = mysqli_fetch_assoc($info);
?>
<body>
    <!-- Container -->
    <div id="container">
        <?php include 'header.php';?>

        <!-- Start Page Banner -->
        <div class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2><?php echo $assoc['DESIGNACAO']; ?></h2>
                        <p></p>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="index.php">Ínicio</a></li>
                            <li><a href="atos.php">Atos</a></li>
                            <li><?php echo $assoc['SIGLA']; ?></li>
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
                            <p> <?php echo $assoc['DESCRICAO']; ?> </p>    
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
                                    $designacao_ato_filho = get_info_ato_filho($assoc['ID_ATO_PROFISSAO']);
                                    if (mysqli_num_rows($designacao_ato_filho) > 0) {
                                    $contador = 1;
                                    while ($assoc2 = mysqli_fetch_array($designacao_ato_filho)) {
                                    echo '<div class = "panel-group" id = "accordion">';
                                    echo '<div class="panel panel-default">';
                                    echo '<div class = "panel-heading">';
                                    echo '<h4 class = "panel-title">';
                                    echo '<a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse-' . $contador . '">';
                                    echo '<i class = "fa fa-angle-up control-icon"></i>';
                                    echo $assoc2['DESIGNACAO'];
                                    echo '</a>';
                                    echo '</h4>';
                                    echo '</div>';
                                    echo '<div id = "collapse-' . $contador . '" class = "panel-collapse collapse in">';
                                    $atos_filho = get_atos_filho($assoc2['NUMERACAO_ATO']);
                                    while ($assoc3 = mysqli_fetch_array($atos_filho)) {
                                    echo '<div class = "panel-body">> ' . $assoc3['DESIGNACAO'] . '</div>';
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
                                $maior_cobertura = get_maior_cobertura($assoc['ID_ATO_PROFISSAO']);
                                if (mysqli_num_rows($maior_cobertura) > 0) {
                                while ($assoc2 = mysqli_fetch_array($maior_cobertura)) {
                                $nome_curso = get_curso($assoc2['ID_CURSO']);
                                $assoc3 = mysqli_fetch_array($nome_curso);
                                echo '<div class = "skill">';
                                echo '<p>' . $assoc3['NOME'] . '<p>';
                                echo '<div class = "progress">';
                                if($assoc2['AVALIACAO'] <= 25) {
                                    $class = "red";
                                } else if ($assoc2['AVALIACAO'] <=50) {
                                    $class = "yellow";
                                } else if ($assoc2['AVALIACAO'] <=75) {
                                    $class = "orange";
                                } else {
                                    $class = "green";
                                }
                                echo '<div class = "progress-bar '.$class.'" role = "progressbar" data-percentage = ' . $assoc2['AVALIACAO'] . '>';
                                echo "<span class = 'progress-bar-span'>" . $assoc2['AVALIACAO'] . "%</span>";
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
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>
<?php
} else {
    //redirecionar para atos
}
?>