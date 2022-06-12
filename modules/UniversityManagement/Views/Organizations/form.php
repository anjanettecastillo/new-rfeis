                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/organizations"><?= $title?></a></li>
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
                                <form method="POST" action="/organizations/<?= $edit ? 'u/'.$id : 'a' ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Name of Organization <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['organization_name']) ? 'is-invalid':'is-valid' ?>" id="inputAddress" name="organization_name" placeholder="Organization Name" value="<?= isset($value['organization_name']) ? esc($value['organization_name']) : '' ?>">
                                            <?php if(isset($errors['organization_name'])):?>
                                                <small class="text-danger"><?=esc($errors['organization_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Organization Type <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['organization_type_id']) ? 'is-invalid':'is-valid' ?>" name="organization_type_id">
                                                <option value="x" <?= isset($validation) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($type as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['organization_type_id'])):?>
                                                        <?php if($value['organization_type_id'] == $option['id']): ?>
                                                            <?php $selected = true; ?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['organization_type'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['organization_type_id'])):?>
                                                <small class="text-danger"><?=esc($errors['organization_type_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Description <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid':'is-valid' ?>" id="inputAddress2" name="description" placeholder="Description" value="<?= isset($value['description']) ? esc($value['description']) : '' ?>">
                                            <?php if(isset($errors['description'])):?>
                                                <small class="text-danger"><?=esc($errors['description'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Add Organization</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>