                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/permission-types"><?= $title?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <?= $edit? 'Edit' : 'Add' ?>
                                        </li>
                                    </ol>
                                </nav>
                    </div>
                </div>
                <div class="card shadow-sm rounded" id="main-holder">
                <div class="card-header"></div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 bg-white">
                                        <div id="stepper1" class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#test-l-1">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Choose Event</span>
                                            </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-l-2">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Choose Equipment</span>
                                            </button>
                                            </div>
                                            <div class="bs-stepper-line"></div>
                                            <div class="step" data-target="#test-l-3">
                                            <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Done!</span>
                                            </button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="bs-stepper-content">
                                            <form method="POST" action="/borrowed-equipments/<?= $edit ? 'u/'.$id : 'a' ?>">
                                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                                                    <form method="POST" action="/borrowed-equipments/<?= $edit ? 'u/'.$id : 'a' ?>">  
                                                            <h3 class="text-center">For what event?</h3>
                                                            <div class="row">
                                                                <div class="col-md-6 offset-md-3 mt-5 mb-5">
                                                                    <div class="form-group">
                                                                        <select class="custom-select form-control <?= isset($errors['reservation_id']) ? 'is-invalid':'is-valid' ?>" name="reservation_id">
                                                                            <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                                            <?php foreach ($reservations as $option) : ?>
                                                                                <?php $selected = false; ?>
                                                                                <?php if(isset($value['reservation_id'])):?>
                                                                                    <?php if($value['reservation_id'] == $option['id']): ?>
                                                                                        <?php $selected = true; ?>
                                                                                    <?php endif; ?>
                                                                                <?php endif;?>
                                                                                <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['event_name'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <?php if(isset($errors['reservation_id'])):?>
                                                                            <small class="text-danger"><?=esc($errors['reservation_id'])?></small>
                                                                        <?php endif;?>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                    <center>
                                                        <a class="btn btn-primary mt-5" onclick="stepper1.next()">Next <i class="fas fa-arrow-circle-right"></i></a>
                                                    </center>
                                                </div>
                                                <div id="test-l-2" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger2">
                                                            <h3 class="text-center mb-3 mt-5">Choose Equipments</h3>
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
                                                                                    <img src="/assets/uploads/equipment/<?= $equipment['image']?>" width="200px" height="250px" alt="#" class="img-responsive card-img">
                                                                                </label>
                                                                                <div class="overlay">
                                                                                    <h4><?=$equipment['equipment_name']?></h4>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 offset-md-3">
                                                                                            <div class="form-group">
                                                                                                <label>Quantity</label>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-btn">
                                                                                                        <a id="down" class="btn btn-dark" onclick=" down('0', '<?=$id?>')"><i class="fas fa-minus"></i></a>
                                                                                                    </div>
                                                                                                    <input type="text" id="<?='mynumber' . $id?>" class="form-control input-number" value="<?=$quantity?>" name="quantity[]" readonly>
                                                                                                    <div class="input-group-btn">
                                                                                                        <a id="up" class="btn btn-dark" onclick="up('<?=$equipment['quantity']?>', '<?=$id?>')"><i class="fas fa-plus"></i></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Total: <?=$equipment['quantity']?></p>
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
                                                    <a class="btn btn-primary mt-5" onclick="stepper1.previous()"><i class="fas fa-arrow-circle-left"></i> Previous</a>
                                                    <a class="btn btn-primary mt-5" onclick="stepper1.next()">Next <i class="fas fa-arrow-circle-right"></i></a>
                                                </center>
                                                </div>
                                                <div id="test-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                                                            <h3>You're all set!</h3>
                                                            <p>Review all your changes.</p>
                                                    <center>
                                                        <a class="btn btn-primary mt-5" onclick="stepper1.previous()"><i class="fas fa-arrow-circle-left"></i> Previous</a>
                                                        <button type="submit" class="btn btn-success mt-5"><i class="fas fa-plus-circle"></i> Borrow Equipment</button>
                                                    </center>
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