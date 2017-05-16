 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>no</th>
                  <th>Nama Proker</th>
                  <th>Deskripsi Proker</th>
                  <th>PJ</th>
                  <th>Pengajuan Dana</th>
                  <th>Status Proposal</th>
                  <th>Nama File</th>
                  <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   <?php $i = 0?>
                  <?php if(isset($proposal_data)){
                   foreach($proposal_data as $row){
                   $i++;
                   ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['nama_proker']; ?></td>
                  <td><?php echo $row['deskripsi_proker']; ?></td>
                  <td><?php echo $row['PJ']; ?></td>
                  <td><?php echo $row['pengajuan_dana']; ?></td>
                  <td><?php echo $row['Status_proposal']; ?></td>
                  <td><?php echo $row['nama_file']; ?></td>
                 
                  
                   <td>
                      <a href="<?php echo base_url('Administrator_dashboard/delete_proposal/');?><?php echo $row['id_proposal'];?>"><button onclick="return confirm('are you sure? delete this Proposal <?php echo $row['nama_proker'];?>');" class="btn btn-danger"><i class="fa fa-trash bigicon"></i></button></a> 
                      <a href="<?php echo base_url('Administrator_dashboard/edit_proposal/'); ?><?php echo $row['id_proposal'];?>"><button class="btn btn-default"><i class="fa fa-upload"></i></button></a>
                                            
                   </td>
                </tr>
                </tbody>
                <?php }}?>
                
              </table>
              <?php if( isset($error)):
                  echo $error;
                  endif;
              ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>