<?php
ob_start();
require("admin/layouts/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akıllı Geri Dönüşüm Sistemi</title>
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
                    <li><a href="#about" class="page-scroll">Hakkımızda</a></li>
                    <li><a href="#services" class="page-scroll">Servİsler</a></li>
                    <li><a href="#portfolio" class="page-scroll">Galerİ</a></li>
                    <li><a href="#testimonials" class="page-scroll">Görüşler</a></li>
                    <li><a href="#contact" class="page-scroll">İletİşİm</a></li>
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
                            <a href="#about" class="btn btn-custom btn-lg page-scroll">Daha Fazla Bilgi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About Section -->
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="about-text">
                        <h2>Akıllı Geri Dönüşüm Sistemine <span>Hoşgeldiniz</span></h2>
                        <h3>Neden Geri Dönüşüm Yapmalıyız?</h3>
                        <hr>
                        <p>Doğal kaynaklarımız, dünya nüfusunun artması ve tüketim alışkanlıklarının değişmesi nedeni
                            ile her geçen gün azalmaktadır. Bu nedenle malzeme tüketimini azaltmak, değerlendirilebilir
                            nitelikli atıkları geri dönüştürmek sureti ile doğal kaynakların verimli olarak kullanılması
                            gerekmektedir. </p>
                        <p>Geri dönüşümün uygulanması ile çöplere giden atık miktarında azalma sağlanarak. bu atıkların
                            taşınması ve depolanması işlemleri için daha az miktarda alan ve enerji kullanılmış olur.
                        </p>
                        <a href="#services" class="btn btn-custom btn-lg page-scroll">Tüm Servisleri Göster</a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="about-media"> <img src="img/unnamed.png" alt=" "> </div>
                    <div class="about-desc">
                        <h3>Doğal kaynaklarımız korunur</h3>
                        <hr>
                        <p>Ormanlar, su, petrol vb. doğal kaynaklarımızın üretim sürecinde kullanılması sonucu, cam,
                            metal, plastik ve kağıt/karton ambalajlar elde edilmektedir. Piyasaya sürülen ambalajların
                            atık haline geldikten sonra, türlerine göre ayrılıp geri dönüşüm sanayine sevk edilmesi
                            sonucu, geri dönüştürülmüş malzemeler çeşitli ürünlerin üretim aşamasında ikincil hammadde
                            olarak kullanılmaktadır. Böylece doğal kaynaklarımız daha az kullanılarak, doğaya katkı
                            sağlanmış olmaktadır. Örneğin; 1 ton kâğıdın geri dönüşüme katılması sonucu 17 ağacın
                            kesilmesi önlenmektedir.
                            Plastik ambalaj atıklarının geri kazanılması sonucu ise petrolden tasarruf
                            sağlanabilmektedir.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="about-media"> <img src="img/recycle1.jpeg" alt=" "> </div>
                    <div class="about-desc">
                        <h3>Gelecek için yatırımdır</h3>
                        <hr>
                        <p>Üzerinde yaşadığımız Dünyanın bize sağlamış olduğu doğal kaynakların verimli bir şekilde
                            kullanılması, gelecek nesillerin de kaynak sıkıntısı çekmemesi için önem arz etmektedir. Biz
                            bu Dünyanın doğal kaynaklarını ne kadar tasarruflu kullanırsak, bizden sonraki nesiller de o
                            kadar az kaynak sıkıntısı çekecek ve gelecek kuşaklar da doğal kaynaklardan yararlanma
                            olanağı bulacaktır. Bunun yanı sıra ülkemizde geri dönüşüm sektörü her geçen gün
                            gelişmektedir.
                            Bu gelişim, yeni tesislerin kurulmasını ve yeni iş imkânlarının oluşmasını sağlayacaktır.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section -->
    <div id="services">
        <div class="container">
            <div class="col-md-10 col-md-offset-1 section-title text-center">
                <h2>Servislerimiz</h2>
                <hr>
                <p>...</p>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="service-media"> <img src="img/services/map.png" alt=" "> </div>
                    <div class="service-desc">
                        <a href="view_map.php">
                            <h3>Geri Dönüşüm Haritaları</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                            sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="service-media"> <img src="img/services/information.png" alt=" "> </div>
                    <div class="service-desc">
                        <a href="#about">
                            <h3>Neden Geri Dönüşüme İhtiyaç Duyalım?</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                            sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="service-media"> <img src="img/services/smartphone.png" alt=" "> </div>
                    <div class="service-desc">
                        <a href="#">
                            <h3>Mobil Uygulama indir</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam
                            sedasd commodo nibh ante facilisis bibendum dolor feugiat at.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Section -->
    <div id="portfolio">
        <div class="container">
            <div class="section-title text-center center">
                <h2>Galeri</h2>
                <hr>
                <p>Akıllı Geri Dönüşüm Sistemi Fotoğraf Galerisi</p>
            </div>
            <div class="categories">
                <!--
      <ul class="cat">
        <li>
          <ol class="type">
            <li><a href="#" data-filter="*" class="active">All</a></li>
            <li><a href="#" data-filter=".lawn">Lawn Care</a></li>
            <li><a href="#" data-filter=".garden">Garden Care</a></li>
            <li><a href="#" data-filter=".planting">Planting</a></li>
          </ol>
        </li>
      </ul>
      --->
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="portfolio-items">
                    <?php $select2=$conn->query("SELECT *FROM gallery",PDO::FETCH_OBJ);?>
                    <?php while($row=$select2->fetch()):?>
                    <div class="col-sm-6 col-md-4 lawn">
                        <div class="portfolio-item">
                            <div class="hover-bg"> <a href="admin/upload_images/<?=$row->gallery_path?>"
                                    title="<?=$row->gallery_name?>" data-lightbox-gallery="gallery1">
                                    <div class="hover-text">
                                        <h4><?=$row->gallery_name?></h4>
                                    </div>
                                    <img src="admin/upload_images/<?=$row->gallery_path?>" class="img-responsive"
                                        alt="<?=$row->gallery_name?>">
                                </a> </div>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Section -->
    <div id="testimonials" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title">
                    <h2>Görüşler</h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <div class="item">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec
                                    ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at duis sed
                                    dapibus leo nec ornare diam."</p>
                                <p>- John DOE, Parker County, TX</p>
                            </div>
                            <div class="item">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec
                                    ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at duis sed
                                    dapibus leo nec ornare diam."</p>
                                <p>- Jenny DOE, Parker County, TX</p>
                            </div>
                            <div class="item">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec
                                    ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at duis sed
                                    dapibus leo nec ornare diam."</p>
                                <p>- John DOE, Parker County, TX</p>
                            </div>
                            <div class="item">
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec
                                    ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at duis sed
                                    dapibus leo nec ornare diam."</p>
                                <p>- John DOE, Parker County, TX</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title text-center">
                <h2>İletişime Geç</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed dapibus leonec.</p>
            </div>
            <div class="col-md-10 col-md-offset-1 contact-info">
                <div class="col-md-4">
                    <h3>Address</h3>
                    <hr>
                    <div class="contact-item">
                        <p>4321 California St,</p>
                        <p>San Francisco, CA 12345</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Working Hours</h3>
                    <hr>
                    <div class="contact-item">
                        <p>Monday-Saturday: 07:00 - 18:00</p>
                        <p>Sunday: CLOSED</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Contact Info</h3>
                    <hr>
                    <div class="contact-item">
                        <p>Phone: +1 123 456 1234</p>
                        <p>Email: info@company.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <h3>Leave us a message</h3>
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="Name"
                                    required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" placeholder="Email"
                                    required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message"
                            required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
                </form>
            </div>
        </div>
    </div>
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