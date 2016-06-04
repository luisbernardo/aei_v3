<?php
include 'head.php';
include 'funcoes.php';
?>

<body>

    <!-- Full Body Container -->
    <div id="container">


        <?php include 'header.php'; ?>


        <!-- Start Home Page Slider -->
        <section id="home">
            <!-- Carousel -->
            <div id="main-slide" class="carousel slide" data-ride="carousel">
                <!-- Carousel inner -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="images/home-slider.jpg">
                        <div class="slider-content">
                            <div class="col-md-12 text-center">
                                <h2 class="animated7 white">
                                    <span><strong>Atos de Profissão</strong></span>
                                </h2>
                                <h3 class="animated8 white">
                                    <span>Engenharia Informática</span>
                                </h3>
                                <div class="">
                                    <a class="animated4 slider btn btn-system btn-large btn-min-block" href="atos.php">Descobre mais!</a>
                                </div>
                            </div>
                        </div>
                        <!--/ Carousel item end-->
                    </div>
                </div>
        </section>
        <!-- End Home Page Slider -->


        <!-- Start Testimonial -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <!-- Single Testimonial -->
                    <div class="classic-testimonials">
                        <div class="testimonial-content">
                            <p>O engenheiro ocupa-se da aplicação das ciências e técnicas respeitante às diferentes especialidades de engenharia nas atividades de investigação, 
                                conceção, estudo, projeto, fabrico, construção, produção, avaliação, fiscalização e controlo de qualidade e segurança, peritagem e auditoria de 
                                engenharia, incluindo a coordenação e gestão dessas atividades e outras com elas relacionadas.</p>
                        </div>
                        <div class="testimonial-author"><span>Diário da República, 2ª. série</span> - Nº. 139 - 20 de julho de 2015</div>
                    </div>
                </div>
            </div>
            <!-- End Testimonial -->
        </div>
        <!-- End Testimonial Content -->


        <!-- Start Parallax -->
        <div id="parallax-one" class="parallax" style="background-image:url(images/parallax/parallax-01.jpg);">
            <div class="parallax-text-container-1">
                <div class="parallax-text-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="counter-item">
                                    <i class="fa fa-home"></i>
                                    <div class="timer" id="item1" data-to="<?php
                                    $num_univ = get_num_universidades();
                                    echo $num_univ;
                                    ?>" data-speed="1000"></div>
                                    <h5>Instituições</h5>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="counter-item">
                                    <i class="fa fa-folder-open"></i>
                                    <div class="timer" id="item2" data-to="<?php
                                    $num_curso = get_num_cursos();
                                    echo $num_curso;
                                    ?>" data-speed="1000"></div>
                                    <h5>Cursos</h5>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="counter-item">
                                    <i class="fa fa-book"></i>
                                    <div class="timer" id="item3" data-to="<?php
                                    $num_uc = get_num_unidadecurricular();
                                    echo $num_uc;
                                    ?>" data-speed="1000"></div>
                                    <h5>Unidades Curriculares</h5>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="counter-item">
                                    <i class="fa fa-desktop"></i>
                                    <div class="timer" id="item4" data-to="<?php
                                    $num_ato = get_num_atos();
                                    echo $num_ato - 1;
                                    ?>" data-speed="1000"></div>
                                    <h5>Atos de Profissão</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Parallax Content-->



        <!-- Start Atos Section -->
        <div class="section service">
            <div class="container">
                <div class="row">
                    <!-- Start Service Icon 1 -->
                    <form id="formulario7" action="atoprofissao.php" method="post">
                        <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="01">
                            <a href="javascript:;" onclick="document.getElementById('formulario7').submit();">
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
                    <form id="formulario8" action="atoprofissao.php" method="post">
                        <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="02">
                            <a href="javascript:;" onclick="document.getElementById('formulario8').submit();">
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
                    <form id="formulario9" action="atoprofissao.php" method="post">
                        <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="03">
                            <a href="javascript:;" onclick="document.getElementById('formulario9').submit();">
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
                    <form id="formulario10" action="atoprofissao.php" method="post">
                        <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="04">
                            <a href="javascript:;" onclick="document.getElementById('formulario10').submit();">
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
                    <form id="formulario11" action="atoprofissao.php" method="post">
                        <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="05">
                            <a href="javascript:;" onclick="document.getElementById('formulario11').submit();">
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
                    <form id="formulario12" action="atoprofissao.php" method="post">
                        <div class="col-md-3 col-sm-6 service-box service-center" data-animation="fadeIn" data-animation-delay="06">
                            <a href="javascript:;" onclick="document.getElementById('formulario12').submit();">
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
                        <a href="atoprofissao.php">
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
                        <a href="atoprofissao.php">
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

        <?php include 'footer.php'; ?>

    </div>
    <!-- End Full Body Container -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>
