<?php
include 'head.php';
include 'funcoes.php';
$curso = $_POST['idcurso'];
echo $curso;
?>
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
                        <?php
                        $info_curso = get_curso($curso);
                        if (mysqli_num_rows($info_curso) > 0) {
                            while ($row = mysqli_fetch_array($info_curso)) {
                                $nome_univ = get_universidade($row['FK_ID_ENTIDADE']);
                                echo '<h2>' . $row['NOME'] . '</h2>';
                                while ($row2 = mysqli_fetch_array($nome_univ)) {

                                    echo '<p>' . $row2['NOME'] . '</p>';
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="index.php">Ínicio</a></li>
                            <li><a href="cursos.php">Cursos</a></li>
                            <li><?php
                                $sigla_curso = get_curso($curso);
                                if (mysqli_num_rows($sigla_curso) > 0) {
                                    while ($row = mysqli_fetch_array($sigla_curso)) {
                                        echo $row['SIGLA'];
                                    }
                                }
                                ?></li>
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
                                <!-- Start Map -->
                                <div id="map" data-position-latitude="<?php
                                $latitude = get_curso($curso);
                                if (mysqli_num_rows($latitude) > 0) {
                                    while ($row = mysqli_fetch_array($latitude)) {
                                        echo $row['LATITUDE'];
                                    }
                                }
                                ?>
                                     " data-position-longitude="<?php
                                     $longitude = get_curso($curso);
                                     if (mysqli_num_rows($longitude) > 0) {
                                         while ($row = mysqli_fetch_array($longitude)) {
                                             echo $row['LONGITUDE'];
                                         }
                                     }
                                     ?>"></div>
                                <script>
                                    (function($) {
                                        $.fn.CustomMap = function(options) {

                                            var posLatitude = $('#map').data('position-latitude'),
                                                    posLongitude = $('#map').data('position-longitude');

                                            var settings = $.extend({
                                                home: {
                                                    latitude: posLatitude,
                                                    longitude: posLongitude
                                                },
                                                text: '<div class="map-popup"><h4>Departamento de Sistemas de Informação</h4><p>Universidade do Minho</p></div>',
                                                icon_url: $('#map').data('marker-img'),
                                                zoom: 10
                                            }, options);

                                            var coords = new google.maps.LatLng(settings.home.latitude, settings.home.longitude);

                                            return this.each(function() {
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

                                                google.maps.event.addListener(marker, 'click', function() {
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

                                    jQuery(document).ready(function() {
                                        jQuery('#map').CustomMap();
                                    });
                                </script>
                                <!-- End Map -->
                            </div>
                        </div>
                    </div>
                    <!-- End Single Project Slider -->

                    <!-- Start Project Content -->
                    <div class="project-content col-md-4">
                        <h4><span>Instituição de Ensino</span></h4>
                        <p><?php
                            $nome_curso2 = get_curso($curso);
                            if (mysqli_num_rows($nome_curso2) > 0) {
                                while ($row = mysqli_fetch_array($nome_curso2)) {
                                    $nome_univ = get_universidade($row['FK_ID_ENTIDADE']);
                                    while ($row2 = mysqli_fetch_array($nome_univ)) {
                                        echo $row2['NOME'];
                                        
                                    }
                                }
                            }
                            ?></p>
                        <h4><span>Curso</span></h4>
                        <ul><?php
                            $designacao_curso = get_curso($curso);
                            if (mysqli_num_rows($designacao_curso) > 0) {
                                while ($row = mysqli_fetch_array($designacao_curso)) {
                                    echo '<li><strong>Designação: </strong>' . $row['NOME'] . '</li>';
                                    $grau = id_to_name($row['GRAU']);
                                    echo '<li><strong>Grau Académico: </strong >' . $grau . '</li>';
                                    echo '<li><strong>ECTS: </strong>' . $row['ECTS'] . '</li>';
                                    echo '<li><strong>Duração: </strong>' . $row['DURACAO'] . ' Semestres Letivos</li>';
                                    echo '<li><strong>Regime: </strong>' . $row['REGIME'] . '</li>';
                                    echo '<li><strong>Local: </strong>' . $row['LOCAL'] . '</li>';
                                }
                            }
                            ?>
                            <br>
                            <form id="formcobertura" action="cobertura.php" method="post">
                                <input type="hidden" name="idcurso" value="<?php echo $curso; ?>">
                                <li><input type="submit" id="submit" class="btn-system btn-small border-btn" value="Ver Cobertura do Curso" style="margin-bottom: 5%"></li>
                            </form>
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
                                <p><?php
                                    $descricao_curso = get_curso($curso);
                                    if (mysqli_num_rows($descricao_curso) > 0) {
                                        while ($row = mysqli_fetch_array($descricao_curso)) {
                                            echo $row['DESCRICAO'];
                                        }
                                    }
                                    ?></p>
                            </div>
                            <?php
                            $site_curso = get_curso($curso);
                            if (mysqli_num_rows($site_curso) > 0) {
                                while ($row = mysqli_fetch_array($site_curso)) {
                                    $nome_univ = get_universidade($row['FK_ID_ENTIDADE']);
                                    while ($row2 = mysqli_fetch_array($nome_univ)) {
                                        echo'<div class="testimonial-author"><span>' . $row2['NOME'] . '</span> - <a href=http://' . $row2['WEBSITE'] . '>' . $row2['WEBSITE'] . '</a></div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End Testimonial Section -->
            </div>
            <!-- End Testimonial Content -->


            <div class="container">
                <div class="row">
                    <!-- Divider -->

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
                                        <div class="panel-body">
                                            <?php
                                            $uc_1ano = get_info_uc_1ano($curso);
                                            if (mysqli_num_rows($uc_1ano) > 0) {
                                                while ($row = mysqli_fetch_array($uc_1ano)) {
                                                    echo "<p>" . $row['ECTS'] . " ECTS - " . $row['NOME'] . "</p>";
                                                }
                                            }
                                            ?>
                                        </div>
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
                                        <div class="panel-body">
                                            <?php
                                            $uc_2ano = get_info_uc_2ano($curso);
                                            if (mysqli_num_rows($uc_2ano) > 0) {
                                                while ($row = mysqli_fetch_array($uc_2ano)) {
                                                    echo "<p>" . $row['ECTS'] . " ECTS - " . $row['NOME'] . "</p>";
                                                }
                                            }
                                            ?>
                                        </div>
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
                                        <div class="panel-body">
                                            <?php
                                            $uc_3ano = get_info_uc_3ano($curso);
                                            if (mysqli_num_rows($uc_3ano) > 0) {
                                                while ($row = mysqli_fetch_array($uc_3ano)) {
                                                    echo "<p>" . $row['ECTS'] . " ECTS - " . $row['NOME'] . "</p>";
                                                }
                                            }
                                            ?>
                                        </div>
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
                                        <div class="panel-body">
                                            <?php
                                            $uc_4ano = get_info_uc_4ano($curso);
                                            if (mysqli_num_rows($uc_4ano) > 0) {
                                                while ($row = mysqli_fetch_array($uc_4ano)) {
                                                    echo "<p>" . $row['ECTS'] . " ECTS - " . $row['NOME'] . "</p>";
                                                }
                                            }
                                            ?>
                                        </div>
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
                                        <div class="panel-body">
                                            <?php
                                            $uc_5ano = get_info_uc_5ano($curso);
                                            if (mysqli_num_rows($uc_5ano) > 0) {
                                                while ($row = mysqli_fetch_array($uc_5ano)) {
                                                    echo "<p>" . $row['ECTS'] . " ECTS - " . $row['NOME'] . "</p>";
                                                }
                                            }
                                            ?>
                                        </div>
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