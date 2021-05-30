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
                    Görevli İşlemleri
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

                                        </tr>
                                        <?php $select=$conn->query("SELECT * FROM gorevli",PDO::FETCH_OBJ);?>
                                        <?php while($row=$select->fetch()): ?>
                                        <tr>
                                            <td><?=$row->adsoyad?></td>
                                            <?php 
                                            if($row->status==1){
                                        ?>
                                            <td>
                                                <button class="btn btn-warning">Görevli</button>
                                            </td>
                                            <td><a href="mission_complated.php?id=<?=$row->id ?>" name="bitti"
                                                    class="btn btn-success">Görev Bitti</a>
                                            </td>
                                            <?php  }else{ ?>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="gorev_ata.php?id=<?=$row->id?>" name="kaydet"
                                                    class="btn btn-primary">Görev Ata</a>

                                            </td>
                                            <?php } ?>

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