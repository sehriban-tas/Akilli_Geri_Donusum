<?php
ob_start();
require("layouts/head.php");
require("layouts/header.php");
require("layouts/leftmenu.php");
require("layouts/db.php");
require("layouts/sessions.php");
?>
<?php
if(isset($_POST['submit']) && (!empty($_POST['username'])) && (!empty($_POST['password'])) && (!empty($_POST['confirm']))){
   
    $errMsg='';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
   
  if($password==$confirm){
    
    $hashed_password = crypt($password);
    $uniqid=md5(uniqid(mt_rand(), true));
    $uniqid=substr($uniqid,0,12);

    $insert=$conn->prepare("INSERT INTO admin(admin_id,admin_username,admin_password) VALUES(:uniqid,:username, :password)");
                    $insert->execute([
                        'uniqid'=>$uniqid,
                        'username'=>$username,
                        'password'=>$hashed_password,
                    ]);
                    header("Location: admin.php?status=ok");
                    exit();
  }
  else{
    $errMsg ='Şifreler aynı değil!!';
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
                    Admin İşlemleri
                    <small>Preview</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Admin İşlemleri</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-xs-12">
                        <!-- general form elements -->
                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">Admin Ekle</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                            placeholder="Kullanıcı Adı Gir">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Again Password</label>
                                        <input type="password" name="confirm" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" name="submit" value="Ekle" class="btn btn-warning">
                                </div>
                            </form>
                        </div><!-- /.box -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Admin Tablosu</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>UserName</th>
                                            <th>Sil</th>
                                            <th>Düzenle</th>
                                        </tr>
                                        <?php $select=$conn->query("SELECT * FROM admin",PDO::FETCH_OBJ);?>
                                        <?php while($row=$select->fetch()): ?>
                                        <tr>
                                            <td><?=$row->admin_id?></td>
                                            <td><?=$row->admin_username?></td>
                                            <td><a href="delete_admin.php?id=<?=$row->admin_id?>" class="btn btn-warning">Sil</a></td>
                                            <td><a href="update_admin.php?id=<?=$row->admin_id?>" class="btn btn-primary">Düzenle</a></td>
                                        </tr>
                                    </tbody>
                                    <?php endwhile; ?>
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