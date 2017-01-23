!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gold Package
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>Admin/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Gold Pack</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
                <p class="fa fa-pencil-square-o" style="font-size:26px">
                  &#32;Update&#32;
                    <?php 
                      foreach($gold->result() as $row){
                      echo $row->code; }
                    ?>-
                    <?php 
                      foreach($gold->result() as $row){
                      echo $row->name; }
                    ?>
                </p>
              </h3>
            </div>
            <?php echo form_open_multipart('Admin/update_goldpack');?>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                      <div class="form-group form-horizontal">
                        <label for="product" class="control-label col-lg-3">Product<font color="red">*</font></label>
                        <div class="col-lg-9">
                          <textarea class=" form-control" name="product" type="text"><?php foreach($gold->result() as $row){ echo $row->product; }?></textarea><br/>
                          <br/>
                        </div>
                      </div>
                      <div class="form-group form-horizontal">
                        <label for="price" class="control-label col-lg-3">Price <font color="red">*</font></label>
                        <div class="col-lg-9">
                          <input class=" form-control" name="price" type="text" value="<?php foreach($gold->result() as $row){ echo $row->price; }?>" required><br/>
                        </div>
                      </div>
                      <div class="form-group form-horizontal">
                        <label for="stock" class="control-label col-lg-3">Stock <font color="red">*</font></label>
                        <div class="col-lg-9">
                          <input class=" form-control" name="stock" type="text" value="<?php foreach($gold->result() as $row){ echo $row->stock; }?>" required><br/>
                        </div>
                      </div>
                      <div class="form-group">
                        <input  name="code" type="hidden" value="<?php foreach($gold->result() as $row){ echo $row->code; }?>" required>
                      </div>
                      <div class="col-lg-offset-9 col-lg-3">
                        <input type="submit" class="btn btn-primary" value="Update" name="save">
                      </div>
                  <?php echo form_close(); ?>
            </div>
        </div> 
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>