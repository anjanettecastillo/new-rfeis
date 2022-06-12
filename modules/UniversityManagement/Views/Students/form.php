                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/students"><?= $title?></a></li>
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
                                <form method="POST" action="/students/<?= $edit?'u/'.esc($id):'a'?>">
                                    <?php if($edit):?>
                                        <input type="hidden" name="studentID" value="<?=$id?>">
                                    <?php endif;?>
                                    <div class="form-group">
                                        <label for="inputEmail4">Student Number <small class="text-danger">*</small></label>
                                        <input type="text" class="form-control <?= isset($errors['student_number']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="student_number" placeholder="Student Number" value="<?= isset($value['student_number']) ? esc($value['student_number']) : '' ?>">
                                            <?php if(isset($errors['student_number'])):?>
                                                <small class="text-danger"><?=esc($errors['student_number'])?></small>
                                            <?php endif;?>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Last name <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid':'is-valid' ?>" id="inputEmail4" name="last_name" placeholder="Last Name" value="<?= isset($value['last_name']) ? esc($value['last_name']) : '' ?>">
                                            <?php if(isset($errors['last_name'])):?>
                                                <small class="text-danger"><?=esc($errors['last_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">first name <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid':'is-valid' ?>" id="inputPassword4" name="first_name" placeholder="First Name" value="<?= isset($value['first_name']) ? esc($value['first_name']) : '' ?>">
                                            <?php if(isset($errors['first_name'])):?>
                                                <small class="text-danger"><?=esc($errors['first_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Middle name</label>
                                            <input type="text" class="form-control <?= isset($errors['middle_name']) ? 'is-invalid':'is-valid' ?>" id="inputPassword4" name="middle_name" placeholder="Middle Name" value="<?= isset($value['middle_name']) ? esc($value['middle_name']) : '' ?>">
                                            <?php if(isset($errors['middle_name'])):?>
                                                <small class="text-danger"><?=esc($errors['middle_name'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Extension name <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['extension_name_id']) ? 'is-invalid':'is-valid' ?>" name="extension_name_id">
                                                <option <?= isset($validation) ? null : 'selected' ?>>-- Select --</option>
                                                <?php foreach ($extensions as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['extension_name_id'])):?>
                                                        <?php if($value['extension_name_id'] == $option['id']):?>
                                                            <?php $selected = true?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= strtoupper($option['extension_name']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['extension_name_id'])):?>
                                                <small class="text-danger"><?=esc($errors['extension_name_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Course <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['course_id']) ? 'is-invalid':'is-valid' ?>" name="course_id">
                                                <option <?= isset($validation) ? null : 'selected' ?>>-- Select --</option>
                                                <?php foreach ($courses as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['course_id'])):?>
                                                        <?php if($value['course_id'] == $option['id']):?>
                                                            <?php $selected = true?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['course_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['course_id'])):?>
                                                <small class="text-danger"><?=esc($errors['course_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Year Level <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['year_id']) ? 'is-invalid':'is-valid' ?>" name="year_id">
                                                <option <?= isset($validation) ? null : 'selected' ?>>-- Select --</option>
                                                <?php foreach ($levels as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['year_id'])):?>
                                                        <?php if($value['year_id'] == $option['id']):?>
                                                            <?php $selected = true?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['year'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                             <?php if(isset($errors['year_id'])):?>
                                                <small class="text-danger"><?=esc($errors['year_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress">Organization <small class="text-danger">*</small></label>
                                            <select class="custom-select <?= isset($errors['organization_id']) ? 'is-invalid':'is-valid' ?>" name="organization_id">
                                                <option <?= isset($validation) ? null : 'selected' ?>>-- Select --</option>
                                                <?php foreach ($organizations as $option) : ?>
                                                    <?php $selected = false; ?>
                                                    <?php if(isset($value['organization_id'])):?>
                                                        <?php if($value['organization_id'] == $option['id']):?>
                                                            <?php $selected = true?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <option value="<?= $option['id'] ?>" <?= $selected ? 'selected' : null ?>><?= $option['organization_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if(isset($errors['organization_id'])):?>
                                                <small class="text-danger"><?=esc($errors['organization_id'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Email Address <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['email_address']) ? 'is-invalid':'is-valid' ?>" id="inputCity" name="email_address" placeholder="Email Address" value="<?= isset($value['email_address']) ? esc($value['email_address']) : '' ?>">
                                            <?php if(isset($errors['email_address'])):?>
                                                <small class="text-danger"><?=esc($errors['email_address'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Contact Number <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['contact_number']) ? 'is-invalid':'is-valid' ?>" id="inputCity" name="contact_number" placeholder="Contact Number" value="<?= isset($value['contact_number']) ? esc($value['contact_number']) : '' ?>">
                                            <?php if(isset($errors['contact_number'])):?>
                                                <small class="text-danger"><?=esc($errors['contact_number'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputCity">Facebook Account <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['facebook_account']) ? 'is-invalid':'is-valid' ?>" id="inputCity" name="facebook_account" placeholder="Facebook Account" value="<?= isset($value['facebook_account']) ? esc($value['facebook_account']) : '' ?>">
                                            <?php if(isset($errors['facebook_account'])):?>
                                                <small class="text-danger"><?=esc($errors['facebook_account'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right">Add Student</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>