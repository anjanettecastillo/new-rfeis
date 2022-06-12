                <div class="row">
                    <div class="col-md-9">
                        <h3 class="mb-3"><?= $title ?></h3>
                    </div>
                    <div class="col-md-3">
                        
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $title ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <?php if(isset($_SESSION['success'])):?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['success'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif;?>
                <div class="card shadow-sm bg-white rounded" id="main-holder">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table" width="100%">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                <center>Role</center>
                                            </th>
                                            <th scope="col">
                                                <center>Permissions</center>
                                            </th>
                                            <th scope="col">
                                                <center>Actions</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($roles as $role) : ?>
                                            <tr>
                                                <td>
                                                    <center><?= strtolower($role['role_name']); ?></center>
                                                </td>
                                                <td class="permissions-data" id="<?=$role['id']?>"></td>
                                                <td>
                                                    <center>
                                                        <a href="/roles-permissions/u/<?= $role['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i> Edit</a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>