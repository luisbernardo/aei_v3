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
                        <h2>Contactos</h2>
                        <p></p>
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumbs">
                            <li><a href="index.php">Ínicio</a></li>
                            <li>Contactos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

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
                        zoom: 15
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

        <!-- Start Content -->
        <div id="content">
            <div class="container">

                <div class="row">

                    <div class="col-md-8">

                        <!-- Classic Heading -->
                        <h4 class="classic-title"><span>Contacte-nos</span></h4>

                        <!-- Start Contact Form -->
                        <form role="form" class="contact-form" id="contact-form" method="post">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" placeholder="Nome" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <input type="email" class="email" placeholder="E-mail" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" class="requiredField" placeholder="Assunto" name="subject">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="controls">
                                    <textarea rows="7" placeholder="Mensagem" name="message"></textarea>
                                </div>
                            </div>
                            <button type="submit" id="submit" class="btn-system btn-large">Enviar</button>
                            <div id="success" style="color:#34495e;"></div>
                        </form>
                        <!-- End Contact Form -->

                    </div>

                    <div class="col-md-4">

                        <!-- Classic Heading -->
                        <h4 class="classic-title"><span>Informações</span></h4>

                        <!-- Some Info -->
                        <p>Departamento de Sistemas de Informação</p>
                        <p>Mestrado Integrado em Engenharia e Gestão de Sistemas de Informação</p>
                        <p>Projeto de Tecnologias de Sistemas de Informação 2015/2016</p>

                        <!-- Divider -->
                        <div class="hr1" style="margin-bottom:10px;"></div>

                        <!-- Info - Icons List -->
                        <ul class="icons-list">
                            <li><i class="fa fa-globe">  </i> <strong>Morada:</strong> Campus de Azúrem, 4804-533 Guimarães</li>
                            <li><i class="fa fa-envelope-o"></i> <strong>Email:</strong> sec@dsi.uminho.pt</li>
                            <li><i class="fa fa-mobile"></i> <strong>Phone:</strong> +351 253 510 319</li>
                        </ul>

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

    <script type="text/javascript">
              //Contact Form

              $('#submit').click(function () {

                  $.post("php/send.php", $(".contact-form").serialize(), function (response) {
                      $('#success').html(response);
                  });
                  return false;

              });
    </script>

</body>

</html>