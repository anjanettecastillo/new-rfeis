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
                                <form method="POST" action="/permission-types/<?= $edit ? 'u/'.esc($id) : 'a' ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Permission Type <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['type']) ? 'is-invalid':'is-valid' ?>" name="type" placeholder="Permission Type" value="<?= isset($value['type'])? esc($value['type']) : ''?>">
                                            <?php if(isset($errors['type'])):?>
                                                <small class="text-danger"><?=esc($errors['type'])?></small>
                                            <?php endif;?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Slug  <small class="text-danger">*</small></label>
                                            <input type="text" class="form-control <?= isset($errors['slug']) ? 'is-invalid':'is-valid' ?>" name="slug" placeholder="Slug" value="<?= isset($value['slug'])? esc($value['slug']) : ''?>">
                                            <?php if(isset($errors['slug'])):?>
                                                <small class="text-danger"><?=esc($errors['slug'])?></small>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i> <?= $action ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>