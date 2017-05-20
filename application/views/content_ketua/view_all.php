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
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Tahun Masuk</th>
                  <th>Divisi</th>
                  <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   <?php $i = 0?>
                  <?php if(isset($data_anggota)){
                   foreach($data_anggota as $row){
                   $i++;
                   ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['Nama_Jabatan']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><?php echo $row['tahun_masuk']; ?></td>
                  <td><?php echo $row['nama_bidang']; ?></td>
                 
                  
                   <td>
                      <a href="<?php echo base_url('Ketua_dashboard/delete_anggota/');?><?php echo $row['id_anggota'];?>"><button onclick="return confirm('are you sure? delete this Anggota <?php echo $row['nama'];?>');" class="btn btn-danger"><i class="fa fa-trash bigicon"></i></button></a> 
                      <a href="<?php echo base_url('Ketua_dashboard/update_anggota/'); ?><?php echo $row['id_anggota'];?>"><button class="btn btn-default"><i class="fa fa-upload"></i></button></a>
                                            
                   </td>
                </tr>
                </tbody>
                <?php }}?>
                <tfoot>
                <tr>
                  <th>no</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Tahun Masuk</th>
                  <th>Divisi</th>
                  <th>Action</th>
                  </tr>
                </tfoot>
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