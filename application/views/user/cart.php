<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Cart
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>Userpage/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My Cart</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">My Cart</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5px">No</th>
                  <th>Package Code</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      $i = 1;
                      foreach($cart->result() as $row){ 
                  ?>
                <tr>
                  <td><center><?= $i ?></center></td>    
                  <td><?php echo $row->package_code; ?></td>
                  <td><?php echo $row->qty; ?></td>
                  <td><?php echo number_format($row->price,2); ?></td>
                  <td><a class="btn btn-primary" href="<?= base_url() ?>Userpage/editqty/<?= $row->order_code ?>">Edit Quantity</a>&#32;&#32;&#32;<a class="btn btn-warning" href="<?= base_url() ?>Userpage/putorder/<?= $row->order_code ?>">Order</a>&#32;&#32;&#32;<a class="btn btn-danger" href="<?= base_url() ?>Admin/delete/<?= $row->order_code ?>" onClick="return doconfirm();">Delete</a></td>
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