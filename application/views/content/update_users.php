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
              <?php echo form_open('Administrator_dashboard/cek_users_data_update/'.$data_users->id_users); ?>
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label>Anggota</label>
                <select class="form-control select2" style="width: 100%;" name="id_pengurus" disabled>
                  <option value="<?=$data_users->id_pengurus; ?>"><?=$data_users->nama; ?></option>
                  <?php foreach ($data_anggota as $row) { ?>
                  <option value="<?=$row['id_anggota']; ?>"><?=$row['nama']; ?></option>
                  <?php } ?>
                </select>
              </div>
              </div>
              
              <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" name="username" value="<?=$data_users->username; ?>" id="exampleInputPassword1" placeholder="Username">
                  </div>
              </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" disabled name="password" value="<?=$data_users->password; ?>" id="exampleInputPassword1" placeholder="Password">
                  </div>
              </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Match Password</label>
                  <input type="password" class="form-control" disabled name="password2" value="<?=$data_users->password; ?>" id="exampleInputPassword1" placeholder="Password">
                  </div>
              </div>
              </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="Email" class="form-control"  name="Email" value="<?=$data_users->email; ?>" id="exampleInputPassword1" placeholder="Email">
                  </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Role</label>
                <?php $status = $data_users->status;?>
                <select class="form-control select2" style="width: 100%;" name="Role">
                 <?php $role = $data_users->role;?>
                  <option value="">Pilih Jabatan</option>
                  <option value="Administrator" <?php if($role =="Administrator"){echo "selected"; }?>>Administrator</option>
                  <option value="Ketua" <?php if($role =="Ketua"){echo "selected"; }?>>Ketua</option>
                </select>
              </div>
              </div>    
          </div>    
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" value="<?=$data_users->nama; ?>" name="nama" id="exampleInputPassword1" placeholder="Nama">
                  </div>
              </div>   
          </div>           
             <label>Status</label>
            <div class="form-group">
             <?php $status = $data_users->status;?>
                  <input type="radio" name="status" value="Aktif" <?php if($status =="Aktif"){echo "checked"; }?> class="flat-red">
                    <label>Aktif</label>
                  <br />
                  <input type="radio" name="status" value="NonAktif" <?php if($status =="NonAktif"){echo "checked"; }?>  class="flat-red">
                    <label>Tidak Aktif</label>
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