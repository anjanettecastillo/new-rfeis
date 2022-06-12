<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm <?=(session()->get('role_id') <= 2)?'':'fixed-top'?>" id="<?= $page_title == 'ORS | Sign in' ? 'navbar-opacity' : null ?>">
    
    <?php if ($page_title != 'RFEIS | Sign in') : ?>
        <?php if(session()->get('role_id') <= 2):?>
            <a id="show-sidebar" class="btn btn-lg btn-light" href="#">
            <b>|</b><i class="fas fa-arrow-right"></i>
        </a>
        <?php endif;?>

        <a class="navbar-brand ml-2" href="">
            <img src="/assets/img/rfeis_logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> RFEIS
        </a>
    <?php endif; ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <?php if ($page_title != 'RFEIS | Sign in') : ?>
            <ul class="navbar-nav <?=(session()->get('role_id') <= 2)?'ml-auto':'m-auto'?>">
        <?php if(session()->get('role_id') > 2):?>
            <?php if (isset($_SESSION['modules'])): ?>
              <?php foreach ($_SESSION['modules']as $modules): ?>
                <li class="nav-item mr-3">
                    <div class="dropdown">
                        <a class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=$modules['icon']?>
                            <span class="align-justify"><?=ucwords(esc($modules['module']))?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                                <?php if ($permissions['module_id'] == $modules['module_id'] && $permissions['permission_type'] == 11): ?>
                                        <a class="dropdown-item" href="<?='/'.$permissions['slug']?>"><?=ucwords($permissions['permission'])?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
              <?php endforeach; ?>
        <?php endif;?>
            <?php endif; ?>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-responsive img-fluid rounded-circle mr-1" width="20" height="20" src="/assets/img/user.jpg" alt="User picture">
                            <?= ucwords(session()->get('first_name')) ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <!-- <a class="dropdown-item" href="#"><i class="fas fa-user-alt"></i> Profile</a>
                            <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="/signout"><i class="fas fa-sign-out-alt"></i> Sign out</a>
                        </div>
                    </div>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>
<?php if(session()->get('role_id') > 2):?>
    <br>
    <br>
<?php endif;?>