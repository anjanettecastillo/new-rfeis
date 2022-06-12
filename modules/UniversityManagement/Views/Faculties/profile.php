                <div class="row">
                    <div class="col-md-8">
                        <h3><?= 'View ' . $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/faculties"><?= $title?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Faculty Profile
                                        </li>
                                    </ol>
                                </nav>
                    </div>
                </div>
                <div class="card shadow-sm rounded" id="main-holder">
                <div class="card-header">
                    <a href="/faculties/u/<?= $id; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>Employee Number</center>
                                        </th>
                                        <th scope="col">
                                            <center>Name of Faculty</center>
                                        </th>
                                        <th scope="col">
                                            <center>Department</center>
                                        </th>
                                        <th scope="col">
                                            <center>Position</center>
                                        </th>
                                        <th scope="col">
                                            <center>Contact Number</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <center><?= ucwords($faculty['employee_number']); ?></center>
                                        </td>uy
                                        <td>
                                            <center><?= ucfirst($faculty['first_name']).' '.(!empty($faculty['middle_name'])?ucfirst(substr($faculty['middle_name'],0,1)).'. ':null).ucfirst($faculty['last_name']).' '.(!$faculty['extension_name'] == 'none' ?$faculty['extension_name'].' ':null); ?></center>
                                        </td>
                                        <td>
                                            <center><?= ucfirst($faculty['department']); ?></center>
                                        </td>
                                        <td>
                                            <center><?= ucfirst($faculty['position']); ?></center>
                                        </td>
                                        <td>
                                            <center><?= ucfirst($faculty['contact_number']); ?></center>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>