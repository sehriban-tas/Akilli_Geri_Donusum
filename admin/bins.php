<?php
ob_start();
require("layouts/head.php");
require("layouts/header.php");
require("layouts/leftmenu.php");
require("layouts/db.php");
require("layouts/sessions.php");
?>
<?php
if(isset($_POST['submit']) && (!empty($_POST['name'])) && (!empty($_POST['adress'])) && (!empty($_POST['lat'])) && (!empty($_POST['lng']))){
   
    $errMsg='';

    $name=$_POST['name'];
    $adress=$_POST['adress'];
    $lat=$_POST['lat'];
    $lng=$_POST['lng'];
    $type="recycle";
    $status="0";

    $uniqid=md5(uniqid(mt_rand(), true));
    $uniqid=substr($uniqid,0,12);

    $insert=$conn->prepare("INSERT INTO bins(bins_id,bins_name,bins_adress,bins_lat,bins_lng,type,status) VALUES(:uniqid,:name, :adress,:lat,:lng,:type,:status)");
                    $insert->execute([
                        'uniqid'=>$uniqid,
                        'name'=>$name,
                        'adress'=>$adress,
                        'lat'=>$lat,
                        'lng'=>$lng,
                        'type'=>$type,
                        'status'=>$status,
                    ]);
                    header("Location: bins.php?status=ok");
                    exit();

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
                    Geri Dönüşüm İşlemleri
                    <small>Preview</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Geri Dönüşüm İşlemleri</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-xs-12">
                        <!-- general form elements -->
                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title">Geri Dönüşüm Kutusu Ekle</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İsim</label>
                                        <input type="text" name="name"class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Adres</label>
                                        <input type="text" name="adress" class="form-control" id="exampleInputPassword1"
                                            placeholder="Adres">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Enlem</label>
                                        <input type="text" name="lat" class="form-control" id="exampleInputPassword1"
                                            placeholder="Enlem">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Boylam</label>
                                        <input type="text" name="lng" class="form-control" id="exampleInputPassword1"
                                            placeholder="Boylam">
                                    </div>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="submit" name="submit" value="Ekle "class="btn btn-danger">
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
                                <h3 class="box-title">Geri Dönüşüm Tablosu</h3>
                                <div class="box-tools">
                                    
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>İsim</th>
                                            <th>Adres</th>
                                            <th>Enlem</th>
                                            <th>Boylam</th>
                                            <th>Status</th>
                                            <th>Sil</th>
                                            <th>Düzenle</th>
                                        </tr>
                                        <?php $select=$conn->query("SELECT * FROM bins",PDO::FETCH_OBJ);?>
                                        <?php while($row=$select->fetch()): ?>
                                        <tr>
                                            <td><?=$row->bins_id?></td>
                                            <td><?=$row->bins_name?></td>
                                            <td><?=$row->bins_adress?></td>
                                            <td><?=$row->bins_lat?></td>
                                            <td><?=$row->bins_lng?></td>
                                            <?php if($row->status==false):?>
                                            <td><span class="label label-success">Boş</span></td>
                                            <?php endif; ?>
                                            <?php if($row->status==true):?>
                                            <td><span class="label label-danger">Dolu</span></td>
                                            <?php endif; ?>
                                            <td><a href="delete_bin.php?id=<?=$row->bins_id?>" class="btn btn-primary">Sil  </a></td>
                                            <td><a href="update_bin.php?id=<?=$row->bins_id?>" class="btn btn-success">Düzenle</a></td>
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


<?php require("layouts/footer.php")?>