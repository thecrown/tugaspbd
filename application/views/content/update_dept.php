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
            <?php if(isset($user_data)){
                    foreach($user_data as $row){
                    ?>
              <?php echo form_open("Administrator_dashboard/data_cek_dept_update/".$row['id']); ?> 
                  <div class="form-group">
                  <label for="exampleInputPassword1">Division Name</label>
                  <input type="text" class="form-control" name="name_dept" value="<?php echo $row['nama_bidang']; ?>" id="exampleInputPassword1" placeholder="Name Division">
                </div>
                <textarea class="ckeditor" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['deskripsi_bidang'];?></textarea>
                <br />
                 <?php }} ?>
                <button class="btn btn-primary" type="submit">Submit</button>
             <?php echo form_close(); ?>
            </div>
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