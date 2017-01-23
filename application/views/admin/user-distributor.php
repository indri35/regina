<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>Admin/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User - Distributor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="<?php echo base_url() ?>Admin/adddistributor"><p class="fa fa-user-plus" style="font-size:26px">&#32;Add Distributor</p></a></h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">No</th>
                  <th>Image</th>
                  <th>User Code</th>
                  <th>Name</th>
                  <th>Distributor Code</th>
                  <th>Distributor Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      $i = 1;
                      foreach($distributor->result() as $row){ 
                  ?>
                <tr>
                  <td><center><?= $i ?></center></td>    
                  <td><img src="<?php echo base_url() ?>assets/dist/img/<?php echo $row->image; ?>"width="100" height="100"></td>
                  <td><?php echo $row->code; ?></td>
                  <td><?php echo $row->name; ?></td>
                  <td><?php echo $row->distributor_code; ?></td>
                  <td><?php echo $row->distributor_name; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td>
                      <a class="btn btn-warning" href="<?= base_url() ?>Admin/editdistributor/<?= $row->code ?>">Edit</a>&#32;&#32;&#32;<a class="btn btn-danger" href="<?= base_url() ?>Admin/deletedistributor/<?= $row->code ?>" onClick="return doconfirm();">Delete</a>
                  </td>
                </tr>
                <?php
                    $i++; }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>