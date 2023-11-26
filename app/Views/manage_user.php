<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard');?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage User</li>
                </ol>
            </div>
            <h4 class="page-title">Manage User</h4>
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
                            <th>Admin?</th>
                            <th>Active?</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td style="width:35%"><?= $user->name ?></td>
                                <td style="width:35%"><?= $user->email ?></td>
                                
                                <td style="width:20%"><?php if(!$user->is_admin): ?>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#danger-header-modal">Make Admin</button>
                                    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Modal Heading</h4>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="updateAdminStatus(<?= $user->id?>)">Update Status</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    <?php endif; ?>
                                </td>
                                <td style="width:10%">
                                    <!-- Switch-->
                                    <div>
                                        <input type="checkbox" id="<?= $user->email ?>" <?php if ($user->status) {
                                                                                            echo "checked";
                                                                                        } ?> data-switch="success" onchange="updateStatus(<?= $user->id?>)" />
                                        <label for="<?= $user->email ?>" data-on-label="Yes" data-off-label="No" class="mb-0 d-block"></label>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    function updateStatus(id) {
    const apiUrl = '<?= base_url("UpdateUserStatus/") ?>' + id;
    fetch(apiUrl, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        location.reload();
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

function updateAdminStatus(id) {
    const apiUrl = '<?= base_url("UpdateAdminStatus/") ?>' + id;
    fetch(apiUrl, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        location.reload();
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

</script>