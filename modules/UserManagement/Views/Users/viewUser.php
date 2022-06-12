<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<?= $this->include('templates/navbar'); ?>
<?= $this->include('templates/sidenav'); ?>
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item h4"><a href="/users"><?= $title ?></a></li>
                                <li class="breadcrumb-item h4 active" aria-current="page"><?= $action ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
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
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <center><?= ucwords($users->first_name) . " " . ucwords($users->last_name) ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtolower($users->role_name) ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtolower($users->username) ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/users/u/<?= $users->id ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                </center>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>
</main>
<?= $this->endsection('content'); ?>