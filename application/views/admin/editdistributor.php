!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distributor
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>Admin/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User - Distributor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><p class="fa fa-user-plus" style="font-size:26px">&#32;Edit Distributor Code <?php foreach($user->result() as $row){ echo $row->code; }?></p></h3>
            </div>
            <?php echo form_open_multipart('Admin/editdatauser');?>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                      <input class=" form-control" name="code" type="hidden" value="<?php foreach($user->result() as $row){ echo $row->code; }?>"><br/>
                      <input class=" form-control" name="hak_akses" type="hidden" value="2"><br/>
                      <div class="form-group form-horizontal">
                        <label for="name" class="control-label col-lg-3">Name <font color="red">*</font></label>
                        <div class="col-lg-9">
                          <input class=" form-control" name="name" type="text" value="<?php foreach($user->result() as $row){ echo $row->name; }?>" required><br/>
                        </div>
                      </div>
                      <div class="form-group form-horizontal">
                        <label for="distributor_code" class="control-label col-lg-3">Distributor Code<font color="red">*</font></label>
                        <div class="col-lg-9">
                          <input class=" form-control" name="distributor_code" type="text" value="<?php foreach($user->result() as $row){ echo $row->distributor_code; }?>" required>
                          <?php echo form_error('distributor_code'); ?><br/>
                        </div>
                      </div>
                      <div class="form-group form-horizontal">
                        <label for="distributor_name" class="control-label col-lg-3">Name <font color="red">*</font></label>
                        <div class="col-lg-9">
                          <input class=" form-control" name="distributor_name" type="text" value="<?php foreach($user->result() as $row){ echo $row->distributor_name; }?>" required><br/>
                        </div>
                      </div>
                      <div class="form-group form-horizontal">
                        <label for="email" class="control-label col-lg-3">Email <font color="red">*</font></label>
                        <div class="col-lg-9">
                          <input class=" form-control" name="email" type="email" value="<?php foreach($user->result() as $row){ echo $row->email; }?>" required>
                          <?php echo form_error('email'); ?><br/>
                        </div>
                      </div>
                      <div class="form-group form-horizontal">
                        <label for="password" class="control-label col-lg-3">Password <font color="red">*</font></label>
                        <div class="col-lg-9">
                          <input class=" form-control" name="password" type="text" Placeholder="Input new Password" required>
                          <br/>
                        </div>
                      </div>
                      <div class="form-group form-horizontal">
                        <label for="ktp" class="control-label col-lg-3">Image <font color="red">*</font></label>
                        <div class="col-lg-9">
                          <input type="file"  name="userfile" required>
                            <font class="help-block">Upload new image .jpg|.png</font>
                        </div>    
                      </div>
                      <div class="form-group">
                        <input  name="hak_akses" type="hidden" value="1" required>
                      </div>
                      <div class="col-lg-offset-9 col-lg-3">
                        <input type="submit" class="btn btn-primary" value="Edit Distributor" name="save">
                      </div>
                  <?php echo form_close(); ?>
            </div>
        </div> 
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>