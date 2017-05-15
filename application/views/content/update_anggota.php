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
              <?php echo form_open('Administrator_dashboard/data_cek_anggota'); ?>
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputPassword1">Nama Anggota</label>
                  <input type="text" class="form-control" name="nama_anggota" value="<?=$data_anggota->nama; ?>"; id="exampleInputPassword1" placeholder="Nama Anggota">
                  </div>
              </div>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Alamat Anggota</label>
                <textarea class="ckeditor" name="alamat_anggota" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$data_anggota->alamat; ?></textarea>
              </div>
              <!--sampe sini min-->
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control select2" style="width: 100%;" name="jabatan">
                  <option value="<?=$data_anggota->kd_jabatan; ?>">Pilih Jabatan</option>
                 
                  <?php foreach ($jabatan as $row) { ?>
                  <option value="<?=$row['id']; ?>"><?=$row['Nama_Jabatan']; ?></option>
                  <?php } ?>
                </select>
              </div>
              </div>    
          
              <div class="col-md-6">
                <div class="form-group">
                <label>Divisi</label>
                <select class="form-control select2" style="width: 100%;" name="divisi">
                  <option value="">Pilih Divisi</option>
                  <?php foreach ($divisi as $row) { ?>
                  <option value="<?=$row['id']; ?>"><?=$row['nama_bidang']; ?></option>
                  <?php } ?>
                </select>
              </div>
           </div>
            
              <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Masuk:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" id="myDate" name="tanggal" class="form-control pull-right" >
                </div>
              </div>
            </div>
          </div>
            
            <div class="form-group">
                  <input type="radio" name="status" value="Aktif" class="flat-red">
                    <label>
                      Aktif  
                    </label>
                  <br />
                  <input type="radio" name="status" value="NonAktif" class="flat-red">
                    <label>
                      Tidak Aktif  
                    </label>
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