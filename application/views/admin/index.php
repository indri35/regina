<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">                 
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3>
                <?php 
                    foreach($pending_order->result() as $row){
                    echo $row->pending_order; }?>
              </h3>
              <p>Pending Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-fuchsia">
            <div class="inner">
              <h3>
                  <?php 
                    foreach($distributor->result() as $row){
                    echo $row->distributor; }?>
              </h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                   
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php 
                    foreach($silver->result() as $row){
                    echo $row->stock; }?>
              </h3>
              <p>Silver Pack</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cart "></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php 
                    foreach($bronze->result() as $row){
                    echo $row->stock; }?>
              </h3>
              <p>Bronze Pack</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php 
                    foreach($platinum->result() as $row){
                    echo $row->stock; }?>
              </h3>
              <p>Platinum Pack</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
                <?php 
                    foreach($gold->result() as $row){
                    echo $row->stock; }?>
              </h3>
              <p>Gold Pack</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cart"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List All Order</h3>
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
                      foreach($all_order->result() as $row){ 
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
                        <a class="btn btn-primary" href="<?= base_url() ?>Admin/accept/<?= $row->order_code ?>/<?= $row->package_code ?>">Accept</a>&#32;&#32;&#32;<a class="btn btn-danger" href="<?= base_url() ?>Admin/delete/<?= $row->order_code ?>">Delete</a>
                      <?php 
                        ;} else {
                      ?>
                      <a class="btn btn-danger" href="<?= base_url() ?>Admin/delete/<?= $row->order_code ?>">Delete</a>
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


