<!-- Start Header Section -->
<div class="hidden-header"></div>
<header class="clearfix">

    <!-- Start  Logo & Naviagtion  -->
    <div class="navbar navbar-default navbar-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand" href="index.php">
                    <img alt="" style="max-height:35px" src="images/logo.png">
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <!-- Start Navigation List -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Ínicio</a>

                    </li>
                    <li>
                        <a href="estatistica.php">Estatísticas</a>
                    </li>
                    <li>
                        <a href="atos.php">Atos de Profissão</a>
                    </li>
                    <li>
                        <a href="cursos.php">Cursos</a>
                    </li>
                    <li>
                        <a href="contact.php">Contactos</a>
                    </li>
                </ul>
                <!-- End Navigation List -->
            </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
            <li>
                <a href="index.php">Ínicio</a>
            </li>
            <li>
                <a href="estatistica.php">Estatísticas</a>
            </li>
            <li>
                <a href="atos.php">Atos</a>
                <ul class="dropdown">
                    <?php
                        require_once('funcoes.php');

                        $grupos_atos = get_grupo_ato();
                        if(mysqli_num_rows($grupos_atos) > 0) {
                            while($row = mysqli_fetch_array($grupos_atos)) {
                                echo '<form id="navform'.$row['ID_ATO_PROFISSAO'].'" action="atoprofissao.php" method="post">';
                                echo '&nbsp&nbsp&nbsp<a href="javascript:;" onclick="document.getElementById(\'navform'.$row['ID_ATO_PROFISSAO'].'\').submit();">';
                                echo '<li>'.$row['NUMERACAO_ATO'] . ' ' . $row['SIGLA'].'</li>';
                                echo '</a>';
                                echo '<input type="hidden" name="idato" value="'.$row['ID_ATO_PROFISSAO'].'">';
                                echo '</form>';
                            }
                        }
                    ?>
                </ul>
            </li>
            <li>
                <a href="cursos.php">Cursos</a>
            </li>
            <li>
                <a href="contact.php">Contactos</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

    </div>
    <!-- End Header Logo & Naviagtion -->

</header>
<!-- End Header Section -->