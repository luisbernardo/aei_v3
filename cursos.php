<?php include 'head.php'; ?>

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
                <div class="page-content">
                    <form>
                        <div class="row" style="padding-bottom: 1%">
                            <div class="col-md-12">
                                <!-- Classic Heading -->
                                <div class="row">

                                    <div class="col-md-12">
                                        <h5 class="classic-title" style="margin-bottom: 0px;">Localização</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="checkbox">
                                            <label><input type="checkbox">Aveiro</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Braga</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Bragança</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Castelo Branco</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Coimbra</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Évora</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Guarda</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Leiria</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="checkbox">
                                            <label><input type="checkbox">Lisboa</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Portalegre</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Santarém</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Viana do Castelo</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Vila Real</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Viseu</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Açores</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox">Madeira</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-bottom: 1%">
                            <div class="col-md-12">
                                <h5 class="classic-title" style="margin-bottom: 0px;">Ciclo de estudos</h5>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="checkbox">
                                    <label><input type="checkbox">Licenciatura</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox">Mestrado Integrado</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox">Mestrado</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="classic-title" style="margin-bottom: 0px;">Regime</h5>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="checkbox">
                                    <label><input type="checkbox">Normal</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox">Pós-Laboral</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="submit" class="btn-system btn-large"  style="margin-bottom: 5%">Pesquisar</button>                      
                    </form>

                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Classic Heading -->
                                <h4 class="classic-title"><span>Por Ato(s)</span></h4>
                                <div class="row" style="padding-bottom: 1%">
                                    <div class="col-md-12">
                                        <!-- Classic Heading -->
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12">
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Análise de Domínio e Engenharia de Requisitos</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Conceção e Construção de Soluções Informáticas</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Teste e Validação de Soluções Informáticas</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Planeamento e Exploração de Infra-Estruturas de Tecnologias de Informação</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Gestão de Projectos de Sistemas de Informação</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Planeamento e Auditoria de Sistemas de Informação</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Investigação, Ensino e Normalização</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input type="checkbox">Manutenção e Gestão de Ativos</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="submit" class="btn-system btn-large">pesquisar</button>
                    </form>
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