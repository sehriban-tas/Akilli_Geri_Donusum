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

    $id=$_GET['id'];
    $name=$_POST['name'];
    $adress=$_POST['adress'];
    $lat=$_POST['lat'];
    $lng=$_POST['lng'];
    $status=$_POST['status'];

    $update=$conn->prepare("UPDATE bins SET bins_name=:name,bins_adress=:adress, bins_lat=:lat,bins_lng=:lng,status=:status WHERE bins_id=:id ");
         $update->execute([
            'name'=>$name,
            'adress'=>$adress,
            'lat'=>$lat,
            'lng'=>$lng,
            'status'=>$status,
            'id'=>$id,
            ]);
            echo $status;
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
                    <li class="active">Geri Dönüşüm Güncelle</li>
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
                                <h3 class="box-title">Geri Dönüşüm Kutusu Güncelle</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form method="post">
                                <?php $id=$_GET['id']; $select2=$conn->query("SELECT *FROM bins WHERE bins_id='$id'",PDO::FETCH_OBJ);$select2->execute(['id'=>$_GET['id']]); ?>
                                <?php while($row=$select2->fetch()):?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İsim</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            value="<?=$row->bins_name?>" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Adres</label>
                                        <input type="text" name="adress" class="form-control" id="exampleInputPassword1"
                                            value="<?=$row->bins_adress?>" placeholder="Adres">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Enlem</label>
                                        <input type="text" name="lat" class="form-control" id="exampleInputPassword1"
                                            value="<?=$row->bins_lat?>" placeholder="Enlem">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Boylam</label>
                                        <input type="text" name="lng" class="form-control" id="exampleInputPassword1"
                                            value="<?=$row->bins_lng?>" placeholder="Boylam">
                                    </div>
                                    <select name="status">
                                        <option value="1">Dolu</option>
                                        <option value="0">Boş</option> 
                                    </select>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                    <input type="submit" name="submit" value="Düzenle" class="btn btn-primary">
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
          </div>
        </section>
    </div>
</body>
<?php require("layouts/footer.php")?>