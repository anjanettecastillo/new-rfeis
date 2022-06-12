                <div class="row">
                    <div class="col-md-8">
                        <h3>View <?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/reservations"><?= $title?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            View
                                        </li>
                                    </ol>
                                </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm rounded mb-3" id="main-holder">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="/assets/uploads/facility/<?=$value['image']?>" class="img-thumbnail rounded w-100" alt="...">
                                    </div>
                                    <div class="col-md-12 text-center mb-3 mt-3">
                                        <h4>Facility Information</h4>
                                    </div>
                                    <div class="col-md-12 mt-3 text-center">
                                        <div class="row">
                                            <div class="col-md-6"><b class="float-left">Name:</b></div>
                                            <div class="col-md-6"><div class="float-right"><?=ucwords($value['facility_name'])?></div></div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6"><b class="float-left">Facility Fee: </b></div>
                                            <div class="col-md-6"><div class="float-right"><?='&#8369;'.$value['facility_fee']?></div></div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6"><b class="float-left">Capacity: </b></div>
                                            <div class="col-md-6"><div class="float-right"><?=$value['capacity']?></div></div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if(isset($_SESSION['success'])):?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['success'] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php elseif(isset($_SESSION['error'])):?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['error'] ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif;?>
                                <div class="card shadow-sm rounded" id="main-holder">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="mt-3 float-left">Reservation Details</h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1">
                                    <table class="table">
                                    <tbody>
                                        <tr>
                                        <td><b class="text-center">Person-In-Charge: </b></td>
                                        <td><?=ucwords($user['first_name']) . " " . ucwords($user['last_name'])?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center">Reservation Code: </b></td>
                                        <td><?=strtoupper($value['reservation_code'])?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center">Event Name: </b></td>
                                        <td><?=$value['event_name']?></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                        <td><b class="text-center">Event Type: </b></td>
                                        <td><?=ucwords($value['event_type'])?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center"><?=$value['event_type_id'] == 1?'Organization:':'Course:'?></b></td>
                                        <td><?=$value['event_type_id'] == 1?ucwords($organization['organization_name']):ucwords($course['course_name'])?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center">Professor/Adviser: </b></td>
                                        <td><?=$value['first_name'].' '.$value['last_name']?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center">Estimated Budget: </b></td>
                                        <td><?='&#8369;' . $value['budget']?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center">Number of Participants: </b></td>
                                        <td><?=$value['participants_count']?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center">Reservation Date: </b></td>
                                        <td><?=$value['reservation_date']?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center">Reservation Starting Time: </b></td>
                                        <td><?=date('h:i a', strtotime($value['reservation_starting_time']))?></td>
                                        </tr>
                                        <tr>
                                        <td><b class="text-center">Reservation End Time: </b></td>
                                        <td><?=date('h:i a', strtotime($value['reservation_end_time']))?></td>
                                        </tr>
                                        <tr>
                                        <?php if($status['status_id'] == 2 || $status['status_id'] >= 4):?>
                                        <td><b class="text-center">Reservation Fee: </b></td>
                                        <td><?=!$status['reservation_fee'] == 0 ? '&#8369;' . ucfirst($status['reservation_fee']): 'FREE'?></td>
                                        <?php endif;?>
                                        </tr>
                                        <tr>
                                        <?php if(!empty($status['receipt'])):?>
                                        <td><b class="text-center">Official Receipt: </b></td>
                                        <td>
                                            <?php if($status['status_id'] == 5):?>
                                                <a href="/assets/uploads/receipts/<?= $status['receipt']?>" target="_blank"><i class="fas fa-file-image"></i> View Image</a>
                                            <?php else:?>
                                                Uploaded
                                            <?php endif;?>
                                        </td>
                                        <?php endif;?>
                                        </tr>
                                        <tr>
                                        <?php if(isset($status)):?>
                                        <td><b class="text-center">Reservation Status: </b></td>
                                        <?php $stat = ''?>
                                        <?php if($status['status_id'] == 2):?>
                                            <?php $stat = 'text-success';?>
                                        <?php elseif($status['status_id'] == 3):?>
                                            <?php $stat = 'text-danger';?>
                                        <?php elseif($status['status_id'] == 4):?>
                                            <?php $stat = 'text-info';?>
                                        <?php elseif($status['status_id'] == 6):?>
                                            <?php $stat = 'text-warning';?>
                                        <?php endif;?>
                                        <td><div class="<?=$stat?>"><b><?=strtoupper($status['reservation_remarks'])?></b></div></td>
                                        <?php endif;?>
                                        </tr>
                                        <tr>
                                        <?php if(isset($status)):?>
                                        <td><b class="text-center">Remarks: </b></td>
                                        <td><b><?=(!empty($status['remarks']))?ucfirst($status['remarks']):'-'?></b></td>
                                        <?php endif;?>
                                        </tr>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    <?php if(session()->get('role_id') <= 2): ?>
                                        <?php if ($value['status_id'] == 1 || $value['status_id'] == 6) : ?>
                                            <a href="/reservations/u/<?= $value['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <?php if($value['status_id'] != 6):?>
                                                <a href="/reservations/f/<?= $value['id']; ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-file-pdf"></i> Generate Activity form</a>
                                            <?php endif;?>
                                        <?php elseif ($value['status_id'] == 2) : ?>
                                            <a class="btn btn-sm <?=empty($status['receipt'])?'btn-success':'btn-warning'?>"  data-toggle="modal" data-target="#submitReceipt"><i class="fas fa-receipt"></i><?=empty($status['receipt'])?' Upload Reciept': ' Reupload Reciept'?> </a>
                                            <?php if(empty($status['receipt'])):?>
                                                <a href="/reservations/g/<?= $value['id']; ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-file-pdf"></i> Generate Voucher</a>
                                            <?php endif;?>
                                        <?php endif; ?>
                                        <?php if($value['status_id'] == 1): ?>
                                            <a data-toggle="modal" data-target="#reject" class="btn btn-sm btn-danger"><i class=" fas fa-times"></i> Reject</a>
                                            <a data-toggle="modal" data-target="#approve" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Approve</a>
                                        <?php else: ?>
                                            <?php if(!empty($status['receipt']) && $value['status_id'] == 2):?>
                                                <a data-toggle="modal" data-target="#verify" class="btn btn-sm btn-success"><i class="fas fa-user-check"></i> Verify</a>
                                            <?php endif;?>
                                            <?php if($status['status_id'] <= 3):?>
                                                <a onclick="confirmReassess('/reservations/res/<?= $value['id']; ?>')" class="btn btn-sm btn-info"><i class="fas fa-undo"></i> Reassessment</a>
                                                <?php elseif($status['status_id'] == 4):?>
                                                    <a data-toggle="modal" data-target="#cancel" class="btn btn-sm btn-warning"><i class="fas fa-stopwatch"></i> Cancel Reservation</a>
                                                    <a data-toggle="modal" data-target="#end" class="btn btn-sm btn-danger"><i class="fas fa-hourglass-end"></i> End Reservation</a>
                                                    <a href="/reservations/p/<?= $value['id']; ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-file-pdf"></i> Generate Activity Permit</a>
                                            <?php endif;?>
                                        <?php endif; ?>
                                    <?php else:?>
                                        <?php if ($value['status_id'] == 1 && session()->get('id') == $value['user_id'] || $value['status_id'] == 6) : ?>
                                            <a href="/reservations/u/<?= $value['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                            <?php if($value['status_id'] != 6):?>
                                                <a href="/reservations/f/<?= $value['id']; ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-file-pdf"></i> Generate Activity form</a>
                                            <?php endif;?>
                                        <?php elseif ($value['status_id'] == 2 && session()->get('id') == $value['user_id']) : ?>
                                            <a class="btn btn-sm <?=empty($status['receipt'])?'btn-success':'btn-warning'?>"  data-toggle="modal" data-target="#submitReceipt"><i class="fas fa-receipt"></i><?=empty($status['receipt'])?' Upload Reciept': ' Reupload Reciept'?> </a>
                                            <?php if(empty($status['receipt'])):?>
                                                <a href="/reservations/g/<?= $value['id']; ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-file-pdf"></i> Generate Voucher</a>
                                            <?php endif;?>
                                        <?php elseif ($value['status_id'] == 4 && session()->get('id') == $value['user_id']) : ?>
                                                <a href="/reservations/p/<?= $value['id']; ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-file-pdf"></i> Generate Activity Permit</a>
                                        <?php endif; ?>
                                    <?php endif;?>
                                </div>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="card shadow-sm rounded" id="main-holder">
                                <div class="card-header">
                                    <h4 class="mt-3">Borrowed Equipments</h4>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                            <table class="table table-hover responsive" width="100%" id="table2">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">
                                                            <center>#</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Equipment</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Quantity</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Status</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Remarks</center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $ctr = 1;?>
                                                    <?php foreach($borrowedEquipments as $borrowedEquipment):?>
                                                        <tr>
                                                            <td>
                                                                <center><?= $ctr ?></center>
                                                            </td>
                                                            <td>
                                                                <center><?= ucwords($borrowedEquipment['equipment_name']); ?></center>
                                                            </td>
                                                            <td>
                                                                <center><?= ucfirst($borrowedEquipment['quantity']); ?></center>
                                                            </td>
                                                            <td>
                                                                <center><?= ucfirst($borrowedEquipment['equipment_status']); ?></center>
                                                            </td>
                                                            <td>
                                                                <center><?= empty($borrowedEquipment['remarks']) ? '-' : ucfirst($borrowedEquipment['remarks']); ?></center>
                                                            </td>
                                                        </tr>
                                                        <?php $ctr++; ?>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php if($status['status_id'] == 5 && session()->get('role_id') <= 2):?>
                                    <a data-toggle="modal" data-target="#return-equipment" class="btn btn-sm btn-success float-right"><i class="fas fa-tasks"></i> Return Equipment</a>                   
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php if(session()->get('id') == $value['user_id'] || session()->get('role_id') <= 2):?>
                        <div class="col-md-12 mt-3">
                            <div class="card shadow-sm rounded" id="main-holder">
                            <div class="card-header">
                                <h4 class="mt-3">Activity Log</h4>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                        <table class="table table-hover responsive" id="table" width="100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">
                                                        <center>#</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Activity</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Timestamp</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $ctr = 1?>
                                                <?php foreach($logs as $log):?>
                                                    <tr>
                                                        <td><b><?=$ctr++?></b></td>
                                                        <td>
                                                            <?= $log['role_name'] . ' ' . $log['first_name'] . ' ' . $log['description']; ?>
                                                        </td>
                                                        <td>
                                                            <center><?= ucfirst($log['created_at']); ?></center>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>


<!-- Modal -->
<div class="modal fade" id="submitReceipt" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Upload Official Receipt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
            <form method="post" action="/reservations/submit-receipt/<?=$id?>" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="file" name="receipt" class="file" accept="image/*">
                        <div class="input-group my-3">
                        <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                        <div class="input-group-append">
                            <button type="button" class="browse btn btn-outline-success">Browse</button>
                        </div>
                        </div>
                    <?php if(isset($errors['receipt'])):?>
                        <small class="text-danger"><?=esc($errors['receipt'])?></small>
                    <?php endif;?>
            </div>
        </div>
        <div class="col-sm-12">
        <p><b>Preview:</b></p>
        <center>
            <img width="50%" src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTAgNTEwIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMCA1MTAiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxsaW5lYXJHcmFkaWVudCBpZD0iU1ZHSURfMV8iIGdyYWRpZW50VHJhbnNmb3JtPSJtYXRyaXgoLjk5NCAuMTEgLS4xMSAuOTk0IC0yOC45NjIgLTI5Ljc3NikiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMTcyLjQ4IiB4Mj0iNDk3Ljg0OCIgeTE9IjExMC42MzkiIHkyPSI0MzYuMDA3Ij48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmZmE5MzYiLz48c3RvcCBvZmZzZXQ9Ii40MTEyIiBzdG9wLWNvbG9yPSIjZmY4NTQ4Ii8+PHN0b3Agb2Zmc2V0PSIuNzc4MSIgc3RvcC1jb2xvcj0iI2ZmNmM1NCIvPjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iI2ZmNjM1OSIvPjwvbGluZWFyR3JhZGllbnQ+PGxpbmVhckdyYWRpZW50IGlkPSJTVkdJRF8yXyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSI0OTAuNDg3IiB4Mj0iNDY2LjQzIiB5MT0iMTU5LjAxNSIgeTI9IjE2NC4zMjIiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2Y4MjgxNCIgc3RvcC1vcGFjaXR5PSIwIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjYzAyNzJkIi8+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9ImxnMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjY2RlYzdhIi8+PHN0b3Agb2Zmc2V0PSIuMjE1NyIgc3RvcC1jb2xvcj0iI2IwZTk5NSIvPjxzdG9wIG9mZnNldD0iLjU2MTMiIHN0b3AtY29sb3I9IiM4N2U0YmIiLz48c3RvcCBvZmZzZXQ9Ii44MzQ3IiBzdG9wLWNvbG9yPSIjNmVlMWQyIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjNjVlMGRiIi8+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzNfIiBncmFkaWVudFRyYW5zZm9ybT0ibWF0cml4KC45ODMgLS4xODUgLjE4NSAuOTgzIDU1LjYwOCA0Mi4zNjkpIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjE1LjUyIiB4Mj0iMzQwLjg4OCIgeGxpbms6aHJlZj0iI2xnMSIgeTE9IjEwNC43MDUiIHkyPSI0MzAuMDczIi8+PGxpbmVhckdyYWRpZW50IGlkPSJsZzIiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2NkZWM3YSIgc3RvcC1vcGFjaXR5PSIwIi8+PHN0b3Agb2Zmc2V0PSIuMjM1NCIgc3RvcC1jb2xvcj0iIzlhZDU3ZCIgc3RvcC1vcGFjaXR5PSIuMjM1Ii8+PHN0b3Agb2Zmc2V0PSIuNjAzNSIgc3RvcC1jb2xvcj0iIzUxYjQ4MiIgc3RvcC1vcGFjaXR5PSIuNjA0Ii8+PHN0b3Agb2Zmc2V0PSIuODY3OSIgc3RvcC1jb2xvcj0iIzIzOWY4NSIgc3RvcC1vcGFjaXR5PSIuODY4Ii8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMTE5Nzg2Ii8+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzRfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjQ5MS42ODIiIHgyPSI0NTAuNjM3IiB4bGluazpocmVmPSIjbGcyIiB5MT0iMjU2LjU0NiIgeTI9IjI1Ni41NDYiLz48bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzVfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjE3Ni43MzEiIHgyPSIxNzYuNzMxIiB4bGluazpocmVmPSIjbGcyIiB5MT0iNDY2LjkxNyIgeTI9IjQ0Mi42MDEiLz48bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzZfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9Ijg4LjI2NCIgeDI9IjQxMy42MzIiIHkxPSIxMTEuNzUzIiB5Mj0iNDM3LjEyMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZjhmNmZiIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZWZkY2ZiIi8+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzdfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjExMi43NjgiIHgyPSI0MzAuMTEyIiB5MT0iMTAxLjE1NSIgeTI9IjUxNC4wMjEiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iIzE4Y2VmYiIvPjxzdG9wIG9mZnNldD0iLjI5NjkiIHN0b3AtY29sb3I9IiMyYmI5ZjkiLz48c3RvcCBvZmZzZXQ9Ii43MzQ1IiBzdG9wLWNvbG9yPSIjNDJhMGY3Ii8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjNGE5N2Y2Ii8+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9IlNWR0lEXzhfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9Ijc1LjU4OCIgeDI9IjIxNC42MTYiIHkxPSIzMTYuNTMiIHkyPSI0OTcuNDA2Ij48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNjZGVjN2EiLz48c3RvcCBvZmZzZXQ9Ii4yMTU0IiBzdG9wLWNvbG9yPSIjYjBlOTk1IiBzdG9wLW9wYWNpdHk9Ii43ODQiLz48c3RvcCBvZmZzZXQ9Ii41NjA0IiBzdG9wLWNvbG9yPSIjODdlNGJiIiBzdG9wLW9wYWNpdHk9Ii40MzkiLz48c3RvcCBvZmZzZXQ9Ii44MzM0IiBzdG9wLWNvbG9yPSIjNmVlMWQyIiBzdG9wLW9wYWNpdHk9Ii4xNjUiLz48c3RvcCBvZmZzZXQ9Ii45OTg1IiBzdG9wLWNvbG9yPSIjNjVlMGRiIiBzdG9wLW9wYWNpdHk9IjAiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iU1ZHSURfOV8iIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMTk4LjgyMiIgeDI9IjM2Ni40OTkiIHhsaW5rOmhyZWY9IiNsZzEiIHkxPSIyODguNDc0IiB5Mj0iNTA2LjYyMiIvPjxsaW5lYXJHcmFkaWVudCBpZD0iU1ZHSURfMTBfIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjExNy4yNDIiIHgyPSIxNzEuNjE4IiB5MT0iMTMxLjkyMiIgeTI9IjIwMi42NjYiPjxzdG9wIG9mZnNldD0iMCIgc3RvcC1jb2xvcj0iI2ZmZDk0NSIvPjxzdG9wIG9mZnNldD0iLjMwNDMiIHN0b3AtY29sb3I9IiNmZmNkM2UiLz48c3RvcCBvZmZzZXQ9Ii44NTU4IiBzdG9wLWNvbG9yPSIjZmZhZDJiIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZmZhMzI1Ii8+PC9saW5lYXJHcmFkaWVudD48Zz48cGF0aCBkPSJtNDI2LjkyNiA0NzAuNTM5LTM4Ni44NzctNDIuODc4Yy0xOC42MDEtMi4wNjEtMzIuMDA4LTE4LjgxMS0yOS45NDctMzcuNDEybDM1LjU1OS0zMjAuODQxYzIuMDYyLTE4LjYwMSAxOC44MTItMzIuMDA5IDM3LjQxMi0yOS45NDdsMzg2Ljg3NyA0Mi44NzhjMTguNjAxIDIuMDYyIDMyLjAwOSAxOC44MTIgMjkuOTQ3IDM3LjQxMmwtMzUuNTU5IDMyMC44NDFjLTIuMDYxIDE4LjYwMS0xOC44MTEgMzIuMDA5LTM3LjQxMiAyOS45NDd6IiBmaWxsPSJ1cmwoI1NWR0lEXzFfKSIvPjxwYXRoIGQ9Im00OTkuODk3IDExOS43NTItMTQuMDIgMTI2LjUzNC0zMS4xNjItMTY1LjYzNCAxNS4yNDEgMS42ODhjMTguNTk1IDIuMDU4IDMyIDE4LjgwNiAyOS45NDEgMzcuNDEyeiIgZmlsbD0idXJsKCNTVkdJRF8yXykiLz48cGF0aCBkPSJtNDgyLjM3MyA0MTAuOTQtMzgyLjUzNiA3MS45NjRjLTE4LjM5MiAzLjQ2LTM2LjEwNy04LjY0NS0zOS41NjctMjcuMDM3bC01OS42OC0zMTcuMjQxYy0zLjQ2LTE4LjM5MiA4LjY0NS0zNi4xMDcgMjcuMDM3LTM5LjU2N2wzODIuNTM2LTcxLjk2NGMxOC4zOTItMy40NiAzNi4xMDcgOC42NDUgMzkuNTY3IDI3LjAzN2w1OS42OCAzMTcuMjQxYzMuNDYgMTguMzkzLTguNjQ1IDM2LjEwOC0yNy4wMzcgMzkuNTY3eiIgZmlsbD0idXJsKCNTVkdJRF8zXykiLz48cGF0aCBkPSJtNDU3Ljg5NiA5Ny41NDZ2MzE3Ljk5OWwyNC40NzYtNC42MDVjMTguMzkyLTMuNDYgMzAuNDk3LTIxLjE3NSAyNy4wMzctMzkuNTY3eiIgZmlsbD0idXJsKCNTVkdJRF80XykiLz48cGF0aCBkPSJtNTguNDUgNDQ2LjE4NyAxLjgyMSA5LjY4YzMuNDYgMTguMzkyIDIxLjE3NSAzMC40OTcgMzkuNTY3IDI3LjAzN2wxOTUuMTc1LTM2LjcxN3oiIGZpbGw9InVybCgjU1ZHSURfNV8pIi8+PGc+PHBhdGggZD0ibTQyNC4wMSA0NDguMTY2aC0zODkuMjQ1Yy0xOC43MTUgMC0zMy44ODYtMTUuMTcxLTMzLjg4Ni0zMy44ODZ2LTMyMi44MDZjMC0xOC43MTUgMTUuMTcxLTMzLjg4NiAzMy44ODYtMzMuODg2aDM4OS4yNDVjMTguNzE1IDAgMzMuODg2IDE1LjE3MSAzMy44ODYgMzMuODg2djMyMi44MDZjMCAxOC43MTUtMTUuMTcxIDMzLjg4Ni0zMy44ODYgMzMuODg2eiIgZmlsbD0idXJsKCNTVkdJRF82XykiLz48cGF0aCBkPSJtMzkyLjI3OSA0MTYuMzI2aC0zMjUuNzgyYy0xNS42NjMgMC0yOC4zNjEtMTIuNjk4LTI4LjM2MS0yOC4zNjF2LTI3MC4xNzVjMC0xNS42NjMgMTIuNjk4LTI4LjM2MSAyOC4zNjEtMjguMzYxaDMyNS43ODJjMTUuNjYzIDAgMjguMzYxIDEyLjY5OCAyOC4zNjEgMjguMzYxdjI3MC4xNzVjMCAxNS42NjMtMTIuNjk4IDI4LjM2MS0yOC4zNjEgMjguMzYxeiIgZmlsbD0idXJsKCNTVkdJRF83XykiLz48Zz48cGF0aCBkPSJtMjUyLjA2OSA0MTYuMzI2aC0xODUuNTY3Yy0xNS42NjYgMC0yOC4zNy0xMi42OTQtMjguMzctMjguMzU5di00NC4yOWw0Ny4wODItNTcuMjI4YzE1LjUzOC0xOC45MDMgNDQuNDYtMTguOTAzIDYwLjAwOSAwbDI5LjMxNSAzNS42NHoiIGZpbGw9InVybCgjU1ZHSURfOF8pIi8+PHBhdGggZD0ibTQyMC42NDMgMzE2Ljc1djcxLjIxN2MwIDE1LjY2Ni0xMi43MDQgMjguMzU5LTI4LjM3IDI4LjM1OWgtMjk1LjI2OGw3Ny41MzItOTQuMjM3IDk1LjI0Ni0xMTUuNzgzYzE1LjUzOC0xOC44OTIgNDQuNDcxLTE4Ljg5MiA2MC4wMDkgMHoiIGZpbGw9InVybCgjU1ZHSURfOV8pIi8+PC9nPjxjaXJjbGUgY3g9IjEzNy4yMjUiIGN5PSIxNTcuOTE5IiBmaWxsPSJ1cmwoI1NWR0lEXzEwXykiIHI9IjQwLjIxOSIvPjwvZz48L2c+PC9zdmc+" id="preview" class="img-thumbnail"/>
        </center>
        </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-file-upload"></i> Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="approve" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Approve Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-borderless">
                        <tbody>
                                <tr>
                                    <td><b>Duration:</b></td>
                                    <td>
                                        <input type="text" name="facility_fee" class="form-control" value="<?= $hour = intval(date('H', strtotime($value['duration']))) ?> Hours" readonly>
                                                                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Venue Fee:</b></td>
                                    <td>
                                        <?php $fee = $value['facility_fee'];?>
                                        <?php if($value['event_type'] != 'organizational'): ?>
                                            <?php $fee = $value['facility_fee']-($value['facility_fee']*0.2);?>
                                        <?php endif;?>
                                        <?php $venueFee = $hour * $fee?>
                                        <input type="text" id="facility_fee" class="form-control" value="<?= ' &#8369;'.$venueFee ?>" readonly>

                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Computation:</b></td>
                                    <td>
                                        <p><b>Venue fee = Duration(in hours) X &#8369;<?= $fee . ' (' . ucwords($value['event_type']) . ' event)' ?></b></p>
                                        <p><b>Venue fee =</b> <?= $hour . ' hours X &#8369;' . ($value['event_type'] == 'organizational' ? $value['facility_fee'] : $fee) ?></p>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <form method="post">
                    <div class="form-group">
                        <label for="remarks" class="col-form-label"><b>Remarks: </b></label>
                        <textarea id="remarks-app" name="remarks" class="form-control" cols="30" rows="5"></textarea>
                        <input type="hidden" id="fee" name="reservation_fee" value="<?= $venueFee ?>">
                        </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <a onclick="freeReservation('/reservations/free/<?=$value['id']?>')" class="btn btn-info" id="free"><i class="fas fa-wallet"></i> Approve for free</a>
        <a onclick="approveReservation('/reservations/app/<?=$value['id']?>')" class="btn btn-success"><i class="fas fa-check"></i> Approve</a>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Reject Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                    <div class="form-group">
                        <label for="remarks" class="col-form-label"><b>Remarks: </b></label>
                        <textarea id="remarks" name="remarks" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <a onclick="rejectReservation('/reservations/rej/<?=$id?>')" class="btn btn-danger">Reject</a>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="verify" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Verify Official Receipt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p><b>Preview:</b></p>
                    <center>
                        <img width="100%" src="/assets/uploads/Receipts/<?=$status['receipt']?>" class="img-thumbnail mb-3"/>
                        <a href="/assets/uploads/Receipts/<?=$status['receipt']?>" class="btn btn-sm btn-outline-primary" target="_blank">View Image in Full Size</a>
                    </center>
                    <form method="post">
                    <div class="form-group">
                        <label for="remarks" class="col-form-label"><b>Remarks: </b></label>
                        <textarea id="remarks-verify" name="remarks" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <a onclick="verifyReservation('/reservations/reupload/<?=$id?>')" class="btn btn-warning"><i class="fas fa-redo"></i> Reupload</a>
        <a onclick="verifyReservation('/reservations/verify/<?=$id?>')" class="btn btn-success"><i class="fas fa-user-check"></i> Verify</a>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="end" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">End Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" id="end-res">
                    <div class="form-group">
                        <label for="remarks" class="col-form-label"><b>Remarks: </b></label>
                        <textarea id="remarks-end" name="remarks" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="button" onclick="endReservation('/reservations/end/<?=$id?>')" class="btn btn-danger"><i class="fas fa-hourglass-end"></i> End Reservation</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cancel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cancel Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" id="cancel-res">
                    <div class="form-group">
                        <label for="remarks" class="col-form-label"><b>Remarks: </b></label>
                        <textarea id="remarks-cancel" name="remarks" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="button" onclick="cancelReservation('/reservations/cancel/<?=$id?>')" class="btn btn-warning"><i class="fas fa-stopwatch"></i> Cancel Reservation</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="return-equipment" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Return Equipments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" id="return-eq">
                    <div class="form-group">
                                        <table class="table table-hover responsive" width="100%" id="table4">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">
                                                            <center>#</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Equipment</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Quantity</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Returned Quantity</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Status</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Condition</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Remarks</center>
                                                        </th>
                                                        <th scope="col">
                                                            <center>Action</center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $ctr = 1;?>
                                                    <?php foreach($borrowedEquipments as $borrowedEquipment):?>
                                                        <tr>
                                                            <td width="3%">
                                                                <center><b><?= $ctr ?></b></center>
                                                            </td>
                                                            <td>
                                                                <center><?= ucwords($borrowedEquipment['equipment_name']); ?></center>
                                                            </td>
                                                            <td width="5%">
                                                                <center><?= ucfirst($borrowedEquipment['quantity']); ?></center>
                                                            </td>

                                                            <td>
                                                                <center>
                                                                                            <div class="form-group input-value">
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-btn">
                                                                                                        <a id="down" class="btn btn-dark mr-1 btn-incrementer<?=$borrowedEquipment['id']?> <?=$borrowedEquipment['status_id'] == 3?'disabled':''?>" onclick="subtract('0', '<?=$borrowedEquipment['id']?>')"><i class="fas fa-minus"></i></a>
                                                                                                    </div>
                                                                                                    <input type="number" id="<?='quantity' . $borrowedEquipment['id']?>" onkeyup="returnValue('<?=$borrowedEquipment['quantity']?>', '<?=$borrowedEquipment['id']?>')" class="form-control input-number" value="<?=$borrowedEquipment['returned_quantity']?>" name="returned_quantity" <?=$borrowedEquipment['status_id'] == 3?'disabled':''?>>
                                                                                                    <div class="input-group-btn">
                                                                                                        <a id="up" class="btn btn-dark ml-1 btn-decrementer<?=$borrowedEquipment['id']?> <?=$borrowedEquipment['status_id'] == 3?'disabled':''?>" onclick="add('<?=$borrowedEquipment['quantity']?>', '<?=$borrowedEquipment['id']?>')"><i class="fas fa-plus"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                        <select class="custom-select form-control" id="<?= 'status' . $borrowedEquipment['id'] ?>" name="status_id">
                                                                                <?php foreach ($equipmentStatus as $option) : ?>
                                                                                    <?php if($option['id'] <= 4):?>
                                                                                        <?php $selected = false; ?>
                                                                                        <?php if(isset($borrowedEquipment['status_id'])):?>
                                                                                            <?php if($option['id'] == $borrowedEquipment['status_id']): ?>
                                                                                                <?php $selected = true; ?>
                                                                                            <?php endif;?>
                                                                                        <?php endif;?>
                                                                                        <option value="<?= $option['id'] ?>"  <?= $selected ? 'selected' : '' ?>><?= $option['equipment_status'] ?></option>
                                                                                    <?php endif;?>
                                                                                <?php endforeach; ?>
                                                                        </select>
                                                                </center>
                                                            </td>
                                                            <td width="10%">
                                                                <center>
                                                                        <select class="custom-select form-control" id="<?= 'condition' . $borrowedEquipment['id'] ?>" name="condition_id">
                                                                                <?php foreach ($equipmentConditions as $option) : ?>
                                                                                        <?php $selected = false; ?>
                                                                                        <?php if(isset($borrowedEquipment['condition_id'])):?>
                                                                                            <?php if($option['id'] == $borrowedEquipment['condition_id']): ?>
                                                                                                <?php $selected = true; ?>
                                                                                            <?php endif;?>
                                                                                        <?php endif;?>
                                                                                        <option value="<?= $option['id'] ?>"  <?= $selected ? 'selected' : '' ?>><?= $option['equipment_condition'] ?></option>
                                                                                <?php endforeach; ?>
                                                                        </select>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                        <textarea id="<?= 'remarks' . $borrowedEquipment['id'] ?>" name="remarks-return" class="form-control" cols="30" rows="1"><?= $borrowedEquipment['remarks'] ?></textarea>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <button type="button" onclick="returnEquipment('<?=$borrowedEquipment['id']?>')" id="<?= 'apply' . $borrowedEquipment['id'] ?>" class="btn btn-sm btn-warning mb-1" <?=$borrowedEquipment['status_id'] == 3?'disabled':''?>><i class="fas fa-clipboard-check"></i> Apply</button>
                                                                    <?php if($borrowedEquipment['status_id'] != 4):?>
                                                                        <button type="button" onclick="undoEquipment('<?=$borrowedEquipment['id']?>')" id="<?= 'undo' . $borrowedEquipment['id'] ?>" class="btn btn-sm btn-danger mb-1"><i class="fas fa-undo"></i> Undo</button>
                                                                    <?php endif;?>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <?php $ctr++; ?>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="reset-form" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="button" id="reload-page" class="btn btn-success"><i class="fas fa-save"></i> Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>