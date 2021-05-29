<?php
    require_once('layouts/head.php');
    require_once('layouts/header.php');
    require_once('layouts/leftmenu.php');
    require_once('layouts/db.php');
?>



<body class="skin-blue">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Görevli  İşlemleri
                    <small>Preview</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                    <li class="active">Görevli İşlemleri</li>
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
                                <h3 class="box-title">Görevli Ekle</h3>
                            </div><!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="fonksiyonlar.php" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ad Soyad</label>
                                        <input type="text" name="adsoyad" class="form-control" id="exampleInputEmail1"
                                            placeholder="Kullanıcı Adı Gir">
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <input type="submit" name="gorevli_ekle" value="Ekle" class="btn btn-warning">
                                </div>
                            </form>
                        </div><!-- /.box -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Görev Tablosu</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Ad-Soyad</th>
                                            <th>Görev Durum</th>
                                            <th>Sil</th>
                                            <th>Düzenle</th>
                                        </tr>
                                        <?php $select=$conn->query("SELECT * FROM gorevli",PDO::FETCH_OBJ);?>
                                        <?php while($row=$select->fetch()): ?>
                                        <tr>
                                            <td><?=$row->adsoyad?></td>
                                        <?php 
                                            if($row->status==1){
                                        ?>
                                            <td>
                                            <button class="btn btn-success">Görevli</button>
                                            </td>
                                            <?php  }else{ ?>
                                            <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            Görev Ata
                                            </button>

                                            <!-- Modal -->
                                            <form role="form"name="my_form" action="fonksiyonlar.php" method="post">
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Görevler</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <select class="form-select col-lg-12" aria-label="Default select example">
                                                        <?php
                                                        
                                                        $gorevler = $conn->query("SELECT * FROM bins where status=1");
                                                        while($row=$gorevler->fetch()){                                                   
                                                        
                                                        ?>
                                                        <option value="<?=$row->bins_id ?>"><?= substr(($row['bins_name']."-".$row['bins_adress']),0, 60); ?>..</option>

                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                                        <button type="button" name="test" class="btn btn-primary">Kaydet</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                            </td>
                                            <?php } ?>

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


<?php require_once('layouts/footer.php'); ?>