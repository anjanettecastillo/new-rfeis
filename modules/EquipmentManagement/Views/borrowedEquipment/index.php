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
            <div class="card-header">
                <a class="btn btn-info mb-4" href="/borrowed-equipments/a" role="button">
                    <i class="fas fa-plus-circle"></i> Borrow 
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover responsive" width="100%" id="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>#</center>
                                        </th>
                                        <th scope="col">
                                            <center>Event Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Equipment Name</center>
                                        </th>
                                        <th scope="col">
                                            <center>Quantity</center>
                                        </th>
                                        <th scope="col">
                                            <center>Equipment Status</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach ($borrowedEquipments as $row) : ?>
                                        <tr>
                                            <th scope="row">
                                                <center><?= $id ?></center>
                                            </th>
                                            <td>
                                                <center><?= ucwords($row['event_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['equipment_name']) ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['quantity']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['equipment_status']); ?></center>
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