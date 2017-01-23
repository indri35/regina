<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Silver Package
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>Userpage/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Silver Pack</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-5">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/dist/img/silver.png" alt="User profile picture">

              <h3 class="profile-username text-center">
                <?php 
                    foreach($silver->result() as $row){
                    echo $row->name; }
                ?>
              </h3>

              <p class="text-muted text-center">
                <?php 
                    foreach($silver->result() as $row){
                    echo $row->code; }
                ?>
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Product</b> <br/>
                  <a>
                    <?php 
                      foreach($silver->result() as $row){
                      echo $row->product; }
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Price</b> <br/>
                  <a>Rp
                    <?php 
                      foreach($silver->result() as $row){
                      echo number_format($row->price,2); }
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Stock</b> <br/>
                  <a>
                    <?php 
                      foreach($silver->result() as $row){
                      echo $row->stock; }
                    ?>
                  </a>
                </li>
              </ul>

              <a href="<?= base_url() ?>Userpage/silveraddcart" class="btn btn-warning btn-block"><i class="fa fa-cart-plus"></i><b> Add to Cart</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
        <!-- /.col -->
        <div class="col-xs-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail SKU Silver Pack</h3>
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
                      foreach($silverdetail->result() as $row){ 
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>