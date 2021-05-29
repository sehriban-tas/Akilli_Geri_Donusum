<?php
ob_start();
require("layouts/head.php");
require("layouts/header.php");
require("layouts/leftmenu.php");
require("layouts/db.php");
require("layouts/sessions.php");
?>
<?php 
if(isset($_POST['submit']) && (!empty($_POST['username'])) && (!empty($_POST['lastpassword'])) && (!empty($_POST['newpassword'])) && (!empty($_POST['confirmpassword']))){
   
    $errMsg='';
    $id=$_GET['id'];
    $username=$_POST['username'];
    $lastpassword=$_POST['lastpassword'];
    $password=$_POST['newpassword'];
    $confirm=$_POST['confirmpassword'];

    if($password!=$confirm){
        $errMsg ='Şifre doğrulama yanlış';
    }
    if(strlen($password>6)){
        $errMsg ='Şifre uzunluğu min 6 olmalı!';
    }
    $select=$conn->prepare("SELECT *FROM admin WHERE admin_id=:id");
    $select->execute([
        'id'=>$id,
    ]);
    $row=$select->fetch(PDO::FETCH_ASSOC);

    if(hash_equals($row['admin_password'], crypt($lastpassword, $row['admin_password']))) {
        $hashed_password = crypt($password);
        try {
            
           $update=$conn->prepare("UPDATE admin SET admin_username=:username, admin_password=:password WHERE admin_id=:id ");
           $update->execute([
            'username' => $username,
            'password' => $hashed_password,
            'id'=>$id,
             ]);

           header("Location:admin.php?succsess=ok");
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    else{
        $errMsg ='Şifreyi Yanlış!';
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
                    
                    <li class="active">Admin Güncelle</li>
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
                                <h3 class="box-title">Admin Güncelle</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                    <?php $id=$_GET['id']; $select2=$conn->query("SELECT *FROM admin WHERE admin_id='$id'",PDO::FETCH_OBJ);$select2->execute(['id'=>$_GET['id']]); ?>
                                   <?php while($row=$select2->fetch()):?>
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                        value="<?=$row->admin_username?>"  placeholder="Kullanıcı Adı Gir">
                                        <?php endwhile; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Eski Password</label>
                                        <input type="password" name="lastpassword" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Yeni Password</label>
                                        <input type="password" name="newpassword" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Again Password</label>
                                        <input type="password" name="confirmpassword" class="form-control"
                                            id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" name="submit" value="Güncelle" class="btn btn-primary">
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