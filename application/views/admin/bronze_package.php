<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bronze Package
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>Admin/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bronze Pack</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-5">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/dist/img/bronze.png" alt="User profile picture">

              <h3 class="profile-username text-center">
                <?php 
                    foreach($bronze->result() as $row){
                    echo $row->name; }
                ?>
              </h3>

              <p class="text-muted text-center">
                <?php 
                    foreach($bronze->result() as $row){
                    echo $row->code; }
                ?>
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Product</b> <br/>
                  <a>
                    <?php 
                      foreach($bronze->result() as $row){
                      echo $row->product; }
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Price</b> <br/>
                  <a>Rp
                    <?php 
                      foreach($bronze->result() as $row){
                      echo number_format($row->price,2); }
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Stock</b> <br/>
                  <a>
                    <?php 
                      foreach($bronze->result() as $row){
                      echo $row->stock; }
                    ?>
                  </a>
                </li>
              </ul>

              <a href="<?= base_url() ?>Admin/bronzeupdate" class="btn btn-primary btn-block"><b>Update</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
        <!-- /.col -->
        <div class="col-xs-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail SKU Bronze Pack</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">No</th>
                  <th>SKU</th>
                  <th>Isi/pcs</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      $i = 1;
                      foreach($bronzedetail->result() as $row){ 
                  ?>
                <tr>
                  <td><center><?= $i ?></center></td>    
                  <td><?php echo $row->SKU; ?></td>
                  <td><?php echo $row->isi; ?></td>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Order Bronze Pack</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">No</th>
                  <th>User Code</th>
                  <th>Order Code</th>
                  <th>Package Code</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      $i = 1;
                      foreach($bronze_order->result() as $row){ 
                  ?>
                <tr>
                  <td><center><?= $i ?></center></td>    
                  <td><?php echo $row->user_code; ?></td>
                  <td><?php echo $row->order_code; ?></td>
                  <td><?php echo $row->package_code; ?></td>
                  <td><?php echo $row->qty; ?></td>
                  <td><?php echo $row->price; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td>
                      <?php if($row->status=="Pending") 
                        {
                      ?>
                        <a class="btn btn-primary" href="<?= base_url() ?>Admin/accept/<?= $row->order_code ?>">Accept</a>&#32;&#32;&#32;<a class="btn btn-danger" href="#">Delete</a>
                      <?php 
                        ;} else {
                      ?>
                      <a class="btn btn-danger" href="<?= base_url() ?>Admin/delete/<?= $row->order_code ?>"onClick="return doconfirm();">Delete</a>
                            <?php
                                ;}
                              ?>
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