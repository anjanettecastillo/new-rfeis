                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/facility"><?= $title?></a></li>
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
                                <form method="POST" action="/facility/<?= $edit ? 'u/'.$id : 'a' ?>" enctype="multipart/form-data">
                                    <?php if($edit):?>
                                        <input type="hidden" name="facilityID" value="<?=$id?>">
                                    <?php endif;?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Facility Code <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['facility_code']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="facility_code" placeholder="Facility Code" value="<?= isset($value['facility_code']) ? $value['facility_code'] : '' ?>">
                                            <?php if(isset($errors['facility_code'])):?>
                                                <small class="text-danger"><?=esc($errors['facility_code'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Name of Facility <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['facility_name']) ? 'is-invalid':'is-valid' ?>" id="inputAddress" name="facility_name" placeholder="Facility Name" value="<?= isset($value['facility_code']) ? $value['facility_name'] : '' ?>">
                                            <?php if(isset($errors['facility_name'])):?>
                                                <small class="text-danger"><?=esc($errors['facility_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Description <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="description" placeholder="Description" value="<?= isset($value['description']) ? $value['description'] : '' ?>">
                                            <?php if(isset($errors['description'])):?>
                                                <small class="text-danger"><?=esc($errors['description'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Image <small class="text-danger">*</small></label>
                                            <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= isset($errors['image']) ? 'is-invalid':'is-valid' ?>" name="image" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <?php if(isset($errors['image'])):?>
                                                <small class="text-danger"><?=esc($errors['image'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Facility Fee <small class="text-danger">*</small></label>
                                            <input type="number" class="form-control <?= isset($errors['facility_fee']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="facility_fee" placeholder="Facility Fee" value="<?= isset($value['facility_fee']) ? $value['facility_fee'] : '' ?>">
                                            <?php if(isset($errors['facility_fee'])):?>
                                                <small class="text-danger"><?=esc($errors['facility_fee'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Capacity <small class="text-danger">*</small></label>
                                            <input type="number" class="form-control <?= isset($errors['capacity']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="capacity" placeholder="Capacity" value="<?= isset($value['capacity']) ? $value['capacity'] : '' ?>">
                                            <?php if(isset($errors['capacity'])):?>
                                                <small class="text-danger"><?=esc($errors['capacity'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Facility Status <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['facility_status_id']) ? 'is-invalid':'is-valid' ?>" name="facility_status_id">
                                                <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($status as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['facility_status_id'])):?>
                                                        <?php if($value['facility_status_id'] == $option['id']): ?>
                                                            <?php $selected = true; ?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['facility_status'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['facility_status_id'])):?>
                                                <small class="text-danger"><?=esc($errors['facility_status_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Add Facility</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>