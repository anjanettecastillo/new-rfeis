                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/users"><?= $title?></a></li>
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
                                <form method="POST" action="/users/<?= $edit ? 'u/'.esc($id) : 'a' ?>">   
                                    <?php if($edit):?>
                                        <input type="hidden" name="userID" value="<?=$id?>">                             
                                    <?php endif;?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Last name <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid':'is-valid' ?> " id="inputEmail4" name="last_name" placeholder="Last name" value="<?= isset($value['last_name']) ? esc($value['last_name']) : '' ?>">
                                            <?php if(isset($errors['last_name'])):?>
                                                <small class="text-danger"><?=esc($errors['last_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">first name <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid':'is-valid' ?> " id="inputPassword4" name="first_name" placeholder="First name" value="<?= isset($value['first_name']) ? esc($value['first_name']) : '' ?>">
                                            <?php if(isset($errors['first_name'])):?>
                                                <small class="text-danger"><?=esc($errors['first_name'])?></small>
                                            <?php endif;?>   
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Email Address <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'is-valid' ?> " id="inputCity" name="email_address" placeholder="Email Address" value="<?= isset($value['email_address']) ? esc($value['email_address']) : '' ?>">
                                            <?php if(isset($errors['email_address'])):?>
                                                <small class="text-danger"><?=esc($errors['email_address'])?></small>
                                            <?php endif;?>    
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Role <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['role_id']) ? 'is-invalid':'is-valid' ?>" name="role_id">
                                                <option value="x" <?= isset($roles) ? null : 'selected' ?>>-- select --</option>
                                                <?php foreach ($roles as $option) : ?>
                                                    <?php $selected = false ?>
                                                    <?php if(isset($value['role_id'])): ?>
                                                        <?php if($option['id'] == $value['role_id']): ?>
                                                            <?php $selected = true;?>
                                                        <?php endif; ?>
                                                    <?php endif;?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['role_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['role_id'])):?>
                                                <small class="text-danger"><?=esc($errors['role_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress2">Username <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid':'is-valid' ?>"  name="username" id="username" value="<?= isset($value['username']) ? esc($value['username']) : '' ?>" placeholder="Username">
                                            <?php if(isset($errors['username'])):?>
                                                <small class="text-danger"><?=esc($errors['username'])?></small>
                                            <?php endif;?>    
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Password <small class="text-danger">*</small></label>
                                            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid':'is-valid' ?> " name="password" id="password" placeholder="Password">
                                            <?php if(isset($errors['password'])):?>
                                                <small class="text-danger"><?=esc($errors['password'])?></small>
                                            <?php endif;?>    
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Confirm Password <small class="text-danger">*</small></label>
                                            <input type="password" class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid':'is-valid' ?>" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                            <?php if(isset($errors['confirm_password'])):?>
                                                <small class="text-danger"><?=esc($errors['confirm_password'])?></small>
                                            <?php endif;?>    
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>