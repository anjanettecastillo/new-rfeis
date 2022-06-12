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
                <a class="btn btn-info mb-4" href="/facility/a" role="button">
                    <i class="fas fa-plus-circle"></i> add 
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover" id="table" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Facility Image</center>
                                        </th>
                                        <th scope="col">
                                            <center>Facility Code</center>
                                        </th>
                                        <th scope="col">
                                            <center>Name of Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Description</center>
                                        </th>
                                        <th scope="col">
                                            <center>Facility fee</center>
                                        </th>
                                        <th scope="col">
                                            <center>Capacity</center>
                                        </th>
                                        <th scope="col">
                                            <center>Status</center>
                                        </th>
                                        <th scope="col">
                                            <center>Actions</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach ($facility as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><img src="<?= '/assets/uploads/facility/'.$row['image'] ?>" class="img-fluid" width="200px" height="150px"></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['facility_code']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['description']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_fee']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['capacity']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_status']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/facility/u/<?= $row['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <a onclick="confirmDelete('/facility/d/',<?=$row['id']?>)" data-toggle="tooltip" data-placement="bottom" title="Delete" animation="true" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php $id++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>