<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<?= $this->include('templates/navbar'); ?>
<?php if(session()->get('role_id') <= 2):?>
    <?= $this->include('templates/sidenav'); ?>
<?php endif;?>

<main class="page-content <?=(session()->get('role_id') <= 2)?' ':'mt-5'?>">
    <div class="<?=(session()->get('role_id') <= 2)?'container-fluid':'container mt-5'?>">
        <div class="row">
            <div class="col-md-12">
                <?= view(esc($view)) ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" id="copyright">
                    <img src="/assets/img/TIRD.png" width="50px" height="50px" alt=""> <br>
                    <span>Copyright &copy 2021 <b>TIRD Dev Team</b>. | All Rights Reserved</span>
                </div>
            </div>
        </div>
    </footer>
</main>
<?= $this->endsection('content'); ?>
