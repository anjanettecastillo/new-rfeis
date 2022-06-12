                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/reservations"><?= $title?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <?= $edit? 'Edit' : 'Add' ?>
                                        </li>
                                    </ol>
                                </nav>
                    </div>
                </div>
                <div class="card shadow-sm rounded" id="main-holder">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mt-2 mb-2">
                                <div class="mb-3 bg-white">
                                        <div id="stepper1" class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#test-l-1">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Choose Faciity</span>
                                            </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-l-2">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Reservation Details</span>
                                            </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-l-3">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Choose Equipment (Optional)</span>
                                            </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-l-4">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger4" aria-controls="test-l-4">
                                                <span class="bs-stepper-circle">4</span>
                                                <span class="bs-stepper-label">Done!</span>
                                            </button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="bs-stepper-content">
                                            <form method="POST" action="/reservations/<?= $edit ? 'u/'.$id : 'a' ?>">
                                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                                                            <h3 class="text-center mb-3 mt-5">Choose Facility <small class="text-danger">*</small></h3>
                                                            <?php if(isset($errors['facility_id'])):?>
                                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                    <?= $errors['facility_id'] ?>
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            <?php endif;?>
                                                           <div class="row">
                                                                <?php if(!isset($facilities)):?>
                                                                    <i class="offset-md-5">No available facility</i>    
                                                                <?php endif;?>
                                                                <?php $id = 1?>
                                                                <?php foreach($facilities as $facility):?>
                                                                    <?php $checked = false; ?>
                                                                    <?php if(isset($value['facility_id'])):?>
                                                                        <?php if($value['facility_id'] == $facility['id']): ?>
                                                                            <?php $checked = true; ?>
                                                                        <?php endif;?>
                                                                    <?php endif;?>
                                                                    <div class="col-md-3 mt-2 mb-2">
                                                                        <div class="custom-control custom-checkbox image-checkbox">
                                                                            <div class="card hovereffect" id="facility-card">
                                                                                <input type="radio" class="custom-control-input check-image faci" onchange="addVenueSize('<?=$id?>','<?=$facility['capacity']?>','<?=$facility['facility_fee']?>')" name="facility_id" value="<?=$facility['id']?>" id="<?='faci_'.$id?>" <?= $checked ? 'checked' : '' ?>>
                                                                                <label class="custom-control-label " for="<?='faci_'.$id?>">
                                                                                    <img src="/assets/uploads/facility/<?= $facility['image']?>" alt="#" style="width:100%; height:200px;" class="img-fluid card-img">
                                                                                    <div class="overlay mt-2">
                                                                                        <center>
                                                                                            <h5><?=ucwords($facility['facility_name'])?></h5>
                                                                                            <h6><?="Capacity: " . $facility['capacity']?></h6>
                                                                                        </center>    
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php $id++;?>
                                                                <?php endforeach;?>
                                                            </div>
                                                    <center>
                                                        <a class="btn btn-lg btn-primary mt-5" onclick="stepper1.next()">Next <i class="fas fa-arrow-circle-right"></i></a>
                                                    </center>
                                                </div>
                                                <div id="test-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">
                                                           <h3 class="text-center mb-3 mt-5">Reservation Details</h3>
                                                            <div class="row">
                                                                <div class="col-md-8 offset-md-2">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <input type="hidden" class="form-control" id="inputPassword4" name="reservation_code" value="<?= isset($value) ? $value['reservation_code'] : 'rs-' . substr(str_shuffle(str_repeat("1234567890", 5)), 0, 5) . '-tg-0' ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="event-name">Event name <small class="text-danger">*</small></label>
                                                                            <input type="text" class="form-control <?= isset($errors['event_name']) ? 'is-invalid':'is-valid' ?>" id="event-name" placeholder="Event name" name="event_name" value="<?= isset($value) ? $value['event_name'] : ''?>">
                                                                            <?php if(isset($errors['event_name'])):?>
                                                                                <small class="text-danger"><?=esc($errors['event_name'])?></small>
                                                                            <?php endif;?>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputEmail4">Event Type <small class="text-danger">*</small></label>
                                                                            <select class="custom-select form-control <?= isset($errors['event_name']) ? 'is-invalid':'is-valid' ?>" name="event_type_id" id="type">
                                                                                <option <?= isset($validation) ? null : 'selected' ?> value="a">Select Event Type</option>
                                                                                <?php foreach ($types as $option) : ?>
                                                                                    <?php $selected = false; ?>
                                                                                    <?php if(isset($value['event_type_id'])):?>
                                                                                        <?php if($value['event_type_id'] == $option['id']): ?>
                                                                                            <?php $selected = true; ?>
                                                                                        <?php endif;?>
                                                                                    <?php endif;?>
                                                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : '' ?>><?= $option['event_type'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                            <?php if(isset($errors['event_type_id'])):?>
                                                                                <small class="text-danger"><?=esc($errors['event_type_id'])?></small>
                                                                            <?php endif;?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12" id="event-type-options">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputAddress">Professor/Adviser <small class="text-danger">*</small></label>
                                                                            <select class="custom-select form-control faculty-select <?= isset($errors['faculty_id']) ? 'is-invalid':'is-valid' ?>" style="width:100%" id="faculty" name="faculty_id">
                                                                                <option <?= isset($validation) ? null : 'selected' ?> value="a">Select Professor/Adviser</option>
                                                                                <?php foreach ($faculties as $option) : ?>
                                                                                    <?php $selected = false; ?>
                                                                                    <?php if(isset($value['faculty_id'])):?>
                                                                                        <?php if($value['faculty_id'] == $option['id']): ?>
                                                                                            <?php $selected = true; ?>
                                                                                        <?php endif;?>
                                                                                    <?php endif;?>
                                                                                    <option value="<?= $option['id'] ?>"  <?= $selected ? 'selected' : '' ?>><?= $option['first_name'] . ' ' . $option['last_name'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                            <?php if(isset($errors['faculty_id'])):?>
                                                                                <small class="text-danger"><?=esc($errors['faculty_id'])?></small>
                                                                            <?php endif;?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="inputCity">Reservation Date <small class="text-danger">*</small></label>
                                                                            <input type="text" class="form-control <?= isset($errors['reservation_date']) ? 'is-invalid':'is-valid' ?>" id="datepicker" placeholder="Reservation Date" name="reservation_date" value="<?= isset($value) ? $value['reservation_date'] : ''?>">
                                                                            <?php if(isset($errors['reservation_date'])):?>
                                                                                <small class="text-danger"><?=esc($errors['reservation_date'])?></small>
                                                                            <?php endif;?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputCity">Event starting time <small class="text-danger">*</small></label>
                                                                            <input type="text" class="form-control <?= isset($errors['reservation_starting_time']) ? 'is-invalid':'is-valid' ?>" id="picker1" placeholder="Event Starting Time" value="<?= isset($value) ? $value['reservation_starting_time'] : ''?>">
                                                                            <input type="hidden" id="start-time" name="reservation_starting_time" value="<?= isset($value) ? $value['reservation_starting_time'] : ''?>">
                                                                            <?php if(isset($errors['reservation_starting_time'])):?>
                                                                                <small class="text-danger"><?=esc($errors['reservation_starting_time'])?></small>
                                                                            <?php endif;?>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputCity">Event end time <small class="text-danger">*</small></label>
                                                                            <input type="text" class="form-control <?= isset($errors['reservation_end_time']) ? 'is-invalid':'is-valid' ?>" placeholder="Event end Time" value="<?= isset($value) ? $value['reservation_end_time'] : ''?>" id="picker2">
                                                                            <input type="hidden" name="reservation_end_time" id="end-time" value="<?= isset($value) ? $value['reservation_end_time'] : ''?>">
                                                                            <?php if(isset($errors['reservation_end_time'])):?>
                                                                                <small class="text-danger"><?=esc($errors['reservation_end_time'])?></small>
                                                                            <?php endif;?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="inputCity">Estimated Budget <small class="text-danger">*</small></label>
                                                                            <input type="hidden" id="h-hour" name="hHour" value="<?=isset($value['hHour'])?$value['hHour']:'0'?>">
                                                                            <input type="hidden" id="h-fee" name="hFee" value="<?=isset($value['hFee'])?$value['hFee']:'0'?>">
                                                                            <input type="hidden" id="i-fee" name="initialFee" value="0">
                                                                            <input type="number" class="form-control <?= isset($errors['budget']) ? 'is-invalid':'is-valid' ?>" id="budget" placeholder="Estimated Budget" name="budget" value="<?= isset($value) ? $value['budget'] : ''?>">
                                                                            <?php if(isset($errors['budget'])):?>
                                                                                <small class="text-danger"><?=esc($errors['budget'])?></small>
                                                                            <?php endif;?>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="participants">Number of participants <small class="text-danger">*</small></label>
                                                                            <?php $cap = 0;?>
                                                                            <?php if(isset($size['capacity'])):?>
                                                                                <?php if($edit):?>
                                                                                    <?php $cap = $size['capacity'];?>
                                                                                <?php endif;?>
                                                                            <?php endif;?>
                                                                            <input type="hidden" name="size" id="size" value="<?=isset($value['size'])?$value['size']:$cap?>">
                                                                            <input type="number" class="form-control <?= isset($errors['participants_count']) ? 'is-invalid':'is-valid' ?>" id="participants" placeholder="Number of Participants" name="participants_count" value="<?= isset($value) ? $value['participants_count'] : ''?>">
                                                                            <?php if(isset($errors['participants_count'])):?>
                                                                                <small class="text-danger"><?=esc($errors['participants_count'])?></small>
                                                                            <?php endif;?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                <center>
                                                    <a class="btn btn-lg btn-primary mt-5" onclick="stepper1.previous()"><i class="fas fa-arrow-circle-left"></i> Back</a>
                                                    <a class="btn btn-lg btn-primary mt-5" onclick="stepper1.next()">Next <i class="fas fa-arrow-circle-right"></i></a>
                                                </center>
                                                </div>
                                                <div id="test-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                                                            <h3 class="text-center mb-3 mt-5">Choose Equipment (Optional)</h3>
                                                            <div class="row">
                                                                
                                                                <?php if(!isset($equipments)):?>
                                                                    <i class="offset-md-5">No available equipment</i>    
                                                                <?php endif;?>
                                                                <?php $id = 1?>
                                                                <?php foreach($equipments as $equipment):?>
                                                                    <?php $checked = false; ?>
                                                                    <?php $quantity = 0?>
                                                                    <?php if(isset($borrowedEquipments)): ?>
                                                                        <?php foreach($borrowedEquipments as $borrowedEquipment):?>
                                                                            <?php if($borrowedEquipment['equipment_id'] == $equipment['id']): ?>
                                                                                <?php $checked = true; ?>
                                                                                <?php $quantity = $borrowedEquipment['quantity']?>
                                                                                <?php $equipment['quantity'] += $borrowedEquipment['quantity']?>
                                                                            <?php endif;?>
                                                                        <?php endforeach;?>
                                                                    <?php endif; ?>
                                                                    <?php if(isset($value['equipment_id'])):?>
                                                                        <?php if($value['equipment_id'] == $equipment['id']): ?>
                                                                            <?php $checked = true; ?>
                                                                        <?php endif;?>
                                                                    <?php endif;?>
                                                                    <?php if($equipment['quantity'] != 0):?>
                                                                    <div class="col-md-3 mt-2 mb-2">
                                                                        <div class="custom-control custom-checkbox image-checkbox">
                                                                            <div class="card hovereffect" id="equipment-card">
                                                                                <input type="checkbox" class="custom-control-input" onclick="ifChecked('<?=$id?>')" name="equipments[]" value="<?=$equipment['id']?>" id="<?='equip_'.$id?>" <?= $checked ? 'checked' : '' ?>>
                                                                                <label class="custom-control-label" for="<?='equip_'.$id?>">
                                                                                    <img src="/assets/uploads/equipment/<?= $equipment['image']?>" alt="#" width="200px" height="250px" class="img-responsive card-img">
                                                                                </label>
                                                                                <div class="overlay">
                                                                                    <h4><?=$equipment['equipment_name']?></h4>
                                                                                    <div class="row">
                                                                                        <div class="col-md-8 offset-md-2">
                                                                                            <div class="form-group">
                                                                                                <label>Quantity</label>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-btn">
                                                                                                        <a id="down" class="btn btn-dark mr-1" onclick=" down('0', '<?=$id?>')"><i class="fas fa-minus"></i></a>
                                                                                                    </div>
                                                                                                    <input type="text" id="<?='mynumber' . $id?>" class="form-control input-number" value="<?=$quantity?>" name="quantity[]" readonly>
                                                                                                    <div class="input-group-btn">
                                                                                                        <a id="up" class="btn btn-dark ml-1" onclick="up('<?=$equipment['quantity']?>', '<?=$id?>')"><i class="fas fa-plus"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Available: <?=$equipment['quantity']?></p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php $id++;?>
                                                                    <?php endif;?>
                                                                <?php endforeach;?>
                                                            </div>
                                                            <center>
                                                                <a class="btn btn-lg btn-primary mt-5" onclick="stepper1.previous()"><i class="fas fa-arrow-circle-left"></i> Back</a>
                                                                <a class="btn btn-lg btn-primary mt-5" onclick="stepper1.next()" id="check-info">Next <i class="fas fa-arrow-circle-right"></i></a>
                                                            </center>
                                                </div>
                                                <div id="test-l-4" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger4">
                                                    <h3 class="text-center mb-3 mt-5">You're all set!</h3>
                                                    <p class="text-center">Review all your changes.</p>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-8 offset-md-2" id="preview">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-primary mt-5" onclick="stepper1.previous()"><i class="fas fa-arrow-circle-left"></i> Back</a>
                                                    <button type="submit" class="btn btn-success mt-5"><i class="fas fa-plus-circle"></i> <?=$edit?'Edit':'Add'?> Reservation</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
            </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$("#type").change(function () {
    $("#type option:selected").each(function () {
        var type = $("#type").val();
                $('#event-type-options').empty();
                $('#event-type-options').hide();
                if(type == 1){
                    $('#event-type-options').show();
                    var app = "<label for='inputAddress'>Organization <small class='text-danger'>*</small></label>";                                        
                    app += "<input type='hidden' name='course_id' value='0'>";
                    app += "<select class='custom-select form-control <?= isset($errors['organization_id']) ? 'is-invalid':'is-valid' ?>' id='org-id' name='organization_id' >";
                    app += "<option <?= isset($validation) ? null : 'selected'?>' value='a'> Select Organization</option>";
                    <?php foreach($organizations as $option) : ?>
                    <?php $selected = false; ?>
                    <?php if (isset($value['organization_id'])):?>
                        <?php if ($value['organization_id'] == $option['id']): ?>
                            <?php $selected = true; ?>
                        <?php endif;?>
                    <?php endif;?>
                    app += "<option value='<?= $option['id'] ?>' <?= $selected ? 'selected' : '' ?>><?= ucwords($option['organization_name']) ?></option>";
                    <?php endforeach; ?>
                    app += "</select >";
                    <?php if (isset($errors['organization_id'])):?>
                    app += "<small class='text-danger'><?=esc($errors['organization_id'])?></small>";
                    <?php endif;?>
                    $('#event-type-options').prepend(app);
                }
                else if(type == 2){
                    $('#event-type-options').show();
                    var app = "<label for='inputAddress'>Course <small class='text-danger'>*</small></label>";
                    app += "<input type='hidden' name='organization_id' value='0'>";
                    app += "<select class='custom-select form-control <?= isset($errors['course_id']) ? 'is-invalid':'is-valid' ?>' id='course-id' name='course_id' >";
                    app += "<option <?= isset($validation) ? null : 'selected'?>' value='a'> Select Course</option>";
                    <?php foreach($courses as $option) : ?>
                    <?php $selected = false; ?>
                    <?php if (isset($value['course_id'])):?>
                        <?php if ($value['course_id'] == $option['id']): ?>
                            <?php $selected = true; ?>
                        <?php endif;?>
                    <?php endif;?>
                    app += "<option value='<?= $option['id'] ?>' <?= $selected ? 'selected' : '' ?>><?= ucwords($option['course_name']) ?></option>";
                    <?php endforeach; ?>
                    app += "</select >";
                    <?php if (isset($errors['course_id'])):?>
                    app += "<small class='text-danger'><?=esc($errors['course_id'])?></small>";
                    <?php endif;?>
                    $('#event-type-options').prepend(app);
                }else {
                    $('#event-type-options').empty();
                    $('#event-type-options').hide();
                }
    });

}).trigger("change");
</script>