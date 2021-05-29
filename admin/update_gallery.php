<?php
ob_start();
require("layouts/head.php");
require("layouts/header.php");
require("layouts/leftmenu.php");
require("layouts/db.php");
require("layouts/sessions.php");
?>
<?php
if(isset($_POST['submit']) && (!empty($_POST['name'])) && ($_FILES['uploaded_file']['error'] == 0)){
   
    $errMsg='';
    $id=$_GET['id'];
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

                    $insert=$conn->prepare("UPDATE gallery SET gallery_name=:name,gallery_path=:gallery WHERE gallery_id=:id ");
                    $insert->execute([
                        'name'=>$name,
                        'gallery'=>$filename,
                        'id'=>$id,
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
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Galeri</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form  method="post" enctype="multipart/form-data">
                              <?php $id=$_GET['id']; $select2=$conn->query("SELECT *FROM gallery WHERE gallery_id='$id'",PDO::FETCH_OBJ);$select2->execute(['id'=>$_GET['id']]); ?>
                                <?php while($row=$select2->fetch()):?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Galeri isim</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        value="<?=$row->gallery_name?>"   placeholder="İsim">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" name="uploaded_file" id="exampleInputFile">
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="submit" name="submit" value="Güncelle" class="btn btn-primary">
                                </div>
                                <?php endwhile; ?>
                                <?php
				                if(isset($errMsg)){
                               echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
                                  }
			                    ?>
                            </form>
                        </div><!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
<?php require("layouts/footer.php");
ob_end_flush();?>