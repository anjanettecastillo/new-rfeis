<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<?= $this->include('templates/navbar'); ?>
<?php if(session()->get('role_id') <= 2):?>
    <?= $this->include('templates/sidenav'); ?>
<?php endif;?>

<main class="page-content">
    <div class="<?=(session()->get('role_id') <= 2)?'container-fluid':'container mt-5'?>">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-3">Dashboard</h3>
                    </div>
                    <div class="col-md-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card shadow-sm bg-white rounded" id="main-holder">
            <div class="card-header">
                <?php if (session()->get('role_id') <= 2) : ?>
                <a href="/reservations/r" class="btn btn-primary mb-5" data-toggle="modal" data-target="#generate-report"><i class="fas fa-file-pdf"></i> Generate Report</a>
                <?php endif;?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number">
                                <h3><?=$users['user']?></h3>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-graduate"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Students</span>
                            <span class="info-box-number"><h3><?=$student['students']?></h3></span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-tie"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Faculties</span>
                            <span class="info-box-number"><h3><?=$faculty['faculty']?></h3></span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-sitemap"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Organizations</span>
                            <span class="info-box-number"><h3><?=$orgs['org']?></h3></span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title mt-3"><b>Monthly Recap Report</b></h2>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div id="canvas-holder">
                        <canvas id="canvas-month"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div id="canvas-holder">
                        <canvas id="chart-facility"></canvas>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-3"><b>Activity Log</b></h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Activity</th>
                                                <th>Timestamp</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $ctr=1;?>
                                                <?php foreach($activity as $log):?>
                                                    <tr>
                                                    <td><?=$ctr?></td>
                                                    <td><?=$log['role_name'] . ' ' . $log['first_name'] . ' ' . $log['description']?></td>
                                                    <td><?=$log['created_at']?></td>
                                                    </tr>
                                                    <?php $ctr++;?>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Lastest Sign in</th>
                                                <th>Timestamp</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $ctr=1;?>
                                                <?php foreach($signin as $log):?>
                                                    <tr>
                                                    <td><?=$ctr?></td>
                                                    <td><?=$log['role_name'] . ' ' . $log['first_name'] . ' ' . $log['description']?></td>
                                                    <td><?=$log['created_at']?></td>
                                                    </tr>
                                                    <?php $ctr++;?>
                                                <?php endforeach;?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    </div>
                    
                </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</main>
</div>
<!-- Modal -->
<div class="modal fade" id="generate-report" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url('reservations/r');?>" method="post" target="_blank">
        <div class="modal-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4"><b>Select Facility:</b></label>
                                <select class="custom-select form-control <?= isset($errors['event_name']) ? 'is-invalid':'is-valid' ?>" name="facility_id">
                                    <option <?= isset($validation) ? null : 'selected' ?> value="0">Select All</option>
                                    <?php foreach ($facilities as $option) : ?>
                                        <?php $selected = false; ?>
                                        <?php if(isset($value['facility_id'])):?>
                                            <?php if($value['facility_id'] == $option['id']): ?>
                                                <?php $selected = true; ?>
                                            <?php endif;?>
                                        <?php endif;?>
                                        <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : '' ?>><?= $option['facility_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if(isset($errors['facility_id'])):?>
                                    <small class="text-danger"><?=esc($errors['facility_id'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity"><b>Start From:</b></label>
                                <input type="text" class="form-control <?= isset($errors['starting_date']) ? 'is-invalid':'is-valid' ?>" id="datepicker1" placeholder="Start From" name="starting_date" value="<?= isset($value) ? $value['starting_date'] : ''?>" required>
                                <?php if(isset($errors['starting_date'])):?>
                                    <small class="text-danger"><?=esc($errors['starting_date'])?></small>
                                <?php endif;?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity"><b>End To:</b></label>
                                <input type="text" class="form-control <?= isset($errors['ending_date']) ? 'is-invalid':'is-valid' ?>" id="datepicker2" placeholder="End to" name="ending_date" value="<?= isset($value) ? $value['ending_date'] : ''?>" required>
                                <?php if(isset($errors['ending_date'])):?>
                                    <small class="text-danger"><?=esc($errors['ending_date'])?></small>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-pdf"></i> Generate</button>
        </div>
    </form>
    </div>
  </div>
</div>
<?= $this->section('dashboard_data'); ?>
<?= $this->include('Scripts/dashboardData'); ?>
<?= $this->endsection('dashboard_data'); ?>
<?= $this->endsection('content'); ?>

