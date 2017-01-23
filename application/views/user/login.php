<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <h3 class="text-center"><?php echo validation_errors(); ?></h3>
                  <?php echo form_open('loginverify'); ?>
                  <form class="form-validate form-horizontal">
                    <div class="form-group">
                      <label for="code" class="control-label col-lg-3">User Code </label>
                      <div class="col-lg-9">
                        <input class=" form-control" name="code" id="code" type="text" placeholder="" required><br/>
                      </div>
                    </div>    
                    <div class="form-group">
                      <label for="password" class="control-label col-lg-3">Password </label>
                      <div class="col-lg-9">
                        <input class=" form-control" name="password" id="password" type="password" placeholder="" required><br/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-7">
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox"> Remember Me
                          </label>
                        </div>
                      </div>
                      <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                      </div>
                    </div>
                  </form>
                  <a href="<?php echo base_url() ?>UserPage/recover">I forgot my password</a><br>
                  <a href="<?php echo base_url() ?>UserPage/register" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->