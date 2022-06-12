<div class="page-wrapper chiller-theme toggled">
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a class="navbar-brand mt-2" href="">
                    <center>
                        <img src="/assets/img/rfeis_logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> RFEIS
                    </center>
                </a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul>
            <?php if (isset($_SESSION['modules'])): ?>
              <?php foreach ($_SESSION['modules']as $modules): ?>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <?=$modules['icon']?>
                        <span class="align-justify"><?=ucwords(esc($modules['module']))?></span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <?php foreach ($_SESSION['permissions'] as $permissions): ?>
                                <?php if ($permissions['module_id'] == $modules['module_id'] && $permissions['permission_type'] == 11): ?>
                                    <li>
                                        <a href="<?='/'.$permissions['slug']?>"><?=ucwords($permissions['permission'])?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>

                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
    </nav>
    <!-- g$vl6p8vPT71E^O*JebO -->