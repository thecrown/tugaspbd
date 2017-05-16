<script>
  //function upload foto
        function PreviewImage() {
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
          oFReader.onload = function (oFREvent)
           {
              document.getElementById("uploadPreview").src = oFREvent.target.result;
          };
        };
 </script>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          
          <div class="box">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <?php echo form_open_multipart('Administrator_dashboard/cek_users_data'); ?>
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label>Anggota</label>
                <select class="form-control select2" style="width: 100%;" name="id_pengurus">
                  <option value="">Pilih Anggota</option>
                  <?php foreach ($data_anggota as $row) { ?>
                  <option value="<?=$row['id_anggota']; ?>"><?=$row['nama']; ?></option>
                  <?php } ?>
                </select>
              </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" name="username" id="exampleInputPassword1" placeholder="Username">
                  </div>
              </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                  </div>
              </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Match Password</label>
                  <input type="password" class="form-control" name="password2" id="exampleInputPassword1" placeholder="Password">
                  </div>
              </div>
              </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="Email" class="form-control" hidden name="Email" id="exampleInputPassword1" placeholder="Email">
                  </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Role</label>
                <select class="form-control select2" style="width: 100%;" name="Role">
                  <option value="">Pilih Jabatan</option>
                  <option value="Administrator">Administrator</option>
                  <option value="Ketua">Ketua</option>
                </select>
              </div>
              </div>    
          </div>    
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama" id="exampleInputPassword1" placeholder="Nama">
                  </div>
              </div>   
          </div>           
             <label>Status</label>
            <div class="form-group">
                  <input type="radio" name="status" value="Aktif" class="flat-red">
                    <label>Aktif</label>
                  <br />
                  <input type="radio" name="status" value="NonAktif" class="flat-red">
                    <label>Tidak Aktif</label>
              </div>

               <div class="form-group">
                      <label for="exampleInputFile">Foto Produk</label>
                      <p class="help-block">Silahkan pilih gambar produk anda.</p>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <span class="btn btn-default btn-file">
                            Browse...<input type="file" name="foto" id="uploadImage" accept=".jpg,.jpeg,.png" onchange="PreviewImage();" required="">
                          </span>
                        </span>
                      </div>
                      <img id="uploadPreview" src="<?=base_url('assets/img/preview/images.jpg');?>" style="max-width:200px;" /><br/>

                    </div>
                <br />

                <button class="btn btn-primary" type="submit">Submit</button>
             <?php echo form_close(); ?>
            </div>
            <?php
                if(isset($error)){
                echo "<center>";
                echo $error; 
                echo "</center>";
                    }
                ?>
                <?php
                if(validation_errors()){
                echo "<center>";
                echo validation_errors(); 
                echo "</center>";
                    }
                ?>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>