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
              <?php echo form_open('Administrator_dashboard/add_users_2'); ?>
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
               
                <label>Jabatan</label>
                <select class="form-control select2" style="width: 100%;" name="jabatan">
                  <option value="">Pilih anggota</option>
                   <?php foreach ($data_anggota as $row)?><?php { ?>
                  <option value="<?=$row['id_anggota']; ?>"><?=$row['nama']; ?></option>
                  <?php } ?>
                </select>
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