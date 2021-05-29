<?php
ob_start();
require("layouts/head.php");
require("layouts/header.php");
require("layouts/leftmenu.php");
require("layouts/sessions.php");
?>
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

                </div><!-- /.row -->
             
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <?php require("layouts/footer.php");?>