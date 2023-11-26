<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">User Tasks</li>
                </ol>
            </div>
            <h4 class="page-title">Summary</h4>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card rounded-0 shadow-none m-0">
                            <div class="card-body text-center">
                                <i class=" ri-check-line text-muted font-24"></i>
                                <h3><span><?= $metrics->completed ?></span></h3>
                                <p class="text-muted font-15 mb-0">Completed Tasks</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card rounded-0 shadow-none m-0">
                            <div class="card-body text-center">
                                <i class="ri-list-check-2 text-muted font-24"></i>
                                <h3><span><?= $metrics->task ?></span></h3>
                                <p class="text-muted font-15 mb-0">Total Tasks</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card rounded-0 shadow-none m-0 border-start border-light">
                            <div class="card-body text-center">
                                <i class="ri-group-line text-muted font-24"></i>

                                <h3><span><?= $metrics->users ?></span></h3>
                                <p class="text-muted font-15 mb-0">Active User</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card rounded-0 shadow-none m-0 border-start border-light">
                            <div class="card-body text-center">
                                <i class="ri-line-chart-line text-muted font-24"></i>
                                <h3><span><?= round(($metrics->completed / $metrics->task) * 100) ?> % </span></h3>
                                <p class="text-muted font-15 mb-0">Productivity</p>
                            </div>
                        </div>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">User Tasks</h4>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">User Status</h4>
                <table class="table table-centered mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Tasks</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td style="width:35%"><?= $user->name ?></td>
                                <td style="width:30%"><?= $user->email ?></td>

                                <td style="width:15%">
                                    <?= $user->completed ?> / <?= $user->total ?>
                                </td>
                                <td style="width:20%">
                                    <a type="button" href="<?= base_url("Task/".$user->id)?>" class="btn btn-info rounded-pill" >Tasks</button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>