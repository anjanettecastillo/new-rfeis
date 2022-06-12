<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>

<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-8 bg-image">
    </div>
    <div class="col-md-8 col-lg-4 bg-light">
      <div class="login d-flex align-items-center py-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-lg-10  mx-auto">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 mx-auto">
             <!-- Sign In Form -->
                        <center>
                            <img src="/assets/img/rfeis_logo.png" class="img-fluid w-25 mb-2">
                            <div class="h5 mb-5"><b><?= strtoupper($title) ?></b></div>
                        </center>
                        <form method="post" action="/" class="mt-5">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="frm-icon-login"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-md" id="frmUser" placeholder="Username" name="username" aria-label="Username" value="<?= set_value('username'); ?>" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="frm-icon-login"><i class="fas fa-unlock-alt"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-md" id="frmPassword" placeholder="Password" name="password" aria-label="password" aria-describedby="basic-addon1">
                                <div class="input-group-prepend" id="showPassHolder">
                                    <span class="input-group-text" id="showPass"><a onclick="showPassword()"><i class="fas fa-eye" id="showPassIcon"></i></a></span>
                                </div>
                            </div>
                            <div class="form-row">
                                <?php if (isset($validation)) : ?>
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <button type="submit" id="btnSignIn" class="btn btn-lg btn-success w-100"><i class="fas fa-sign-in-alt"></i> Sign In</button>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-12 col-sm-12 mx-auto">
                <div class="col-md-12" id="copyright">
                    <img src="/assets/img/TIRD.png" width="100px" height="100px" alt=""> <br>
                    <span>Copyright &copy 2021 <b>TIRD Dev Team</b><br>All Rights Reserved</span>
                </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endsection('content'); ?>