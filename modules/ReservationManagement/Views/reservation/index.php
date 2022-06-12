                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-3"><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
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
            <div class="card-header col-md-12">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h2><i class="fas fa-address-book"></i> My Reservations</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-info mb-4" href="/reservations/a" role="button">
                            <i class="fas fa-plus-circle"></i> Add Reservation
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover responsive" id="table" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Code</center>
                                        </th>
                                        <th scope="col">
                                            <center>Event Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reserved Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Date</center>
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
                                    foreach (array_reverse($userReservations) as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['reservation_code']); ?></center>
                                            </td>
                                            <td width="15%">
                                                <center><?= ucfirst($row['event_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtoupper($row['reservation_date']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['reservation_remarks']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/reservations/v/<?= $row['id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
                                                    <?php if(!($row['status_id'] >= 2 && $row['status_id'] < 6) || (!($row['status_id'] >= 2 && $row['status_id'] < 6) && session()->get('role_id') <= 2)):?>
                                                        <a href="/reservations/u/<?= $row['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmDelete('/reservations/d/',<?=$row['id']?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Cancel" animation="true"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif;?>
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
        <div class="card shadow-sm bg-white rounded mt-3" id="main-holder">
            <div class="card-header">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <h2><i class="fas fa-address-book"></i> All Reservations</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover responsive" id="table2" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Code</center>
                                        </th>
                                        <th scope="col">
                                            <center>Event Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reserved Facility</center>
                                        </th>
                                        <th scope="col">
                                            <center>Reservation Date</center>
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
                                    foreach (array_reverse($reservations) as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['reservation_code']); ?></center>
                                            </td>
                                            <td width="15%">
                                                <center><?= ucfirst($row['event_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['facility_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= strtoupper($row['reservation_date']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['reservation_remarks']); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="/reservations/v/<?= $row['id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="View" animation="true"><i class="fas fa-eye"></i></a>
                                                    <?php if((session()->get('role_id') <= 2 && $row['status_id'] <= 2) || (session()->get('role_id') <= 2 && $row['status_id'] == 6)):?>
                                                        <a href="/reservations/u/<?= $row['id']; ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit" animation="true"><i class="fas fa-edit"></i></a>
                                                        <a onclick="confirmDelete('/reservations/d/',<?=$row['id']?>)" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Cancel" animation="true"><i class="fas fa-trash-alt"></i></a>
                                                    <?php endif;?>
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