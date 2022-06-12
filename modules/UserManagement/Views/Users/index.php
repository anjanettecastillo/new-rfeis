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
            <div class="card-header">
                        <a class="btn btn-info mb-3" href="/users/a" role="button">
                             <i class="fas fa-plus-circle"></i> add 
                        </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover responsive" id="table" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Name of User</center>
                                        </th>
                                        <th scope="col">
                                            <center>Role</center>
                                        </th>
                                        <th scope="col">
                                            <center>Username</center>
                                        </th>
                                        <th scope="col">
                                            <center>Email Address</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ctr = 1;
                                    foreach ($users as $user) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $ctr ?></center>
                                            <td>
                                                <center><?= ucwords($user['first_name']) . " " . ucwords($user['last_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtolower($user['role_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtolower($user['username']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtolower($user['email_address']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/users/u/<?= $user['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i></a>
                                                    <a class="btn btn-sm btn-danger" onclick="confirmDelete('/users/d/',<?= $user['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true"><i class="fas fa-trash-alt"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php $ctr++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
