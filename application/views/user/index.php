<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>Userpage/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-6">
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

              <a href="<?= base_url() ?>Userpage/silverdetail" class="btn btn-primary btn-block"><b>Detail Package</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
        <div class="col-xs-6">
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

              <a href="<?= base_url() ?>Userpage/bronzedetail" class="btn btn-primary btn-block"><b>Detail Package</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>     
        <div class="col-xs-6">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/dist/img/platinum.png" alt="User profile picture">

              <h3 class="profile-username text-center">
                <?php 
                    foreach($platinum->result() as $row){
                    echo $row->name; }
                ?>
              </h3>

              <p class="text-muted text-center">
                <?php 
                    foreach($platinum->result() as $row){
                    echo $row->code; }
                ?>
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Price</b> <br/>
                  <a>Rp
                    <?php 
                      foreach($platinum->result() as $row){
                      echo number_format($row->price,2); }
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Stock</b> <br/>
                  <a>
                    <?php 
                      foreach($platinum->result() as $row){
                      echo $row->stock; }
                    ?>
                  </a>
                </li>
              </ul>

              <a href="<?= base_url() ?>Userpage/platinumdetail" class="btn btn-primary btn-block"><b>Detail Package</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-xs-6">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/dist/img/gold.png" alt="User profile picture">

              <h3 class="profile-username text-center">
                <?php 
                    foreach($gold->result() as $row){
                    echo $row->name; }
                ?>
              </h3>

              <p class="text-muted text-center">
                <?php 
                    foreach($gold->result() as $row){
                    echo $row->code; }
                ?>
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Price</b> <br/>
                  <a>Rp
                    <?php 
                      foreach($gold->result() as $row){
                      echo number_format($row->price,2); }
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Stock</b> <br/>
                  <a>
                    <?php 
                      foreach($gold->result() as $row){
                      echo $row->stock; }
                    ?>
                  </a>
                </li>
              </ul>

              <a href="<?= base_url() ?>Userpage/golddetail" class="btn btn-primary btn-block"><b>Detail Package</b></a>
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


