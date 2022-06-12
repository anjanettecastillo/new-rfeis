                <div class="row">
                    <div class="col-md-8">
                        <h3 class="mb-3"><?= $title ?></h3>
                    </div>
                    <div class="col-md-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $title ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
        <div class="card shadow-sm bg-white rounded" id="main-holder">
            <div class="card-header">
                <a class="btn btn-info mb-4" href="/reservations/a" role="button">
                    <i class="fas fa-plus-circle"></i> add 
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->include('Scripts/calendar'); ?>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>