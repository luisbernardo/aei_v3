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
                        <h2>Atos de Engenharia Informática</h2>
                        <p></p>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="index.php">Ínicio</a></li>
                            <li>Atos</li>
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
                            <p>O exercício da profissão de Engenharia deve ocorrer sob o estrito cumprimento dos
                                códigos de ética e de deontologia profissional e mediante a submissão a
                                regulamentos disciplinares. Estes são valores indispensáveis para assegurar a
                                confiança nos profissionais qualificados como de interesse público. “A elaboração de
                                projectos de estruturas, de instalações eléctricas, de redes de gás, a
                                correspondente responsabilidade pela execução das obras, os estudos de impacto
                                ambiental e a concepção e gestão dos sistemas de informação são exemplos de
                                actos que devem merecer a confiança pública dos cidadãos”.
                            </p>
                            <p>Segundo os estatutos da Ordem dos Engenheiros (OE), do ponto de vista
                                meramente funcional, considera-se Engenheiro o “profissional que se ocupa da
                                aplicação das ciências e técnicas respeitantes aos diferentes ramos de Engenharia
                                nas actividades de investigação, concepção, estudo, projecto, fabrico, construção,
                                produção, fiscalização e controlo de qualidade, incluindo a coordenação e gestão
                                dessas actividades e outras com elas relacionadas”. Desta forma, a definição dos
                                actos da profissão de Engenheiro não se revela tarefa trivial, tal é a diversidade de
                                actividades envolvidas, bem como os inúmeros domínios de intervenção (áreas de
                                actuação).
                            </p>

                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="hr1" style="margin-bottom:50px;"></div>

                    <!-- Start Atos Section -->
                    <div class="section service">
                        <div class="container">
                            <!-- Classic Heading -->
                            <h4 class="classic-title"><span>Grupos de Atos</span></h4>
                            <div class="row">
                                <!-- Start Service Icon 1 -->
                                <form id="formulario1" action="atoprofissao.php" method="post">
                                    <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="01">
                                        <a href="javascript:;" onclick="document.getElementById('formulario1').submit();">
                                            <div class="service-icon">
                                                <i class="fa fa-search icon-large"></i>
                                            </div>
                                            <div class="service-content">
                                                <h4>Análise de Domínio e Engenharia de Requisitos</h4>
                                            </div>
                                        </a>
                                    </div>
                                    <input type="hidden" name="idato" value="1">
                                </form>
                                <!-- End Service Icon 1 -->

                                <!-- Start Service Icon 2 -->
                                <form id="formulario2" action="atoprofissao.php" method="post">
                                    <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="02">
                                        <a href="javascript:;" onclick="document.getElementById('formulario2').submit();">
                                            <div class="service-icon">
                                                <i class="fa fa-pencil icon-large"></i>
                                            </div>
                                            <div class="service-content">
                                                <h4>Conceção e Construção de Soluções Informáticas</h4>
                                            </div>
                                        </a>
                                    </div>
                                    <input type="hidden" name="idato" value="23">
                                </form>
                                <!-- End Service Icon 2 -->

                                <!-- Start Service Icon 3 -->
                                <form id="formulario3" action="atoprofissao.php" method="post">
                                    <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="03">
                                        <a href="javascript:;" onclick="document.getElementById('formulario3').submit();">
                                            <div class="service-icon">
                                                <i class="fa fa-wrench icon-large"></i>
                                            </div>
                                            <div class="service-content">
                                                <h4>Teste e Validação de Soluções Informáticas</h4>
                                            </div>
                                        </a>
                                    </div>
                                    <input type="hidden" name="idato" value="42">
                                </form>
                                <!-- End Service Icon 3 -->

                                <!-- Start Service Icon 4 -->
                                <form id="formulario4" action="atoprofissao.php" method="post">
                                    <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="04">
                                        <a href="javascript:;" onclick="document.getElementById('formulario4').submit();">
                                            <div class="service-icon">
                                                <i class="fa fa-signal icon-large"></i>
                                            </div>
                                            <div class="service-content">
                                                <h4>Planeamento e Exploração de Infra-Estruturas de Tecnologias de Informação</h4>
                                            </div>
                                        </a>
                                    </div>
                                    <input type="hidden" name="idato" value="54">
                                </form>
                                <!-- End Service Icon 4 -->

                                <!-- Start Service Icon 5 -->
                                <form id="formulario5" action="atoprofissao.php" method="post">
                                    <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="05">
                                        <a href="javascript:;" onclick="document.getElementById('formulario5').submit();">
                                            <div class="service-icon">
                                                <i class="fa fa-list-alt icon-large"></i>
                                            </div>
                                            <div class="service-content">
                                                <h4>Gestão de Projectos de Sistemas de Informação</h4>
                                            </div>
                                        </a>
                                    </div>
                                    <input type="hidden" name="idato" value="72">
                                </form>
                                <!-- End Service Icon 5 -->

                                <!-- Start Service Icon 6 -->
                                <form id="formulario6" action="atoprofissao.php" method="post">
                                    <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="06">
                                        <a href="javascript:;" onclick="document.getElementById('formulario6').submit();">
                                            <div class="service-icon">
                                                <i class="fa fa-eye icon-large"></i>
                                            </div>
                                            <div class="service-content">
                                                <h4>Planeamento e Auditoria de Sistemas de Informação</h4>
                                            </div>
                                        </a>
                                    </div>
                                    <input type="hidden" name="idato" value="92">
                                </form>
                                <!-- End Service Icon 6 -->

                                <!-- Start Service Icon 7 -->
                                <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="07">
                                    <a href="ato_ien.php">
                                        <div class="service-icon">
                                            <i class="fa fa-download icon-large"></i>
                                        </div>
                                        <div class="service-content">
                                            <h4>Investigação, Ensino e Normalização</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Service Icon 7 -->

                                <!-- Start Service Icon 8 -->
                                <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="08">
                                    <a href="ato_mga.php">
                                        <div class="service-icon">
                                            <i class="fa fa-hdd-o icon-large"></i>
                                        </div>
                                        <div class="service-content">
                                            <h4>Manutenção e Gestão de Ativos</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Service Icon 8 -->

                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .container -->
                    </div>
                    <!-- End Atos Section -->

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