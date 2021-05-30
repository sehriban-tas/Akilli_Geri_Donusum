<?php
    require_once('layouts/head.php');
    require_once('layouts/header.php');
    require_once('layouts/leftmenu.php');
    require_once('layouts/db.php');

    if(isset($_POST['ata'])){
        $id=$_GET['id'];
        $status="1";

        $name=$_POST['ata'];
        $dizi=explode("-",$name); // cümlemiz boşluklardan bölünecek
        $name2=$dizi[0]; // her kelime dizide bir değer olacaktır

        
        $update=$conn->prepare("UPDATE gorevli SET status=:status WHERE id=:id ");
        $update->execute([
           'status'=>$status,
           'id'=>$id,
           ]);
         
          $status2="2";
          $update2=$conn->prepare("UPDATE bins SET status=:status2 WHERE bins_name=:name2");
          $update2->execute([
            'status2'=>$status2,
            'name2'=>$name2,
          ]);       
          header("Location: gorev.php?status=ok");
           exit();
           
        
      }
    
?>

<body class="skin-blue">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Görevli İşlemleri
                    <small>Preview</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                    <li class="active">Görevli İşlemleri</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-xs-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Görev Ekle</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                data-toggle="dropdown">Gorev Seç
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                            <?php
                                             $bins = $conn->query("SELECT * FROM bins where status='1'");
                                             while($row=$bins->fetch()){                                                   
                                            ?>
                                               <li><input type="submit" name="ata" value="<?=substr(($row['bins_name']."-".$row['bins_adress']),0, 1000);?>" class="btn btn-link"></input></li>
                                              
                                             <?php } ?>
                                            </ul>
                                        </div>
                                 
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                </div>
                            </form>
                        </div><!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>



<?php require_once('layouts/footer.php'); ?>