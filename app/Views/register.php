<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<div class="container-fluid" id="login-container-bg">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6 col-sm-4 offset-sm-4 mt-5 mx-auto">
            <div class="card mt-5 rounded shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="h2">User Registration</div>
                            <hr>
                        </div>
                    </div>
                    <form method="post" action="/register">
                        <div class="form-group">
                            <label for="inputAddress2">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username');?>" placeholder="Username">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
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
                        <div class="form-row">
                            <div class="form-group col-6">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                            <div class="col-6">
                                <a href="/">Aready have an account.</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content'); ?>