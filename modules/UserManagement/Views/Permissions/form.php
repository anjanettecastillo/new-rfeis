                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/permissions"><?= $title?></a></li>
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
                                <form method="POST" action="/permissions/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Permission <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['permission']) ? 'is-invalid':'is-valid' ?>" name="permission" placeholder="permission" value="<?= isset($value['permission'])? esc($value['permission']) : ''?>">
                                            <?php if(isset($errors['permission'])):?>
                                                <small class="text-danger"><?=esc($errors['permission'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Permission Type <small class="text-danger">*</small></label>
                                            <select class="form control custom-select <?= isset($errors['permission_type']) ? 'is-invalid':'is-valid' ?>" name="permission_type">
                                                <option value="x" <?= isset($permissionTypes) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($permissionTypes as $option) : ?>
                                                    <?php $selected = false ?>
                                                    <?php if(isset($value['permission_type'])): ?>
                                                        <?php if($option['id'] == $value['permission_type']): ?>
                                                            <?php $selected = true;?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['type'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['permission_type'])):?>
                                                <small class="text-danger"><?=esc($errors['permission_type'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Module <small class="text-danger">*</small></label>
                                            <select class="form control custom-select <?= isset($errors['module_id']) ? 'is-invalid':'is-valid' ?>" name="module_id">
                                                <option value="x" <?= isset($modules) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($modules as $option) : ?>
                                                    <?php $selected = false ?>
                                                    <?php if(isset($value['module_id'])): ?>
                                                        <?php if($option['id'] == $value['module_id']): ?>
                                                            <?php $selected = true;?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['module'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['module_id'])):?>
                                                <small class="text-danger"><?=esc($errors['module_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Slug <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['slug']) ? 'is-invalid':'is-valid' ?>" name="slug" placeholder="Slug" value="<?= isset($value['slug'])? esc($value['slug']) : ''?>">
                                            <?php if(isset($errors['slug'])):?>
                                                <small class="text-danger"><?=esc($errors['slug'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Icon <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['icon']) ? 'is-invalid':'is-valid' ?>" name="icon" placeholder="Icon" value="<?= isset($value['icon'])? esc($value['icon']) : ''?>">
                                            <?php if(isset($errors['icon'])):?>
                                                <small class="text-danger"><?=esc($errors['icon'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> <?= $action ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>