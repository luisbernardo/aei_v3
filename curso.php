<?php include 'head.php'; ?>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>

<body>

    <!-- Container -->
    <div id="container">

        <?php include 'header.php'; ?>

        <!-- Start Page Banner -->
        <div class="page-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Mestrado Integrado em Engenharia e Gestão de Sistemas de Informação</h2>
                        <p>Universidade do Minho</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="index.php">Ínicio</a></li>
                            <li><a href="cursos.php">Cursos</a></li>
                            <li>MIEGSI</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->


        <!-- Start Content -->
        <div id="content">
            <div class="container">
                <div class="project-page row">
                    <!-- Start Single Project Slider -->
                    <div class="project-media col-md-8">
                        <div class="touch-slider project-slider">
                            <div class="item">
                                <div class="thumb-overlay"></div>
                                <img alt="" src="images/portfolio/uminho.jpg" style="width:100%;">
                            </div>
                        </div>
                    </div>
                    <!-- End Single Project Slider -->

                    <!-- Start Project Content -->
                    <div class="project-content col-md-4">
                        <h4><span>Instituição de Ensino</span></h4>
                        <p>Universidade do Minho</p>
                        <h4><span>Curso</span></h4>
                        <ul>
                            <li><strong>Designação:</strong> Mestrado Integrado em Engenharia e Gestão de Sistemas de Informação</li>
                            <li><strong>Grau Académico:</strong> Licenciado (pós-Bolonha); Mestre</li>
                            <li><strong>ECTS:</strong> 300</li>
                            <li><strong>Duração:</strong> 10 semestres letivos</li>
                            <li><strong>Regime:</strong> Normal</li>
                            <li><strong>Local:</strong> Campus de Azúrem, Guimarães</li>
                        </ul>
                    </div>
                    <!-- End Project Content -->
                </div>
            </div>


            <!-- Start Testimonial -->
            <div id="content">
                <div class="container">
                    <div class="row">
                        <!-- Single Testimonial -->
                        <div class="classic-testimonials">
                            <div class="testimonial-content">
                                <p>O papel dos engenheiros e gestores de sistemas de informação é o de usarem as Tecnologias de Informação (TI) 
                                    e suas aplicações em benefício das organizações. Os artefactos informáticos são um meio para a melhoria do 
                                    funcionamento das organizações.Os principais atos de profissão ao alcance dos mestres em EGSI incluem: 
                                    intervenções organizacionais relacionadas com a adopção de TI; gestão das tecnologias e dos sistemas de 
                                    informação organizacionais; engenharia do trabalho e dos processos organizacionais; gestão do conhecimento 
                                    organizacional. Estes graduados possuem ainda competências de concretização tecnológica que lhes permite 
                                    envolverem-se também em atos de profissão relacionados com a construção de aplicações informáticas ou do 
                                    estabelecimento da infraestrutura TI da organização.</p>
                            </div>
                            <div class="testimonial-author"><span>Universidade do Minho</span> - <a href="http://www.uminho.pt/">www.uminho.pt</a></div>
                        </div>
                    </div>
                </div>
                <!-- End Testimonial -->
            </div>
            <!-- End Testimonial Content -->


            <!-- Start Map -->
            <div id="map" data-position-latitude="41.453090" data-position-longitude="-8.289196"></div>
            <script>
                (function ($) {
                    $.fn.CustomMap = function (options) {

                        var posLatitude = $('#map').data('position-latitude'),
                                posLongitude = $('#map').data('position-longitude');

                        var settings = $.extend({
                            home: {
                                latitude: posLatitude,
                                longitude: posLongitude
                            },
                            text: '<div class="map-popup"><h4>Departamento de Sistemas de Informação</h4><p>Universidade do Minho</p></div>',
                            icon_url: $('#map').data('marker-img'),
                            zoom: 9
                        }, options);

                        var coords = new google.maps.LatLng(settings.home.latitude, settings.home.longitude);

                        return this.each(function () {
                            var element = $(this);

                            var options = {
                                zoom: settings.zoom,
                                center: coords,
                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                mapTypeControl: false,
                                scaleControl: false,
                                streetViewControl: false,
                                panControl: true,
                                disableDefaultUI: true,
                                zoomControlOptions: {
                                    style: google.maps.ZoomControlStyle.DEFAULT
                                },
                                overviewMapControl: true,
                            };

                            var map = new google.maps.Map(element[0], options);

                            var icon = {
                                url: settings.icon_url,
                                origin: new google.maps.Point(0, 0)
                            };

                            var marker = new google.maps.Marker({
                                position: coords,
                                map: map,
                                icon: icon,
                                draggable: false
                            });

                            var info = new google.maps.InfoWindow({
                                content: settings.text
                            });

                            google.maps.event.addListener(marker, 'click', function () {
                                info.open(map, marker);
                            });

                            var styles = [{
                                    "featureType": "landscape",
                                    "stylers": [{
                                            "saturation": -100
                                        }, {
                                            "lightness": 65
                                        }, {
                                            "visibility": "on"
                                        }]
                                }, {
                                    "featureType": "poi",
                                    "stylers": [{
                                            "saturation": -100
                                        }, {
                                            "lightness": 51
                                        }, {
                                            "visibility": "simplified"
                                        }]
                                }, {
                                    "featureType": "road.highway",
                                    "stylers": [{
                                            "saturation": -100
                                        }, {
                                            "visibility": "simplified"
                                        }]
                                }, {
                                    "featureType": "road.arterial",
                                    "stylers": [{
                                            "saturation": -100
                                        }, {
                                            "lightness": 30
                                        }, {
                                            "visibility": "on"
                                        }]
                                }, {
                                    "featureType": "road.local",
                                    "stylers": [{
                                            "saturation": -100
                                        }, {
                                            "lightness": 40
                                        }, {
                                            "visibility": "on"
                                        }]
                                }, {
                                    "featureType": "transit",
                                    "stylers": [{
                                            "saturation": -100
                                        }, {
                                            "visibility": "simplified"
                                        }]
                                }, {
                                    "featureType": "administrative.province",
                                    "stylers": [{
                                            "visibility": "on"
                                        }]
                                }, {
                                    "featureType": "water",
                                    "elementType": "labels",
                                    "stylers": [{
                                            "visibility": "on"
                                        }, {
                                            "lightness": -25
                                        }, {
                                            "saturation": -100
                                        }]
                                }, {
                                    "featureType": "water",
                                    "elementType": "geometry",
                                    "stylers": [{
                                            "hue": "#ffff00"
                                        }, {
                                            "lightness": -25
                                        }, {
                                            "saturation": -97
                                        }]
                                }];

                            map.setOptions({
                                styles: styles
                            });
                        });

                    };
                }(jQuery));

                jQuery(document).ready(function () {
                    jQuery('#map').CustomMap();
                });
            </script>
            <!-- End Map -->


            <div class="container">
                <div class="row">
                    <!-- Divider -->
                    <div class="hr5" style=" margin-top:45px; margin-bottom:40px;"></div>
                    <div class="row">
                        <div class="col-md-12">

                            <h4 class="classic-title"><span>Plano de Estudos</span></h4>

                            <!-- Accordion -->
                            <div class="panel-group" id="accordion">

                                <!-- Start Accordion 1 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-4">
                                                <i class="fa fa-angle-up control-icon"></i>
                                                1º Ano
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-4" class="panel-collapse collapse in">
                                        <div class="panel-body">Duis ute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like <strong>readable English</strong>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore...</div>
                                    </div>
                                </div>
                                <!-- End Accordion 1 -->

                                <!-- Start Accordion 2 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-5" class="collapsed">
                                                <i class="fa fa-angle-down control-icon"></i>
                                                2º Ano
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-5" class="panel-collapse collapse">
                                        <div class="panel-body">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. The point of using Lorem Ipsum is that it has a <strong>more-or-less</strong> normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore...</div>
                                    </div>
                                </div>
                                <!-- End Accordion 2 -->

                                <!-- Start Accordion 3 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-6" class="collapsed">
                                                <i class="fa fa-angle-down control-icon"></i>
                                                3º Ano
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-6" class="panel-collapse collapse">
                                        <div class="panel-body"><strong>Duis</strong> aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore...</div>
                                    </div>
                                </div>
                                <!-- End Accordion 3 -->

                                <!-- Start Accordion 4 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-7" class="collapsed">
                                                <i class="fa fa-angle-down control-icon"></i>
                                                4º Ano
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-7" class="panel-collapse collapse">
                                        <div class="panel-body"><strong>Duis</strong> aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore...</div>
                                    </div>
                                </div>
                                <!-- End Accordion 4 -->

                                <!-- Start Accordion 5 -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-8" class="collapsed">
                                                <i class="fa fa-angle-down control-icon"></i>
                                                5º Ano
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse-8" class="panel-collapse collapse">
                                        <div class="panel-body"><strong>Duis</strong> aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore...</div>
                                    </div>
                                </div>
                                <!-- End Accordion 5 -->

                            </div>
                            <!-- End Accordion -->
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