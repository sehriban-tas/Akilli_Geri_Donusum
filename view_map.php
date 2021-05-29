<?php
require("admin/layouts/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recycle</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="#page-top">Akıllı Geri Dönüşüm Sistemi</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php" class="page-scroll">Hakkımızda</a></li>
                    <li><a href="index.php" class="page-scroll">Servİsler</a></li>
                    <li><a href="index.php" class="page-scroll">Galerİ</a></li>
                    <li><a href="index.php" class="page-scroll">Görüşler</a></li>
                    <li><a href="index.php" class="page-scroll">İletİşİm</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header id="header">
        <div class="intro">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 intro-text">
                            <h1>Akıllı Gerİ Dönüşüm Sİstemİ</h1>
                            <p>Geleceğe Daha Yeşil Bir Dünya Bırakmak Bizim Elimizde...</p>
                            <a href="index.html" class="btn btn-custom btn-lg page-scroll">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- contents -->
    <br />
    <div class="container">
        <div class="col-md-10 col-md-offset-1 section-title text-center">
            <h2>Geri Dönüşüm Haritasına Hoşgeldin</h2>
            <hr>
        </div>
    </div>
    <div id="map" class="container"></div>

    <script>
      var customLabel = {
        1: {
          label: 'F'
        },
        0: {
          label: 'E'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/Recycle/print_xml.php', function(data) {
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

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_CyB34-SVE9uHNLEOEH7NqkdZERgSQLg&callback=initMap"
       async defer>
    </script>
    <!-- /contents -->
    <br /> <br /> <br />
    <!-- Footer Section -->
    <div id="footer">
        <div class="container text-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <p>&copy; 2016 Landscaper. Designed by <a href="http://www.templatewire.com"
                        rel="nofollow">TemplateWire</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/nivo-lightbox.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="js/contact_me.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>