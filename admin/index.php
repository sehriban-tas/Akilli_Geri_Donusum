<?php
ob_start();
require("layouts/head.php");
require("layouts/header.php");
require("layouts/leftmenu.php");
require("layouts/sessions.php");
?>

<head>
    <style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
        height: 500px;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 1000px;
        margin: 0;
        padding: 0;
    }
    </style>
</head>

<body class="skin-blue">
    <div class="wrapper">

        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-12 col-xs-12">
                        <!-- small box -->
                        <div class="small-box box-solid bg-light-blue">
                            <div class="inner">
                                <h3 style="text-align:center;">Admin Paneline Hoşgeldiniz...</h3>

                            </div>
                        </div>
                    </div><!-- ./col -->
                    <div id="map" class="container"></div>

                    <script>
                    var customLabel = {
                        1: {
                            label: 'F'
                        },
                        0: {
                            label: 'E'
                        },
                        2: {
                            label: 'W'
                        },
                    };

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: new google.maps.LatLng(	39.716763, 41.002697),
                            zoom: 12
                        });
                        var infoWindow = new google.maps.InfoWindow;

                        // Change this depending on the name of your PHP or XML file
                        downloadUrl('http://localhost/Akilli_Geri_Donusum/print_xml.php', function(data) {
                            var xml = data.responseXML;
                            var markers = xml.documentElement.getElementsByTagName('marker');
                            Array.prototype.forEach.call(markers, function(markerElem) {
                                var id = markerElem.getAttribute('bins_id');
                                var name = markerElem.getAttribute('bins_name');
                                var address = markerElem.getAttribute('bins_address');
                                var type = markerElem.getAttribute('type');
                                var status = markerElem.getAttribute('status');
                                var point = new google.maps.LatLng(
                                    parseFloat(markerElem.getAttribute('bins_lat')),
                                    parseFloat(markerElem.getAttribute('bins_lng')));

                                var lat = markerElem.getAttribute('bins_lat');
                                var lng = markerElem.getAttribute('bins_lng');
                                var latlng = lat + ',' + lng;

                                var infowincontent = document.createElement('div');
                                var strong = document.createElement('strong');
                                strong.textContent = name;
                                infowincontent.appendChild(strong);
                                infowincontent.appendChild(document.createElement('br'));



                                var text = document.createElement('text');
                                text.textContent = address
                                infowincontent.appendChild(text);
                                var icon = customLabel[status] || {};
                                var marker = new google.maps.Marker({
                                    map: map,
                                    position: point,
                                    label: icon.label

                                });


                                marker.addListener('click', function() {
                                    infoWindow.setContent(infowincontent);
                                    infoWindow.open(map, marker);

                                });

                                google.maps.event.addDomListener(strong, 'click', function() {
                                    window.location.href =
                                        'http://maps.google.com/maps?saddr=&daddr=' + latlng +
                                        '';

                                });
                            });
                        });
                    }

                    function downloadUrl(url, callback) {
                        var request = window.ActiveXObject ?
                            new ActiveXObject('Microsoft.XMLHTTP') :
                            new XMLHttpRequest;

                        request.onreadystatechange = function() {
                            if (request.readyState == 4) {
                                request.onreadystatechange = doNothing;
                                callback(request, request.status);
                            }
                        };

                        request.open('GET', url, true);
                        request.send(null);
                    }

                    function doNothing() {}
                    </script>
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_CyB34-SVE9uHNLEOEH7NqkdZERgSQLg&callback=initMap"
                        async defer>
                    </script>
                    <!-- /contents -->
                    <br /> <br /> <br />
                </div><!-- /.row -->

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <?php require("layouts/footer.php");?>