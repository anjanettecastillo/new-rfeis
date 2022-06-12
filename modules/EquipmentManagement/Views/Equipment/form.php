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
                                <form method="POST" action="/equipments/<?= $edit ? 'u/'.$id : 'a' ?>" enctype="multipart/form-data">
                                    <?php if(isset($id)):?>
                                        <input type="hidden" name="equipmentID" value="<?=$id?>">
                                    <?php endif;?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Equipment Code <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['equipment_code']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="equipment_code" placeholder="Equipment Code" value="<?= isset($value['equipment_code']) ? $value['equipment_code'] : '' ?>">
                                            <?php if(isset($errors['equipment_code'])):?>
                                                <small class="text-danger"><?=esc($errors['equipment_code'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Name of Equipment <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['equipment_name']) ? 'is-invalid':'is-valid' ?>" id="inputAddress" name="equipment_name" placeholder="Equipment Name" value="<?= isset($value['equipment_code']) ? $value['equipment_name'] : '' ?>">
                                            <?php if(isset($errors['equipment_name'])):?>
                                                <small class="text-danger"><?=esc($errors['equipment_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Description <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control  <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="description" placeholder="Description" value="<?= isset($value['description']) ? $value['description'] : '' ?>">
                                            <?php if(isset($errors['description'])):?>
                                                <small class="text-danger"><?=esc($errors['description'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Image <small class="text-danger">*</small></label>
                                            <div class="custom-file">
                                            <input type="file" class="custom-file-input  <?= isset($errors['image']) ? 'is-invalid':'is-valid' ?>" name="image" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <?php if(isset($errors['image'])):?>
                                                <small class="text-danger"><?=esc($errors['image'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Quantity <small class="text-danger">*</small></label>
                                            <input type="number" class="form-control  <?= isset($errors['quantity']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="quantity" placeholder="Quantity" value="<?= isset($value['quantity']) ? $value['quantity'] : '' ?>">
                                            <?php if(isset($errors['quantity'])):?>
                                                <small class="text-danger"><?=esc($errors['quantity'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Equipment Status <small class="text-danger">*</small></label>
                                            <select class="custom-select  <?= isset($errors['status_id']) ? 'is-invalid':'is-valid' ?>" name="status_id">
                                                <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($status as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['status_id'])):?>
                                                        <?php if($value['status_id'] == $option['id']): ?>
                                                            <?php $selected = true; ?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['equipment_status'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['status_id'])):?>
                                                <small class="text-danger"><?=esc($errors['status_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Equipment Condition <small class="text-danger">*</small></label>
                                            <select class="custom-select  <?= isset($errors['condition_id']) ? 'is-invalid':'is-valid' ?>" name="condition_id">
                                                <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($conditions as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['condition_id'])):?>
                                                        <?php if($value['condition_id'] == $option['id']): ?>
                                                            <?php $selected = true; ?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['equipment_condition'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['condition_id'])):?>
                                                <small class="text-danger"><?=esc($errors['condition_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Add Equipment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>