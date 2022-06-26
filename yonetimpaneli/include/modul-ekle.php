<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Modul Ekle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Modul Ekle</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
      <?php 
        if($_POST){

            $calistir=$VT->ModulEkle();
            if($calistir!=false){
                echo '<div class="alert alert-success"> Modülünüz Başarı İle Eklenmiştir.</div>';
                ?>
    <meta http-equiv="refresh" content="2;url=<?=SITE?>">
    <?php
            }
            else{
                echo '<div style="width:300px;" class="alert alert-success">İşleminiz Başarı İle Kaydedilmiştir.</div>';
            }
        }
        
        ?>  
      
      
      <div class="col-md-6">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modül Tanımlama Ekranı</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="#" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Başlık</label>
                    <input type="text" class="form-control" name="baslik" placeholder="Modül İsmini Yazınız">
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="durum" value="1" checked="checked">
                    <label class="form-check-label" for="exampleCheck1">Aktif Yap</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Modul Ekle</button>
                </div>
              </form>
            </div>
</div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>