<?php
ob_start();
include("layouts/head.php");
include("layouts/header.php");
include("layouts/leftmenu.php");
include("layouts/db.php");
?>
<?php
if(isset($_POST['submit']) && (!empty($_POST['name'])) && ($_FILES['uploaded_file']['error'] == 0)){
   
    $errMsg='';

    $name=$_POST['name'];
    
    $filename=$_FILES['uploaded_file']['name'];
    $tmpfile=$_FILES['uploaded_file']['tmp_name'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $folder='upload_images/';

    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");

    if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        $maxsize = 5 * 1024 * 1024;
    if($_FILES['uploaded_file']['size'] > $maxsize) die("Error: File size is larger than the allowed limit.");
   
        if(!file_exists($filename)){
            if(move_uploaded_file($tmpfile,$folder.$filename)){

                    $insert=$conn->prepare("INSERT INTO gallery(gallery_name,gallery_path) VALUES(:name,:gallery)");
                    $insert->execute([
                        'name'=>$name,
                        'gallery'=>$filename,
                    ]);
                    header("Location:gallery.php?status=ok");
                    exit();
            }

            else{
                $errMsg ='Başarısız';
         
            }
        }
        else{
            $errMsg ='Dosya zaten mevcut';
        }
}
else{
    $errMsg ='Tamamını doldurunuz..';
}
?>

<body class="skin-blue">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Galeri İşlemleri
                    <small>Preview</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Galeri İşlemleri</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-xs-12">
                        <!-- general form elements -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Galeri</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri isim</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="İsim">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" name="uploaded_file" id="exampleInputFile">
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="submit" name="submit" value="Ekle" class="btn btn-success">
                                </div>
                                <?php
				                if(isset($errMsg)){
                               echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
                                  }
			                    ?>
                            </form>
                        </div><!-- /.box -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Galeri Tablosu</h3>

                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>resim</th>
                                            <th>İsim</th>
                                            <th>Sil</th>
                                            <th>Düzenle</th>
                                        </tr>
                                        <?php $select=$conn->query("SELECT * FROM gallery",PDO::FETCH_OBJ);?>
                                        <?php while($row=$select->fetch()): ?>
                                        <tr>
                                            <td><?=$row->gallery_id?></td>
                                            <td>
                                                <img src="upload_images/<?=$row->gallery_path?>"
                                                    style="width:50px;height:50px;" class="img-circle">
                                            </td>
                                            <td><?=$row->gallery_name?></td>
                                            <td><a href="delete_gallery.php?id=<?=$row->gallery_id?>"
                                                    class="btn btn-warning">Sil</a></td>
                                            <td><a href="update_gallery.php?id=<?=$row->gallery_id?>"
                                                    class="btn btn-success">Düzenle</a></td>

                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
<?php require("layouts/footer.php");
ob_end_flush();?>