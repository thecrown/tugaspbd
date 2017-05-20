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
                  <th>Username</th>
                  <th>Nama</th>
                  <!--<th>Password</th>-->
                  <th>Role</th>
                  <th>Email</th>
                  <th>Departmen</th>
                  <th>status</th>
                  <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   <?php $i = 0?>
                  <?php if(isset($user_data)){
                   foreach($user_data as $row){
                   $i++;
                   ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['nama_user']; ?></td>
                  <!--<td><?php echo $row['password']; ?></td>-->
                  <td><?php echo $row['role']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['nama_bidang']; ?></td>
                  <td><?php echo $row['Status']; ?></td>
                 
                  
                   <td>
                      <a href="<?php echo base_url('Administrator_dashboard/delete_users/');?><?php echo $row['id_users'];?>"><button onclick="return confirm('are you sure? delete this Anggota <?php echo $row['nama'];?>');" class="btn btn-danger"><i class="fa fa-trash bigicon"></i></button></a> 
                      <a href="<?php echo base_url('Administrator_dashboard/update_users/'); ?><?php echo $row['id_users'];?>/<?php echo $row['id_bidang'];?>"><button class="btn btn-default"><i class="fa fa-upload"></i></button></a>
                                            
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