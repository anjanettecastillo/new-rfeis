                <div class="row">
                    <div class="col-md-8">
                        <h3><?= $edit?'Edit ':'Add '?><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="/roles-permissions"><?= $title?></a></li>
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
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
          <form action="<?= base_url('roles-permissions')?>/<?= $edit ? 'u/'.esc($id): 'a'?>" method="post">
            <div class="row">
              <div class="col">
                <label class="form-label" for="role_id">User Role Name</label>
                <div class="input-group mb-2">
                  <input value="<?=isset($value['role_name']) ? esc($value['role_name']): ''?>" type="text" name="role" class="form-control" id="role" disabled>
                </div>
                  <?php if(isset($errors['role_id'])):?>
                    <p class="text-danger"><?=esc($errors['role_id'])?><p>
                  <?php endif;?>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label class="form-label" for="permission_id">Permission Name</label>
                <div class="input-group mb-2">
                  <select class="js-example-basic-multiple form-control" name="permission_id[]" multiple="multiple" id="permissions">
                    <?php foreach ($modules as $module): ?>
                      <optgroup label="<?=ucwords(esc($module['module']))?>">
                        <?php foreach ($permissions as $permission): ?>
                          <?php $selected = false; ?>
                          <?php if (!empty($role_permissions)): ?>
                            <?php foreach ($role_permissions as $role_permission): ?>
                              <?php if ($role_permission['permission_id'] == $permission['id']): ?>
                                <?php $selected = true; ?>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endif; ?>
                          <?php if ($module['id'] == $permission['module_id']): ?>
                            <option value="<?=esc($permission['id'])?>" <?=$selected ? 'selected': ''?>><?=ucwords(esc($permission['permission']))?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </optgroup>
                    <?php endforeach; ?>
                  </select>
                </div>
                  <?php if(isset($errors['permission_id'])):?>
                    <p class="text-danger"><?=esc($errors['permission_id'])?><p>
                  <?php endif;?>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <button class="float-end btn btn-primary" type="submit"> Submit </button>
              </div>
            </div>
          </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>