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
              <?php echo form_open_multipart('Ketua_dashboard/cek_data_proposal_update/'.$proposal_data->id_proposal); ?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Judul Proposal</label>
               <input type="text" class="form-control" name="judul_proposal" id="exampleInputPassword1" value="<?= $proposal_data->nama_proker; ?>" placeholder="Judul Proposal">
            </div>      
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Pengajuan Dana</label>
               <input type="text" class="form-control" name="dana_diajukan" id="exampleInputPassword1" value="<?= $proposal_data->pengajuan_dana; ?>" placeholder="Judul Proposal">
            </div>      
          </div>
        </div>    
      <div class="row">
        <div class="col-md-11">
          <div class="form-group">
             <label for="exampleInputPassword1">Deskripsi Proker</label>
                <textarea class="ckeditor" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $proposal_data->deskripsi_proker; ?></textarea>
           </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
           <div class="form-group">
             <label>PJ</label>
             <select class="form-control select2" style="width: 100%;" name="PJ">
                <option value="">pilih penanggung jawab</option>
                 <?php foreach ($PJ as $row) { ?>
                <option value="<?=$row['id_anggota'];?>"><?=$row['nama'];?></option>
                <?php }?>
             </select>
           </div>
        </div>          
      </div> 
      <div class="row">
        <div class="col-md-6">
           <div class="form-group">
             <label>Bidang</label>
             <select class="form-control select2" style="width: 100%;" name="bidang">
                <option value="">Pilih Bidang</option>
               <?php foreach ($bidang as $row) { ?>
                <option value="<?= $row['id'];?>"><?= $row['nama_bidang'];?></option>
             <?php }?>
             </select>
           </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
                      <label for="exampleInputFile">File Proposal</label>
                      <p class="help-block">Silahkan upload file anda disini</p>
                      
                          <input type="file" name="file_porposal" required>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <?php $status = $proposal_data->Status_proposal; ?>
                <input type="radio" name="status"  <?php if($status =="Pengajuan"){echo "checked"; } ?> value="Pengajuan"  class="flat-red">
                    <label>Pengajuan</label>
                        <br />
                <input type="radio" name="status" <?php if($status =="ACC"){echo "checked"; } ?> value="ACC"  class="flat-red">
                    <label>ACC</label>
                        <br />
                <input type="radio" name="status" <?php if($status =="Revisi"){echo "checked"; } ?> value="Revisi"  class="flat-red">
                    <label>Revisi</label>
            </div>
        </div>
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