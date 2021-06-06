<?php
ob_start();
require("layouts/head.php");
require("layouts/header.php");
require("layouts/leftmenu.php");
require("layouts/db.php");
require("layouts/sessions.php");
?>
<?php
if(isset($_POST['update'])){
    $id=$_GET['id'];
    $name=$_POST['adsoyad'];
    $tlf=$_POST['phone'];
    $update=$conn->prepare("UPDATE gorevli SET adsoyad=:name, tlf_no=:tlf WHERE id=:id ");
           $update->execute([
            'name' => $name,
            'tlf' => $tlf,
            'id'=>$id,
             ]);

           header("Location:gorev.php?succsess=ok");
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
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    
                    <li class="active">Görevli Güncelle</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-xs-12">
                        <!-- general form elements -->
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Görevli Güncelle</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                    <?php $id=$_GET['id']; $select=$conn->query("SELECT *FROM gorevli WHERE id='$id'",PDO::FETCH_OBJ);
                                    $select->execute(['id'=>$_GET['id']]); ?>
                                   <?php while($row=$select->fetch()):?>
                                        <label for="exampleInputEmail1">İsim Soyisim</label>
                                        <input type="text" name="adsoyad" class="form-control" id="exampleInputEmail1"
                                        value="<?=$row->adsoyad?>"  placeholder="İsim Gir">
                                      
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Telefon numarası</label>
                                        <input type="tel" id="phone" value="<?=$row->tlf_no?>" placeholder="512-345-67-89" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required class="form-control" name="phone" >
                                    </div>
                                    <?php endwhile; ?>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" name="update" value="Güncelle" class="btn btn-info">
                                </div>
                            </form>
                        </div><!-- /.box -->
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
<?php require("layouts/footer.php")?>