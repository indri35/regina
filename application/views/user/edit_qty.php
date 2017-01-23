<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row"><div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <b>Choose your Quantity</b>
  </div>
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo base_url() ?>assets/dist/img/cart.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <?php echo form_open('Userpage/edit_qty'); ?>
    <div class="lockscreen-credentials">
      <div class="input-group">
        <input class=" form-control" name="qty" type="text" value="<?php foreach($cart->result() as $row){ echo $row->qty; }?>" required><br/>
        <input class=" form-control" name="order_code" type="hidden" value="<?php foreach($cart->result() as $row){ echo $row->order_code; }?>">
        <div class="input-group-btn">
          <button type="submit" name="save" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    This Quantity for <?php foreach($cart->result() as $row){ echo $row->package_code; }?>
  </div>
<!-- /.center -->
</div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>