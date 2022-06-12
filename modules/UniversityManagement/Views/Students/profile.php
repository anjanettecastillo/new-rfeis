                <div class="row">
                    <div class="col-md-8">
                        <h3><?= 'View ' . $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/students"><?= $title?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Student Profile
                                        </li>
                                    </ol>
                                </nav>
                    </div>
                </div>
                <div class="card shadow-sm rounded" id="main-holder">
                <div class="card-header">
                    <a href="/students/u/<?= $id; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                        <div class="table-responsive" width="100%">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">
                                            <center>Student Number</center>
                                        </th>
                                        <th scope="col">
                                            <center>Name of Student</center>
                                        </th>
                                        <th scope="col">
                                            <center>Year</center>
                                        </th>
                                        <th scope="col">
                                            <center>Course</center>
                                        </th>
                                        <th scope="col">
                                            <center>Organization</center>
                                        </th>
                                        <th scope="col">
                                            <center>Email Address</center>
                                        </th>
                                        <th scope="col">
                                            <center>Contact Number</center>
                                        </th>
                                        <th scope="col">
                                            <center>Facebook Account</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($students)):?>
                                      <?php
                                    foreach ($students as $row) : ?>
                                    <tr>
                                            <td>
                                                <center><?= strtoupper(esc($row['student_number'])); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['first_name']).' '.(isset($row['middle_name'])?ucfirst(substr($row['middle_name'],0,1)).'. ':null).ucfirst($row['last_name']).' '.(isset($row['extension_name'])?$row['extension_name'].' ':null); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucfirst($row['year']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['course_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['organization_name']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['email_address']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['contact_number']); ?></center>
                                            </td>
                                            <td>
                                                <center><?= ucwords($row['facebook_account']); ?></center>
                                            </td>
                                    </tr>
                                    <?php
                                    endforeach; ?>
                                    <?php endif;?>

                                </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>